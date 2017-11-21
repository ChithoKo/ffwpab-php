<?php

//$table = 'stjohn_attendant';

function getAttendants($where = null){
	$table = 'stjohn_attendant';

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");
	
	return fetchAll($sql);
}

function checkAttendantExist($mid, $did){
	$table = 'stjohn_attendant';

	$sql = "SELECT atdid FROM $table WHERE mid = $mid AND did = $did";
	return (fetchOne($sql)['atdid']>0);
}

function getAtdListByDuty($did){
	$table = 'stjohn_attendant';

	$sql = "SELECT * FROM $table WHERE did = $did AND statemember = 'approved' AND stateadmin = 'approved' ";
	return fetchAll($sql);
}

function getAtdidByDutyInfo($username, $dutyname){
	$table = 'stjohn_attendant';
	$tableMem = 'stjohn_member';
	$tableDuty = 'stjohn_duty';

	$sql = "SELECT atdid FROM $table WHERE mid = (SELECT mid FROM $tableMem WHERE username = '$username') AND did = (SELECT did FROM $tableDuty WHERE dutyname = '$dutyname')";
	// echo $sql . "\n";
	return fetchOne($sql)['atdid'];
}

function getAtdListByState($stateMem, $stateAdm){
	$table = 'stjohn_attendant';
	$tableMem = 'stjohn_member';
	$tableDuty = 'stjohn_duty';

	$sql = "SELECT atdid, title, tnum, username, dutyname, $table.starttime AS atd_starttime, $table.endtime AS atd_endtime, $tableDuty.starttime AS duty_starttime, $tableDuty.endtime AS duty_endtime FROM $table, $tableMem, $tableDuty WHERE statemember = '$stateMem' AND stateadmin = '$stateAdm' AND $tableMem.mid = $table.mid AND $tableDuty.did = $table.did ORDER BY $table.did";
	// echo "\n<br/>$sql\n<br/>";
	return fetchAll($sql);
}

function getAtdMemListByDuty($did){
	$table = 'stjohn_attendant';
	$table2 = 'stjohn_member';

	$sql = "SELECT $table2.mid, $table2.username FROM $table, $table2 WHERE $table.did = $did AND $table.mid = $table2.mid AND statemember = 'approved' AND stateadmin = 'approved' ";
	return fetchAll($sql);
}

function getAtdPendingListByDuty($did, $stateMem, $stateAdm){
	$table = 'stjohn_attendant';
	$sql = "SELECT * FROM $table WHERE did = $did AND statemember = '$stateMem' AND stateadmin = '$stateAdm'";
	// echo 'sql : ' . $sql . "\n";

	return fetchAll($sql);
}

function addAttendantAdm(){
	$table = 'stjohn_attendant';

	// echo "table in atdip is: $table \n";
	// echo "mids:\n";
	// var_dump($_POST['mids']);

	$mids = $_POST['mids'];
	$posts = array();
	foreach ($mids as $mid) {
		$posts[] = checkMemberInfoById('title', $mid);
	}
	// $mid = $_POST['mid'];							///
	$did = $_POST['did'];
	$starttime = getDutyInfo($did, 'starttime')['starttime'];
	$endtime = getDutyInfo($did, 'endtime')['endtime'];

	$starttime = "'$starttime'";
	$endtime = "'$endtime'";
	// $post = checkMemberInfoById('title', $mid);		///
	// $date = $_POST['date'];

	// $datearr = explode('/', $date);
	// $date = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
	// $starttime = $_POST['starttime'];
	// $starttime = "'$date $starttime:00'";
	// $endtime = $_POST['endtime'];
	// $endtime = "'$date $endtime:00'";

	// $post = "'$post'";
	// $post = "'M'";												//////////
	$state_adm = "'approved'";

	// $array = array('mid'=>$mid, 'did'=>$did, 'stateadmin'=>$state_adm, 'starttime'=>$starttime, 'endtime'=>$endtime, 'post'=>$post);
	$arrayMulti = array();
	for($i=0; $i<count($mids); $i++){
		$arrayMulti[] = array('mid'=>$mids[$i], 'did'=>$did, 'stateadmin'=>$state_adm, 'starttime'=>$starttime, 'endtime'=>$endtime, 'post'=>"'$posts[$i]'");

		if(checkMemberInfoById('state', $mids[$i]) == 'pending'){
		// echo "<br/>attendant addition failed. non-official member cannot be added  :p<br/>";
		return -1;
	}
	if(checkAttendantExist($mids[$i], $did)){
		// echo "<br/>attendant alrdy added   xd<br/>";
		return 0;
	}
	}

	// if(checkMemberInfoById('state', $mid) == 'pending'){
	// 	echo "<br/>attendant addition failed. non-official member cannot be added  :p<br/>";
	// 	return -1;
	// }
	// if(checkAttendantExist($mid, $did)){
	// 	echo "<br/>attendant alrdy added   xd<br/>";
	// 	return -1;
	// }
	
	return insertMulti($table, $arrayMulti);
	
}

function addAttendantMem(){
	$table = 'stjohn_attendant';

	$mid = $_SESSION['memberid'];
	$did = $_POST['did'];
	$post = checkMemberInfoById('title', $mid);
	$date = $_POST['date'];
	$datearr = explode('/', $date);
	$date = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
	$starttime = $_POST['starttime'];
	$starttime = "'$date $starttime:00'";
	$endtime = $_POST['endtime'];
	$endtime = "'$date $endtime:00'";
	$post = "'$post'";
	$state_mem = "'approved'";

	//echo 'state 1 <br/>';											////////

	$array = array();

	$array['mid'] = $mid;
	$array['did'] = $did;
	$array['statemember'] = $state_mem;
	$array['starttime'] = $starttime;
	$array['endtime'] = $endtime;
	$array['post'] = $post;

	//echo 'state 2 <br/>';											////////

	if(checkMemberInfoById('state', $mid) == 'pending'){
		//echo "<br/>attendant addition failed. non-official member cannot be added  :p<br/>";
		return 0;
	}
	if(checkAttendantExist($mid, $did)){
		//echo "<br/>attendant alrdy added   xd<br/>";
		return 0;
	}
	
	return insert($table, $array);

	
}

function approveAtdAdm(){
	$table = 'stjohn_attendant';

	// $atdid = $_POST['atdid'];
	$username = htmlspecialchars_decode($_POST['username']);
	$dutyname = htmlspecialchars_decode($_POST['dutyname']);
	$atdid = getAtdidByDutyInfo($username, $dutyname);
	$date = genDateFromPage($_POST['date']);
	$starttime = $date . ' ' . $_POST['atd_starttime'];
	$endtime = $date . ' ' . $_POST['atd_endtime'];

	// echo "atdid : " . $atdid . "\n";

	$array = array(
			'stateadmin'=>"'approved'",
			'starttime'=>"'$starttime'",
			'endtime' => "'$endtime'"
		);

	return update($table, $array, "atdid=$atdid");
}

function approveAtdMem(){
	$table = 'stjohn_attendant';

	$atdid = $_POST['atdid'];

	// $array = array();

	$array = array('statemember'=>"'approved'");

	return update($table, $array, "atdid=$atdid");
}

function deleteAttendant(){
	$table = 'stjohn_attendant';

	$atdid = $_POST['atdid'];

	return delete($table, " atdid=$atdid");
}

function updateAttendant(){
	$table = 'stjohn_attendant';

	$atdid = $_POST['atdid'];
	$post = $_POST['post'];
	$date = $_POST['date'];
	$datearr = explode('/', $date);
	$date = $datearr[2] . '-' . $datearr[1] . '-' . $datearr[0];
	$starttime = $_POST['starttime'];
	$starttime = "$date $starttime:00";
	$endtime = $_POST['endtime'];
	$endtime = "$date $endtime:00";

	$array = array();

	//////////////////////////////////////////						UNFINISHED						/////////////////////////////////////

	return ($atdid==null)? null : update($table, $array, " atdid=$atdid");
}


// Show attendants whose states are all approved
function showAttendantsSucc($where = null){
	$table = 'stjohn_attendant';

	$sql = "SELECT * FROM $table WHERE stateadmin='approved' AND statemember='approved' ";
	$sql = ($where==null)? $sql : $sql." AND $where";

	return fetchAll($sql);
}


// Show attendatns whose stateadmin is pending
function showAttendantsAdm($where = null){
	$table = 'stjohn_attendant';

	$sql = "SELECT * FROM $table WHERE stateadmin='approved' ";
	$sql = ($where==null)? $sql : $sql." AND $where";

	return fetchAll($sql);
}



// Show attendatns whose statemember is pending
function showAttendantsMem($where = null){
	$table = 'stjohn_attendant';

	$sql = "SELECT * FROM $table WHERE statemember='approved' ";
	$sql = ($where==null)? $sql : $sql." AND $where";

	return fetchAll($sql);
}



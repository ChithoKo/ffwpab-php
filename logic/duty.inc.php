<?php

//require_once '../include.php';

global $table;
$table = "stjohn_duty";

function updateDutyFinish(){
	$table = 'stjohn_duty';
	$arr = array('state'=>"'finished'");

	return update($table, $arr, " endtime < NOW()");
}

function addDuty(){
	$table = "stjohn_duty";

	// $year = $_POST['year'];
	// $month = $_POST['month'];
	// $day = $_POST['day'];
	$date = genDateFromPage($_POST['date']);
	$startHr = $_POST['starttime'];
	$endHr = $_POST['endtime'];

	$array = array();
	$dutyname = $_POST['dutyname'];
	$venue = $_POST['venue'];
	$timemark = $_POST['timemark'];

	$array['dutyname'] = "'$dutyname'";
	$array['venue'] = "'$venue'";
	$array['timemark'] = "'$timemark'";
	$array['starttime'] = "'$date $startHr:00'";
	$array['endtime'] = "'$date $endHr:00'";
	$array['totalmembers'] = $_POST['totalmembers'];
	$array['note'] = "'/'";

	return insert($table, $array);
}

function getDuty($where=null){
	$table = "stjohn_duty";
	$sql="SELECT * FROM $table WHERE $where;";
	return fetchOne($sql);
}

function getDutyAll(){
	$table = "stjohn_duty";
	$sql = "SELECT * FROM $table ORDER BY starttime ASC";
	return fetchAll($sql);
}

function getDutyAllBy($where=null){
	$table = "stjohn_duty";
	$where = ($where==null)? null : " WHERE $where";
	$sql = "SELECT * FROM $table $where ORDER BY starttime ASC";
	return fetchAll($sql);
}

function getDutyInfo($dutyname, $starttime, $info){
	$table = 'stjohn_duty';
	$sql = "SELECT $info FROM $table WHERE dutyname='$dutyname' AND starttime='$starttime'";
	// echo $sql;
	return fetchOne($sql)[$info];
}

function deleteDuty($where=null){
	$table = "stjohn_duty";
	$dutyname = htmlspecialchars_decode($_POST['dutyname']);
	$date = genDateFromPage($_POST['date']);
	$starttime = $date . ' ' . $_POST['starttime'];
	$where = " dutyname = '$dutyname' AND starttime = '$starttime'";
	return delete($table, $where);
}

function updateDuty(){
	//echo "<script> alert('" . $table . "');</script>";
	$table = "stjohn_duty";

	$array = array();
	$ori_dutyname = htmlspecialchars_decode($_POST['ori_dutyname']);
	$ori_date = genDateFromPage($_POST['ori_date']);
	$ori_starttime = $_POST['ori_starttime'];

	// $did = $_POST['did'];
	$did = getDutyInfo($ori_dutyname, ($ori_date.' '.$ori_starttime), 'did');
	$dutyname = htmlspecialchars_decode($_POST['dutyname']);
	$date = genDateFromPage($_POST['date']);
	//echo $date;
	$timemark = $_POST['timemark'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$venue = htmlspecialchars_decode($_POST['venue']);
	$note = htmlspecialchars_decode($_POST['note']);
	$totalmembers = (int)$_POST['totalmembers'];

	//echo "table is : $table<br/>  :  ";

	$array['dutyname'] = "'$dutyname'";
	$array['starttime'] = "'$date $starttime:00'";
	//$array['starttime'] = gmdate('Y-m-d H:i:s', strtotime($array['starttime']));
	$array['endtime'] = "'$date $endtime:00'";
	//$array['endtime'] = gmdate('Y-m-d H:i:s', strtotime($array['endtime']));
	$array['timemark'] = "'$timemark'";
	$array['venue'] = "'$venue'";
	$array['note'] = "'$note'";
	$array['totalmembers'] = "$totalmembers";

	//var_dump($array);

	//$msg = update($table, $array, "did=$did");
	

	return update($table, $array, " did=$did");
}

function getDutySum(){
	$table = "stjohn_duty";
	return getResultNum("SELECT * FROM $table;");
}

// if current time exceed the end time, state should be updated to 'finished'
function checkDuty(){
	$table = "stjohn_duty";

}

function checkDutyInfoById($info, $did){
	$table = 'stjohn_duty';
	$sql = "SELECT $info FROM $table WHERE did = $did";
	return fetchOne($sql)["$info"];
}





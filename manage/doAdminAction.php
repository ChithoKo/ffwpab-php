<?php

require_once "../include.php";

$act = $_REQUEST['act'];
//$act = $_POST['act'];

$msg = '';
//$response = array();

//echo "<script> alert('admin action'); </script>";


if($act=='addDuty'){
	$msg = addDuty();

	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'Add success',
			'status' => true,
			'mm' => $msg
		);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Add error',
			'status' => false,
			'mm' => $msg
		);
	}
	echo json_encode($response);

}else if($act=='updateDuty'){

	$msg = updateDuty();
	//echo "msg : " . $msg . "\n";
	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'Update success',
			'status' => true
		);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Update error',
			'status' => false
		);
	}
	echo json_encode($response); 

}else if($act=='getAtdList'){
	$arr = getAtdListByDuty($_POST['did']);
	// var_dump($arr);
	$midList = array();
	for($i=0; $i<count($arr); $i++){
		$midList[] = $arr[$i]['mid'];
	}
	// var_dump($midList);
	$mids = array();
	$memNames = array();
	$pendingmids = array();
	$waitingmids = array();
	$memImg = array();

	$where = count($arr)==0? null : 'mid NOT IN ';

	$memList = getMembersExcept($where, $midList);
	$atdPendingList = getAtdPendingListByDuty($_POST['did'], 'pending', 'approved');
	$atdWaitingList = getAtdPendingListByDuty($_POST['did'], 'approved', 'pending');
	foreach ($memList as $member) {
		$mids[] = $member['mid'];
		$memNames[] = $member['username'];
	}
	foreach ($atdPendingList as $pendingatd) {
		$pendingmids[] = $pendingatd['mid'];
	}
	foreach ($atdWaitingList as $waitingatd) {
		$waitingmids[] = $waitingatd['mid'];
	}
	// var_dump($atdPendingList);

	$response = array(
			'data' => array(
				'mids' => $mids,
				'memNames' => $memNames,
				'pendingmids' => $pendingmids,
				'waitingmids' => $waitingmids,
			),
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true
		);
	echo json_encode($response);
}else if($act=='addAtdAdm'){
	$msg = addAttendantAdm();

	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Request sent',
				'status' => true
			);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Request sent already',
			'status' => false
		);
	}
	echo json_encode($response);
}else if($act == 'addEvent'){
	$msg = addMeeting();

	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Addition success',
				'status' => true
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Addition error',
				'status' => false
			);
	}

	echo json_encode($response);
}else if($act == 'updateEvent'){
	$msg = updateMeeting();

	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'Update success',
			'status' => true,
			'data' => ''
		);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Update error',
			'status' => false,
			'data' => ''
		);
	}

	echo json_encode($response);
}else if($act == 'approveAtd'){
	$msg = approveAtdAdm();

	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Approved',
				'status' => true
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Approve Error',
				'status' => false
			);
	}

	echo json_encode($response);
}else if($act == 'approveMember'){
	$msg = approveMemberByName();

	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Approved',
				'status' => true
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Approve Error',
				'status' => false
			);
	}

	echo json_encode($response);
}else if($act == 'delDuty'){
	$msg = deleteDuty();
	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Deleted',
				'status' => true
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Delete Error',
				'status' => false
			);
	}

	echo json_encode($response);
}else if($act == 'delEvent'){
	$msg = deleteMeeting();
	if($msg){
		$response = array(
				'errno' => 0,
				'msg' => 'Deleted',
				'status' => true
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Delete Error',
				'status' => false
			);
	}

	echo json_encode($response);
}

//if($msg){
//	alertMsg($msg, '../webpage/addDuty.php');	// tmp url
//}else{
//	alertMsg($msg, '../webpage/addDuty.php');	// tmp url
//}
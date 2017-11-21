<?php

require_once '../include.php';

$act = $_REQUEST['act'];
//echo 'act : '.$act;

$msg = '';

if($act == 'addAtd'){
	$msg = addAttendantMem();

	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'Registration success',
			'status' => true,
			'mm' => $msg
		);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Registration failed',
			'status' => false,
			'mm' => $msg
		);
	}

	echo json_encode($response);
}else if($act == 'addImage'){
	echo 'add image here END';
	// echo is_uploaded_file($_FILES['filesUploaded']['tmp_name']);
	// buildInfo();
	$fileInfos = uploadFiles();
	// echo "file infos:<br/>";
	print_r($fileInfos);
	// echo "<br/>";
	foreach ($fileInfos as $fileInfo) {
		echo "<br/>" . $fileInfo['name'] . "<br/>";
		// print_r($fileInfo['name']);
		addImage($fileInfo['name']);
	}
	// echo 'success';
}else if($act == 'editPersonalNote'){
	$mid = $_SESSION['mid'];
	$note = $_POST['note'];
	$array = array('status' =>  "'$note'");

	$msg = updateMember($array, "mid=$mid");

	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'Registration success',
			'status' => true,
			'data' => $msg
		);
	}else{
		$response = array(
			'errno' => -1,
			'msg' => 'Registration failed',
			'status' => false,
			'data' => $msg
		);
	}

	echo json_encode($response);
}
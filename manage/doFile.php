<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-10-29 11:35:52
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-17 00:25:29
 */

require_once '../include.php';

$act = $_REQUEST['act'];

if($act == 'addImg'){
	$images = uploadFiles();
	// $msg = addImages($images);

	if($images){
		$response = array(
			'errno' => 0,
			'msg' => 'add image success',
			'status' => true,
			'data' => $images
		);
	}else{
		$response = array(
			'errno' => 1,
			'msg' => 'add image failed',
			'status' => false,
			'data' => ''
		);
	}

	echo json_encode($response);
}else if($act == 'addRegImg'){
	$images = uploadFiles();
	foreach ($images as $image) {
		resizeRegularImage($image['name']);
	}
	$msg = addImages($images);
}else if($act == 'addIconImg'){
	$msg = addImage($_POST['iconname']);
	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'add image success',
			'status' => true,
			'data' => ''
		);
	}else{
		$response = array(
			'errno' => 1,
			'msg' => 'add image failed',
			'status' => false,
			'data' => ''
		);
	}

	echo json_encode($response);
}else if($act == 'cropImg'){
	$imagename = $_POST['imagename'];
	$imageWidth = $_POST['imageWidth'];
	$cropLength = $_POST['sq-width'];
	$imgTop = $_POST['sq-top'];
	$imgLeft = $_POST['sq-left'];

	resizeRegularImage($imagename, $imageWidth, $cropLength, $imgLeft, $imgTop);

	if(true){
		$response = array(
			'errno' => 0,
			'msg' => 'crop image success',
			'status' => true,
			'data' => ''
		);
	}
	echo json_encode($response);
}
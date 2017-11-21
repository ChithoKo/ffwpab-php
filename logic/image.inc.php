<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-09-14 18:46:49
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-17 00:21:41
 */

// get images according to conditions
function getImages($where = null){
	$table = 'stjohn_image';

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");
	
	$images = fetchAll($sql);
	if(count($images)==0){
		$images = fetchAll("SELECT * FROM $table WHERE imgid = 0");
	}

	return $images;
}

// function getUserIcon($mid){
// 	$table = 'stjohn_image';

// 	$sql = "SELECT "
// }

// 
function getImageIdByName($imagename){
	$table = 'stjohn_image';

	$sql = "SELECT imgid FROM $table WHERE imagename = '$imagename'";

	return fetchOne($sql);
}

// add an image info to db
function addImage($imagename){
	$table = 'stjohn_image';
	// $imagename = $_POST['imagename'];

	$image = array('imagename'=>"'$imagename'");

	$keys = array_keys($_POST);

	$image['mid'] = $_SESSION['mid'];
	
	if(in_array('did', $keys)){
		$image['did'] = $_POST['did'];
	}
	if(in_array('abid', $keys)){
		$image['abid'] = $_POST['abid'];
	}
	if(in_array('meetid', $keys)){
		$image['meetid'] = $_POST['meetid'];
	}

	// print_r($image);
	// echo "<br/>\n";

	return insert($table, $image);
}

// add an image info to db
// $image : a multiple array like this : [ ['name':'xxx'], ['name':'xxx'], ... ]
function addImages($images){
	$table = 'stjohn_image';
	// $imagename = $_POST['imagename'];

	$image = array('imagename'=>"");

	$keys = array_keys($_POST);

	$image['mid'] = $_SESSION['mid'];
	
	if(in_array('did', $keys)){
		$image['did'] = $_POST['did'];
	}
	if(in_array('abid', $keys)){
		$image['abid'] = $_POST['abid'];
	}
	if(in_array('meetid', $keys)){
		$image['meetid'] = $_POST['meetid'];
	}

	foreach ($images as $imageFile) {
		$image['imagename'] = "";
		$imagename = $imageFile['name'];
		$image['imagename'] = "'$imagename'";

		// print_r($image);
		// echo "<br/>\n";

		insert($table, $image);
	}

	

	return 'images uploaded';
}

function delImage($imagename){
	$table = 'stjohn_image';

	return delete($table, " imagename = '$imagename'");
}

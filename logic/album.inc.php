<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-10-24 16:18:55
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-10-24 16:34:37
 */

// get albums according to conditions
function getAlbums($where = null){
	$table = 'stjohn_album';

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");
	
	return fetchAll($sql);
}

// add an album info to db
function addAlbum($albumname){
	$table = 'stjohn_album';
	// $imagename = $_POST['imagename'];

	$album = array('albumname'=>"'$albumname'");

	if($_POST['mid']){
		$image['mid'] = $_POST['mid'];
	}
	if($_POST['did']){
		$image['did'] = $_POST['did'];
	}
	if($_POST['meetid']){
		$image['meetid'] = $_POST['meetid'];
	}
	if($_POST['parentalbum']){
		$image['parentalbum'] = $_POST['parentalbum'];
	}

	return insert($table, $album);
}
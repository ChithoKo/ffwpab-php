<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-11-05 14:17:21
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-07 00:17:27
 */

function getPostLike($where = null){
	$table = 'stjohn_postlike';

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");
	
	return fetchAll($sql);
}

function getPostLikeByImgid($imgid){
	$table = 'stjohn_postlike';

	$sql = "SELECT * FROM $table WHERE imgid = $imgid AND statemember = 'approved' AND stateadmin = 'approved' ";
	return fetchAll($sql);
}

function addPostLike(){
	$table = 'stjohn_postlike';

	$mid = $_SESSION['mid'];
	$content = $_POST['content'];
	// $imgid = $_POST['imgid'];
	// $prid = $_POST['prid'];

	 if($_POST['parentid']){
	 	$parentid = $_POST['parentid'];
	 }else{
	 	$parentid = 0;
	 }
	 if($_POST['imgid']){
	 	$imgid = $_POST['imgid'];
	 }else{
	 	$imgid = 0;
	 }
	 if($_POST['prid']){
	 	$prid = $_POST['prid'];
	 }else{
	 	$prid = 0;
	 }
	 // $parentid = $_POST['parentid']==null?null:$_POST['parentid'];
	 // $imgid = $_POST['imgid']==null?null:$_POST['imgid'];
	 // $prid = $_POST['prid']==null?null:$_POST['prid'];

	 $postlike = array('mid'=>$mid, 'content'=>"'$content'", 'imgid'=>$imgid, 'prid'=>$prid, 'parentid'=>$parentid);

	 return insert($table, $postlike);
}


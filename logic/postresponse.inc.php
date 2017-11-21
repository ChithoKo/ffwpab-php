<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-11-05 13:49:24
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-11 03:56:17
 */

function getPostResponse($where = null){
	$table = 'stjohn_postresponse';

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");
	// echo "sql : $sql\n";
	
	return fetchAll($sql);
}

function getPostResponseByImgid($imgid){
	$table = 'stjohn_postresponse';

	$sql = "SELECT * FROM $table WHERE imgid = $imgid ";
	return fetchAll($sql);
}

function addPostResponse($imgid, $parentprid=0){
	$table = 'stjohn_postresponse';

	$mid = $_SESSION['mid'];
	$content = $_POST['content'];
	 // $parentid = $_POST['parentid']==null?null:$_POST['parentid'];

	 $postresponse = array('mid'=>$mid, 'content'=>"'$content'", 'imgid'=>$imgid, 'parentprid'=>$parentprid);

	 return insert($table, $postresponse);
}


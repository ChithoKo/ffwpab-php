<?php

//require_once '../include.php';
$table = "stjohn_admin";

//check existence of an admin, for the use of Login
function checkAdmin($username, $password){
	$table = "stjohn_admin";
	$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password';";
	return fetchOne($sql);
}

//check existence of a username, for the use of admin registration
function checkAdminName($username){
	$table = "stjohn_admin";
	$sql = "SELECT username FROM $table WHERE username = '$username';";
	return fetchOne($sql);
}

function checkAdminByInfo($info, $infoVal){
	$table = "stjohn_admin";
	$sql = "SELECT aid, username FROM $table WHERE $info = '$infoVal';";
	// echo $sql;
	return fetchOne($sql);
}

//return info of all admins
function checkAdminAll(){
	$table = "stjohn_admin";
	$sql = "SELECT * FROM $table";
	return fetchAll($sql);
}

function addAdmin($arr){
	$table = "stjohn_admin";
	return insert($table, $arr);
}

function editAdmin($array, $where=null){
	$table = "stjohn_admin";
	return update($table, $array, $where);
}

function deleteAdmin($username){
	$table = "stjohn_admin";
	return delete($table, "username = '$username'");
}

function checkMemberState(){
	$table = "stjohn_admin";
	$sql = "SELECT * FROM stjohn_members WHERE state = 'pending';";
	return fetchAll($sql);
}

// function approveMember($array, $where=null){
// 	$table = "stjohn_admin";
// 	return update("stjohn_members", $array, $where);
// }

// function checkDutyState(){
// 	$table = "stjohn_admin";
	
// }

//approve member's registration of duty
// function approveState(){
// 	//$table = "stjohn_admin";

// 	$mid;
// 	$stateadmin = 'approved';

// 	$array = array('stateadmin'=>$stateadmin);

// 	return update('stjohn_attendants', $array, " mid=$mid");
// }


?>
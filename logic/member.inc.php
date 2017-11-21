<?php
//require_once '../include.php';

//$table = "stjohn_member";

//
function checkMember(){
	$table = "stjohn_member";
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password';";
	return fetchOne($sql);
}

function getMember(){
	$table = "stjohn_member";
	$mid = $_SESSION['mid'];
	$sql = "SELECT * FROM $table WHERE mid = $mid;";
	return fetchOne($sql);
}

function checkMemberInfo($info, $username){
	$table = "stjohn_member";
	$sql = "SELECT $info FROM $table WHERE username = '$username'";
	return fetchOne($sql)["$info"];
}

function checkMemberInfoById($info, $mid){
	$table = "stjohn_member";
	$sql = "SELECT $info FROM $table WHERE mid = $mid";
	return fetchOne($sql)["$info"];
}

function getMembersAll(){
	$table = "stjohn_member";
	$sql = "SELECT * FROM $table WHERE state = 'approved';";
	return fetchAll($sql);
}

function getMembersPending(){
	$table = "stjohn_member";
	$sql = "SELECT * FROM $table WHERE state = 'pending';";
	return fetchAll($sql);
}

function getMembersNo(){
	$table = "stjohn_member";
	$sql = "SELECT COUNT(*) AS no FROM $table WHERE state = 'approved';";
	return fetchOne($sql);
}

// get members whose xxx NOT IN (..., ..., ...) 
function getMembersExcept($where=null, $arr=array()){
	$table = "stjohn_member";
	$sql = "SELECT * FROM $table ";
	// $where = $where==null? '' : "WHERE $where";
	if($where == null){
		$where = " WHERE state='approved'";
	}else{
		$where = " WHERE $where (";
		$sep = '';
		foreach($arr as $mid){
			$where .= ($sep . $mid);
			$sep = ', ';
		}
		$where .= " ) AND state='approved'";
	}
	$sql .= $where;
	
	// echo $sql;

	return fetchAll($sql);
}

function addMember($arr){
	$table = "stjohn_member";
	return insert($table, $arr);
}

function deleteMember($username){
	$table = "stjohn_member";
	return delete($table, "username = '$username'");
}

function updateMember($array, $where=null){
	$table = "stjohn_member";
	return update($table, $array, $where);
}

function checkLogin(){
	if($_SESSION['memberid']=='' && $_COOKIES['memberid']==''){
		alertMsg('用戶請先登錄', '../webpage/login.php');
	}
}

function approveMemberState(){
	$table = 'stjohn_member';

	$state = $_POST['state'];
	$array = array('state'=>"'$state'");
	$where = $_POST['mid'];
	$where = " mid = $where";

	return update($table, $array, $where);
}


function approveMember(){
	$table = 'stjohn_member';

	$mid = $_POST['mid'];

	// echo "atdid : " . $atdid . "\n";

	$array = array('state'=>"'approved'");

	return update($table, $array, "mid=$mid");
}

function approveMemberByName(){
	$table = 'stjohn_member';

	$mid = checkMemberInfo('mid', $_POST['username']);

	$array = array('state' => "'approved'");

	return update($table, $array, "mid=$mid");
}


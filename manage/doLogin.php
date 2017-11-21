<?php
require_once '../include.php';
// require_once '../lib/mysql.func.php';
// require_once '../logic/member.inc.php';

//echo "<script>alert('hi');</script>"
$saveinfo=-1;
// $username = $_POST['username'];
// $password = $_POST['password'];
//$saveinfo = $_POST['saveinfo'];

$act = $_REQUEST['act'];

if($act == 'login'){
	$member = checkMember();
	if($member['mid']){
		$_SESSION['mid'] = $member['mid'];
		if(isset($_POST['saveinfo'])){
			setcookie('mid', $row['id'], time()+3600*24);
		}
		echo "<script>window.location = 'http://localhost:8088/dist/view/index.html'</script>";
	}else{
		echo "<script>window.location = 'http://localhost:8088/dist/view/user-login.html?verify='</script>";
	}
}else if($act == 'logout'){
	$_SESSION = array();
	$response = array(
			'errno' => 0,
			'msg' => 'Logout success',
			'status' => true,
			'data' => ''
		);
	echo json_encode($response);
	// echo "<script>window.location = 'http://localhost:8088/dist/view/user-login.html'</script>";
}else if($act == 'adminLogin'){
	$admin = checkAdminByInfo('mid', $_SESSION['mid']);
	if($admin){
		$_SESSION['aid'] = $admin['aid'];
		$response = array(
			'errno' => 0,
			'msg' => 'Login success',
			'status' => true,
			'data' => ''
		);
	}else{
		$response = array(
			'errno' => 1,
			'msg' => 'Login failed',
			'status' => false,
			'data' => ''
		);
	}
	echo json_encode($response);
}else if($act == 'adminLogout'){
	unset($_SESSION['aid']);
	$response = array(
			'errno' => 0,
			'msg' => 'Logout success',
			'status' => true,
			'data' => ''
		);
	echo json_encode($response);
}


// if($member)
// if($row){
// 	/** if($saveinfo){
// 		setcookie('mid', $row['id'], time()+3600*24);
// 		setcookie('username', $row['username'], time()+3600*24);
// 	} **/
// 	// CHECK include.php BEFORE TESTING LOGIN FUNCTION  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$_SESSION['mid'] = $row['id'];
// 	$_SESSION['username'] = $row['username'];

// 	//如果 一周内自动登录 被选中
// 	if(TRUE){
// 		setcookie('mid', $row['id'], time()+1*24*3600);
// 		setcookie('username', $row['username'], time()+1*24*3600);
// 	}

// 	alertMsg('login success', '../webpage/index.php');
// }else{
// 	alertMsg('login failed', '../webpage/login.php');
// }

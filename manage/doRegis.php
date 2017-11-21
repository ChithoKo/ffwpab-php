<?php

require_once '../include.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$title = $_POST['title'];
$tnum = $_POST['number'];
$email =$_POST['email'];

if($password == $password2){
	$password = md5($password);
	$user = array('username'=>"'$username'", 'password'=>"'$password'", 'title'=>"'$title'", 'tnum'=>"'$tnum'", 'email'=>"'$email'");
}else{
	$user = null;
}

if(addMember($user)){
	alertMsg('success', 'http://localhost:8088/dist/view/user-login.html?verify=success');
}else{
	alertMsg('fail', 'http://localhost:8088/dist/view/user-login.html');
	//echo 'fail';
}


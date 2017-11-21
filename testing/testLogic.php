

	
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
	</head>

<?php

require_once "../include.php";

	// $_POST['mid'] = 4;
	// $_SESSION['mid'] = 4;
	// $_POST['did'] = 1;
	// $_POST['post'] = 'M';
	// $_POST['date'] = '30/7/2017';
	// $_POST['starttime'] = '9:00';
	// $_POST['endtime'] = '21:00';

	//$_POST['atdid'] = 1;

	//echo approveMem();
	//var_dump(showAttendantsSucc());


	// $_POST['startHr'] = '8:00';
	// $_POST['endHr'] = '16:00';
	// $_POST['day'] = '23';
	// $_POST['month'] = '9';
	// $_POST['year'] = '2017';
	// $_POST['dutyname'] = '日本之旅2';
	// $_POST['venue'] = '東京日本';
	// $_POST['totalmembers'] = 4;
	// $_POST['timemark'] = 'xxx';

	// $_POST['mid'] = 2;
	// $_SESSION['mid'] = 3;
	// $_POST['did'] = 8;
	// $_POST['date'] = '23/9/2017';
	// $_POST['starttime'] = '8:00';
	// $_POST['endtime'] = '16:00';

	// $_POST['atdid'] = 5;


	// echo 'add result: ' . approveMem() . "<br/>";
	// if(checkAttendantExist(4, 8)){ echo 'succ';}else{ echo 'failed';}
	// if(checkDutyInfoById('state', 8) == 'upcoming')  echo checkDutyInfoById('state', 8); //echo "<br/>succ"; 
	// var_dump(getAtdMemListByDuty(8));

	// echo updateDutyFinish();

	// $arr = array();
	// $arr[] = array('a'=>1, 'b'=>2);
	// $arr['content'] = '';
	

	// var_dump($aaaa);
	// $members = getMembersAll();
	// print_r($members);
	// foreach ($members as $member) {
	// 	echo "\n<br/>".$member['password']."\n";
	// 	$p = md5($member['password']);
	// 	$arr = array('password'=>"'$p'");
	// 	//print_r($member);
	// 	echo "<br/>update : ".updateMember($arr, ' mid='.$member['mid']);
	// }

	// $str = '2M';
	// // echo(str_replace('M', '', $str));
	// echo ((int)$str);

$_SESSION['test'] = 90;
print_r($_SESSION);

?>

</html>


	

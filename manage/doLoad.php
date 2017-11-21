<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-10-17 16:09:14
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-20 20:49:20
 */


require_once "../include.php";

if(!isset($_SESSION['mid'])){
	$response = array(
		'data' => '',
		'errno' => 10
	);
	echo json_encode($response);
	return false;
}
// echo "<script>window.location = 'http://localhost:8088/dist/view/user-login.html?verify=u_shd_login_first'</script>";

$adminOn = false;
if(isset($_SESSION['aid'])){
	$adminOn = true;
}

// $jsonp = $_GET["callback"];  

// echo 'act : ' . $_GET["act"] . "\n";  

$act = $_REQUEST['act'];
$msg = '';
$imgPath = '../../src/image/';

// echo "request get One\n";

if($act == 'getEvents'){
	$events = array();
	$arr = array();
	//echo 'request get';
	$arr = getMeetings();
	foreach ($arr as $event) {
		if($event['pic'] == ''){$event['pic'] = '/';}
		if($event['note'] == ''){$event['note'] = '/';}
		$events[] = array(
				'meetid' => $event['meetid'],
				'eventname' => $event['eventname'],
				'venue' => $event['venue'],
				'date' => genDate($event['starttime']),
				'wkday' => genWkDay($event['starttime']),
				'starttime' => genTime($event['starttime']),
				'endtime' => genTime($event['endtime']),
				'pic' => $event['pic'],
				'state' => $event['state'],
				'note' => $event['note']
			);

	}
	if($arr){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => $events
		);
		// 'mm' => $msg
	}

	echo json_encode($response);
}else if($act == 'getMembers'){
	$members = array();
	$arr = array();

	$arr = getMembersAll();
	foreach ($arr as $member) {
		$mid = $member['mid'];
		$iconImg = $imgPath . 'cropped/220/' . end(getImages("mid = $mid AND abid = 1"))['imagename'];
		$members[] = array(
				'username' => $member['username'],
				'title' => $member['title'],
				'tnum' => $member['tnum'],
				'iconImg' => $iconImg
			);
	}
	if($members){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => $members
		);
		// 'mm' => $msg
	}

	echo json_encode($response);
}else if($act == 'getDuties'){
	$duties = array();
	$num = getDutySum();
	$arr = getDutyAll();

	foreach ($arr as $duty) {
		if($duty['note'] == ''){$duty['note'] = '/';}

		$atdList = getAtdMemListByDuty($duty['did']);
		// if(count($atdList) == 0){$atdList = '/';}

		$totalno = $duty['totalmembers'];
		if(count($atdList)>=$totalno) { $totalno = '/'; }
		else{ $totalno = ($totalno - count($atdList)) . 'M'; } 

		$duties[] = array(
				'did' => $duty['did'],
				'dutyname' => $duty['dutyname'],
				'venue' => $duty['venue'],
				'date' => genDate($duty['starttime']),
				'wkday' => genWkDay($duty['starttime']),
				'starttime' => genTime($duty['starttime']),
				'endtime' => genTime($duty['endtime']),
				'timemark' => $duty['timemark'],
				'totalmembers' => $totalno,
				'state' => $duty['state'],
				'note' => $duty['note'],
				'atdList' => $atdList
			);

	}

	if($duties){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => $duties
		);
		// 'mm' => $msg
	}

	echo json_encode($response);
}else if($act == 'getIndex'){
	$duties = array();
	$events = array();
	$arr = getDutyAllBy("state = 'upcoming'");
	foreach ($arr as $duty) {
		if($duty['note'] == ''){$duty['note'] = '/';}

		$atdList = getAtdMemListByDuty($duty['did']);

		$totalno = $duty['totalmembers'];
		if(count($atdList)>=$totalno) { $totalno = '/'; }
		else{ $totalno = ($totalno - count($atdList)) . 'M'; } 

		$duties[] = array(
				'did' => $duty['did'],
				'dutyname' => $duty['dutyname'],
				'venue' => $duty['venue'],
				'date' => genDate($duty['starttime']),
				'wkday' => genWkDay($duty['starttime']),
				'starttime' => genTime($duty['starttime']),
				'endtime' => genTime($duty['endtime']),
				'timemark' => $duty['timemark'],
				'note' => $duty['note'],
				'atdList' => $atdList
			);
	}

	$arr = array();
	$arr = getMeetings();
	foreach ($arr as $event) {
		if($event['pic'] == ''){$event['pic'] = '/';}
		if($event['note'] == ''){$event['note'] = '/';}
		$events[] = array(
				'meetid' => $event['meetid'],
				'eventname' => $event['eventname'],
				'venue' => $event['venue'],
				'date' => genDate($event['starttime']),
				'wkday' => genWkDay($event['starttime']),
				'starttime' => genTime($event['starttime']),
				'endtime' => genTime($event['endtime']),
				'pic' => $event['pic'],
				'note' => $event['note']
			);

	}

	// 未諗到應該擺咩條件係度
	if(true){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => array(
				'duties' => $duties,
				'events' => $events,
				'notices' => 'loading'
			)
		);
		// 'mm' => $msg
	}

	echo json_encode($response);
}else if($act == 'getPersonal'){
	$member = array();
	$arr = getMember();
	// print_r($arr);
	$member['mid'] = $arr['mid'];
	$member['username'] = $arr['username'];
	$member['title'] = strtoupper($arr['title']);
	$member['tnum'] = $arr['tnum'];
	$member['dutyHrs'] = $arr['dutyHrs'];
	$member['meetHrs'] = $arr['meetHrs'];
	$member['note'] = $arr['status'];

	$arr = array();
	$arr = getDutyAll();
	foreach ($arr as $duty) {
		if($duty['note'] == ''){$duty['note'] = '/';}

		$atdList = getAtdMemListByDuty($duty['did']);

		$totalno = $duty['totalmembers'];
		if(count($atdList)>=$totalno) { $totalno = '/'; }
		else{ $totalno = ($totalno - count($atdList)) . 'M'; } 

		if($duty['state'] == 'finished'){$duty['state'] = 0;}
		else{$duty['state'] = 1;}

		$duties[] = array(
				'did' => $duty['did'],
				'dutyname' => $duty['dutyname'],
				'venue' => $duty['venue'],
				'date' => genDate($duty['starttime']),
				'wkday' => genWkDay($duty['starttime']),
				'starttime' => genTime($duty['starttime']),
				'endtime' => genTime($duty['endtime']),
				'timemark' => $duty['timemark'],
				'note' => $duty['note'],
				'state' => $duty['state'],
				'atdList' => $atdList
			);
	}

	$mid = $_SESSION['mid'];
	$images = getImages("mid = $mid");
	$iconImgs = getImages("mid = $mid AND abid = 1 ORDER BY imgid DESC");

	// 未諗到應該擺咩條件係度
	if(true){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => array(
				'member' => $member,
				'duties' => $duties,
				'images' => $images,
				'iconImgs' => $iconImgs
			)
		);
		// 'mm' => $msg
	}

	echo json_encode($response);	
}else if($act == 'getPostResponse'){
	$arr = array();
}else if($act == 'getNavi'){
	$mid = $_SESSION['mid'];
	$imgs = getImages("mid = $mid AND abid = 1");
	
	if($adminOn){
		$navoptions = array();
		$navoptions[] = array('link'=>'http://localhost:8088/dist/view/duty_admin.html', 'optionname'=>'當更', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'http://localhost:8088/dist/view/event_admin.html', 'optionname'=>'集會', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'#', 'optionname'=>'隊員', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'#', 'optionname'=>'消息', 'admin'=>false);

		$iconLink = 'http://localhost:8088/dist/view/index_admin.html';
	}else{
		$navoptions = array();
		$navoptions[] = array('link'=>'http://localhost:8088/dist/view/duty.html', 'optionname'=>'當更', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'http://localhost:8088/dist/view/event.html', 'optionname'=>'集會', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'http://localhost:8088/dist/view/member.html', 'optionname'=>'隊員', 'admin'=>$adminOn);
		$navoptions[] = array('link'=>'#', 'optionname'=>'消息', 'admin'=>false);

		$iconLink = 'http://localhost:8088/dist/view/index.html';
	}

	// 未諗到應該擺咩條件係度
	if(true){
		$response = array(
			'errno' => 0,
			'msg' => 'Get success',
			'status' => true,
			'data' => array(
				'images' => $imgs,
				'mid' => $mid,
				'navoptions' => $navoptions,
				'iconLink' => $iconLink
			)
		);
		// 'mm' => $msg
	}

	echo json_encode($response);	
}else if($act == 'getIndexAdmin'){
	$memArr = getMembersPending();
	$members = array();
	foreach ($memArr as $member) {
		$members[] = array(
				'date' => genDate($member['reg_date']),
				'username' => $member['username'],
				'title'=> $member['title'],
				'tnum'=> $member['tnum']
			);
	}

	$dutyAtdsArr = getAtdListByState('approved', 'pending');
	$dutyAtds = array();
	foreach ($dutyAtdsArr as $dutyAtd) {
		$dutyAtds[] = array(
				'username' => $dutyAtd['username'],
				'title'=> $dutyAtd['title'],
				'tnum'=> $dutyAtd['tnum'],
				'dutyname'=> $dutyAtd['dutyname'],
				'date'=> genDate($dutyAtd['duty_endtime']),
				'duty_starttime'=> genTime($dutyAtd['duty_starttime']),
				'duty_endtime'=> genTime($dutyAtd['duty_endtime']),
				'atd_starttime'=> genTime($dutyAtd['atd_starttime']),
				'atd_endtime'=> genTime($dutyAtd['atd_endtime'])

			);
	}

	if($members || $dutyAtds){
		$response = array(
				'errno' => 0,
				'msg' => 'Approved',
				'status' => true,
				'data' => array(
						'members' => count($members)>0? $members:'loading',
						'dutyAtds' => count($dutyAtds)>0? $dutyAtds:'loading'
					)
			);
	}else{
		$response = array(
				'errno' => -1,
				'msg' => 'Approve Error',
				'status' => false
			);
	}
	echo json_encode($response);
}



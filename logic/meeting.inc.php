<?php

//$table = "stjohn_meeting";

function getMeetings($where=null){
	$table = "stjohn_meeting";

	$sql = "SELECT * FROM $table ".($where==null?null:" WHERE $where");

	return fetchAll($sql);
}

function addMeeting(){
	$table = "stjohn_meeting";

	$date = genDateFromPage($_POST['date']);
	$startHr = $_POST['starttime'];
	$endHr = $_POST['endtime'];

	$array = array();
	$eventname = $_POST['eventname'];
	$venue = $_POST['venue'];
	$note = $_POST['note'];
	$pic = $_POST['pic'];

	$array['eventname'] = "'$eventname'";
	$array['venue'] = "'$venue'";
	$array['starttime'] = "'$date $startHr:00'";
	$array['endtime'] = "'$date $endHr:00'";
	$array['note'] = "'$note'";
	$array['pic'] = "'$pic'";
	$array['state'] = "'upcoming'";
	

	return insert($table, $array);
}

function updateMeeting(){
	$table = "stjohn_meeting";
	$array = array();

	$meetid = $_POST['meetid'];
	$eventname = $_POST['eventname'];
	$date = genDateFromPage($_POST['event-date']);
	$starttime = $_POST['event-starttime'];
	$endtime = $_POST['event-endtime'];
	$venue = $_POST['event-venue'];
	$pic = $_POST['event-pic'];
	$note = $_POST['event-note'];

	$array['eventname'] = "'$eventname'";
	$array['starttime'] = "'$date $starttime:00'";
	$array['endtime'] = "'$date $endtime:00'";
	$array['venue'] = "'$venue'";
	$array['note'] = "'$note'";
	$array['pic'] = "'$pic'";

	// var_dump($array);

	return update($table, $array, " meetid=$meetid");
}

function deleteMeeting(){
	$table = "stjohn_meeting";

	$eventname = htmlspecialchars_decode($_POST['eventname']);
	$date = genDateFromPage($_POST['date']);
	$starttime = $date . ' ' . $_POST['starttime'];
	$where = " eventname = '$eventname' AND starttime = '$starttime'";
	return delete($table, $where);

	// return ($id==null)? null : delete($table, " id=$id");
}
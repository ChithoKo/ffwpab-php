<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-09-29 18:38:48
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-10-07 18:19:46
 */

function addNotice(){
	$table = "stjohn_notice";

	// $year = $_POST['year'];
	// $month = $_POST['month'];
	// $day = $_POST['day'];
	$date = genDateFromPage($_POST['date']);
	$startHr = $_POST['starttime'];
	$endHr = $_POST['endtime'];

	$array = array();
	$dutyname = $_POST['dutyname'];
	$venue = $_POST['venue'];
	$timemark = $_POST['timemark'];

	$array['dutyname'] = "'$dutyname'";
	$array['venue'] = "'$venue'";
	$array['timemark'] = "'$timemark'";
	$array['starttime'] = "'$date $startHr:00'";
	$array['endtime'] = "'$date $endHr:00'";
	$array['totalmembers'] = $_POST['totalmembers'];
	$array['note'] = "'/'";

	return insert($table, $array);
}
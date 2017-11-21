<?php
	require('../include.php');
?>
/**
 * @Author: CharlesKo
 * @Date:   2017-10-03 02:06:08
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-10-13 18:50:44
 */

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'; />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<meta http-equiv='x-ua-compatible' content='ie=edge' />
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css'/>
		<link rel='stylesheet' type='text/css' href='../css/event.css' />
		<link rel='stylesheet' type='text/css' href='../css/subnavi.css' />
		
	</head>

	<body>

		<!--  This is navigation, every page has the same format of navigation  -->
		<div id='nav' >
			<div id='navContain'>
			
			<div class='nav' id='nav-icon'>
				<h1><a href='#'><img src='../image/princess1.jpeg' /> FFWPA <span>B</span> <img src='../image/princess1.jpeg' /></a></h1>
			</div>

			<div class='nav' id='nav-user'>
			
				<div class='nav-user' id='user-sicon'>
					<a href='#'>
						<img src='../image/soldier1.jpg' />
						<div id='user-name'>Chit</div>
					</a>
					<ul class='nav-user' id='user-options'>
						<li><a href='#'>ONE</a></li>
						<li><a href='#'>TWO</a></li>
						<li><a href='#'>THREE</a></li>
					</ul>
					
				</div>

			</div>

			<div class='nav' id='nav-options'>
			
				<ul>
					<li><a href='#'>Calendar</a></li><li>
					<a href='#'>News</a></li><li>
					<a href='#'>Message</a></li><li>
					<a href='#'>Manage</a></li>
				</ul>
				
			</div>

			</div>
		</div>

		<!--  sub navigation -->
		<div id='subnavi'>
			<div class='color'></div>
			<div class='content'>Back</div>
		</div>


		<div class="page-title">
			<p>香港聖約翰救傷隊</p>
			<p>漁民B支隊 返會時間表</p>
		 </div>

		<div class="events-list">

			<div class="event-title events">

				<!-- Box for admin adding event  -->
				<div class="add-event" id='add-event-admin'>
					<div class="add-title linkBox" onclick="javascript:showBox('add-event-admin','');"><div class='title-holder'><div class='title-con'>Add Duty</div><div class='title-icon'>+</div></div></div>
					<div class="add-con showbox">
						<div class="add-date">
							<input class="add-day" type="text" name="" placeholder="日" />
							/
							<input class="add-month" type="text" name="" placeholder="月" />
							/
							<input class="add-year" type="text" name="" placeholder="年" />
						</div>
						<div class="add-time">
							<input class="add-starttime" type="text" name="" placeholder="開始時間..." />
							to
							<input class="add-endtime" type="" name="" placeholder="結束時間" >
						</div>
						<div class="add-venue">
							<input class='add-venue-data' type="text" name="" placeholder="地點..." >
						</div>
						<div class="add-eventname">
							<input class="add-eventname-data" type="text" name="" placeholder="題目..." >
						</div>
						<div class="add-pic">
							<input class='add-pic-data' type="text" name="" placeholder="負責人..." >
						</div>
						<div class="add-note">
							<textarea class='addnote-data' placeholder="備註..."></textarea>
						</div>
						<div class="submit-btn admin-btn">
							<button onclick="javascript:addEventAdm();">Submit</button>
						</div>
					</div>
				</div>
			
				<div class="event-date">日期
				</div><div class="event-time">時間
				</div><div class="event-venue">地點
				</div><div class="eventname">題目
				</div><div class="event-pic">負責人
				</div><div class="event-note">備註
				</div><div class="submit-btn"></div>
			</div>
			
			<div class="event-con events">
				<div class="event-date eee"><span>14/9/2017</span>(四)
				</div><div class="event-time"><div class='event-starttime eee'><span>19:00</span></div><br/>-<br/><div class='event-endtime eee'><span>22:00</span></div>
				</div><div class="event-venue eee"><span>大坑(302)</span>
				</div><div class="eventname eee"><span>護病學訓練</span>
				</div><div class="event-pic eee"><span>梁玉珍/么寶貴</span>
				</div><div class="event-note eee"><span>/</span>
				</div><div class="event-btn"><button class='edit-btn' onclick="javascript:changeFormatInputEvent(this);">Edit</button> <button class='submit-btn' onclick="javascript:updateEventAdm(this, 17);">Finish</button> <button class='cancel-btn' onclick="javascript:changeFormatTxtEvent(this);">Cancel</button></div>
			</div>


			<div class="event-con events">
				<div class="event-date eee"><span>14/9/2017</span>(四)
				</div><div class="event-time"><div class='event-starttime eee'><span>19:00</span></div><br/>-<br/><div class='event-endtime eee'><span>22:00</span></div>
				</div><div class="event-venue eee"><span>大坑(302)</span>
				</div><div class="eventname eee"><span>護病學訓練</span>
				</div><div class="event-pic eee"><span>梁玉珍/么寶貴</span>
				</div><div class="event-note eee"><span>/</span>
				</div><div class="event-btn"><button class='edit-btn' onclick="javascript:changeFormatInputEvent(this);">Edit</button> <button class='submit-btn' onclick="javascript:updateEventAdm(this, 17);">Finish</button> <button class='cancel-btn' onclick="javascript:changeFormatTxtEvent(this);">Cancel</button></div>
			</div>
			<div class="event-con events">
				<div class="event-date eee"><span>14/9/2017</span>(四)
				</div><div class="event-time"><div class='event-starttime eee'><span>19:00</span></div><br/>-<br/><div class='event-endtime eee'><span>22:00</span></div>
				</div><div class="event-venue eee"><span>大坑(302)</span>
				</div><div class="eventname eee"><span>護病學訓練</span>
				</div><div class="event-pic eee"><span>梁玉珍/么寶貴</span>
				</div><div class="event-note eee"><span>/</span>
				</div><div class="event-btn"><button class='edit-btn' onclick="javascript:changeFormatInputEvent(this);">Edit</button> <button class='submit-btn' onclick="javascript:updateEventAdm(this, 17);">Finish</button> <button class='cancel-btn' onclick="javascript:changeFormatTxtEvent(this);">Cancel</button></div>
			</div>

		</div>


		<!--  sub navigation -->
		<div id='subnavi'>
			<div class='color'></div>
			<div class='content'>Back</div>
		</div>

		<!-- <div class='resBox'>
			成功添加
		</div> -->

		<script type='text/javascript' src='../js/jquery-3.2.1.js' ></script>
		<script type='text/javascript' src='../js/common.js' ></script>
		<script type='text/javascript' src='../js/doAdmin.js'></script>
		

	</body>
</html>
<?php
require '../include.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'; />
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css'/>
		<link rel='stylesheet' type='text/css' href='../css/subnavi.css' />
		<link rel='stylesheet' type='text/css' href='../css/personal.css' />
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


		<!-- -->
		<div id='user'>
			
			<div id='user-icon'><span class='img-helper'></span><div class='img-holder'><img src='../image/soldier1.jpg' placeholder='no image'/><div class='uploadImg'>上載頭像</div></div></div>
			<div class='userinfo'><div class='user' id='user-name'><h1>XXX</h1></div></div>
			<div class='userinfo'><div class='user' id='user-post'><h1>M 000</h1></div></div>
			<div id='user-count'>
				<div class='user-count' id='workingHrs'><h3>當更時間</h3><span>000</span></div>
				<div class='user-count' id='meetingHrs'><h3>集會時間</h3><span>000</span></div>
			</div>
			
			<div class='userinfo' id='user-status'>危險的事故然美麗 不如看她騎馬歸來 臉頰溫暖 <span class='editicon'>edit img</span></div>
			<!-- <div class='user' id='user-count'>
				<div class='user-count' id='workingHrs'><h3>當更時間</h3><span></span></div>
				<div class='user-count' id='meetingHrs'><h3>集會時間</h3><span></span></div>
			</div> -->
		</div>

		<div class="img-upload">
			<!-- <form action='../manage/doFile.php?act=addRegImg' method='post' enctype='multipart/form-data'>
				<input type="file" name="filesUploaded[]">
				<input type="submit" name="">
			</form> -->
			<form enctype="multipart/form-data">
			    <input name="file" type="file" />
			    <input type="button" value="Upload" />
			</form>
			<progress></progress>
		</div>


		<!-- -->
		<div id='event-tap'>
			<div class='event-tap img-upload'>圖片上傳</div>
			<div class='event-tap tap-upcoming acting' >即將當更</div>
			<div class='event-tap tap-finished' >己當更</div>
			<h3>選擇</h3>
		</div>


		<!-- -->
		<div id='event'>

			<div class='event'>

				<div class="line-line"></div>

				<div class='event-vt'>
					<div class='event-title'><h2>公民盃大專辯論比賽</h2></div>
					<div><p id='venue'>維園音樂廳</p></div>
					<div><p id='date'>15/7/2017 (Sat)<br/>HK17/07114</p></div>
					<div><p id='time'>1200-1800</p></div>
				</div>

				<div class='event-details'>
					<div class='event-member'>
					<h2>Members:</h2>
						<ul>
							<li><div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'>Jon<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
							<li><div class='candidate'><img src='../image/princess1.jpeg' /><div class='membername'>Jack<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
							<li><div class='candidate'><img src='../image/princess1.jpeg' /><div class='membername'>Jack<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
							<li><div class='candidate'><img src='../image/princess1.jpeg' /><div class='membername'>Jack<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
							<li><div class='candidate'><img src='../image/princess1.jpeg' /><div class='membername'>Jack<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
							<li><div class='candidate'><img src='../image/princess1.jpeg' /><div class='membername'>Jack<div class="candidate-time">
								<span class="starttime">9:00</span> - <span class="endtime">16:00</span>
							</div></div ></div></li>
						</ul>
					</div>
					<div class='event-note'><p>note: </p><span>/</span></div>
					<div id='event-gallery'>
						<img src='../image/trex1.png'/>
						<img src='../image/trix1.png'/>
					</div>
				</div>
				
			</div>

		</div>

		<div class="gallery">
			<div class='gallery-img'><div class='img-helper'></div><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
			<div class='gallery-img'><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
			<div class='gallery-img'><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
			<div class='gallery-img'><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
			<div class='gallery-img'><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
			<div class='gallery-img'><img src='../image/princess1.jpeg'><div class='img-cover'></div></div>
		</div>

		
	</body>
</html>

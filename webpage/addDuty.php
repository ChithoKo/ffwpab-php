<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css' />
		<link rel='stylesheet' type='text/css' href='../css/addDuty.css' />

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
						<div>Chit</div>
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


		<!-- Title of the table -->
		<div id='tablename'><h2>admin - 添加更期</h2></div>


		<div id='addDutyForm'>
			<form action='../manage/doAdminAction.php?act=addDuty' method='post' >
				<div>
					<input type='text' placeholder='活動名稱' name='dutyname' />
				</div>

				<div>
					<input type='text' placeholder='date' />
				</div>

				<div>
					<input type='text' placeholder='time mark' name='timemark' />
				</div>

				<div>
					<input class='dateform' type='text' placeholder='日' name='year' /> ／
					<input class='dateform' type='text' placeholder='月' name='month' /> ／
					<input class='dateform' type='text' placeholder='年' name='day' />
				</div>

				<div>
					<input type='text' placeholder='開始時間' name='startHr' />
				</div>

				<div>
					<input type='text' placeholder='結束時間' name='endHr' />
				</div>

				<div>
					<input type='text' placeholder='地點' name='venue' />
				</div>

				<div>
					<input type='text' placeholder='總人數' name='totalmembers' />
				</div>

				<div>
					<textarea></textarea>
				</div>

				<div>
					<input type='submit' class='submitbutton'/>
				</div>
			</form>
		</div>

		<!--  sub navigation -->
		<div id='subnavi'>
			<div class='color'></div>
			<div class='content'>Back</div>
		</div>

	</body>
</html>
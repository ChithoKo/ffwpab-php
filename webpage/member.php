<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'; /> 
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css' />
		<link rel='stylesheet' type='text/css' href='../css/member.css' />
	</head>

	<body>

		<?php
			require_once '../include.php';

			$memberarr = array();
			$memberarr = getMembersAll();
		?>
		
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
					<span class='img-helper'></span><li class='option-title'><i class="fa fa-reorder">R</i></li>
					<li><a href='#'>Calendar</a></li><li>
					<a href='#'>News</a></li><li>
					<a href='#'>Message</a></li><li>
					<a href='#'>Manage</a></li>
				</ul>
				
			</div>

			</div>
		</div>

		<div class='members'>
		
			<!-- <div class='member-con'>
				<img src='../image/princess1.jpeg' alt="member's icon"/>
				<p>
					<span class='member-name'>Chit</span>
					<span class='member-post'>member</span>
				</p>
			</div> -->

			
			<?php
				for($i=0; $i<count($memberarr); $i++){
			?>
			<div class='member-con'>
				<div class='member-img-holder'><img src='../image/princess1.jpeg' alt="member's icon"/></div>
				<p>
					<span class='member-name'><a href='#'><?php echo $memberarr[$i]['username']; ?></a></span>
					<span class='member-post'>member</span>
					<span class="member-title">M 801</span>
				</p>
			</div>
			<?php
				}
			?>

		</div>



	</body>
</html>
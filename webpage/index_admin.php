<?php
require('../include.php');
?>


<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf8' />
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css' />
		<link rel='stylesheet' type='text/css' href='../css/index_admin.css' /> 
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

		<div class="side-bar">
			<h3>待處理申請</h3>
			<ul>
				<li><a href="#"><span class='option-icon'>X</span> 隊員登記管理 <span class="notice-icon">1</span> <span class='go-icon'>></span></a></li>
				<li><a href="#"><span class='option-icon'>X</span> 報更隊員管理 <span class="notice-icon"></span> <span class='go-icon'>></span></a></li>
				<li><a href="#"><span class='option-icon'>X</span> 集會管理 <span class="notice-icon"></span> <span class='go-icon'>></span></a></li>
				<li><a href="#"><span class='option-icon'>X</span> 筆記管理 <span class="notice-icon"></span> <span class='go-icon'>></span></a></li>
			</ul>
		</div>

		<div class="main-container">
			
			<div class="member-regis-list">
				<h3><span>隊員登記管理</span></h3>
				<div class="con-title">
					<div class="member-name list-attr">隊員姓名</div>
					<div class="member-post list-attr">隊員職階</div>
					<div class="member-time list-attr">登記時間</div>
				</div>	

				<div class="con-details">
					<div class="member-regis-con regis-con">
						<div class="member-name list-attr">visitor</div>
						<div class="member-post list-attr">M 001</div>
						<div class="member-time list-attr">11/11/2017</div>
						<div class="member-approve list-attr"><span class="img-helper"></span><button>Approve</button></div>
					</div>
				</div>
			</div>

			<div class="duty-regis-list">

				<h3><span>報更隊員管理</span></h3>

				<div class="con-title">
					<div class="duty-member list-attr">隊員姓名</div>
					<div class="duty-post list-attr">隊員職階</div>
					<div class="duty-name list-attr">活動名稱</div>
					<div class="duty-date list-attr">活動日期</div>
					<div class="duty-time list-attr">參加時間</div>

				</div>	

				<div class="con-details">

					<div class="member-regis-con regis-con">
						<div class="duty-member list-attr">visitor</div>
						<div class="duty-post list-attr">M 001</div>
						<div class="duty-name list-attr">活動名稱</div>
						<div class="duty-date list-attr">
							<div class="date-date">11/11/2017</div>
							<div class="date-time">12:00 - 21:00</div>
						</div>
						<div class="duty-time list-attr">
							<div class="starttime"><input type="text" name="" value='12:00'></div>
							-
							<div class="endtime"><input type="text" name="" value='21:00'></div>
						</div>
						<div class="duty-approve list-attr"><span class="img-helper"></span><button>Approve</button></div>
					</div>

					<div class="member-regis-con regis-con">
						<div class="duty-member list-attr">visitor</div>
						<div class="duty-post list-attr">M 001</div>
						<div class="duty-name list-attr">活動名稱</div>
						<div class="duty-date list-attr">
							<div class="date-date">11/11/2017</div>
							<div class="date-time">12:00 - 21:00</div>
						</div>
						<div class="duty-time list-attr">
							<div class="starttime"><input type="text" name="" value='12:00'></div>
							-
							<div class="endtime"><input type="text" name="" value='21:00'></div>
						</div>
						<div class="duty-approve list-attr"><span class="img-helper"></span><button>Approve</button></div>
					</div>
				</div>

			</div>

		</div>


		<!--  -->
		<!-- <div id='adminnav'>
			<div id='navcontainer'>
				<div class='navcontainer linkBox'>Member</div>
				<div class='navcontainer linkBox'>Duty</div>
				<div class='navcontainer linkBox'>Event</div>
				<div class='navcontainer linkBox'>Note</div>
			</div>
		</div> -->


		<!-- -->
		<div class='adminedit' id='dutylist'>

			<?php 

				$membersInfo = getAtdListByState('approved', 'pending');

			?>

			<div class="list-head linkBox" onclick="javascript:showBox('dutylist', '');">
				<div class="head-title">報更隊員</div>
				<div class="head-icon"> + </div>
				<div class="countno"> (<?php echo count($membersInfo); ?>) </div>
			</div>

			<?php
				for($i=0; $i<count($membersInfo); $i++){
			?>

			<div class='duty-con container showbox' id="dutyof_<?php echo $membersInfo[$i]['atdid']; ?>">
				<div class="membername"><?php echo $membersInfo[$i]['username']; ?></div>
				<div class="member-postno"><span class="post"><?php echo $membersInfo[$i]['title']; ?></span> <span class="post-num"><?php echo $membersInfo[$i]['tnum']; ?></span></div>
				<div class="dutyname"><?php echo $membersInfo[$i]['dutyname']; ?></div>
				<div class="dutydate"><?php echo date('d/m/Y', strtotime($membersInfo[$i]['starttime'])); ?></div>
				<div class="dutytime">
					<div class="starttime"><?php echo date('H:i', strtotime($membersInfo[$i]['starttime'])); ?>
					</div><br/>to<br/><div class="endtime">
					<?php echo date('H:i', strtotime($membersInfo[$i]['endtime'])); ?></div>
				</div>
				<button class="approve-btn" onclick="javascript:approveAtdAdm(<?php echo $membersInfo[$i]['atdid']; ?>);">Approve</button>
			</div>

			<?php
				}
			?>
		</div>


		<!--  -->
		<div class='adminedit' id='memberlist'>

			<?php 
				$members = getMembersPending();
			?>

			<div class="list-head linkBox" onclick="javascript:showBox('memberlist', '');">
				<div class="head-title">隊員表</div>
				<div class="head-icon"> + </div>
				<div class="countno"> (<?php echo count($members); ?>) </div>
			</div>

			<?php 

				for($i=0; $i<count($members); $i++){

			?>			

			<div class='member-con container showbox' id="memberof_<?php echo $members[$i]['mid']; ?>">
				<div class="membername"><?php echo $members[$i]['username'] ?></div>
				<div class="member-postno"><span class="post"><?php echo $members[$i]['title']; ?></span> <span class="post-num"></span><?php echo $members[$i]['tnum']; ?></div>
				<div class="regtime"><?php echo date('d/m/Y', strtotime($members[$i]['reg_date'])); ?></div>
				<button class="approve-btn" onclick="javascript:approveMember(<?php echo $members[$i]['mid']; ?>);">Approve</button>
			</div>

			<?php 
				}
			?>

		</div>


		<!--  -->
		<!-- <div class='adminedit' id='eventlist'>

		<?php 
			$events = array();
		?>

			<div class="list-head linkBox" onclick="javascript:showBox('eventlist', '');">
				<div class="head-title">集會表</div>
				<div class="head-icon"> + </div>
				<div class="countno"> (<?php echo count($events); ?>) </div>
			</div>

			<div class="event-con container showbox">
				
			</div>
		</div> -->


		<!--  -->
		<!-- <div class='adminedit' id='notelist'>

			<?php 
				$notes = array();
			?>

			<div class="list-head linkBox" onclick="javascript:showBox('notelist', '');">
				<div class="head-title">通知</div>
				<div class="head-icon"> + </div>
				<div class="countno"> (<?php echo count($notes); ?>) </div>
			</div>

			<div class="note-con container showbox">
				
			</div>
		</div> -->

		<script type='text/javascript' src='../js/jquery-3.2.1.js' ></script>
		<script type='text/javascript' src='../js/common.js' ></script>
		<script type='text/javascript' src='../js/doAdmin.js'></script>
	</body>

</html>
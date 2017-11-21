<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf8'/>
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css'/>
		<link rel='stylesheet' type='text/css' href='../css/index.css' />
	</head>

	<body>

<?php
require_once '../include.php';

$memberid='';
$membername='';
if(isset($_SESSION['memberid'])){
	$memberid = $_SESSION['memberid']; 
}
if(isset($_SESSION['membername'])){ 
	$membername = $_SESSION['membername']; 
}
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
						<div id='user-name'>Chit Ho KO - Koo</div>
					</a>
					<ul class='nav-user' id='user-options'>
						<li><a href='#'>ONE Chit Ho KO - Koo Chit Ho KO - Koo</a></li>
						<li><a href='#'>TWO</a></li>
						<li><a href='#'>THREE</a></li>
					</ul>
					
				</div>

			</div>


			<div class='nav' id='nav-options'>
			
				<ul>
					<li><a href='#'>Calendar</a><span class='admin-icon'>admin</span></li><li>
					<a href='#'>News</a><span class='admin-icon'>admin</span></li><li>
					<a href='#'>Message</a><span class='admin-icon'>admin</span></li><li>
					<a href='#'>Manage</a><span class='admin-icon'>admin</span></li>
				</ul>
				
			</div>

			</div>
		</div>

		<div id='subnavi'>
			<div class='subnavi linkBox' id='navimembers'><a>隊員 (<?php echo getMembersNo()['no']; ?>)</a></div>
			<div class='subnavi linkBox' id='naviduty'><a>更表</a></div>
			<div class='subnavi linkBox' id='navievents'><a>日程</a></div>
		</div>

		<div class='content'>

			<div id='notice'>
				<h2>通知</h2>

				<div class='notice' >
					<div class='notice-date'><span class="wkday">Sat</span><span class="date">15/7</span></div>
					<div class='notice-content'>
						<h3>asfdakasldjfl;aksflsaj</h3>
						<p>sfjklasdjfa;lskdfja;sldkfja;slkfj;f</p>
					</div>
				</div>

				<div class='notice' >
					<div class='notice-date'><span class="wkday">Sat</span><span class="date">15/7</span></div>
					<div class='notice-content'>
						<h3>asfdakasldjfl;aksflsaj</h3>
						<p>sfjklasdjfa;lskdfja;sldkfja;slkfj;f</p>
					</div>
				</div>
				<div class='notice' >
					<div class='notice-date'><span class="wkday">Sat</span><span class="date">15/7</span></div>
					<div class='notice-content'>
						<h3>asfdakasldjfl;aksflsaj</h3>
						<p>sfjklasdjfa;lskdfja;sldkfja;slkfj;f</p>
					</div>
				</div>
				<div class='notice' >
					<div class='notice-date'><span class="wkday">Sat</span><span class="date">15/7</span></div>
					<div class='notice-content'>
						<h3>asfdakasldjfl;aksflsaj</h3>
						<p>sfjklasdjfa;lskdfja;sldkfja;slkfj;f</p>
					</div>
				</div>

			</div>

			<div class="index-title">
				<div class="content-title" id='duty-list'>當更</div>
				<div class="content-title" id='event-list'>集會</div>
				<div></div>
			</div>

			<div class='duty-container'>


			<?php
				$num = getDutySum();
					
					$duties = getDutyAll();

					for($i=0; $i<$num; $i++){
						$atdList = array();
						$atdList = getAtdMemListByDuty($duties[$i]['did']);
			?>


				<div class="duty <?php echo $duties[$i]['state'] ?>">

					<div class='duty-vt'>
						<div class='duty-title'><h2><?php echo $duties[$i]['dutyname'] ?></h2></div>
						<div><!-- <h2>Venue:</h2> --><p id='venue'><?php echo $duties[$i]['venue']; ?></p></div>
						<div><!-- <h2>Date:</h2> --><p id='date'>

						<?php 
							echo genDate($duties[$i]['starttime']); 
							echo ' (' . genWkDay($duties[$i]['starttime']) . ')';
						?><br/><?php echo $duties[$i]['timemark']; ?>

						</p></div>
						<div><!-- <h2>Time:</h2> --><p id='time'>

						<?php echo genTime($duties[$i]['starttime']); ?>
						-
						<?php echo genTime($duties[$i]['endtime']) ?>
		
						</p></div>
					</div>

					<div class='duty-details'>
						<div class='duty-member'>

						<h2>Members:</h2>
							<ul>

							<?php 
								if(count($atdList)==0){ echo "<li><div class='candidate'>/</div></li>"; } //$atdList[0] = array('username'=>'/'); }
								else{
									for($y=0; $y<count($atdList); $y++){
							?>

								<li><div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'><?php echo $atdList[$y]['username']; ?></div ></div></li>

							<?php
									}
								}
							?>

							</ul>
						</div>
						<div class='duty-note'><p>note: </p><span>/</span></div>
						<div class='duty-gallery'>
							<img src='../image/trex1.png'/>
							<img src='../image/trix1.png'/>
						</div>
					</div>
					
				</div>


			<?php } ?>

			
				
			</div>

			<div class='event-container'>
				
				<div class="event">
					<div class="idvalue hide"><span>{{did}}</span></div>
					<div class='event-vt'>
						<div class='event-title'><h2>{{dutyname}}</h2>
						</div><div><p id='venue'>{{venue}}</p>
						</div><div><p id='date'>{{date}} ({{wkday}})<br/>{{timemark}}</p>
						</div><div><p id='time'>{{starttime}} - {{endtime}}</p></div>
					</div>

					<div class='event-details'>
						<div class='event-pic'>
							<h2>Members:</h2>
							<ul>
							
								<li><div class='candidate'><img src='../../image/pekka1.jpg' /><div class='membername'>{{username}}</div ></div></li>
							
							</ul>
						</div>
						<div class='event-note'><p>note: </p><span>{{note}}</span></div>
						<div class='event-gallery'>
							<img src='../../image/trex1.png'/>
							<img src='../../image/trix1.png'/>
						</div>
					</div>
					
				</div>

			</div>

		</div>


		</div>

	</body>

</html>
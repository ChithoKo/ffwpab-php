<?php
	require_once "../include.php";

	$_SESSION['memberid'] = 2;
	$_SESSION['membername'] = 'jojo';
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'; />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<meta http-equiv='x-ua-compatible' content='ie=edge' />
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css' />
		<link rel='stylesheet' type='text/css' href='../css/subnavi.css' />
		<link rel='stylesheet' type='text/css' href='../css/register.css' />

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


		<!-- Title of the table -->
		<div id='tablename'><h2>Duty List</h2></div>

		<!-- This is registration part, for resgistration of time-->
		<div id='registration'>

			<table>
				
				<div ><tr class='title'>
					<th class='registration regis-event'><h3>活動名稱</h3></th>
					<th class='registration regis-date'><h3>日期</h3></th>
					<th class='registration regis-time'><h3>時間</h3></th>
					<th class='registration regis-venue'><h3>地點</h3></th>
					<th class='registration regis-members'><h3>隊員</h3></th>
					<th class='registration regis-miss'><h3>尚缺人手</h3></th>
					<th class='registration regis-note'><h3>備註</h3></th>
					<th class='registration regis-edit'><h3>操作</h3></th>
				</tr></div>


				<?php
					$num = getDutySum();
					
					$duties = getDutyAll();

					for($i=0; $i<$num; $i++){
						$atdList = array();
						$atdList = getAtdMemListByDuty($duties[$i]['did']);
				?>


				<div class=""><tr class='data <?php echo $duties[$i]['state'] ?>' id="dutyof_<?php echo $duties[$i]['did']; ?>">
					<td class='registration regis-event'><?php echo $duties[$i]['dutyname']; ?></td>
					<td class='registration regis-date'>
					<span class='date'><?php echo genDate($duties[$i]['starttime']); ?></span>
					<?php echo ' (' . genWkDay($duties[$i]['starttime']) . ')'; ?>


					<br/><span class='timemark'><?php echo $duties[$i]['timemark']; ?></span>


					</td>
					<td class='registration regis-time'>
						<span class='starttime'><?php echo genTime($duties[$i]['starttime']); ?></span><br/>to<br/><span class='endtime'><?php echo genTime($duties[$i]['endtime']) ?></span>
					</td>
					<td class='registration regis-venue'><?php echo $duties[$i]['venue']; ?></td>
					<td class='registration regis-members'>


						<?php 
							if(count($atdList)==0){ echo "<div class='candidate'>/</div>"; } //$atdList[0] = array('username'=>'/'); }
							else{
								for($y=0; $y<count($atdList); $y++){
						?>

						<div class='candidate'>
							<img src='../image/pekka1.jpg' /><div class='membername'><?php echo $atdList[$y]['username']; ?></div>
						</div>

						<?php 
								}
							}
						?>


					</td>
					<td class='registration regis-miss'>

					<!-- Need more precise calculation, As some members do not attend full duty 		!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

						<?php
							$totalno = $duties[$i]['totalmembers'];
							if(count($atdList)>=$totalno) { echo '/'; }
							else{ echo ($totalno - count($atdList)) . 'M'; } 
						?>


					</td>
					<td class='registration regis-note'><?php echo ($duties[$i]['note']==''?'/':$duties[$i]['note']); ?></td>
					<!-- <td class='registration regis-edit'><a href='../manage/doMemberAction.php?act=register'>Register</a></td> -->
					<td class='registration'><button class='regisButton' type='button' onclick="javascript:regisDutyMem(<?php echo $duties[$i]['did']; ?>);">Register</button></td>
				</tr></div>


				<?php
					}				
				?>


			</table>
		</div>


		<!--  sub navigation -->
		<div id='subnavi'>
			<div class='color'></div>
			<div class='content'>Back</div>
		</div>

		<script type='text/javascript' src='../js/jquery-3.2.1.js' ></script>
		<script type='text/javascript' src='../js/doMember.js' ></script>
		<script type='text/javascript' src='../js/common.js' ></script>
	</body>
</html>

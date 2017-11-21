<?php
	require_once "../include.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'; />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<meta http-equiv='x-ua-compatible' content='ie=edge' />
		<link rel='stylesheet' type='text/css' href='../css/main.css' />
		<link rel='stylesheet' type='text/css' href='../css/navigate.css'/>
		<link rel='stylesheet' type='text/css' href='../css/dutyAdmin.css' />
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


		<!-- Title of the table -->
		<div id='tablename'><h2>Duty List - Admin</h2></div>


		<!-- This is registration part, for resgistration of time-->
		<div id='registration'>


			<!-- add duty part -->
			<div id='addduty'>
				<div class='addduty addtitle'><div class='title-holder' onclick="javascript:showBox('addduty', '');"><div class='title-content'>Add Duty</div><div class='title-icon'>+</div></div></div>

				<div class='addduty-content showbox' id='dutyform'>
					<form action='../manage/doAdminAction.php?act=addDuty' method='post' >
						<div class='adddutyname'>
							<p>活動名稱 * </p>
							<input type='text' placeholder='活動名稱' name='dutyname' />
						</div>

						<div class='addvenue'>
							<p>地點 * </p>
							<input type='text' placeholder='地點' name='venue' />
						</div>

						<div class='addtimemark'> 
							<p>Time mark : </p>
							<p class='subnote'>(e.g. HK17/07132)</p>
							<input type='text' placeholder='time mark e.g. HK17/07132' name='timemark'  />
						</div>

						<div class='adddate'>
							<p >日期 * </p>
							<p class='subnote'>( 日/月/年 )</p>
							<input class='addday' type='text' placeholder='日' name='day'  /> ／
							<input class='addmonth' type='text' placeholder='月' name='month' /> ／
							<input class='addyear' type='text' placeholder='年' name='year' value="<?php echo date('Y'); ?>" />
						</div>

						<div class='addstarttime'>
							<p>開始時間 * </p>
							<p class='subnote'>( e.g. 10:00 )</p>
							<input type='text' placeholder='開始時間 e.g. 10:00' name='startHr'  />
						</div>

						<div class='addendtime'>
							<p>結束時間 * </p>
							<p class='subnote'>( e.g. 21:00 )</p>
							<input type='text' placeholder='結束時間 e.g. 21:00' name='endHr'  />
						</div>

						<div class='addnote'>
							<p>note : </p>
							<textarea></textarea>
						</div>

						<div class='addtotalmem'>
							<p>需要人數 * </p>
							<input type='text' placeholder='總人數' name='totalmembers' /> M
						</div>

						<div class='addsubmit'>
							<button class='submitbutton' type='button' onclick="javascript:addDutyAdm();"> 提交 </button>
							<!-- <input type='submit' class='submitbutton'/> -->
						</div>
					</form>
				</div>
			</div>


			<table>
				<form>


				
				<div ><tr class='title'>
					<th class='registration regis-event'><h3>活動名稱</h3></th>
					<th class='registration regis-date'><h3>日期</h3></th>
					<th class='registration regis-time'><h3>時間</h3></th>
					<th class='registration regis-venue'><h3>地點</h3></th>
					<th class='registration regis-members'><h3>隊員</h3></th>
					<th class='registration regis-miss'><h3>尚缺人手</h3></th>
					<th class='registration regis-note'><h3>備註</h3></th>
					<!-- <th class='registration regis-state'><h3>狀態</h3></th> -->
					<th class='registration regis-edit'><h3>操作</h3></th>
				</tr></div>

				<div class="duty-con duties" >
					<div class="registration regis-event"><h3>活動名稱</h3>
					</div><div class="registration regis-date"><h3>日期</h3>
					</div><div class="registration regis-time"><h3>時間</h3>
					</div><div class="registration regis-venue"><h3>地點</h3>
					</div><div class="registration regis-members"><h3>隊員</h3>
					</div><div class="registration regis-miss"><h3>尚缺人手</h3>
					</div><div class="registration regis-note"><h3>備註</h3>
					</div><div class="registration regis-edit duty-btn"><h3>操作</h3>
					</div></div>
				</div>

				<div class="duty-con duties" >
					<div class="regis-event eee"><span>護病學訓練</span>
					</div><div class="regis-date eee"><div class='date'><span>14/9/2017</span> (四)</div><br/><div class='timemark'><span>HK17/09123</span></div>
					</div><div class="regis-time"><div class='starttime eee'><span>19:00</span></div><br/>-<br/><div class='endtime eee'><span>22:00</span></div>
					</div><div class="regis-venue eee"><span>大坑(302)</span>
					</div><div class="regis-members">
						<div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'>Jojo</div ><div class='memberedit' onclick="javascript:;">-</div></div>
					</div><div class="regis-miss eee"><span>2M</span>
					</div><div class="regis-note eee"><span>/</span>
					</div><div class="duty-btn">
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button><br/>
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button>
						<button class='finishbutton btn' type='button' onclick="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>);">完成</button><br/>
						<button class='cancelbutton btn' type='button' onclick="javascript:cancelEdit(<?php echo $duties[$i]['did']; ?>);">取消</button>
					</div>
				</div>

				<div class="duty-con duties" >
					<div class="regis-event eee"><span>護病學訓練</span>
					</div><div class="regis-date eee"><div class='date'><span>14/9/2017</span> (四)</div><br/><div class='timemark'><span>HK17/09123</span></div>
					</div><div class="regis-time"><div class='starttime eee'><span>19:00</span></div><br/>-<br/><div class='endtime eee'><span>22:00</span></div>
					</div><div class="regis-venue eee"><span>大坑(302)</span>
					</div><div class="regis-members">
						<div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'>Jojo</div ><div class='memberedit' onclick="javascript:;">-</div></div>
					</div><div class="regis-miss eee"><span>2M</span>
					</div><div class="regis-note eee"><span>/</span>
					</div><div class="duty-btn">
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button><br/>
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button>
						<button class='finishbutton btn' type='button' onclick="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>);">完成</button><br/>
						<button class='cancelbutton btn' type='button' onclick="javascript:cancelEdit(<?php echo $duties[$i]['did']; ?>);">取消</button>
					</div>
				</div>
				<div class="duty-con duties" >
					<div class="regis-event eee"><span>護病學訓練</span>
					</div><div class="regis-date eee"><div class='date'><span>14/9/2017</span> (四)</div><br/><div class='timemark'><span>HK17/09123</span></div>
					</div><div class="regis-time"><div class='starttime eee'><span>19:00</span></div><br/>-<br/><div class='endtime eee'><span>22:00</span></div>
					</div><div class="regis-venue eee"><span>大坑(302)</span>
					</div><div class="regis-members">
						<div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'>Jojo</div ><div class='memberedit' onclick="javascript:;">-</div></div>
					</div><div class="regis-miss eee"><span>2M</span>
					</div><div class="regis-note eee"><span>/</span>
					</div><div class="duty-btn">
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button><br/>
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button>
						<button class='finishbutton btn' type='button' onclick="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>);">完成</button><br/>
						<button class='cancelbutton btn' type='button' onclick="javascript:cancelEdit(<?php echo $duties[$i]['did']; ?>);">取消</button>
					</div>
				</div>
				<div class="duty-con duties" >
					<div class="regis-event eee"><span>護病學訓練</span>
					</div><div class="regis-date eee"><div class='date'><span>14/9/2017</span> (四)</div><br/><div class='timemark'><span>HK17/09123</span></div>
					</div><div class="regis-time"><div class='starttime eee'><span>19:00</span></div><br/>-<br/><div class='endtime eee'><span>22:00</span></div>
					</div><div class="regis-venue eee"><span>大坑(302)</span>
					</div><div class="regis-members">
						<div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'>Jojo</div ><div class='memberedit' onclick="javascript:;">-</div></div>
					</div><div class="regis-miss eee"><span>2M</span>
					</div><div class="regis-note eee"><span>/</span>
					</div><div class="duty-btn">
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button><br/><button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button>
						<button class='finishbutton btn' type='button' onclick="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>);">完成</button><br/>
						<button class='cancelbutton btn' type='button' onclick="javascript:cancelEdit(<?php echo $duties[$i]['did']; ?>);">取消</button>
					</div>
				</div>


				<?php
					$num = getDutySum();
					
					$duties = getDutyAll();

					for($i=0; $i<$num; $i++){
						$atdList = array();
						$atdList = getAtdMemListByDuty($duties[$i]['did']);
				?>


				<div><tr class='data' id="dutyof_<?php echo $duties[$i]['did']; ?>" >
					<!-- <td class='regis-event'><input type='text' class=' event' name='event' value="<?php echo $duties[$i]['dutyname']; ?>" '/></td> -->
					<td class='regis-event'><?php echo $duties[$i]['dutyname']; ?></td>
					<!-- <td class='regis-date'><input type='text' class=' date' name='date' value="<?php echo genDate($duties[$i]['starttime']); ?>"/><br/><input type='text' class=' timemark' name='timemark' value="<?php echo $duties[$i]['timemark']; ?>"/></td> -->
					<td class='regis-date'>
						<span class='date' ><?php echo genDate($duties[$i]['starttime']); ?></span><br/>
						<span class='timemark' ><?php echo $duties[$i]['timemark']; ?></span>
					</td>

					<!-- <td class='regis-time'><input type='text' class=' starttime' name='starttime' value="<?php echo genTime($duties[$i]['starttime']); ?>"/><br/> to <br/><input type='text' class=' endtime' name='endtime' value="<?php echo genTime($duties[$i]['endtime']); ?>"/></td> -->
					<td class='regis-time'>
						<span class='starttime' ><?php echo genTime($duties[$i]['starttime']); ?></span><br/> to <br/>
						<span class='endtime' ><?php echo genTime($duties[$i]['endtime']); ?></span>
					</td>

					<!-- <td class='regis-venue'><input type='text' class=' venue' name='venue' value="<?php echo $duties[$i]['venue']; ?>"/></td> -->
					<td class='regis-venue'><?php echo $duties[$i]['venue']; ?></td>

					<td class='regis-members'>


					<?php 
						for($y=0; $y<count($atdList); $y++){
					?>


						<div class='candidate'><img src='../image/pekka1.jpg' /><div class='membername'><?php echo $atdList[$y]['username'] ?></div ><div class='memberedit' onclick="javascript:;">-</div></div>


					<?php
						}
					?>

						<!-- onclick="javascript:showBox('addbox_', <?php echo $duties[$i]['did']; ?>);" -->
						<div class='candidate_add'>
							<div id="addbox_<?php echo $duties[$i]['did']; ?>" class='memberadd' onclick="javascript:addAtd(<?php echo $duties[$i]['did']; ?>);"> + 
								<div class='addbox showbox' >xxx</div>
							</div>
						</div>
					</td>
					<td class='regis-miss'>
						

					<?php
							$totalno = $duties[$i]['totalmembers'];
							if(count($atdList)>=$totalno) { echo '/'; }
							else{ echo ($totalno - count($atdList)) . 'M'; } 
					?>


					</td>
					<td class='regis-note'><textarea></textarea></td>
					<!--  <td class='registration regis-state'><input type='text' class='' name='state' value='Finished'/></td>  -->
					<!-- <td class='regis-edit'><a href="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>)">Register here</a></td> -->
					<td class='regis-edit'>
						<button class='editbutton btn' type='button' onclick="javascript:changeFormatToInput(<?php echo $duties[$i]['did']; ?>);">修改</button><br/>
						<button class='finishbutton btn' type='button' onclick="javascript:updateDutyAdm(<?php echo $duties[$i]['did']; ?>);">完成</button><br/>
						<button class='cancelbutton btn' type='button' onclick="javascript:cancelEdit(<?php echo $duties[$i]['did']; ?>);">取消</button>
					</td>
				</tr>
				</div>


				<?php
					}
				?>


				

				
				</form>
			</table>
		</div>


		<!--  sub navigation -->
		<div id='subnavi'>
			<div class='color'></div>
			<div class='content'>Back</div>
		</div>


		<!-- <div class="layer-mask"></div>
		<div class="popup-layer">
			<div class="layer-head">選擇隊員<img src='../image/princess1.jpeg' /></div>
			<div class="layer-con">
				<p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p><p class='layer-member'><input type="checkbox" name="member" value="" ><img src='../image/princess1.jpeg' /><span>Jojo</span></p>
			</div>
			<div class="submit-btn layer-bottom">
				<button>Submit</button>
			</div>
		</div> -->
		

		<!-- <div class='resBox'>
			成功添加
		</div> -->

		<script type='text/javascript' src='../js/jquery-3.2.1.js' ></script>
		<script type='text/javascript' src='../js/doAdmin.js'></script>
		<script type='text/javascript' src='../js/common.js' ></script>
		

	</body>
</html>
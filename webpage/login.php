<!DOCTYPE html>

<html>
	<head>
		<meta charset='utf-8'/>
		<link rel='stylesheet' type='text/css' href='../css/login.css'/>
		<script src='../js/jquery-3.2.1.js' type='text/javascript'></script>
	</head>

	<body>
		<!-- <div id='navigateL'>
			<h1>FFWPA <span>B</span></h1>

		</div> -->

		<div id='contentForm'>
			<h1 class='contentForm' id='contentHeading'>FFWPA B <span>web</span></h1>
			<div class='subtitle'><p>Welcome to the website of FFWPA B</p></div>
			<div class='choice'>
				<div class='choiceOption activeOption' id='loginOption'>登陸</div>
				<div class='choiceOption' id='regisOption'>註冊</div>
			</div>

			<div class='contentForm' id='loginForm'>
				<form class='loginForm' action='../manage/doLogin.php' method='post'>			<!-- //////////////////  -->
					<div class='loginForm' id='usernameLog'>
						<input type='text' class='usernameLog infoLog' name='username' placeholder='用戶名稱' value='' />
						<div class='usernameLog warning'></div>
					</div>

					<div class='loginForm' id='passwordLog'>
						<input type='password' class='passwordLog infoLog' name='password' placeholder='密碼' value=''/>
						<div class='passwordLog warning'></div>
					</div>

					<div class='loginForm' id='saveInfo'>
						<input type='checkbox' name='saveinfo' id='saveinfo' value='1'/><label for='saveinfo'>save password</label> <!--////////////////-->
					</div>

					<div class='loginForm' id='submitLog'>
						<input type='submit' class='submit infoLog' value='登陸'/>				<!--////////////////-->
					</div>
				</form>
			</div>


			<div class='contentForm' id='regisForm'>
				<form class='regisForm' action='../manage/doRegis.php' method='post'>			<!--////////////////-->
					<div class='regisForm' id='usernameReg'>
						<input type='text' class='usernameReg' name='username' placeholder='用戶名稱' value=''/>
						<div class='usernameReg warning'></div>
					</div>

					<div class='regisForm' id='passwordReg'>
						<input type='password' class='passwordReg' name='password' placeholder='密碼' value=''/>
						<div class='passwordReg warning'></div>
					</div>

					<div class='regisForm' id='passwordReg2'>
						<input type='password' class='passwordReg2' name='password2' placeholder='確認密碼' value='' />
						<div class='passwordReg2 warning'></div>
					</div>

					<div class='regisForm' id='titleReg'>
						<input type='text' class='titleReg' name='title' placeholder='職階' value=''/>
						<input type='text' class='numberReg' name='number' placeholder='隊員號碼' value=''/>
						<div class='titleReg warning'></div>
					</div>

					<div class='regisForm'>
						<input type='text' class='emailReg' name='email' placeholder='郵箱' value='' />
						<div class='warning emailReg'></div>
					</div>

					<div class='regisForm' id='submitReg'>
						<input type='submit' class='submit' value='註冊'/>						<!--////////////////-->
					</div>
				</form>

			</div>

		</div>

		<script src='../js/login.js' type='text/javascript'></script>
	</body>

</html>
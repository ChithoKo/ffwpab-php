<?php


header("content-type:text/html charset=utf8");
// set for CORS of server side
header('Access-Control-Allow-Origin: http://localhost:8088');
header('Access-Control-Allow-Credentials: true');
// add 'Access-Control-Allow-Headers' becuz: https://stackoverflow.com/questions/12409600/error-request-header-field-content-type-is-not-allowed-by-access-control-allow
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
date_default_timezone_set('Asia/Hong_Kong');
session_start();

// $_SESSION['mid'] = 2;											//////////////////////////////////////////////////////////////////////////////

define('ROOT', dirname(__FILE__), TRUE);

//echo ROOT."<br/>";
set_include_path('.'.PATH_SEPARATOR.ROOT.PATH_SEPARATOR.ROOT.'/lib'.PATH_SEPARATOR.ROOT.'/logic'.PATH_SEPARATOR.ROOT.'/testing'.PATH_SEPARATOR.get_include_path());


require_once "mysql.func.php";
require_once "common.func.php";
require_once "upload.func.php";

require_once "admin.inc.php";
require_once "album.inc.php";
require_once "member.inc.php";
require_once "duty.inc.php";
require_once "attendant.inc.php";
require_once "meeting.inc.php";
require_once "image.inc.php";
require_once "notice.inc.php";
require_once "postresponse.inc.php";
require_once "postlike.inc.php";

// echo "<script>alert('mid is " . $_SESSION['mid'] . " .');</script>";
	// echo "<script>window.location = 'http://localhost:8088/dist/view/user-login.html?verify=u_shd_login_first'</script>";

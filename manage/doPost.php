<?php

/**
 * @Author: CharlesKo
 * @Date:   2017-11-10 18:29:07
 * @Last Modified by:   CharlesKo
 * @Last Modified time: 2017-11-11 03:56:09
 */

require_once '../include.php';

$act = $_REQUEST['act'];

if($act == 'addPostresponse'){
	$imgid = getImageIdByName($_POST['imagename'])['imgid'];
	$parentprid = 0;
	if(isset($_POST['parentprid'])){
		$parentprid = $_POST['parentprid'];
	}

	$msg = null;
	$msg = addPostResponse($imgid, $parentprid);

	if($msg){
		$response = array(
			'errno' => 0,
			'msg' => 'add response success',
			'status' => true,
			'data' => ''
		);
	}else{
		$response = array(
			'errno' => 1,
			'msg' => 'add response failed',
			'data' => ''
		);
	}
	echo json_encode($response);
}else if($act == 'getPostresponses'){
	$imgid = getImageIdByName($_POST['imagename'])['imgid'];
	$postresponses = getPostResponse("imgid = $imgid AND parentprid = 0");
	$iconPath = '../../src/image/cropped/50/';

	$postresponsesDetails = array();
	foreach ($postresponses as $postresponse) {
		$usericons = getImages("mid = ".$postresponse['mid']);
		$usericon = $usericons[0]['imagename'];
		$username = checkMemberInfoById('username', $postresponse['mid']);

		$responseReplies = getPostResponse("imgid = $imgid AND parentprid = " . $postresponse['prid']);
		$responseRepliesDetails = array();
		foreach ($responseReplies as $responseReply) {
			$replyUsericons = getImages("mid = ".$responseReply['mid']);
			$replyUsericon = $usericons[0]['imagename'];
			$replyUsername = checkMemberInfoById('username', $responseReply['mid']);

			$responseRepliesDetails[] = array(
					'content' => $responseReply['content'],
					'commenttime' => $responseReply['createtime'],
					'usericon' => $iconPath . $replyUsericon,
					'username' => $replyUsername,
					'userLink' => '',
					'prid' => $responseReply['prid']
				);
		}

		$postresponsesDetails[] = array(
				'content' => $postresponse['content'],
				'commenttime' => $postresponse['createtime'],
				'usericon' => $iconPath . $usericon,
				'username' => $username,
				'userLink' => '',
				'prid' => $postresponse['prid'],
				'responseReplies' => $responseRepliesDetails
			);
	}

	if(true){
		$response = array(
			'errno' => 0,
			'msg' => 'get post responses success',
			'status' => true,
			'data' => $postresponsesDetails
		);
	}

	echo json_encode($response);
}
/*
* @Author: CharlesKo
* @Date:   2017-11-03 13:07:15
* @Last Modified by:   CharlesKo
* @Last Modified time: 2017-11-06 03:00:47
*/



$(document).ready(function(){
	var viewWidth = document.documentElement.clientWidth;
	var viewHeight = document.documentElement.clientHeight;

	var conWidth = viewWidth*4/5;
	$('.photo-con').css('width', conWidth);
	conWidth = parseInt($('.photo-con').css('width'), 10);
	var conHeight = conWidth*35/60;
	$('.photo-con').css('height', conHeight);
	conHeight = parseInt($('.photo-con').css('height'), 10);
	$('.photo').css('width', conHeight);
	if(parseInt($('.photo img').css('width')) > parseInt($('.photo img').css('height'))){
		$('.photo img').css('width', conHeight);
	}else{
		$('.photo img').css('height', conHeight);
	}

	var infoWidth = conWidth - conHeight - 23;
	$('.photo-info').css('width', infoWidth);

	$('.info-user img').css('width', infoWidth/8);
	$('.info-details').css('width', infoWidth*6/9);
	$('.info-details').css('height', infoWidth/8);
	$('.info-username').css('line-height', infoWidth/13 + 'px');

	$('.responsive-like-comment-icon').css('width', infoWidth);
	$('.photo-caption').css('width', (infoWidth - 15));
	$('.photo-caption-space').css('width', infoWidth);
	$('.post-comment').css('width', infoWidth);
	$('.comment-submit').css('width', infoWidth);
	// $('.comment-submit img').css('width', infoWidth/8);
	buttonWidth = parseInt($('.comment-submit button').css('width'), 10);
	$('.comment-submit input').css('width', infoWidth - 42 - 5 - buttonWidth);
	// $('.comment-submit button').css('width', infoWidth/8);

	// photo-info, photo-caption, photo-caption-space, comment-submit
	// 1st 50 is for margin-bottom of photo-caption, 2nd 50 is for height of borderssss
	commentHeight = conHeight - parseInt($('.photo-info').css('height'), 10) - parseInt($('.photo-caption').css('height'), 10)
							- 50 - parseInt($('.responsive-like-comment-icon').css('height'), 10) - parseInt($('.comment-submit').css('height'), 10) - 50;
	$('.post-comment').css('height', commentHeight);

});


function foldableBox(height){

}
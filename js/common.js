
// validate the format of data input in form
function validateForm(){

}

// 


// 
function showImgPost(photo_addr){
	var photoCon = $("<div class='photo-con'></div>");
	var photoImg = $("<img src='" + photo_addr + "' />");
	// var photo_50_addr = photo_addr.replace("image", "image/50");
	var username = 'jojo';
	var postDate = 'sss';
	var postCaption = 'sssdddfff';
	// photo
	var photo = $("<div class='photo'><span class='img-helper'></span><img src='" + photo_addr + "' /></div>");
	photo.appendTo(photoCon);

	// photo User Info
	var photoInfo = $("<div class='photo-info'></div>");
	var infoUser = $("<div class='info-user'></div>");
	var infoDetails = $("<div class='info-details'></div>");
	var infoUsername = $("<div class='info-username'><a href='#'>" + username + "</a></div>");
	var infoDate = $("<div class='info-date'>" + postDate + "</div>");
	var infoClose = $("<div class='info-close'>X</div>");
	// photo_50_addr.appendTo(infoUser);
	photoImg.appendTo(infoUser);
	infoUsername.appendTo(infoDetails);
	infoDate.appendTo(infoDetails);
	infoDetails.appendTo(infoUser);
	infoClose.appendTo(infoUser);
	infoUser.appendTo(photoInfo);
	photoInfo.appendTo(photoCon);

	// photo caption
	var photoCaption = $("<div class='photo-caption'>" + postCaption + "</div>");
	photoCaption.appendTo(photoCon);

	// responsive-like-comment-icon
	responsiveLikeCommentIcon(photoCon);

	// post-comment
	var postComment = $("<div class='post-comment'></div>");
	postComment.appendTo(photoCon);

	// comment-submit
	// commentSubmit(photoCon, photo_50_addr);
	commentSubmit(photoCon, photo_addr);

	photoCon.appendTo($('.popup-layer'));
	setImgPostCss();
	infoClose.click(function(){
		removeLayer();
	});
}


function editImgInfo(photo_addr){
	var photoCon = $("<div class='photo-con'></div>");
	var photoImg = $("<img src='" + photo_addr + "' />");
	// var photo_50_addr = photo_addr.replace("image", "image/50");
	var username = 'jojo';
	var postDate = 'sss';
	var postCaption = 'sssdddfff';
	// photo 
	var photo = $("<div class='photo'><span class='img-helper'></span><div class='img-box'><img class='img1' src='" + photo_addr + "' /><img class='img2' src='" + photo_addr + "' /></div></div>");
	
	photo.appendTo(photoCon);

	// photo User Info
	var photoInfo = $("<div class='photo-info'></div>");
	var infoUser = $("<div class='info-user'></div>");
	var infoDetails = $("<div class='info-details'></div>");
	var infoUsername = $("<div class='info-username'><a href='#'>" + username + "</a></div>");
	var infoDate = $("<div class='info-date'>" + postDate + "</div>");
	var infoClose = $("<div class='info-close'>X</div>");
	// photo_50_addr.appendTo(infoUser);
	photoImg.appendTo(infoUser);
	infoUsername.appendTo(infoDetails);
	infoDate.appendTo(infoDetails);
	infoDetails.appendTo(infoUser);
	infoClose.appendTo(infoUser);
	infoUser.appendTo(photoInfo);
	photoInfo.appendTo(photoCon);

	// photo caption
	var photoCaption = $("<div class='photo-caption caption-editable'></div>");
	var imgDescript = $("<div id='editableDiv' contenteditable='true' data-text='What do you want to say about this photo? :D'></div>");
	imgDescript.appendTo(photoCaption);
	var imgLabel = $("<label onclick=\"document.getElementById('editableDiv').focus()\"></label>");
	imgLabel.appendTo(photoCaption);
	photoCaption.appendTo(photoCon);
	var photoFor = $("<div class='photo-for'>About : <span class='photo-for-content'></span></div>");
	photoFor.appendTo(photoCon);
	var imgInfoEditBtn = $("<div class='img-info-edit-button'><button class='post-btn'>Post</button><button class='cancel-btn'>Cancel</button></div>");
	imgInfoEditBtn.appendTo(photoCon);

	photoCon.appendTo($('.popup-layer'));
	setEditImgInfoCss();
	infoClose.click(function(){
		removeLayer();
	});
}

// crop image
function cropImg(){
	document.onselectstart=new Function('event.returnValue=false;');

	var photo = $('.photo');
	// alert(photo.offsetWidth);

	var movableSq = $("<div class='movable-sq' id='movable-sq'></div>");
	$("<div id='left-up' class='minDiv left-up'></div>").appendTo(movableSq);
	$("<div id='left' class='minDiv left'></div>").appendTo(movableSq);
	$("<div id='left-down' class='minDiv left-down'></div>").appendTo(movableSq);
	$("<div id='up' class='minDiv top'></div>").appendTo(movableSq);
	$("<div id='right-up' class='minDiv right-up'></div>").appendTo(movableSq);
	$("<div id='right' class='minDiv right'></div>").appendTo(movableSq);
	$("<div id='right-down' class='minDiv right-down'></div>").appendTo(movableSq);
	$("<div id='down' class='minDiv bottom'></div>").appendTo(movableSq);
	movableSq.appendTo(photo.find('.img-box'));

	// alert('top : ' + photo.find('#left').offset().left);

	$('.photo .img1').css('opacity', 0.5);

	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('#left-up');
	var upDiv = $('#up');
	var rightupDiv = $('#right-up');
	var rightDiv = $('#right');
	var rightdownDiv = $('#right-down');
	var downDiv = $('#down');
	var leftdownDiv = $('#left-down');
	var leftDiv = $('#left');

	// alert(mainDiv.offset().top);
	//alert(leftupDiv.css('background'));

	// 判断鼠标是否落下
	var ifBool = false;
	// 当前拖动的触点
	var contact = '';

	// ???
	$('#movable-sq').draggable({
		containment : 'parent',
		drag : setChoice
	});

	leftupDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "leftUp";

	});
	//鼠标按下-左中间
	leftDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "left";

	});
	//鼠标按下-左下角
	leftdownDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "leftDown";

	});
	//鼠标按下-上边
	upDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "up";

	});
	//鼠标按下-下边
	downDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "down";
		
	});
	//鼠标按下-右上角
	rightupDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "rightUp";

	});
	//鼠标按下-右中间
	rightDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "right";

	});
	//鼠标按下-右下角
	rightdownDiv.mousedown(function(e){
		e.stopPropagation();
		ifBool = true;
		contact = "rightDown";

	});

	$(document).mousemove(function(e){
		e.stopPropagation();

		if(ifBool){
			// alert(contact);
			switch(contact){
				case "leftUp":leftMove(e);upMove(e);break;
				case "left":leftMove(e);break;
				case "leftDown":leftMove(e);downMove(e);break;
				case "up":upMove(e);break;
				case "down":downMove(e);break;
				case "rightUp":rightMove(e);upMove(e);break;
				case "right":rightMove(e);break;
				case "rightDown":rightMove(e);downMove(e);break;
				default:alert("操作错误！");
			}
		var width = mainDiv.offsetWidth;
		var height = mainDiv.offsetHeight;
		setChoice();
		}
	});
	//鼠标松开
	$(document).mouseup(function(e){
		ifBool = false;
		contact = "";
		
	});
	setChoice();//初始化选择区域可见

}
//左边拖动
function leftMove(e){
	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('.left-up');
	
	var x = e.clientX;//鼠标横坐标
	if(x < boxDiv.offset().left){
		x = boxDiv.offset().left;
	}
	var width = mainDiv.width() - 2;//选择层宽度
	var mainX = leftupDiv.offset().left + 4;//左上角横坐标
	var addWidth = mainX - x;//拖动后应该增加的宽度

	//设置拖动后的宽高和位置
	// mainDiv.style.width = (width + addWidth) + "px";
	// mainDiv.style.left = mainDiv.offsetLeft - mainX + x + "px";
	mainDiv.css('width', (width + addWidth + 2));
	mainDiv.css('left', (mainDiv.position().left - addWidth));

	// var mainDiv2 = document.getElementById('movable-sq');
	// mainDiv2.style.width = (width + addWidth) + "px";
	// mainDiv2.style.left = mainDiv.offsetLeft - mainX + x + "px";
}
//上边拖动
function upMove(e){
	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('.left-up');
	
	var y = e.clientY;//鼠标纵坐标
	if(y < getPosition(boxDiv).top){
		y = getPosition(boxDiv).top;
	}
	var height = mainDiv.height() - 2;//选择层的高度
	var mainY = getPosition(leftupDiv).top + 4;//左上角纵坐标
	var addHeight = mainY - y;//拖动后应该增加的高度
	
	//设置拖动后的宽高和位置
	mainDiv.css('height', (height + addHeight + 2) );
	mainDiv.css('top', (mainDiv.position().top - addHeight) ); //纵坐标减去增加的高度

}
//下边拖动
function downMove(e){
	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('#left-up');

	var y = e.clientY;//鼠标纵坐标
	// alert('limit : ' + (getPosition(boxDiv).top + boxDiv.height()));
	// alert(getPosition(boxDiv).top);
	if(y > getPosition(boxDiv).top + boxDiv.height()){
		y = getPosition(boxDiv).top + boxDiv.height();
	}

	var height = mainDiv.height() - 2;//选择层的高度
	var mainY = getPosition(leftupDiv).top + 4;//左上角纵坐标
	var addHeight = y - mainY - height;//拖动后应该增加的高度
	mainDiv.css('height', (height + addHeight));
	// alert(mainDiv.css('height'));
}
//右边拖动
function rightMove(e){
	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('.left-up');
	
	var x = e.clientX;//鼠标横坐标
	if(x > getPosition(boxDiv).left + boxDiv.width()){
		x = getPosition(boxDiv).left + boxDiv.width();
	}
	var width = mainDiv.width() - 2;//选择层宽度
	var mainX = getPosition(leftupDiv).left + 4;//左上角横坐标
	var addWidth = x - width - mainX;//拖动后应该增加的宽度

	//设置拖动后的宽高和位置
	mainDiv.css('width', (width + addWidth));
}
//设置选择区域可见
function setChoice(){
	var boxDiv = $('.img-box');
	var mainDiv = $('.movable-sq');
	var leftupDiv = $('.left-up');

	// var offset = mainDiv.offset();
	// var top = offset.top;
	// var right = offset.left + mainDiv.width();
	// var bottom = offset.top + mainDiv.height();
	// var left = offset.left;
	var position = mainDiv.position();
	var top = position.top;
	var right = position.left + mainDiv.width();
	var bottom = position.top + mainDiv.height();
	var left = position.left;
	$(".photo .img2").css('clip', "rect("+top+"px,"+right+"px,"+bottom+"px,"+left+"px)");
	// $(".photo .img2").css('clip', "rect("+0+"px,"+200+"px,"+200+"px,"+0+"px)");
	// alert();
	// preview({"top":top,"right":right,"bottom":bottom,"left":left});

}
//获取元素的绝对位置
function getPosition(node){
	var offset = node.offset();
	var left = offset.left;
	var top = offset.top;
// 	// alert('top : ' + top + ' current class : ' + node.attr('class') + ', current tag name : ' + node.prop('tagName'));
// 	current = node.offsetParent(); // 取得元素的offsetParent
// 	alert('top : ' + top + ' current class : ' + current.attr('class') + ', current tag name : ' + current.prop('tagName'));
// 	// alert('current class : ' + current.attr('class') + ', current tag name : ' + current.prop('tagName'));
// 	//  一直循环直到根元素
// // 　　while(current != null){
		
// // 　　}
// 	while(current !== null && current !== undefined && current.prop('tagName') !== 'HTML' ){
// 		offset = current.offset();
// 		left += offset.left;
// 		top += offset.top;
// 		current = current.offsetParent();
// 		alert('top : ' + top + ' current class : plus ' + current.attr('class') + ', current tag name : ' + current.prop('tagName'));
// 		// alert('current class : ' + current.attr('class') + ', current tag name : ' + current.prop('tagName'));
// 	// 	offset = current.offset();
// 	// 　　left += offset.left;
// 	// 　　top += offset.top;
// 	// 　　current = current.offsetParent();
// 	}
	return {"left":left,"top":top};
}

// set css of photo-con
function setImgPostCss(){
	var viewWidth = document.documentElement.clientWidth;
	var viewHeight = document.documentElement.clientHeight;

	var conWidth = viewWidth*4/5;
	$('.photo-con').css('width', conWidth);
	conWidth = parseInt($('.photo-con').css('width'), 10);
	var conHeight = conWidth*35/60;
	$('.photo-con').css('height', conHeight);
	conHeight = parseInt($('.photo-con').css('height'), 10);
	$('.photo').css('width', conHeight);
	$('.photo img').load(function(){
		if($('.photo img').width() > $('.photo img').height()){
			$('.photo img').css('width', conHeight);
			// alert('width: ' + $('.photo img').css('width'));
		}else{
			$('.photo img').css('height', conHeight);
			// alert('height: ' + $('.photo img').css('height'));
		}
	});
	// if(parseInt($('.photo img').css('width')) > parseInt($('.photo img').css('height'))){
	// 	$('.photo img').css('width', conHeight-100);
	// 	// $('.photo img').css('width', conHeight-20);
	// }else{
	// 	$('.photo img').css('height', conHeight-100);
	// }

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
							- 50 - parseInt($('.responsive-like-comment-icon').css('height'), 10) - parseInt($('.comment-submit').css('height'), 10) -30;
	$('.post-comment').css('height', commentHeight);
	setPopupLayerPosition($('.photo-con'));
}


// set css of photo-con
function setEditImgInfoCss(){
	var viewWidth = document.documentElement.clientWidth;
	var viewHeight = document.documentElement.clientHeight;

	var conWidth = viewWidth*4/5;
	$('.photo-con').css('width', conWidth);
	conWidth = parseInt($('.photo-con').css('width'), 10);
	var conHeight = conWidth*35/60;
	$('.photo-con').css('height', conHeight);
	conHeight = parseInt($('.photo-con').css('height'), 10);
	$('.photo').css('width', conHeight);

	// $('.photo img').load(function(){
		if($('.photo img').width() > $('.photo img').height()){
			// alert('width: ' + $('.photo img').css('width'));
			$('.photo img').css('width', conHeight);
		}else{
			// alert('height: ' + $('.photo img').css('height'));
			$('.photo img').css('height', conHeight);
			// alert('height: ' + $('.photo img').css('height'));
		}
	// });
	// if($('.photo img').width() > $('.photo img').height()){
	// 	$('.photo img').css('width', conHeight);
	// }else{
	// 	$('.photo img').css('height', conHeight);
	// }

	var infoWidth = conWidth - conHeight - 23;
	$('.photo-info').css('width', infoWidth);

	$('.info-user img').css('width', infoWidth/8);
	$('.info-details').css('width', infoWidth*6/9);
	$('.info-details').css('height', infoWidth/8);
	$('.info-username').css('line-height', infoWidth/13 + 'px');

	$('.photo-caption').css('width', (infoWidth - 15));
	$('.photo-for').css('width', (infoWidth - 15));
	$('.img-info-edit-button').css('width', (infoWidth - 15));



	// photo-info, photo-caption, photo-caption-space, comment-submit
	// 1st 50 is for margin-bottom of photo-caption, 2nd 50 is for height of borderssss
	commentHeight = conHeight - parseInt($('.photo-info').css('height'), 10) - parseInt($('.photo-caption').css('height'), 10)
							- 50 - parseInt($('.responsive-like-comment-icon').css('height'), 10) - parseInt($('.comment-submit').css('height'), 10) -30;
	$('.post-comment').css('height', commentHeight);
	setPopupLayerPosition($('.photo-con'));
}


// crop image


// 
function loadComments(){

}

// 
function commentSubmit(holder, photo_addr){
	var commentSubmit = $("<div class='comment-submit'><img src='" + photo_addr + "' /><input type='text' name='' placeholder='write sth here...''><button>Send</button></div>");
	commentSubmit.appendTo(holder);
}

// 
function responsiveLikeCommentIcon(holder){
	var responsiveLikeCommentIcon = $("<div class='responsive-like-comment-icon'><div class='responsive-icon rlike'><a href='#'>Like</a></div><div class='responsive-icon rcomment'><a href='#'>Comment</a></div></div>");
	responsiveLikeCommentIcon.appendTo(holder);
}

function commentResponse(responseTime){

}


// show/hide selected div after clicking button
function showBox(idname, id){
	idname += id;
	idname = '#' + idname;

	// alert($(idname + ' .showbox').css('display'));

	if($(idname + ' .showbox').css('display') == 'block'){
		$(idname + ' .showbox').css('display', 'none');
	}else{
		$(idname + ' .showbox').css('display', 'block');

	}

	// alert(idname);
	// // alert($(idname div:eq(2)).css('display'));
	// alert($(idname + ' .showbox').css('display'));
	// $(idname + ' .showbox').css('display', 'none');
	// $(idname + ' .showbox').css('display', 'block');
	// clicked = !clicked;

	// if(clicked){
	// 	// $('#dutyform').css('display', 'block');
	// 	// $('.title-icon').html('-');

	// 	// $(this).next().css('display', 'block');
	// 	//$(this).text('here!!!');
	// 	// alert($('.title-content').text());
	// 	// alert('id name: ' + $(this).prop('class'));
	// 	// alert($(this).next().attr('id'));

	// }else{
	// 	// $('#dutyform').css('display', 'none');
	// 	// $('.title-icon').html('+');

	// 	// $(this).next().css('display', 'none');

	// 	// alert($(this).next().attr('id'));
	// }
}

// show pop-up box after clicking
function showPopupLayer(){
	var scrollHeight = document.documentElement.scrollHeight;
	var viewWidth = document.documentElement.clientWidth;
	var viewHeight = document.documentElement.clientHeight;

	// viewWidth += 'px';
	// viewHeight += 'px';

	// alert('scrollHeight: ' + scrollHeight + ', viewHeight: ' + viewHeight + ', viewWidth: ' + viewWidth);
	var layerMask = $("<div class='layer-mask'></div>");
	layerMask.css('width', viewWidth + 'px');
	layerMask.css('height', viewHeight + 'px');
	layerMask.appendTo($('body'));
	var popupLayer = $("<div class='popup-layer'></div>");
	
	// var layerHead = $("<div class='layer-head'>選擇隊員<img src='../image/princess1.jpeg' /></div>");
	// layerHead.appendTo(popupLayer);
	// var layerCon = $("<div class='layer-con'></div>");
	// layerCon.appendTo(popupLayer);
	// var layerBottom = $("<div class='submit-btn layer-bottom'><button>Submit</button></div>");
	// layerBottom.appendTo(popupLayer);
	popupLayer.appendTo($('body'));

	layerMask.click(function(){
		removeLayer();
	});
	// removeLayer();
}

// set pop-up layer position
function setPopupLayerPosition(content){
	var scrollHeight = document.documentElement.scrollHeight;
	var viewWidth = document.documentElement.clientWidth;
	var viewHeight = document.documentElement.clientHeight;
	var contentWidth = parseInt(content.css('width'), 10);
	var contentHeight = parseInt(content.css('height'), 10);

	var popupLayer = $('.popup-layer');
	popupLayer.css('top', (viewHeight-contentHeight)/4 + 'px');
	popupLayer.css('left', (viewWidth - contentWidth)/2 + 'px');
	// alert('viewWidth: ' + viewWidth + ', contentWidth: ' + contentWidth);
	// alert('top: ' + popupLayer.css('top') + ', right: ' + popupLayer.css('right'));
}

function fixElement(selectorname){
	var layerBottom = $(selectorname);
	var offset = layerBottom.offset();
	var width = layerBottom.css('width');
	var top = offset.top - $(window).scrollTop();
	// alert('top pos: ' + width);
	layerBottom.css('bottom', '');
	layerBottom.css('right', '');
	layerBottom.css('position', 'fixed');
	layerBottom.css('top', top + 'px');
	layerBottom.css('left', offset.left + 'px');
	layerBottom.css('width', width );

	// alert('position set');
}


function removeLayer(){
	// $('.layer-head img').click(function(){
	// 	$('.layer-mask').remove();
	// 	$('.popup-layer').remove();
	// });
	// $('.layer-mask').click(function(){
	// 	$('.layer-mask').remove();
	// 	$('.popup-layer').remove();
	// });

	$('.layer-mask').remove();
	$('.popup-layer').remove();
}


// show response msg after server operation
function showServerRes(msg){
	//alert('ssr');

	var resBox = $("<div class='resBox' ></div>").appendTo($('body'));
	resBox.text(msg);
	showResBox();

	setTimeout(removeResBox, 3000);

}

function showResBox(){
	var right = $('.resBox').css('right');
	right = parseInt(right);

	if(right < 20){
		right += 80;
		$('.resBox').css('right', right + 'px');
		setTimeout(showResBox, 10);
	}else{
		$('.resBox').css('right', right + 'px');
	}
}

function removeResBox(){
	 var width = $('.resBox').css('width');
	 var right = $('.resBox').css('right');q
	 width = (0 - 80 - parseInt(width));
	 right = parseInt(right);

	 if(right > width){
	 	right -= 30;
	 	$('.resBox').css('right', right + 'px');
	 	setTimeout(removeResBox, 10);
	 }else{
	 	$('.resBox').remove();
	 }
}


// for checking what's inside an object
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    alert(out);

    // or, if you wanted to avoid alerts...

    // var pre = document.createElement('pre');
    // pre.innerHTML = out;
    // document.body.appendChild(pre)
}


// alert('hi common');

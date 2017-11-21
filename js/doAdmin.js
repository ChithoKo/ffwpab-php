

$(document).ready(function(){
	// alert('doadmin-js');
});

var txtarr = new Array();

function approveMemberState(){
	
}

// Add duty with data in input forms in web page
function addDutyAdm(){

	// alert('add duty');
	// alert($('.addday').val() + '/' + $('.addmonth').val() + '/' + $('.addyear').val());

	var url = '../manage/doAdminAction.php?act=addDuty';
	var data = {
		'dutyname': $('.adddutyname input').val(), 'venue': $('.addvenue input').val(), 
		'timemark': ($('.addtimemark input').val()=='')? '' : $('.addtimemark input').val(), 
		'date': $('.addday').val() + '/' + $('.addmonth').val() + '/' + $('.addyear').val(), 
		'starttime': $('.addstarttime input').val(), 'endtime': $('.addendtime input').val(), 'note': $('.addnote textarea').val(),
		'totalmembers': $('.addtotalmem input').val()
	};

	var success = function(res){
		//alert("result is : " + res.msg);
		showServerRes(res.msg);
		$('.addduty input').val('');
		$('.addnote textarea').val('');
	}

	var type = 'json';

	$.post(url, data, success, type);

}


// update duty info with data in input form in web page
function updateDutyAdm(did){
	//alert(13);
	//alert($('#dutyof1 .date').val());
	//var ss = 2 + id;
	//alert(2+id);
	//alert(1);
	
	//alert(new Date().getTimezoneOffset());
	var idname='#dutyof_' + did;

	//alert('idname: ' + idname);
	//alert('date: ' + $(idname + ' .input-date').val());
	//alert($(idname + ' .venue').val());
	var url = '../manage/doAdminAction.php?act=updateDuty';
	var data = { 'did':did, 'dutyname':$(idname + ' .event').val(), 'date':$(idname + ' .input-date').val(), 'timemark':$(idname + ' .input-timemark').val(), 
				'starttime':$(idname + ' .input-starttime').val(), 'endtime': $(idname + ' .input-endtime').val(), 'venue': $(idname + ' .venue').val()};
	var success = function(response){
		//alert("result is : " + response.msg);
		showServerRes(response.msg);
	}
	var type='json';

	//alert('date: ' + $(idname + ' .date').val());

	$.post(url, data, success, type);
	// alert('post finished');
	// $.ajax({
	// 	'url':'../manage/doAdminAction.php?act=updateDuty',
	// 	'type':'post',
	// 	'data':{ 'did':did, 'dutyname':$(idname + ' .event').val(), 'date':$(idname + ' .date').val(), 'timemark':$(idname + ' .timemark').val(), 'starttime':$(idname + ' .starttime').val(), 'endtime': $(idname + ' .endtime').val(), 'venue': $(idname + ' .venue').val()},
	// 	'success':function(response){
	// 		var result = eval("(" + response + ")");
	// 		alert("result is : " + result.msg);
	// 	},
	// 	'datatype':'json',
	// }); 
	// alert('post finished');

	changeFormatToTxt(did);
}


function changeFormatToInput(did){

	txtarr = new Array();

	var idname = '#dutyof_' + did;

	var txtval = $(idname + ' .regis-event').text();
	$(idname + ' .regis-event').html("<input type='text' class='event' name='event' value='" + txtval + "' />");
	txtarr['event'] = txtval;

	txtval = $(idname + ' .date').text();
	$(idname + ' .date').html("<input type='text' class='input-date' name='date' value='" + txtval + "' />");
	txtarr['date'] = txtval;
	txtval = $(idname + ' .timemark').text();
	$(idname + ' .timemark').html("<input type='text' class='input-timemark' name='timemark' value='" + txtval + "' />");
	txtarr['timemark'] = txtval;

	txtval = $(idname + ' .starttime').text();
	$(idname + ' .starttime').html("<input type='text' class='input-starttime' name='starttime' value='" + txtval + "' />");
	txtarr['starttime'] = txtval;
	txtval = $(idname + ' .endtime').text();
	$(idname + ' .endtime').html("<input type='text' class='input-endtime' name='endtime' value='" + txtval + "' />");
	txtarr['endtime'] = txtval;

	txtval = $(idname + ' .regis-venue').text();
	$(idname + ' .regis-venue').html("<input type='text' class='venue' name='venue' value='" + txtval + "' />");
	txtarr['venue'] = txtval;

	changeEditButton(idname);
	//alert('changed button ?');
}


function changeEditButton(idname){
	//alert('change button ONE');
	// $(idname + ' .editButton').css('display', 'none');
	// $(idname + ' .finishButton').css('display', 'inline-block');
	// $(idname + ' .cancelButton').css('display', 'inline-block');
	$(idname + ' button:eq(0)').css('display', 'none');
	$(idname + ' button:eq(1)').css('display', 'inline-block');
	$(idname + ' button:eq(2)').css('display', 'inline-block');
}


function changeFinishButton(idname){
	// $(idname + ' .editButton').css('display', 'inline-block');
	// $(idname + ' .finishButton').css('display', 'none');
	// $(idname + ' .cancelButton').css('display', 'none');
	$(idname + ' button:eq(0)').css('display', 'inline-block');
	$(idname + ' button:eq(1)').css('display', 'none');
	$(idname + ' button:eq(2)').css('display', 'none');
}


// add meeting with data in input form in web page
function addEventAdm(){

	// alert('add event');
	// alert($('.addday').val() + '/' + $('.addmonth').val() + '/' + $('.addyear').val());

	var url = '../manage/doAdminAction.php?act=addEvent';
	var data = {
		'eventname': $('.add-event .add-eventname input').val(), 'venue': $('.add-event .add-venue input').val(), 
		'date': $('.add-event .add-day').val() + '/' + $('.add-event .add-month').val() + '/' + $('.add-event .add-year').val(), 
		'starttime': $('.add-event .add-starttime').val(), 'endtime': $('.add-event .add-endtime').val(), 'note': $('.add-event .add-note textarea').val(),
		'pic': $('.add-event .add-pic input').val()
	};

	var success = function(res){
		//alert("result is : " + res.msg);
		showServerRes(res.msg);
		$('.add-event input').val('');
		$('.add-note textarea').val('');
	}

	var type = 'json';

	if(data.eventname=='' || data.venue=='' || data.starttime=='' || data.endtime==''){
		return false;
	}

	// check the format of time
	// finish the time format if format is incomplete automatically
	// so does date
	// ...............................

	$.post(url, data, success, type);

}


// update duty info with data in input form in web page
function updateEventAdm(obj, meetid){

	// var idname='#eventof_' + did;
	var client = $(obj).parent().parent();
	// alert(client.attr('class'));
	var txtval = null;
	var url = '../manage/doAdminAction.php?act=updateEvent';

	var data = {};
	data['meetid'] = meetid;
	client.find('.eee').each(function(){
		txtval = $(this).find('input').val();
		data[$(this).attr('class').split(" ")[0]] = txtval;
	});
	// data = JSON.stringify(data);

	var success = function(response){
		// alert("result is : " + response.msg);
		showServerRes(response.msg);
	}
	var type='json';

	// alert(data);
	$.post(url, data, success, type);
	changeFormatTxtEvent(obj);
	client.find('.edit-btn').css('display', 'inline-block');
	client.find('.submit-btn').css('display', 'none');
	client.find('.cancel-btn').css('display', 'none');
	// changeFormatToTxt(meetid);		//
}


function changeFormatInputEvent(obj){
	var client = $(obj).parent().parent();
	var txtval = null;

	client.find('.edit-btn').css('display', 'none');
	client.find('.submit-btn').css('display', 'inline-block');
	client.find('.cancel-btn').css('display', 'inline-block');

	client.find('.eee').each(function(){
		txtval = $(this).find('span').text();
		$(this).html("<input type='text' name='event' value='" + txtval + "' />");
		// alert($(this).attr('class').split(" ")[0]);
	});

	// alert(client.find('.submit-btn').html());
	// client.find('.submit-btn').click(updateEventAdm(obj, 1));
	// dump(data);


	// var txtarr = ['.event-date', '.event-starttime', '.event-endtime', '.eventname', '.event-venue', '.event-pic', '.event-note'];
	// alert('input value is : ' + client.find(txtarr[i]).find('span').text());
	// for(var i=0; i<txtarr.length; i++){
	// 	// alert('input value is : ' + client.find(txtarr[i]).find('span').text());
	// 	txtval = client.find(txtarr[i]).find('span').text();
	// 	client.find(txtarr[i]).html("<input type='text' name='event' value='" + txtval + "' />");
	// }

}

function changeFormatTxtEvent(obj){
	var client = $(obj).parent().parent();
	var txtval = null;
	client.find('.eee').each(function(){
		txtval = $(this).find('input').val();
		$(this).html("<span>" + txtval + "</span>");
	});

	client.find('.edit-btn').css('display', 'inline-block');
	client.find('.submit-btn').css('display', 'none');
	client.find('.cancel-btn').css('display', 'none');
}


// 
function addAtd(did){
	var url = '../manage/doAdminAction.php?act=getAtdList';
	var data = {'did':did};
	var success = function(res){
		var mids = res.mids;
		var memNames = res.memNames;
		var pendingmids = res.pendingmids;
		var waitingmids = res.waitingmids;
		// alert('mid length: ' + mids.length);

		var memList = [];
		for(var i=0; i<mids.length; i++){
			memList[i] = [mids[i], memNames[i]];
		}
		// alert('memList length: ' + memList[0].length);

		showPopupLayer();
		addPopupTitle();

		
		addAtdLayer(memList, pendingmids, waitingmids);
		var layerBox = $('.layer-box');
		setPopupLayerPosition(layerBox);
		fixElement('.popup-layer .layer-head');
		fixElement('.popup-layer .layer-bottom');
		$('.popup-layer .layer-bottom button').click(function(){
			submitAtdList(did);
		});

		$('.layer-head img').click(function(){
			removeLayer();
		});
		$('.layer-mask').click(function(){
			removeLayer();
		});
		

	}	
	var type = 'json';
	$.post(url, data, success, type);
}

function addPopupTitle(){
	var popupLayer = $(".popup-layer");
	var layerBox = $("<div class='layer-box'></div>");
	var layerHead = $("<div class='layer-head'>選擇隊員<img src='../image/princess1.jpeg' /></div>");
	layerHead.appendTo(layerBox);
	var layerCon = $("<div class='layer-con'></div>");
	layerCon.appendTo(layerBox);
	var layerBottom = $("<div class='submit-btn layer-bottom'><button>Submit</button></div>");
	layerBottom.appendTo(layerBox);
	layerBox.appendTo(popupLayer);

}

// function removeLayer(){
// 	$('.layer-head img').click(function(){
// 		$('.layer-mask').remove();
// 		$('.popup-layer').remove();
// 	});
// 	$('.layer-mask').click(function(){
// 		$('.layer-mask').remove();
// 		$('.popup-layer').remove();
// 	});
// }

function addAtdLayer(memList, pendingmids, waitingmids){
	var layerMember;
	for(var i=0; i<memList.length; i++){
		layerMember = null;
		layerMember = $("<div class='layer-member'><input type='checkbox' name='member' id='mid-" + memList[i][0] + "' value='" + memList[i][0] + "' ><label for='mid-" + memList[i][0] + "'><img src='../image/princess1.jpeg' /><p class='mem-name'>" + memList[i][1] + "</p></label></div>");
		if(pendingmids.includes(memList[i][0])){
			$("<span> (Request sent) </span>").appendTo(layerMember.find('p'));
			// alert('span appended: ' + memList[i][0] + ' : ' + memList[i][1]);
		}
		if(waitingmids.includes(memList[i][0])){
			$("<span> (Waiting for accept) </span>").appendTo(layerMember.find('p'));
		}
		layerMember.appendTo($('.layer-con'));
	}
	
}

function submitAtdList(did){
	var mids = [];
	$('.layer-con input:checkbox:checked').each(function(){
		mids.push($(this).val());
	});

	if(mids.length == 0){
		return false;
	}

	var url='../manage/doAdminAction.php?act=addAtdAdm';
	var data = {
		'did' : did,
		'mids' : mids
	};
	var success = function(res){
		showServerRes(res.msg);
		if(res.errno == 0){
			$('.layer-mask').remove();
			$('.popup-layer').remove();
		}
	}
	var type = 'json';
	$.post(url, data, success, type);
	// alert('mids length: ' + data.mids.length);
}


function cancelEdit(did){
	var idname='#dutyof_' + did;

	var txtval = txtarr['event'];
	$(idname + ' .regis-event').html(txtval);

	txtval = "<span class='date' >" + txtarr['date'] + "</span>";
	txtval += "<br/><span class='timemark' >" + txtarr['timemark'] + "</span>";
	$(idname + ' .regis-date').html(txtval);

	txtval = "<span class='starttime' >" + txtarr['starttime'] + "</span>";
	txtval += "<br/>to<br/><span class='endtime' >" + txtarr['endtime'] + "</span>";
	$(idname + ' .regis-time').html(txtval);

	txtval = txtarr['venue'];
	$(idname + ' .regis-venue').html(txtval);

	changeFinishButton(idname);
}




function changeFormatToTxt(did){
	// alert('format changing');

	var idname='#dutyof_' + did;

	var txtval = $(idname + ' .event').val();
	$(idname + ' .regis-event').html(txtval);

	txtval = "<span class='date' >" + $(idname + ' .input-date').val() + "</span>";
	txtval += "<br/><span class='timemark' >" + $(idname + ' .input-timemark').val() + "</span>";
	$(idname + ' .regis-date').html(txtval);

	txtval = "<span class='starttime' >" + $(idname + ' .input-starttime').val() + "</span>";
	txtval += "<br/>to<br/><span class='endtime' >" + $(idname + ' .input-endtime').val() + "</span>";
	$(idname + ' .regis-time').html(txtval);

	txtval = $(idname + ' .venue').val();
	$(idname + ' .regis-venue').html(txtval);

	changeFinishButton(idname);

	// alert('format changed');
}


// 
function approveAtdAdm(atdid){

	var url = '../manage/doAdminAction.php?act=approveAtd';
	var data = {'atdid' : atdid};
	var success = function(res){
		showServerRes(res.msg);
	}
	var type = 'json';

	$.post(url, data, success, type);
}


// 
function approveMember(mid){
	var url = '../manage/doAdminAction.php?act=approveMember';
	var data = {'mid' : mid};
	var success = function(res){
		showServerRes(res.msg);
	}
	var type = 'json';

	$.post(url, data, success, type);
}





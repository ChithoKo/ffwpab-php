
$(document).ready(function(){
	//alert('doadmin-js');
});

function regisDutyMem(did){

	// alert('regis processing');

	var idname = '#dutyof_'+did;

	var url = '../manage/doMemberAction.php?act=addAtd';
	var data = {
		'did': did, 'date': $(idname + ' .date').text(), 'starttime': $(idname + ' .starttime').text(), 'endtime': $(idname + ' .endtime').text()
	};
	var success = function(res){
		showServerRes(res.msg);
	}
	var type='json';

	// alert('id name: ' + idname);
	// alert('date: ' + $(idname + ' .endtime').text());

	$.post(url, data, success, type);

}
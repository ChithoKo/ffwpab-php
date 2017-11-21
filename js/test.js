
//$('document').ready(function(){
		//var $navi = $('#navigateL');
		//$navi.css("border", "3px solid orange");
		//alert('yo')
	//}
//);


$(".choiceOption").click(function() {
	$(this).addClass("activeOption").siblings().removeClass("activeOption");
	if($('#loginOption').hasClass("activeOption")){
		$('#loginForm').css('display', 'block');
		$('#regisForm').css('display', 'none');
		//alert('login');
	}else{
		$('#regisForm').css('display', 'block');
		$('#loginForm').css('display', 'none');
		//alert('regis');
	}
});

$(".choiceOption").mouseout(function(){
	//$this.css('border-bottom', '')
});


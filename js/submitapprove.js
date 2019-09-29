$(document).ready(function() {
	 $("#myapprovereward").siblings('li').removeClass('active');
	 $("#myapprovereward").addClass('active');


	 $("#btnsubmit").click(function(){
		 var id = $(this).attr('value');
		 var res = $('#sel').val();
		 console.log(res);
		 $.ajax({
			 type:'post',
			 data:{id:id,res:res},
			 url:'../../php/ajax_php/_submitApprove.php',
			 success: function(msg){
			 	console.log('successful');
			 	console.log(msg);
			 	window.alert("提交成功");
				window.location.href="myapprovereward.php";
			 }
		 })
	 })
});

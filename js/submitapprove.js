$(document).ready(function() {
	 $("#myapprovereward").siblings('li').removeClass('active');
	 $("#myapprovereward").addClass('active');
		function closeWindow(){
			var userAgent = navigator.userAgent;
			if (userAgent.indexOf("Firefox") != -1 || userAgent.indexOf("Chrome") !=-1) {
					window.location.href="about:blank";
					window.close();
			} else {
					window.opener = null;
					window.open("", "_self");
					window.close();
			}
		}

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
			 	closeWindow();  
				window.location.href="myapprovereward.php";
			 }
		 })
	 })
});

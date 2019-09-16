$(document).ready(function() {
	 $("#rewardlist").siblings('li').removeClass('active');
	 $("#rewardlist").addClass('active');
	$("#btnsubmit").click(function(){
		var content = $('#content').val();
		document.cookie="student_id=2017212212001";
		var form1 = document.forms[0];
		// $.ajax({
		// 	type:'post',
		// 	data:{content:content},
		// 	url:'../php/ajax_php/_submitReward.php',
		// 	success: function(msg){
		// 		console.log('successful');
		// 		console.log(msg);
		// 		//window.location.reload(true);
		// 	}
		// })

	})
});

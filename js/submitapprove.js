$(document).ready(function() {
	 $("#myapprovereward").siblings('li').removeClass('active');
	 $("#myapprovereward").addClass('active');


	 $("#btnsubmit").click(function(){
		 var id = $('#id').text().split('：')[1];
		 var res = $('#select').val();
		 console.log(id+res);
		 $.ajax({
			 type:'post',
			 data:{id:id,res:res},
			 url:'../php/ajax_php/_submitApprove.php',
			 success: function(msg){
			 	console.log('successful');
			 	console.log(msg);
				 //window.location.reload(true);
			 }
		 })
	 })
});

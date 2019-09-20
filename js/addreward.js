$(document).ready(function() {
	 $("#reward").siblings('li').removeClass('active');
	 $("#reward").addClass('active');
	 
	$("#btn").click(function(e){
		var data = $("#form").serialize();
		var formData = new FormData($("#form")[0]);  
		$.ajax({  
          url: "../ajax_php/_addReward.php",  
          type: 'POST',  
          data: formData,  
          async: false,  
          cache: false,  
          contentType: false,  
          processData: false,  
          success: function(data) {
          	var msg = data.split(':');
          	alert(msg[1]);
          	window.location.reload(true);
          }
     }); 
	})
});
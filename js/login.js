$(document).ready(function() {
	$("#btnlogin").click(function(){
		var da={'account':$("#account").html(),'password':$("#password").html()};
		$.ajax({
			url: '**',
			type : 'POST',
			dataType : 'JSON',
			data : da, 
			success : function(msg) {
				console.log(msg);
				if (msg['isSuccess']) {

				}
				else {

				}	
			},
			error:function() {
				console.log("ERROR");
			}
		});
	});
});
$(document).ready(function() {
	$("#personal").addClass('active');
});

function changePassword($password){
	var newPassword=$("#newPasswordInput").val();
	var initialPassword=$("#initialPasswordInput").val();
	var newPasswordAgain=$("#newPasswordAgainInput").val();
	var myPassword=$password;

	console.log($password);
	var flag=1;
	if(initialPassword!=myPassword){
		window.alert("原密码错误");
		flag=0;
	}

	if(newPassword!=newPasswordAgain){
		window.alert("两次密码输入不同");
		flag=0;
	}


	if(flag){
		$.ajax({
			url:"../ajax_php/changePassword.php",
			type:"post",
			data:JSON.stringify({password:newPassword}),
			contentType:false,
			processData:false,
			success:function(data){
// console.log(data);
window.alert("编辑成功!");
window.location="personal.php";
},
error:function(){
	window.alert("error");
}
});
	}

}
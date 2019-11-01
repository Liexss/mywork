$(document).ready(function() {
	 $("#personal").addClass('active');
});

function changePassword($password){
	var newPassword=$("#newPasswordInput").val();
	var initialPassword=$("#initialPasswordInput").val();
	var newPasswordAgain=$("#newPasswordAgainInput").val();
	var myPassword=$password;

	// console.log($password);
	var flag=1;
	// if(initialPassword!=myPassword){
	// 	window.alert("原密码错误");
	// 	flag=0;
	// }

	if(newPassword!=newPasswordAgain){
		window.alert("两次密码输入不同");
		flag=0;
	}

	var reg2 = new RegExp(/^[\u4e00-\u9fa5]+$/);
	if(!reg2.test(newPassword)&&newPassword.length>=3 && newPassword.length<=10){
		;
	}else{
		window.alert("密码输入格式错误");
		flag=0;
	}


	if(flag){
		newPassword=myEncryption(newPassword);
			initialPassword=myEncryption(initialPassword);
		$.ajax({
			url:"../ajax_php/changePassword.php",
			type:"post",
			data:JSON.stringify({id:$password,initialPassword:initialPassword,password:newPassword}),
			contentType:false,
			processData:false,
			success:function(data){
				// console.log(data);
				if(data.isOk==1){
					window.alert("编辑成功!");
					window.location="personal.php";
				}else
				{
					window.alert("编辑失败!");
					window.location="myPassword.php";
				}
			},
			error:function(){
				window.alert("error");
			}
		});
	}

}
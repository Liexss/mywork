function editUser(){
	var account=$("#account").val();
	var password=$("#password").val();
	var name=$("#name").val();
	var college=$("#college").val();
	var dept=$("#dept").val();
	var Class=$("#Class").val();

	if(account=="")
	{
		$("#accountInput").removeClass("has-success has-feedback");
		$("#accountSpan").removeClass("glyphicon glyphicon-ok");
		$("#accountInput").addClass("has-warning has-feedback");
		$("#accountSpan").addClass("glyphicon glyphicon-warning-sign");
	}else
	{
		$("#accountInput").removeClass("has-error has-feedback");
		$("#accountSpan").removeClass("glyphicon glyphicon-remove");
		$("#accountInput").addClass("has-success has-feedback");
		$("#accountSpan").addClass("glyphicon glyphicon-ok");
	}

	if(password=="")
	{
		$("#passwordInput").removeClass("has-success has-feedback");
		$("#passwordSpan").removeClass("glyphicon glyphicon-ok");
		$("#passwordInput").addClass("has-warning has-feedback");
		$("#passwordSpan").addClass("glyphicon glyphicon-warning-sign");
	}else
	{
		$("#passwordInput").removeClass("has-error has-feedback");
		$("#passwordSpan").removeClass("glyphicon glyphicon-remove");
		$("#passwordInput").addClass("has-success has-feedback");
		$("#passwordSpan").addClass("glyphicon glyphicon-ok");
	}

	if(name=="")
	{
		$("#nameInput").removeClass("has-success has-feedback");
		$("#nameSpan").removeClass("glyphicon glyphicon-ok");
		$("#nameInput").addClass("has-error has-feedback");
		$("#nameSpan").addClass("glyphicon glyphicon-remove");
	}else
	{
		$("#nameInput").removeClass("has-error has-feedback");
		$("#nameSpan").removeClass("glyphicon glyphicon-remove");
		$("#nameInput").addClass("has-success has-feedback");
		$("#nameSpan").addClass("glyphicon glyphicon-ok");
	}

	if(college=="")
	{
		$("#collegeInput").removeClass("has-success has-feedback");
		$("#collegeSpan").removeClass("glyphicon glyphicon-ok");
		$("#collegeInput").addClass("has-error has-feedback");
		$("#collegeSpan").addClass("glyphicon glyphicon-remove");
	}else
	{
		$("#collegeInput").removeClass("has-error has-feedback");
		$("#collegeSpan").removeClass("glyphicon glyphicon-remove");
		$("#collegeInput").addClass("has-success has-feedback");
		$("#collegeSpan").addClass("glyphicon glyphicon-ok");
	}

	if(dept=="")
	{
		$("#deptInput").removeClass("has-success has-feedback");
		$("#deptSpan").removeClass("glyphicon glyphicon-ok");
		$("#deptInput").addClass("has-warning has-feedback");
		$("#deptSpan").addClass("glyphicon glyphicon-warning-sign");
	}else
	{
		$("#deptInput").removeClass("has-warning has-feedback");
		$("#deptSpan").removeClass("glyphicon glyphicon-warning-sign");
		$("#deptInput").addClass("has-success has-feedback");
		$("#deptSpan").addClass("glyphicon glyphicon-ok");
	}

	if(Class=="")
	{
		$("#classInput").removeClass("has-success has-feedback");
		$("#classSpan").removeClass("glyphicon glyphicon-ok");
		$("#classInput").addClass("has-warning has-feedback");
		$("#classSpan").addClass("glyphicon glyphicon-warning-sign");
	}else
	{
		$("#classInput").removeClass("has-warning has-feedback");
		$("#classSpan").removeClass("glyphicon glyphicon-warning-sign");
		$("#classInput").addClass("has-success has-feedback");
		$("#classSpan").addClass("glyphicon glyphicon-ok");
	}

	var choose=window.confirm("是否更改");
	if(choose)
	{
		$.ajax({
			url:"ajax_php/editUser.php",
			type:"post",
			data:JSON.stringify({account:account,password:password,name:name,college:college,dept:dept,class:Class}),
			contentType:false,
			processData:false,
			success:function(data){
				// console.log(data);
				window.alert("编辑成功!");
				window.location="admin_manage.php";
			},
			error:function(){
				window.alert("error");
			}
		});
	}
}

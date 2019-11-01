$("#people").siblings('li').removeClass('active');
$("#people").addClass('active');
function addUser(){
	var account=$("#account").val();
	var password=$("#password").val();
	var name=$("#name").val();
	var Class=$("#Class").val();
	var dept=$("#dept").val();
	var college=$("#college").val();

	var reg = new RegExp(/^[a-zA-Z0-9]+$/u);
	var flag=1;
	if(reg.test(account)&& account.length>=6 && account.length<=16)
	{
		$("#accountInput").removeClass("has-error has-feedback");
		$("#accountSpan").removeClass("glyphicon glyphicon-remove");
		$("#accountInput").addClass("has-success has-feedback");
		$("#accountSpan").addClass("glyphicon glyphicon-ok");
	}else
	{
		flag=0;
		$("#accountInput").removeClass("has-success has-feedback");
		$("#accountSpan").removeClass("glyphicon glyphicon-ok");
		$("#accountInput").addClass("has-error has-feedback");
		$("#accountSpan").addClass("glyphicon glyphicon-remove");
	}

	var reg2 = new RegExp(/^[\u4e00-\u9fa5]+$/);
	if(!reg2.test(password)&&password.length>=3 && password.length<=10)
	{
		$("#passwordInput").removeClass("has-error has-feedback");
		$("#passwordSpan").removeClass("glyphicon glyphicon-remove");
		$("#passwordInput").addClass("has-success has-feedback");
		$("#passwordSpan").addClass("glyphicon glyphicon-ok");
	}else
	{
		flag=0;
		$("#passwordInput").removeClass("has-success has-feedback");
		$("#passwordSpan").removeClass("glyphicon glyphicon-ok");
		$("#passwordInput").addClass("has-error has-feedback");
		$("#passwordSpan").addClass("glyphicon glyphicon-remove");
	}

	if(name=="")
	{
		flag=0;
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

	if(Class==null)
	{
		flag=0;
		$("#classInput").removeClass("has-success has-feedback");
		$("#classSpan").removeClass("glyphicon glyphicon-ok");
		$("#classInput").addClass("has-error has-feedback");
		$("#classSpan").addClass("glyphicon glyphicon-remove");
	}else
	{
		$("#classInput").removeClass("has-error has-feedback");
		$("#classSpan").removeClass("glyphicon glyphicon-remove");
		$("#classInput").addClass("has-success has-feedback");
		$("#classSpan").addClass("glyphicon glyphicon-ok");
	}

	if(dept==null)
	{
		flag=0;
		$("#deptInput").removeClass("has-success has-feedback");
		$("#deptSpan").removeClass("glyphicon glyphicon-ok");
		$("#deptInput").addClass("has-error has-feedback");
		$("#deptSpan").addClass("glyphicon glyphicon-remove");
	}else
	{
		$("#deptInput").removeClass("has-error has-feedback");
		$("#deptSpan").removeClass("glyphicon glyphicon-remove");
		$("#deptInput").addClass("has-success has-feedback");
		$("#deptSpan").addClass("glyphicon glyphicon-ok");
	}

	if(college==null)
	{
		flag=0;
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

	var choose=window.confirm("是否添加");
	if(choose&&flag)
	{

		password = myEncryption(password);
//console.log(password);
//前端加密备用
$.ajax({
	url:"../ajax_php/addUser.php",
	type:"post",
	data:JSON.stringify({account:account,password:password,name:name,class:Class}),
	contentType:false,
	processData:false,
	success:function(data){
		console.log(data);
		window.alert("编辑成功!");
		window.location="admin_manage.php";
	},
	error:function(){
		window.alert("error");
	}
});
}else{
	$("#account").val("");
	$("#password").val("");
	$("#name").val("");
	window.alert("请确认自己的信息");
}
}
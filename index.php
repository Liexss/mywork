<?php session_start();?>

<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>杭师大奖助管理系统</title>
	<link rel="icon" href="image/timg.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="css/frame.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="Login/background.css">

</head>
<body>
	<div class="perspective-text" style="margin-left: 0;">
	    <div class="perspective-line">  
	        <p></p>
	        <p>Rich and strong</p>
	    </div>
	    <div class="perspective-line">
	        <p>Rich and strong</p>
	        <p>Democratic</p>
	    </div>
	    <div class="perspective-line">
	        <p>Democratic</p>
	        <p>Civilization</p>
	    </div>
	    <div class="perspective-line">
	        <p>Civilization</p>
	        <p>Harmonious</p>
	    </div>
	    <div class="perspective-line">
	        <p>Harmonious</p>
	        <p></p>
	    </div>
	</div>

	<div id="login">
	    <form class="form-horizontal">
	        <span class="heading">欢迎登录</span>
	        <div class="form-group">
	            <input class="form-control" id="account" type="text" placeholder="Account" autocomplete="off">
	            <i class="fa fa-user"></i>
	        </div>
	        <div class="form-group help">
	            <input class="form-control" id="password" type="password" placeholder="Password">
	            <i class="fa fa-lock"></i>
	        </div>
	        <div class="form-group">
	            <a id="forgetpass"href="#"><span class="text">Forget Password?</span></a>
	            <button type="button" class="btn btn-default" id="btnlogin" onClick="enter()">登录</button>
	        </div>
	    </form>
	</div>
	
	<!-- <nav class="navbar navbar-fixed-bottom">
	   <p>Copyright @ 2019, Hangzhou Normal University.</p>
	</nav> -->
	
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="jsencrypt-master/bin/jsencrypt.min.js"></script>
    <script src="js/My-Encryption.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="Login/login.js" charset="UTF-8"></script>

    <!-- <script type="text/javascript">
    	var storage = window.localStorage;
    	
    	// window.alert(storage["is_check"]);
		if("true" == storage["is_check"]){
		    $("#checkbox1").attr("checked", true);
		    $("#account").val(storage["account"]);
		    $("#password").val(storage["password"]);
		}else{
			$("#checkbox1").attr("checked", false);
		    $("#account").val("");
		    $("#password").val("");
		}
    </script> -->
</body>

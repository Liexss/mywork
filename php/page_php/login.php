<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>杭师大奖助管理系统</title>

	<!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../../js/bootstrap.min.js"></script>

</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	      <div class="navbar-left">
	        <a class="navbar-brand" href="#">
	        <img id="icon" alt="Brand" src="../image/icon.jpg">
	        </a>
	        <p id="title" class="navbar-brand">杭师大奖助管理系统</p>
	      </div>
	    </div>
  	</div>
	<div class="container" id="login">
	    <div class="row">
	        <div class="col-md-offset-7 col-md-5">
	            <form class="form-horizontal">
	                <span class="heading">欢迎登录</span>
	                <div class="form-group">
	                    <input class="form-control" id="account" type="text" placeholder="Account">
	                    <i class="fa fa-user"></i>
	                </div>
	                <div class="form-group help">
	                    <input class="form-control" id="password" type="password" placeholder="Password">
	                    <i class="fa fa-lock"></i>
	                    <a href="#" class="fa fa-question-circle"></a>
	                </div>
	                <div class="form-group">
	                    <div class="main-checkbox">
	                        <input type="checkbox" value="None" id="checkbox1" name="check"/>
	                        <label for="checkbox1"></label>
	                    </div>
	                    <span class="text">Remember me</span>
	                    <button type="submit" class="btn btn-default" id="btnlogin">登录</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	<footer>
		<p>杭州师范大学</p>
		<p>@2019-07-21</p>
	</footer>
</body>
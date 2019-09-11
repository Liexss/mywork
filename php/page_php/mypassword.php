<!DOCTYPE html>
<html  lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../../css/mypassword.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/mypassword.js"></script>
</head>
<body>
  <?php include("nav.php")?>
  <div id='catalog' class="container">
    <ul class="nav nav-tabs" style="margin-top: 30px;">
      <li role="presentation"><a href="personal.php">基本资料</a></li>
      <li role="presentation" class="active"><a href="mypassword.php">密码设置</a></li>
    </ul>
  </div>
  <div id='mainber' class="container">
      <h4 style="font-weight: bold; display: inline-block;">密码修改</h4>

      <div class="form-group">
        <label for="newPasswordLabel">New password</label>
        <input type="password" class="form-control" id="newPasswordInput" placeholder="请输入新密码">
      </div>

      <div class="form-group">
        <label for="initialPasswordLabel">Initial password</label>
        <input type="password" class="form-control" id="initialPasswordInput" placeholder="请输入原密码">
      </div>

      <div class="form-group">
        <label for="newPasswordAgainLabel">Re-enter password</label>
        <input type="password" class="form-control" id="newPasswordAgainInput" placeholder="请输入再次输入密码">
      </div>
  </div>
</body>
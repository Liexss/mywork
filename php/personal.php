<!DOCTYPE html>
<html  lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../css/personal.css">

</head>
<body>
  <?php include("nav.php")?>
  <div id='catalog' class="container">
    <ul class="nav nav-tabs" style="margin-top: 30px;">
      <li role="presentation" class="active"><a href="personal.php">基本资料</a></li>
      <li role="presentation"><a href="mypassword.php">密码设置</a></li>
    </ul>
  </div>
  <div id='mainber' class="container">
      <h4 style="font-weight: bold; display: inline-block;">个人信息</h4>
      <table id='Info' class="table table-striped">
        <tr>
          <td>账号</td>
        </tr>
        <tr>
          <td>真实姓名</td>
        </tr>
        <tr>
          <td>班级</td>
        </tr>
        <tr>
          <td>学号</td>
        </tr>
        <tr>
          <td>专业</td>
        </tr>
      </table>

      <h4 style="font-weight: bold; display: inline-block;">联系方式</h4>
      <table id='Info' class="table table-striped">
        <tr>
          <td>手机号码</td>
        </tr>
        <tr>
          <td>Email</td>
        </tr>
        <tr>
          <td>通信地址</td>
        </tr>
        <tr>
          <td>邮编</td>
        </tr>
        <tr>
          <td>QQ</td>
        </tr>
      </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/personal.js"></script>
</body>
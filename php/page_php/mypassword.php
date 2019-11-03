<?php 
    session_start();
    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit(); 
    }
    include("../ajax_php/connect.php");
    include("judgeid.php");
    $select="";
    if($_SESSION['type']==1)
        $select = "select * from student where student_id='".$_SESSION['enter_id']."'";
    else
        $select = "select * from teacher where teacher_id='".$_SESSION['enter_id']."'";
    $result = mysqli_query($db,$select);
    $attr=$result->fetch_row();
    $pass=$attr[0];
?>

<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的密码</title>
    <link rel="icon" href="../../image/timg.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../../css/mypassword.css">

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
            <label for="initialPasswordLabel">Initial password</label>
            <input type="password" class="form-control" id="initialPasswordInput" placeholder="请输入原密码" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="newPasswordLabel">New password</label>
            <input type="password" class="form-control" id="newPasswordInput" placeholder="请输入新密码,长度6-10" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="newPasswordAgainLabel">Re-enter password</label>
            <input type="password" class="form-control" id="newPasswordAgainInput" placeholder="请输入再次输入密码" autocomplete="off">
        </div>
        <button type="button" class="btn btn-success" onclick="changePassword(<?php echo "'$pass'"; ?>)" style="margin-bottom: 10px;">更改</button>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../jsencrypt-master/bin/jsencrypt.min.js"></script>
    <script src="../../js/My-Encryption.js" type="text/javascript" charset="utf-8"></script>
      <script src="../../js/mypassword.js"></script>
</body>
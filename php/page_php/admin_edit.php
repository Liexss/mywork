<?php
session_start();
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit();  
}
include("../ajax_php/connect.php");
include("judgeid.php");
if($_SESSION['type']==1){
    @header("http/1.1 404 not found"); 
    @header("status: 404 not found"); 
    header('location:Error404.php');
    exit(); 
  }
$select = "select * from student where student_id=".$_SESSION['enter_id'];

$result = mysqli_query($db,$select);
$attr=$result->fetch_row();

$account=$attr[0];
$password=$attr[1];
$name=$attr[6];
$college=$attr[2];
$dept=$attr[4];
$class=$attr[3];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/admin_edit.css">
</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h2>人员信息编辑</h2>
        <p>查看已有的人员信息; 编辑人员基本信息。</p>
      </div>
  </div>
  <div id="mainber" class="container">
    <div id="lefter">
      <div id="accountInput" class="input-group">
        <span class="input-group-addon">学号<span id="accountSpan"></span></span>
        <?php echo '<input id="account" type="text" class="form-control" value="'.$account.'">' ?>
      </div>

      <div id="passwordInput" class="input-group">
        <span class="input-group-addon">密码<span id="passwordSpan"></span></span>
        <?php echo '<input id="password" type="password" class="form-control" value="'.$password.'">' ?>
      </div>

      <div id="nameInput" class="input-group">
        <span class="input-group-addon">姓名<span id="nameSpan"></span></span>
        <?php echo '<input id="name" type="text" class="form-control" value="'.$name.'">' ?>
      </div>

      <div id="collegeInput" class="input-group">
        <span class="input-group-addon">学院<span id="collegeSpan"></span></span>
        <?php echo '<input id="college" type="text" class="form-control" value="'.$college.'">' ?>
      </div>

      <div id="deptInput" class="input-group">
        <span class="input-group-addon">专业<span id="deptSpan"></span></span>
        <?php echo '<input id="dept" type="text" class="form-control" value="'.$dept.'">' ?>
      </div>

      <div id="classInput" class="input-group">
        <span class="input-group-addon">班级<span id="classSpan"></span></span>
        <?php echo '<input id="Class" type="text" class="form-control" value="'.$class.'">' ?>
      </div>

      <button type="button" class="btn btn-success" onclick="editUser()" style="margin-left: 10px;">更改</button>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <script src="../../js/admin_edit.js"></script>
</body>
</html>

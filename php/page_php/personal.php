<?php 
    session_start();

    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit();
    }

    include("../ajax_php/connect.php");
    include("judgeid.php");
  
?>

<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>杭师大奖助管理系统</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/personal.css">

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
        <?php 
        if($_SESSION['type']==1){
            $select = "select * from student where student_id=".$_SESSION['enter_id'];

            $result = mysqli_query($db,$select);
            $attr=$result->fetch_row();

            $account=$attr[0];
            $password=$attr[1];
            $name=$attr[6];
            $college=$attr[2];
            $dept=$attr[4];
            $class=$attr[3];
        }else{
            $select = "select * from teacher where teacher_id=".$_SESSION['enter_id'];

            $result = mysqli_query($db,$select);
            $attr=$result->fetch_row();

            $account=$attr[0];
            $password=$attr[1];
            $name=$attr[2];
            $college=$attr[3];
        }

        if($_SESSION['type']==1){
            echo "<tr>";
            echo "<td>账号</td>";
            echo "<td>$account</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>真实姓名</td>";
            echo "<td>$name</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>班级</td>";
            echo "<td>$class</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>学院</td>";
            echo "<td>$college</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>专业</td>";
            echo "<td>$dept</td>";
            echo "</tr>";
        }else{
            echo "<tr>";
            echo "<td>账号</td>";
            echo "<td>$account</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>真实姓名</td>";
            echo "<td>$name</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>学院</td>";
            echo "<td>$college</td>";
            echo "</tr>";
        }
        ?>
        
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/personal.js"></script>
</body>
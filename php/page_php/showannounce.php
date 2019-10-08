<?php
  session_start(); 
  if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:../../index.php');
    exit();  
  }
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/showannounce.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../../js/showannounce.js" type="text/javascript"></script>
</head>
<body>

  <?php include("nav.php") ?>
  <div class="container" id="myannounce">
      <ol class="breadcrumb" >
          <li><a href="index.php">公告首页</a></li>
          <li class="active" id="anntitle"></li>
      </ol>
      <div class="page-header" style="background-color: white">
        <h1 id="anntheme">Example page header</h1>
      </div>
      <div class='row'>
        <div class='col-md-3' id="showtime">
        </div>
        <div class='col-md-3' id="showauthor">
        </div>
      </div>
      <div class='row'>
        <div class='col-md-10 col-md-offset-1' id="showedit" style="margin-top: 30px;">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class='col-md-12 col-md-offset-1' id="conensol">
          附件
          <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
          <a id="ensol" style="text-decoration:none;">1111</a>
        </div>
      </div>
  </div>
</body>
</html>
<?php
        $db = db_connection("localhost","root","","money");
        $id=$_GET['id'];
        $sql="select b.theme,a.name,b.content,b.time,b.announce_id,b.enclosure from teacher as a right join announce as b on a.teacher_id=b.user_id where b.announce_id=".$id;
        $result=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
        for($i=0;$i<=5;$i++){
          $row[$i]=$db->real_escape_string($row[$i]);
        }
        echo"<script>";
        // echo"console.log('11".$row[1]."11');";
        if($row[5]==""){
          echo"$('#conensol').hide();";
        }
        else {
          echo"$('#ensol').html('".substr($row[5],30)."');";
          echo"$('#ensol').attr('download','".substr($row[5],30)."');";
          echo"$('#ensol').attr('href','".$row[5]."');";
        }
        echo"$(document).ready(function() {";
        echo"$('#anntitle').html('".$row[0]."');";
        echo"$('#anntheme').html('".$row[0]."');";
        echo"$('#showtime').html('"."Time: ".$row[3]."');";
        echo"$('#showauthor').html('"."Author: ".$row[1]."');";
        echo"$('#showedit').html('".$row[2]."');";
        echo"});";
        echo"</script>";
?>

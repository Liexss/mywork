<?php
session_start(); 
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit(); 
}

include("../ajax_php/connect.php");
include("judgeid.php");
// $id=$_GET['id'];
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
    header('location:index.php?pagenum=1');
    exit(); 
}
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>公告查看</title>
    <link rel="icon" href="../../image/timg.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/showannounce.css">


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../../js/showannounce.js" type="text/javascript"></script>
</head>
<body>

    <?php 
    $id=$_GET['id'];
    $sql="select b.theme,a.name,b.content,b.time,b.announce_id,b.enclosure from teacher as a right join announce as b on a.teacher_id=b.user_id where b.announce_id=".$id." and b.is_post=1";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result) < 1){
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
//include("Error404.php");
        header('location:Error404.php');
        exit(); 
    }
    $row=mysqli_fetch_array($result);
    for($i=0;$i<=5;$i++){
        $row[$i]=$db->real_escape_string($row[$i]);
    }
    include("nav.php");
    ?>

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
            <div class='col-md-10 col-md-offset-1' id="showedit" style="margin-top: 30px;"></div>
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
$id=$_GET['id'];
$sql="select b.theme,a.name,b.content,b.time,b.announce_id,b.enclosure from teacher as a right join announce as b on a.teacher_id=b.user_id where b.announce_id=".$id;

$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result);
for($i=0;$i<=5;$i++){
    $row[$i]=$db->real_escape_string($row[$i]);
}
echo"<script>";

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

<?php
session_start(); 
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit(); 
}

include("../ajax_php/connect.php");
include("judgeid.php");
if(!isset($_GET['id'])||!is_numeric($_GET['id'])){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
    header('location:rewardlist.php?pagenum=1');
    exit(); 
}
?>

<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>奖学金简介</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/showreward.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/showreward.js"></script>
</head>
<body>
    <?php
    $id=$_GET['id'];

//查找申请表信息
    $sql="select * from reward where id=".$id." and is_post=1";
    $res = $db->query($sql);
    $res = $db->query($sql);
    if(mysqli_num_rows($res) < 1){
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        header('location:Error404.php');
        exit(); 
    }
    while ($row = $res->fetch_array() ) {
        $name =  $row['prize_name'];
        $start_time =  $row['start_time'];
        $end_time = $row['end_time'];
        $money = $row['money'];
        $content = $row['content'];
        $address = $row['address'];
        $id = $row['id'];
    }

    $sql="select a.name from teacher as a left join reward as b on a.teacher_id=b.teacher_id where b.id=".$id." and b.is_post=1";
    $res = $db->query($sql);
    while ($row = $res->fetch_array() ) {
        $people =  $row['name'];
    }   

    include("nav.php");
    ?>

    <div class="container" style="margin-top: 50px;" id="showmain">
        <div class="page-header">
            <div class="container">
                <h2><?php echo $name ?></h2>
                <!-- <p>管理人员基本信息; 操作包含编辑、删除; 切换页面以显示相关信息。</p> -->
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a id="showrewarli" href="showreward.php">奖学金简介</a></li>
            <li role="presentation"><a id="submitrewardli" href="submitreward.php">我要申请</a></li>
        </ul>

        <div class="panel panel-default" style="margin-top: 50px;">

            <div class="panel-body">
                <div class="showitem">
                    <h4>简介：<?php echo $content ?></h4>
                </div>

                <br>

                <div class="showitem">
                    <h4>奖项编号：<?php echo $id ?></h4>
                </div>

                <br>

                <div class="showitem">
                    <h4>申请时间：<?php echo $start_time."~".$end_time ?></h4>
                </div>

                <br>

                <div class="showitem">
                    <h4>奖励金额：<?php echo $money ?></h4>
                </div>

                <br>

                <div class="showitem">
                    <h4>审批人：<?php echo $people ?></h4>
                </div>

                <br>

                <div class="showitem" id="worditem">
                    <h4>详细资料：<a id="ensol">奖学金文件</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php 
echo"<script>";
// echo"console.log('11".$row[1]."11');";
if($address==""){
    echo"$('#worditem').hide();";
}
else {
    echo"$('#ensol').html('".substr($address,30)."');";
    echo"$('#ensol').attr('download','".substr($address,30)."');";
    echo"$('#ensol').attr('href','".$address."');";
}
echo"$('#showrewarli').attr('href','showreward.php?id=".$id."');";
echo"$('#submitrewardli').attr('href','submitreward.php?id=".$id."');";
echo"$('#submitrewardli').click(function(){";
date_default_timezone_set('PRC'); 
$showTime =  date("Y-m-d H:i:s");

if($end_time <$showTime){
    echo" event.preventDefault();";
    echo" alert('已结束，无法申请');";
}
else if($start_time>$showTime){
    echo" event.preventDefault();";
    echo" alert('未开始，无法申请');";
}
echo"});";
echo"</script>";
?>
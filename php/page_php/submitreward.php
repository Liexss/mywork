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
  
    date_default_timezone_set('PRC'); 
    $showTime =  date("Y-m-d H:i:s");
    $id=$_GET['id'];
    
    //查找申请表信息
    $sql="select * from reward where id=".$id." and is_post=1";
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
    }

    if($end_time <$showTime||$start_time>$showTime){
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        header('location:Error404.php');
        exit(); 
    }
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>杭师大奖助管理系统</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/submitreward.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/submitreward.js"></script>
</head>
<body>
    <?php
        include("nav.php");
    ?>
  
    <div class="container" style="margin-top: 50px;" id="submitmain">
        <div class="page-header">
            <div class="container">
                <h2><?php echo $name ?></h2>
                <!-- <p>管理人员基本信息; 操作包含编辑、删除; 切换页面以显示相关信息。</p> -->
            </div>
        </div>
        
        <ul class="nav nav-tabs" id="rewardid" >
            <li role="presentation"><a id="showrewarli" href="showreward.php">奖学金简介</a></li>
            <li role="presentation" class="active"><a id="submitrewardli" href="submitreward.php">我要申请</a></li>
        </ul>

        <!-- <div class="row" id="addsubmit"> -->
            <!-- <div class="row">
                <div class ="col-md-6" style="padding-left: 2.5%;">
                    <div class="input-group" style="margin-top: 30px; ">
                    <span class="input-group-addon" id="basic-addon1">姓名</span>
                    <input type="text" class="form-control" name="Username" id="Username">
                    </div>
                </div>
          
                <div class ="col-md-6" style="padding-right: 2.5%;">
                    <div class="input-group" style="margin-top: 30px;">
                    <span class="input-group-addon" id="basic-addon1">学院</span>
                    <input type="text" class="form-control" name="Username" id="Username">
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class ="col-md-6" style="padding-left: 2.5%;">
                    <div class="input-group" style="margin-top: 30px;">
                    <span class="input-group-addon" id="basic-addon1">专业</span>
                    <input type="text" class="form-control" name="Username" id="Username">
                    </div>
                </div>
          
                <div class ="col-md-6" style="padding-right: 2.5%;">
                    <div class="input-group" style="margin-top: 30px;">
                    <span class="input-group-addon" id="basic-addon1">班级</span>
                    <input type="text" class="form-control" name="Username" id="Username">
                </div>
            </div> -->
        <!-- </div> -->

        <div class="row" style="margin-top: 10px;padding-right: 1.5%;padding-left: 1.5%;">
            <div class ="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" placeholder="概要" rows="3" style="resize: none; height: 200px;" id='content' name='content'></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="padding-left: 2.5%;">
                <div class="form-group">
                    <label for="exampleInputFile">资料上传</label>
                    <input type="file" id="file" name='file'>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
               <button type="submit" class="btn btn-default" name="btnsubmit" id="btnsubmit" value=<?php echo $id ?>>提交申请</button>
            </div>
        </div>
    </div>

</body>
<?php 
    $id=$_GET['id'];
    echo"<script>";
    echo"$('#showrewarli').attr('href','showreward.php?id=".$id."');";
    echo"$('#submitrewardli').attr('href','submitreward.php?id=".$id."');";
    echo"</script>";
?>
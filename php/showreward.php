<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <!-- Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../css/showreward.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
  <?php include("nav.php")?>
<?php
    include("nav.php");
    include("./ajax_php/connect.php");
       $id=$_COOKIE["prize_id"];
       //查找申请表信息
       $sql="select * from reward where id=".$id;
       $res = $db->query($sql);
       while ($row = $res->fetch_array() ) {
           $name =  $row['prize_name'];
           $start_time =  $row['start_time'];
           $end_time = $row['end_time'];
           $money = $row['money'];
           $content = $row['content'];
           $address = $row['address'];
       }


  ?>
  <div class="container" style="margin-top: 50px;" id="showmain">
    <div class="page-header">
      <div class="container">
        <h2><?php echo $name ?></h2>
        <!-- <p>管理人员基本信息; 操作包含编辑、删除; 切换页面以显示相关信息。</p> -->
      </div>
    </div>
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="showreward.php">奖学金简介</a></li>
      <li role="presentation"><a href="submitreward.php">我要申请</a></li>
    </ul>
    <div class="panel panel-default" style="margin-top: 50px;">
      <div class="panel-body">
        <div class="showitem">
          <h4>简介：<?php echo $content ?></h4>
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
          <h4>详细资料：<a href=<?php echo $address ?>>奖学金文件</a></h4>
          </div>
      </div>
    </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/showreward.js"></script>
</body>

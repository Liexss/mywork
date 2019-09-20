
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/submitreward.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/submitreward.js"></script>
</head>
<body>
  <?php include("nav.php");
  ?>

  <div class="container" style="margin-top: 50px;" id="submitmain">
    <div class="page-header">
      <div class="container">
        <h2>一等奖学金</h2>
        <!-- <p>管理人员基本信息; 操作包含编辑、删除; 切换页面以显示相关信息。</p> -->
      </div>
   </div>
    <ul class="nav nav-tabs">
      <li role="presentation"><a href="showreward.php">奖学金简介</a></li>
      <li role="presentation" class="active"><a href="submitreward.php">我要申请</a></li>
    </ul>
    <div class="row" id="addsubmit" style="text-align:center;min-height:200px;padding-top:100px">
<?php
$content = $_POST["content"];
$student_id = $_COOKIE['student_id'];
$name = $_COOKIE['prize_name'];
if ($_FILES["file"]["type"] == "application/zip"){
  if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else{
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//    echo "Type: " . $_FILES["file"]["type"] . "<br />";
//    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    /*文件是否存在的判断*/
    $fname = iconv('utf-8', 'gb2312//ignore', $_FILES["file"]["name"]);
    if (file_exists("../../file/" . $fname))
      {
      /*若文件存在，输出存在提示*/
      echo "申请失败，文件名已存在";
      }
    else
      {
      /*若不存在，文件移动到指定位置*/
      include '../ajax_php/connect.php';
      $sql = "insert into reward_apply (student_id,submit_time,content,file_name,address) values ('".$student_id."','".date("Y-m-d h:i:s")."','".$content."','".$name."','../../file/" . $fname."')";
      $result  = $db->query($sql);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../file/" . $fname);
      echo "申请成功";
      }
    }
  }
else
  {
  /*输出文件类型或大小不合法的提示*/
  echo "申请失败，请上传zip格式的压缩包";
  }
?>
<div class="row">
          <div class="col-md-2 col-md-offset-10" style='padding-top:140px'>
             <a href='./submitreward.php'><button type="button" class="btn btn-default" name="btnsubmit" id="btnsubmit">返回</button></a>
          </div>
        </div>
    </div>

  </div>

</body>

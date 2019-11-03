<?php
session_start();
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
  header('location:exit.php');
  exit(); 
}
include("../ajax_php/connect.php");
include("judgeid.php");
$content=$_GET['content'];
$content=$db->real_escape_string(urldecode($content));
$pagenum=$_GET['pagenum'];  
$sql = "select count(*) from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 and (b.theme "."like '%".$content."%' or a.name "."like '%".$content."%') order by time desc";
$res = $db->query($sql);
// echo $res;
while ($row = $res->fetch_array() ) {
  $total = $row[0];
}
$totnumpage= ($total+12)/13;

if((!isset($_GET['content']))||$content==""||(!isset($_GET['pagenum']))||!is_numeric($_GET['pagenum'])||$totnumpage<$pagenum&&$totnumpage>1||$pagenum<=0){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
  header('location:index.php?pagenum=1');
  exit();  
}
// $content=urldecode($_GET['content']);
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>查询公告</title>
  <link rel="icon" href="../../image/timg.jpg" type="image/x-icon">
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
  <link  href="../../css/searchannounce.css" rel="stylesheet"> 
  <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="../../js/searchannounce.js" type="text/javascript"></script>
  <!-- <link rel="stylesheet" type="text/css" href="../../css/rewardlist.css"> -->
</head>
<body>
  <?php include("nav.php"); ?>
  <div class="container" id="myannounce" value=<?php echo $content?>>
    <ol class="breadcrumb" >
      <li><a href="index.php">公告首页</a></li>
      <li class="active">查询结果</li>
    </ol>
    <div class="row">
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">公告列表</h3>
        </div>
        <ul class="list-group">
          <li class='list-group-item'>
            <div class='row'>
              <div class='col-md-2'>
                <p>标题：</p>
              </div>
              <div class='col-md-2 col-md-offset-4'>
                <p>时间：</p>
              </div>
              <div class='col-md-1'>
                <p>发布者：</p>
              </div>
            </div>
          </li>
          <?php
          $sql = "select count(*) from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 and (b.theme "."like '%".$content."%' or a.name "."like '%".$content."%') order by time desc";
          $res = $db->query($sql);
// echo $res;
          while ($row = $res->fetch_array() ) {
            $total = $row[0];
          }
          $forward=(number_format($pagenum)-1)*13;
          $sql = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 and (b.theme "."like '%".$content."%' or a.name "."like '%".$content."%') order by time desc limit ".$forward.","."13";
          $result = $db->query($sql);
          if($result){
            while($row=$result->fetch_row()){
              echo"<li class='list-group-item'>";
              echo" <div class='row'>";
              echo"<div class='col-md-2'>";
              echo"<a target='_blank' style='text-decoration: none;' href='showannounce.php?id={$row[3]}'>{$row[0]}</a>";
              echo"</div>";
              echo"<div class='col-md-2 col-md-offset-4'>";
              echo"<p>{$row[2]}</p>";
              echo"</div>";
              echo"<div class='col-md-1'>";
              echo"<p>{$row[1]}</p>";
              echo"</div>";
              if($_SESSION['type']==1)
              {
                echo"<div class='col-md-1'>";
                echo"<a target='_blank' style='text-decoration: none;' href='resetannounce.php?id={$row[3]}' id='{$row[3]}' href='#' >编辑</a>";
                echo"</div>";
                echo"<div class='col-md-1'>";
                echo"<a style='text-decoration: none;' class='deleteann' id='{$row[3]}' href='#'>删除</a>";
                echo"</div>";
              }
              echo"</div>";
              echo"</li>";
            }
          }
          ?>  

        </ul>
        <div id='page'></div>
      </div>
    </div>

  </div>
  <script src="../../js/xlPaging.js"></script>
  <script>
    function urlencode (str) {  
      str = (str + '').toString();   
      return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').  
      replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
    }
    var now = <?php  echo $pagenum; ?>;
    now = parseInt(now);
    var content=<?php echo "'".$content."'"; ?>.toString();
    $("#page").paging({
      nowPage: now,
      pageNum: parseInt(<?php echo ($total+12)/13 ?>),
      buttonNum: 5,
      callback: function (num) {
        window.location.href="./searchannounce.php?content="+urlencode(content.toString()).toString()+"&pagenum="+num.toString();
      }
    });
  </script>
</body>
</html>

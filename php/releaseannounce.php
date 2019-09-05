
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
    <link rel="stylesheet" href="../css/editor.css" type="text/css">
    <link rel="stylesheet" href="../css/releaseannounce.css" type="text/css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h1>我的申请</h1>
        <p>你可以在这里查看历史申请状态</p>
      </div>
  </div>
  <div class="container" id="myannounce">
    <ol class="breadcrumb" >
        <li><a href="index.php">公告首页</a></li>
        <li class="active">发布公告</li>
    </ol>
    <input type='text' id="anntitle" class='form-control' placeholder='请输入标题' style="height: 34px;">
    <div class="row">
      <form id="form1" method="post" enctype="multipart/form-data">
        <div class="col-md-12">
          <div class="container">
            <?php include("edittext.php");?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-md-offset-1" style="margin-top: 30px;">
              上传附件：
              <input type="file" name="file" id="file" />
          </div>
        <div class="col-md-1 col-md-offset-10">
          <button type="button" class="btn btn-default" id="annconbtn">确认发布</button>
        </div>
      </form>
    </div>
  </div>
  <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/releaseannounce.js" type="text/javascript"></script>
  <script src="../js/jquery.hotkeys.js"></script>
  <script src="../js/bootstrap-wysiwyg.js" type="text/javascript"></script>
  <script src="../js/edittext.js"></script>
</body>
</html>

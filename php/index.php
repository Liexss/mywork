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
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h1>Volunteer Management System</h1>
        <p>你可以在这个网站管理公告，人员，发送邮件</p>
      </div>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div class="form-inline">
              <button type="button" class="btn btn-default" id="releasebtn">发布公告</button>

          </div>
        </div>

        <div class="col-md-10">
          <div class="form-inline">
            <div class="col-md-3 col-md-offset-5" id="searchoose">
            </div>
            <input type="text" class="form-control" id="searchann" placeholder="输入关键字">
            <button type="button" class="btn btn-success" id="searchbtn">search</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="panel" style="margin-top: 20px;">
          <div class="panel-heading">
            <h3 class="panel-title">公告列表</h3>
          </div>
          <br>
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
            <li class="list-group-item" style="padding:0;">
              <div class="footer">
                <nav aria-label="Page navigation" style="text-align: center">
                  <ul class="pagination">
                  
                  </ul>
                </nav>
              </div>
            </li>

          </ul>
      </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
</body>
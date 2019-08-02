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
  <div class="container">
      <div class="row">
        <div class="col-md-2">
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
        <div class="col-md-6">
          <div class="panel panel-primary" style="margin-top: 20px;">
            <div class="panel-heading">
              <h3 class="panel-title">奖助名单公示</h3>
            </div>
            <ul class="list-group">
              <li class='list-group-item'>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-primary" style="margin-top: 20px;">
            <div class="panel-heading">
              <h3 class="panel-title">申报通知</h3>
            </div>
            <ul class="list-group">
              <li class='list-group-item'>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary" style="margin-top: 20px;">
            <div class="panel-heading">
              <h3 class="panel-title">公告列表</h3>
            </div>
            <ul class="list-group">
              <li class='list-group-item'>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <footer>
    <p>杭州师范大学</p>
    <p>@2019-07-21</p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
</body>
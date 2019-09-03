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
  <link rel="stylesheet" type="text/css" href="../css/rewardlist.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h1>奖学金列表</h1>
        <p>你可以在这里选择奖学金，查看或申请</p>
      </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="form-inline">
            <div class="col-md-3 col-md-offset-5" id="searchoose">
            </div>
            <input type="text" class="form-control" id="searchann" placeholder="输入关键字">
            <button type="button" class="btn btn-success" id="searchbtn">search</button>
          </div>
        </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <ol class="rewardol">
          <li class="item">
            <div class="row">
              <div class="col-md-9 col-md-offset-1" class="pgroup">
                <span>学业优秀奖</span>
                <p>2019-7-21 18:21</p>
              </div>
              <div class="col-md-2">
                <a href="showreward.php"><button type="button" class="btn">申请</button></a>
              </div>
            </div>
          </li>
          <li class="item">
            <div class="row">
              <div class="col-md-9 col-md-offset-1">
                <span>优秀奖学金</span>
                <p>2019-7-21 18:21</p>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn">申请</button>
              </div>
            </div>
          </li>
          <li class="item">
            <div class="row">
              <div class="col-md-9 col-md-offset-1">
                <span>优秀奖学金</span>
                <p>2019-7-21 18:21</p>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn">申请</button>
              </div>
            </div>
          </li>
        </ol>
        <li class="list-group-item" style="padding:0;">
              <div class="footer">
                <nav aria-label="Page navigation" style="text-align: center">
                  <ul class="pagination">
                   
                  </ul>
                </nav>
              </div>
        </li>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/rewardlist.js"></script>
</body>

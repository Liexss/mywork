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
  <link rel="stylesheet" type="text/css" href="../../css/rewardlist.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="../../js/rewardlist.js"></script>
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
      <div class="panel-body ">
      <table class="table table-striped" id='datatable'>
                    <thead>
                      <tr>
                        <th>奖助分类</th>

                      </tr>
                    </thead>
                    <tbody class="rewardol">
                    <?php
                      include("../ajax_php/connect.php");
                      $sql="select * from reward_apply";
                      $res = $db->query($sql);
                      while ($row = $res->fetch_array() ) {
                      echo '<tr class="item">';
                       echo '<td class="row">';
                        echo  '<div class="col-md-9 col-md-offset-1">';
                         echo  '  <span>优秀奖学金</span>';
                          echo  '<p>2019-7-21 18:21</p>';
                         echo ' </div>';
                         echo '<div class="col-md-2">';
                         echo '  <button type="button" class="btn">申请</button>';
                         echo ' </div>';
                        echo '</td>';
                        echo '</tr>';
                      }
                    ?>
                    </tbody>
                  </table>


                </nav>
              </div>
        </li>
      </div>
    </div>
  </div>


</body>

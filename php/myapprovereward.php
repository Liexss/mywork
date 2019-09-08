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
  <link rel="stylesheet" type="text/css" href="../css/myapprovereward.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h1>我的审批</h1>
        <p>你可以在这里查看并审批学生的申报</p>
      </div>
  </div>
  <div class="container" id="myapproverewardmain">
    <div class="table-responsive" style="margin-top:50px;">
            <table class="table table-striped" id='datatable'>
              <thead>
                <tr>
                  <th>申报编号</th>
                  <th>申报奖项</th>
                  <th>申报时间</th>
                  <th>审批状态</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php

                include("./ajax_php/connect.php");
                $sql="select * from reward_apply";
                $res = $db->query($sql);
                while ($row = $res->fetch_array() ) {
                    echo "<tr>";
                        echo "<td>" . $row["prize_id"] . "</td>";
                        echo "<td>" . $row["file_name"] . "</td>";
                        echo "<td>" . $row["submit_time"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td><a href='submitapprove.php'>查看</a></td>";
                         echo "</tr>";
                    echo `<tr>
                            <td>${row["prize_id"]}</td>
                            <td>二等奖学金</td>
                            <td>2019/08/03</td>
                            <td>待审批</td>

                          </tr>`;
                }
              ?>
              </tbody>
            </table>
          </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="../js/myapprovereward.js"></script>
</body>]

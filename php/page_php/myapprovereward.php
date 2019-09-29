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
  <link rel="stylesheet" type="text/css" href="../../css/myapprovereward.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="../../js/myapprovereward.js"></script>
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
                  <!-- <th>奖项编号</th> -->
                  <th>申报时间</th>
                  <th>审批状态</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php
                $teacher_id="20181211";
                include("../ajax_php/connect.php");
                $sql="select a.prize_name,a.id,b.id,b.submit_time,b.state,b.end_time from reward a,reward_apply b,teacher c where a.id=b.prize_id and a.teacher_id=c.teacher_id and c.teacher_id=".$teacher_id;
                $res = $db->query($sql);
                while ($row = $res->fetch_array() ) {
                    echo "<tr>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[0] . "</td>";
                        // echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td style='"."padding-left:20px;"."'>" . $row[4] . "</td>";
                        //将申请编号传入url
                        echo "<td><a href='submitapprove.php?id=".$row[2]."'>查看</a></td>";
                        echo "</tr>";
                }
              ?>
              </tbody>
            </table>
          </div>
  </div>
</body>

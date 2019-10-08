<?php
  session_start();
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="../../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/rewardlist.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body>
  <?php
    include("nav.php");

  ?>
  <div class="jumbotron">
      <div class="container">
        <h2>奖学金列表</h2>
        <p>你可以在这里选择奖学金，查看或申请</p>
      </div>
  </div>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <ol class="rewardol">
        <?php
            
            //echo $showTime;
            $sql="select count(*) from reward where is_post=1";
            $res = $db->query($sql);
             while ($row = $res->fetch_array() ) {
                $total = $row[0];

             }

             $forward=(number_format($_SERVER["QUERY_STRING"])-1)*5;
             $backward = $forward+4;
             if($backward>$total)
                $backward = $total;
            $sql="select * from reward where is_post=1 order by start_time desc limit ".$forward.",".$backward;
            $res = $db->query($sql);
            while ($row = $res->fetch_array() ) {

              $name = $row["prize_name"];
              echo '<li class="item">';
              echo '<div class="row">';
              echo '<div class="col-md-9 col-md-offset-1" class="group">';
              echo "<span>".$row["prize_name"]. "</span>";
              echo '<p>奖项编号：'.$row['id'].' </p>';
              echo '<p>开始时间：'.$row['start_time'].' </p>';
              echo '<p>结束时间：'.$row['end_time'].'</p></div>';
              echo ' <div class="col-md-2">';
              if($_SESSION['type']==2){
                echo '<a id="delebtn"><button type="button" class="btn btn-danger delete" id='.$row['id'].'>删除</button></a>';
              }
              echo '<a target="_blank" href="showreward.php?id='.$row['id'].'"><button type="button" class="btn" id='.$row['id'].'>申请</button></a>';
              echo '</div></div></li>';
            }
        ?>
        </ol>
       <div id='page'></div>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/rewardlist.js"></script>
    <script src="../../js/xlPaging.js"></script>
    <script>
        var now = window.location.search.substring(1);
        now = parseInt(now);
        $("#page").paging({
            nowPage: now,
            pageNum: parseInt(<?php echo ($total+4)/5 ?>),
            buttonNum: 5,
            callback: function (num) {
                window.location.href="./rewardlist.php?"+num.toString();
            }
        });
       $(".btn").click(function(e){
       	    var id = $(this).attr("id");
             document.cookie="prize_id="+id.toString();
             document.cookie="student_id=2017212212001";
             document.cookie="prize_name="+<?php echo "'".$name."'" ?>;

         })
    </script>
</body>

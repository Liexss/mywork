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
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/rewardlist.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/xlPaging.js"></script>
  <script>
        var now = window.location.search.substring(1);
        now = parseInt(now);
        $("#page").paging({
            nowPage: now,
            pageNum: <?php echo ($total+4)/5 ?>,
            buttonNum: 5,
            callback: function (num) {
                window.location.href="rewardlist.php?"+num.toString();
            }
        });
       $(".btn").click(function(e){
            var id = $(this).attr("id");
             document.cookie="prize_id="+id.toString();
             document.cookie="prize_name="+<?php echo "'".$name."'" ?>;
             console.log("prize_id="+id.toString());

         })
  </script>
</head>
<body>
  <?php
    include("nav.php");

  ?>
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
        <?php
            include("../ajax_php/connect.php");

            $sql="select count(*) from reward where is_post=1";
            $res = $db->query($sql);
             while ($row = $res->fetch_array() ) {
                $total = $row[0];

             }

             $forward=(number_format($_SERVER["QUERY_STRING"])-1)*5;
             $backward = $forward+4;
             if($backward>$total)
                $backward = $total;
            $sql="select * from reward where is_post=1 limit ".$forward.",".$backward;
            $res = $db->query($sql);
            while ($row = $res->fetch_array() ) {
            $name = $row["prize_name"];
                    echo '<li class="item">';
                    echo '<div class="row">';
                    echo '<div class="col-md-9 col-md-offset-1" class="group">';
                    echo "<span>" .$row["prize_name"]. "</span>";
                    echo '<p>'.$row['start_time'].' ~ '.$row['end_time'].'</p></div>';
                    echo ' <div class="col-md-2">';
                    echo '<a href="showreward.php?'.$row['id'].'"><button type="button" class="btn" id='.$row['id'].'>申请</button></a>';
                    echo '</div></div></li>';
            }
        ?>
        </ol>
       <div id='page'></div>
      </div>
    </div>
  </div>
  
</body>

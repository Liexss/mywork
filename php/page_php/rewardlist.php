<?php
    session_start();
    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit(); 
    }
    include("../ajax_php/connect.php");
    include("judgeid.php");
    $pagenum=$_GET['pagenum'];
    if(!isset($_GET['pagenum'])){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
        header('location:rewardlist.php?pagenum=1');
        exit(); 
    }
?>

<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>杭师大奖助管理系统</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

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
            
                $sql="select count(*) from reward where is_post=1";
                $res = $db->query($sql);
                while ($row = $res->fetch_array() ) {
                    $total = $row[0];
                }

                $forward=(number_format($pagenum)-1)*5;
                $sql="select * from reward where is_post=1 order by start_time desc limit ".$forward.","."5";
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
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/rewardlist.js"></script>
    <script src="../../js/xlPaging.js"></script>
    <script>
        var now = <?php echo $pagenum;?>;
        now = parseInt(now);
        $("#page").paging({
            nowPage: now,
            pageNum: parseInt(<?php echo ($total+4)/5 ?>),
            buttonNum: 5,
            callback: function (num) {
                window.location.href="./rewardlist.php?pagenum="+num.toString();
            }
        });

    </script>
</body>
</html>
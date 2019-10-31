<?php
    session_start();

    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit();
    }

    include("../ajax_php/connect.php");
    include("judgeid.php");
    $pagenum=$_GET['pagenum'];
    if(!isset($_GET['pagenum'])||$_GET['pagenum']==NULL||!is_numeric($_GET['pagenum'])){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
        header('location:index.php?pagenum=1');
        ob_end_flush();
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
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/index.css">
  
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/index.js"></script>
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
            </div>

            <div class="col-md-10 form-inline">
                <div class="col-md-3 col-md-offset-5"></div>
                
                <input type="text" class="form-control" id="searchann" placeholder="输入关键字">
                <button type="button" class="btn btn-success" id="searchbtn">search</button>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;" id="announcemain">
            <div class="panel">

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
                <?php
                    $sql = "select count(*) from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 order by time desc";
                    $res = $db->query($sql);
                    // echo $res;
                    while ($row = $res->fetch_array() ) {
                        $total = $row[0];
                    }
                    $totnumpage= ($total+12)/13;
                    echo $totnumpage;
                    echo $pagenum;
                    if($totnumpage<$pagenum||$pagenum<=0){
                        header('location:index.php?pagenum=1');
                        exit(); 
                    }
                    $forward=(number_format($pagenum)-1)*13;
                    $sql = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 order by time desc limit ".$forward.","."13";
                    $result = $db->query($sql);
                    if($result){
                        while($row=$result->fetch_row()){
                            echo"<li class='list-group-item'>";
                            echo" <div class='row'>";
                            echo"<div class='col-md-2'>";
                            echo"<a target='_blank' style='text-decoration: none;' href='showannounce.php?id={$row[3]}'>{$row[0]}</a>";
                            echo"</div>";
                            echo"<div class='col-md-2 col-md-offset-4'>";
                            echo"<p>{$row[2]}</p>";
                            echo"</div>";
                            echo"<div class='col-md-1'>";
                            echo"<p>{$row[1]}</p>";
                            echo"</div>";

                            if($_SESSION['type']==2)
                            {
                                echo"<div class='col-md-1'>";
                                echo"<a target='_blank' style='text-decoration: none;' href='resetannounce.php?id={$row[3]}' id='{$row[3]}' href='#' >编辑</a>";
                                echo"</div>";

                                echo"<div class='col-md-1'>";
                                echo"<a style='text-decoration: none;' class='deleteann' id='{$row[3]}' href='#'>删除</a>";
                                echo"</div>";
                            }
                            echo"</div>";
                            echo"</li>";
                        }
                    }
                ?>  

                </ul>
                <div id='page'></div>
            </div>
      </div>
    </div>
    <script src="../../js/xlPaging.js"></script>
    <script>
        var now = <?php echo $pagenum;?>;
        now = parseInt(now);
        $("#page").paging({
            nowPage: now,
            pageNum: parseInt(<?php echo ($total+12)/13 ?>),
            buttonNum: 5,
            callback: function (num) {
                window.location.href="./index.php?pagenum="+num.toString();
            }
        });

    </script>
</body>
</html>

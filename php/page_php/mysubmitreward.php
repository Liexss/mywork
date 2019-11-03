<?php
session_start(); 
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit();
}

include("../ajax_php/connect.php");
include("judgeid.php");
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的申请</title>
    <link rel="icon" href="../../image/timg.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">


    <link rel="stylesheet" type="text/css" href="../../css/mysubmitreward.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="../../js/mysubmitreward.js"></script>
</head>
<body>
    <?php include("nav.php")?>
    <div class="jumbotron">
        <div class="container">
            <h1>我的申请</h1>
            <p>你可以在这里查看历史申请状态</p>
        </div>
    </div>

    <div class="container" id="mysubmitrewardmain">
        <div class="table-responsive" style="margin-top:50px;">
            <table class="table table-striped" id='datatable'>
                <thead>
                    <tr>
                        <th>申报编号</th>
                        <th>申报奖项</th>
                        <th>申报时间</th>
                        <th>审批状态</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $sql="select a.prize_name,a.id,b.id,b.submit_time,b.state,b.end_time from reward a,reward_apply b,teacher c where a.id=b.prize_id and a.teacher_id=c.teacher_id and b.is_post=1 and b.student_id='".$_SESSION['enter_id']."'";
                    //echo $sql;
                    $res = $db->query($sql);
                    while ($row = $res->fetch_array() ) {
                        echo "<tr>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[0] . "</td>";
// echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td style='"."padding-left:20px;"."'>" . $row[4] . "</td>";
//将申请编号传入url
                        echo "<td><a target='_blank' href='submitsituation.php?id=".$row[2]."'><span class='glyphicon glyphicon-search' aria-hidden='true'></span></a></td>";
                        //echo $row[2];
                        if($row[4]==="待审批")
                            echo "<td><a href='#' id='deleteid' name=".$row[2].">撤回</a></td>";
                        else 
                            echo "<td></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php session_start(); 
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit(); 
}

include("../ajax_php/connect.php");
include("judgeid.php");

if($_SESSION['type']==1){
    @header("http/1.1 404 not found"); 
    @header("status: 404 not found"); 
    header('location:Error404.php');
    exit(); 
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>人员添加</title>
    <link rel="icon" href="../../image/timg.jpg" type="image/x-icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/admin_add.css">

    <script type="text/javascript">
        function changeCollege(){
            var college=$("#college").val();

            $.ajax({
                url:"../ajax_php/changeCollege.php",
                type:"post",
                data:JSON.stringify({college:college}),
                contentType:false,
                processData:false,
                success:function(data){
                    $("#dept").empty();
                    $(data).each(function(i,values){
                        $("#dept").append(
                "<option value='"+values.dept_id+"'>"+values.dept_name+"</option>"
                            );
                    });
                    changeDept();
                    //console.log(data);
                },
                error:function(data){
    var json =  JSON.stringify(data);

    console.log(json);
    window.alert("Error");
}
            });
        }     

        function changeDept(){
            var dept=$("#dept").val();

            $.ajax({
                url:"../ajax_php/changeDept.php",
                type:"post",
                data:JSON.stringify({dept:dept}),
                contentType:false,
                processData:false,
                success:function(data){
                    $("#Class").empty();
                    $(data).each(function(i,values){
                        $("#Class").append(
                "<option value='"+values.class_id+"'>"+values.class_name+"</option>"
                            );
                    });
                },
                error:function(){
                    window.alert("error");
                }
            });
        }    
    </script>
</head>
<body>
    <?php include("nav.php");?>
    <div class="jumbotron">
        <div class="container">
            <h2>人员信息添加</h2>
            <p>填写人员基本信息; 上传并保留头像; 添加相关人员信息。</p>
        </div>
    </div>

    <div id="mainber" class="container">
        <div id="lefter">
            <div id="accountInput" class="input-group">
                <span class="input-group-addon">学号<span id="accountSpan"></span></span>
                <input id="account" type="text" class="form-control" placeholder="只包含数字和字母 长度6-16">
            </div>

            <div id="passwordInput" class="input-group">
                <span class="input-group-addon">密码<span id="passwordSpan"></span></span>
                <input id="password" type="password" class="form-control" placeholder="长度3-10">
            </div>

            <div id="nameInput" class="input-group">
                <span class="input-group-addon">姓名<span id="nameSpan"></span></span>
                <input id="name" type="text" class="form-control" placeholder="非空">
            </div>

            <div id="collegeInput" class="input-group">
                <span class="input-group-addon">学院<span id="collegeSpan"></span></span>
                <select class="form-control" id="college" onchange="changeCollege()">
                    <?php

                    $sql="select * from college where college_id="."1";
                    $res = mysqli_query($db,$sql);
                    $attr=$res->fetch_array();
                    $name=$attr[1];

                    $sql="select * from college";
                    $res = mysqli_query($db,$sql);


                    echo"<option value='"."1"."'>".$name."</option>";
                    while ($row=$res->fetch_array()) {
                        if($row['college_id']==1)
                            continue;
                        echo"<option value='".$row['college_id']."'>".$row['college_name']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div id="deptInput" class="input-group">
                <span class="input-group-addon">系别<span id="deptSpan"></span></span>
                <select class="form-control" id="dept" onchange="changeDept()">
                    <?php
                    $sql="select * from dept where dept_id="."8";
                    $res = mysqli_query($db,$sql);
                    $attr=$res->fetch_array();
                    $name=$attr[1];

                    $sql="select * from dept where college_id="."1";
                    $res = mysqli_query($db,$sql);

                    echo"<option value='"."8"."'>".$name."</option>";
                    while ($row=$res->fetch_array()) {
                        if($row['dept_id']==8)
                            continue;
                        echo"<option value='".$row['dept_id']."'>".$row['dept_name']."</option>";
                    }
                    ?>
                </select>
            </div>

            <div id="classInput" class="input-group">
                <span class="input-group-addon">班级<span id="classSpan"></span></span>
                <select class="form-control" id="Class">
                    <?php 
                    $sql="select * from class where dept_id="."8";
                    $res = mysqli_query($db,$sql);
                    while ($row=$res->fetch_array()) {
                        echo"<option value='".$row['class_id']."'>".$row['class_name']."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div id="righter">
            <img id="Img" src="../../image/photo.png" alt="image">
            <div>
                <button type="button" class="btn btn-success" onclick="addUser()">添加</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="../../jsencrypt-master/bin/jsencrypt.min.js"></script>
    <script src="../../js/My-Encryption.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../js/admin_add.js"></script>
</body>

</html>

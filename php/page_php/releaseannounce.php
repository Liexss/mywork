
<?php
session_start(); 
if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit(); 
}

if($_SESSION['type']==1){
    @header("http/1.1 404 not found"); 
    @header("status: 404 not found"); 
    header('location:Error404.php');
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
    <title>发布公告</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="../../css/releaseannounce.css" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/releaseannounce.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../js/wangEditor.js"></script>
</head>
<body>
    <?php include("nav.php")?>
    <div class="jumbotron">
        <div class="container">
            <h1>发布公告</h1>
            <p>你可以在这里发布公告，上传附件</p>
        </div>
    </div>

    <div class="container" id="myannounce">
        <input type='text' id="anntitle" class='form-control' placeholder='请输入标题' style="height: 34px;">
        <form id="form1" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div id="editor">
                    </div>  
                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-md-10"  id="submitfile">
                    <input type="file" name="file" id="file" />
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-default" id="annconbtn">确认发布</button>
                </div>
            </div>
        </form>
    </div>
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
</body>
</html>


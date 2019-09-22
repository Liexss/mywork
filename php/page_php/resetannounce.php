<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/resetannounce.css" type="text/css">
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/resetannounce.js" type="text/javascript"></script>
    <script src="../../js/wangEditor.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <?php include("nav.php") ?>
  <div class="jumbotron">
      <div class="container">
        <h1>我的申请</h1>
        <p>你可以在这里查看历史申请状态</p>
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
              <a id="ensol" style="text-decoration:none;"></a>
          </div>
          <div class="col-md-2">
              <button type="button" class="btn btn-default" id="annconbtn">确认发布</button>
          </div>
        </div>
      </form>
  </div>
</body>
</html>
<?php
        include_once("../ajax_php/connect.php");
        $db = db_connection("localhost","root","","money");
        $id=$_GET['id'];
        $sql="select b.theme,a.name,b.content,b.time,b.announce_id,b.enclosure from teacher as a right join announce as b on a.teacher_id=b.user_id where b.announce_id=".$id;
        $result=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result);
        for($i=0;$i<=5;$i++){
          $row[$i]=$db->real_escape_string($row[$i]);
        }
        echo"<script>";
        echo"var editor;";
        echo"$(document).ready(function() {";
        echo"var E = window.wangEditor;";
        echo"editor = new E('#editor');";
        // 或者 var editor = new E( document.getElementById('editor') )
        echo"editor.customConfig.uploadImgShowBase64 = true;";
        echo"editor.create();";
        echo"console.log('11".$row[2]."11');";
        if($row[5]==""){
          echo"$('#conensol').hide();";
        }
        else {
          echo"$('#ensol').html('".substr($row[5],11)."');";
          echo"$('#ensol').attr('download','".$row[5]."');";
          echo"$('#ensol').attr('href','".$row[5]."');";
        }
        echo"$('#anntitle').val('".$row[0]."');";
        echo"$('#anntheme').html('".$row[0]."');";
        echo"editor.txt.html('".$row[2]."');";
        echo"$('#annconbtn').attr('value',".$row[4].");";
        echo"});";
        echo"</script>";
?>

<?php
  session_start(); 
  if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:../../index.php');
    exit();  
  }
  if($_SESSION['type']==1){
    @header("http/1.1 404 not found"); 
    @header("status: 404 not found"); 
    include("Error404.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">    
    <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/query.css">
</head>
<body>
    <?php include("nav.php")?>
    <div class="jumbotron">
      <div class="container">
        <h2>人员信息查询</h2>
        <p>选择查询字段并填写信息; 获取相关人员信息; 导出信息表格。</p>
      </div>
    </div>
    <div id="mainber" class="container">
      <div id="searchNav" class="page-header">
        <h4 style="display: inline-block;">查询 <small>根据字段</small></h4>
        <select id="option" class="selectpicker form-control">
          <option value="1">学号</option>
          <option value="2">姓名</option>
          <option value="3">学院</option>
          <option value="4">专业</option>
          <option value="5">班级</option>
        </select>
        <input id="search" class="form-control" type="text" name="Search">
        <button id="searchBtn" type="button" class="btn btn-primary" onclick="queryUser()">查询</button>
      </div>

      <form>
        <table id="queTable" class="table table-striped">
          <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>学院</td>
            <td>专业</td>
            <td>班级</td>
          </tr>
        </table>
      </form> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../../js/bootstrap.min.js"></script>

    <script src="../../js/admin_query.js"></script>
</body>
</html>
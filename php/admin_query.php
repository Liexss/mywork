<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">    
    <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/query.css">
</head>
<body>
    <?php include("nav.php")?>
  	<div class="page-header">
  		<div class="container">
  			<h2>人员信息查询</h2>
  			<p>选择查询字段并填写信息; 获取相关人员信息; 导出信息表格。</p>
  		</div>
  	</div>

    <div id="mainber" class="container">
      <div id="searchNav" class="page-header">
        <h4 style="display: inline-block;">查询 <small>根据字段</small></h4>
        <select id="option" class="selectpicker form-control">
          <option value="1">姓名</option>
          <option value="2">居住地</option>
          <option value="3">联系电话</option>
        </select>
        <input id="search" class="form-control" type="text" name="Search">
        <button id="searchBtn" type="button" class="btn btn-primary" onclick="queryUser()">查询</button>
      </div>

      <form>
        <table id="queTable" class="table table-striped">
          <tr>
            <td>是否为管理员</td>
              <td>姓名</td>
              <td>性别</td>
              <td>年龄</td>
              <td>居住地</td>
              <td>电话</td>
              <td>操作</td>
            </tr>
        </table>
      </form> 
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
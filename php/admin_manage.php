<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">    
    <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
</head>
<body>
	<?php include("nav.php")?>
	<div class="jumbotron">
      <div class="container">
        <h2>人员信息管理</h2>
        <p>管理人员基本信息; 操作包含编辑、删除; 切换页面以显示相关信息。</p>
      </div>
    </div>

	<div class="mainber">
		<div class="container">
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<table class="table table-striped">
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
	</div>
	<div class="footer">
		<nav aria-label="Page navigation" style="text-align: center">
		  <ul class="pagination">
		  </ul>
		</nav>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

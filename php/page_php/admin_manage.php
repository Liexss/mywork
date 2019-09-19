<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/manage.css">
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
		            	<td>学号</td>
		            	<td>姓名</td>
		            	<td>学院</td>
		            	<td>专业</td>
		            	<td>班级</td>
		            	<td>操作</td>
		          	</tr>
		          	<?php
				      Show();
				    ?>	
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
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<script src="../../js/admin_manage.js"></script>
</body>
</html>

<?php

function Show(){
	include_once("../ajax_php/connect.php");
	$db = db_connection("localhost","root","","money");
	$query = "select * from student where is_post = 1";
	$result = mysqli_query($db,$query);
	if($result)
	{
		while($attr=$result->fetch_row())
		{
			echo "<tr>";
			echo "<td>$attr[0]</td>";
			echo "<td>$attr[6]</td>";
			echo "<td>$attr[2]</td>";
			echo "<td>$attr[4]</td>";
			echo "<td>$attr[3]</td>";
			echo "<td>";
			echo "<a class='glyphicon glyphicon-file' onclick='editUser($attr[0])'></a>";
			echo "<a class='glyphicon glyphicon-trash' onclick='deleteUser($attr[0])'></a>";
			echo "</td>";
			echo "</tr>";
		}
	}
}

?>
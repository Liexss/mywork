<?php
  session_start(); 
?>
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

	<div class="container">
		<div class="row" id="homepage" >
			   <table class="table table-bordered" id="homepagetable">
		    		<?php
		    			$sql="select * from student where is_post=1";
		    			$result=mysqli_query($db,$sql);
		    			echo"<tr><th>人员编号</th><th>姓名</th><th>学院</th><th>班级</th><th>专业</th><th>操作</th></tr>";
		    			if($result){
		    				while($row=$result->fetch_row()){
		    					echo"<tr>";
		    					echo"<th>{$row[0]}</th>";
		    					echo"<th>{$row[6]}</th>";
		    					echo"<th>{$row[2]}</th>";
		    					echo"<th>{$row[3]}</th>";
		    					echo"<th>{$row[4]}</th>";
		    					echo"<th><a href='#' class='edit' id='{$row[0]}' data-toggle='modal' data-target='#myModal{$row[0]}'>编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' class='delete' id='{$row[0]}'>删除</a></th>";
		                        echo"</tr>";
		                        echo"<div class='modal fade' id='myModal{$row[0]}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
		                        echo"<div class='modal-dialog'>";
		                        echo"<div class='modal-content'>";
		                        echo"<div class='modal-header'>";
		                        echo"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
		                        echo"<h4 class='modal-title' id='myModalLabel'>修改信息</h4>";
		                        echo"</div>";
		                        echo"<div class='modal-body'>";
		                        echo"<div class='input-group'>";
		                        echo"<span class='input-group-addon'>人员编号</span>";
		                        echo"<input id='Username{$row[0]}' type='text' class='form-control' value='{$row[0]}' disabled='disabled' aria-describedby='basic-addon1'>";
		                        echo"</div>";
		                        echo"<div class='input-group'>";
		                        echo"<span class='input-group-addon'>姓名(必填)</span>";
		                        echo"<input id='name{$row[0]}' type='text' class='form-control' value='{$row[6]}' aria-describedby='basic-addon1'>";
		                        echo"</div>";
		                        echo"<div class='input-group'>";
		                        echo"<span class='input-group-addon'>学院(非必填)</span>";
		                        echo"<input id='college{$row[0]}' type='text' class='form-control' value='{$row[2]}' aria-describedby='basic-addon1'>";
		                        echo"</div>";
		                        echo"<div class='input-group'>";
		                        echo"<span class='input-group-addon'>班级(非必填)</span>";
		                        echo"<input id='class{$row[0]}' type='text' class='form-control' value='{$row[3]}' aria-describedby='basic-addon1'>";
		                        echo"</div>";
		                        echo"<div class='input-group'>";
		                        echo"<span class='input-group-addon'>专业(非必填)</span>";
		                        echo"<input id='dept_name{$row[0]}' type='text' class='form-control' value='{$row[4]}' aria-describedby='basic-addon1'>";
		                        echo"</div>";
		                        echo"</div>";
		                        echo"<div class='modal-footer'>";
		                        echo"<button type='button' class='btn btn-default myclose' data-dismiss='modal'>关闭</button>";
		                        echo"<button type='button' class='btn btn-primary editque' id='{$row[0]}'>提交更改</button>";
		                        echo"</div>";
		                        echo"</div><!-- /.modal-content -->";
		                        echo"</div><!-- /.modal -->";
		                        echo"</div>";
		    				}
		    			}

		    		?>
				</table>
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
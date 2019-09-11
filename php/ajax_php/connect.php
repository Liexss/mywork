<?php
$host = "localhost";   // 服务器地址
$username = "root";   // 用户名
$password = "";  // 密码
$databaseName = "money";  // 数据库名
$db=db_connection($host, $username, $password, $databaseName);
function db_connection($host, $username, $password, $databaseName){
	$conn = mysqli_connect($host, $username, $password, $databaseName);
		// 下面两条语句用来防止中文乱码
		mysqli_query($conn,"set character set 'utf8'");
		mysqli_query($conn,"set names 'utf8'");
		if (mysqli_connect_errno()) {
			echo "Could not connect to database.";
			exit();
		}
		return $conn; // 返回连接对象
}
 ?>

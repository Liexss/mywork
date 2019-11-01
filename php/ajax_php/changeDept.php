<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	include("connect.php");
	$dept=$obj->dept;

	$_SESSION['dept_id']=$dept;
	
	echo json_encode(array());
?>
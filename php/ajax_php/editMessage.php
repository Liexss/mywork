<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	$_SESSION['enter_id']=$obj->num;
	echo json_encode(array());
?>
<?php 
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	$id=$obj->num;

	$db = mysqli_connect("localhost","root","123456","item");
	$update = "update student set is_post = 0 where student_id=".$id;
	$result = mysqli_query($db,$update);
	echo json_encode(array());
?>
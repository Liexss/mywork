<?php 
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);

	$name=$obj->name;
	$class=$obj->class;
	$password=$obj->password;
	$account=$obj->account;
	$dept=$obj->dept;
	$college=$obj->college;

	$db = mysqli_connect("localhost","root","123456","item");

	$update = "update student set student_id='$account',name='$name',class='$class',password='$password',college='$college',dept_name='$dept' where student_id=".$account;
	$result = mysqli_query($db,$update);

	echo json_encode($update);
?>
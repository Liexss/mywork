<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);

	$name=$obj->name;
	$class=$obj->class;
	$password=$obj->password;
	$account=$obj->account;
	$dept=$obj->dept;
	$college=$obj->college;

	$db = mysqli_connect("localhost","root","","money");
	$select = "select count(*) from student where student_id='$account'";
	$result = mysqli_query($db,$select);
	$attr=$result->fetch_row();
	if($attr[0]!="0")
		$flag=0;
	else
	{
		$update = "insert into student (student_id,password,college,class,dept_name,name,is_post) values ('$account','$password','$college','$class',$dept,'$name',1)";
		$result = mysqli_query($db,$update);
	}
	
	echo json_encode(array("flag"=>$flag));
?>
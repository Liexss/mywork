<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	include("connect.php");
	include($_SERVER['DOCUMENT_ROOT']."/mywork/php/ajax_php/My-Decrypt.php");
	
	$password=$obj->password;
	$password=$db->real_escape_string($password);
	$password=sha1(MyDecrypt($password));
	$oldPassword=$obj->initialPassword;
	$oldPassword=$db->real_escape_string($oldPassword);
	$oldPassword=sha1(MyDecrypt($oldPassword));
	$user_id=$obj->id;

	$tag=0;
	$select = "select * from student where student_id=$user_id";
	$res = mysqli_query($db,$select);
	$attr=$res->fetch_row();
	if($attr[1]==$oldPassword)
	{
		$update = "update student set password='$password' where student_id=".$_SESSION['enter_id'];
		$result = mysqli_query($db,$update);
		$tag=1;
	}

	$select = "select * from teacher where teacher_id=$user_id";
	$res = mysqli_query($db,$select);
	$attr=$res->fetch_row();
	if($attr[1]==$oldPassword)
	{
		$update = "update teacher set password='$password' where teacher_id=".$_SESSION['enter_id'];
		$result = mysqli_query($db,$update);
		$tag=1;
	}


	echo json_encode(array("isOk"=>$tag,"flag"=>$oldPassword));
?>
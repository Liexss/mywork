<?php 
	// session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	$account=$obj->account;
	$password=$obj->password;

	// $db = mysqli_connect("localhost","root","","zhou3db25");

	$update = "select * from student where student_id='$account' and is_post = 1";
	$result = mysqli_query($db,$update);

	$flag=0;//判断能否进入 0不能 1可以
	//$_SESSION['enter_id'] 0代表学生 1代表教师 全局变量
	if($result)
	{
		$attr=$result->fetch_row();
		if($attr[1]==$password){
			$_SESSION['enter_id']=0;
			$flag=1;
		}
	}

	$update = "select * from teacher where teacher_id='$account' and is_post = 1";
	$result = mysqli_query($db,$update);
	if($result)
	{
		$attr=$result->fetch_row();
		if($attr[1]==$password){
			$_SESSION['enter_id']=1;
			$flag=1;
		}
	}

	echo json_encode(array("id"=>$attr[1],"flag"=>$flag));
?>
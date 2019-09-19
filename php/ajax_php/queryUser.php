<?php 
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	$search=$obj->Sinput;
	$option=$obj->Oinput;

	$db = mysqli_connect("localhost","root","123456","item");

	if($option==1)
	{
		$select = "select * from student where student_id like '%$search%'";
		$result = mysqli_query($db,$select);

		$array=array();
		$inum=0;

		while ($row=$result->fetch_assoc()){
		    $array[$inum]=$row;
		    $inum++;
		}
		echo json_encode($array);
	}else if($option==2)
	{
		$select = "select * from student where name like '%$search%'";
		$result = mysqli_query($db,$select);

		$array=array();
		$inum=0;

		while ($row=$result->fetch_assoc()){
		    $array[$inum]=$row;
		    $inum++;
		}
		echo json_encode($array);
	}else if($option==3)
	{
		$select = "select * from student where college like '%$search%'";
		$result = mysqli_query($db,$select);

		$array=array();
		$inum=0;

		while ($row=$result->fetch_assoc()){
		    $array[$inum]=$row;
		    $inum++;
		}
		echo json_encode($array);
	}else if($option==4)
	{
		$select = "select * from student where dept_name like '%$search%'";
		$result = mysqli_query($db,$select);

		$array=array();
		$inum=0;

		while ($row=$result->fetch_assoc()){
		    $array[$inum]=$row;
		    $inum++;
		}
		echo json_encode($array);
	}else if($option==5)
	{
		$select = "select * from student where class like '%$search%'";
		$result = mysqli_query($db,$select);

		$array=array();
		$inum=0;

		while ($row=$result->fetch_assoc()){
		    $array[$inum]=$row;
		    $inum++;
		}
		echo json_encode($array);
	}

?>
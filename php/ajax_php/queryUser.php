<?php 
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	$search=$obj->Sinput;
	$option=$obj->Oinput;

	include("connect.php");

	$select="";
	if($option==1){
		$select = "select * from student where student_id like '%$search%' and is_post=1";
	}else if($option==2){
		$select = "select * from student where name like '%$search%' and is_post=1";
	}else if($option==3){
		$select="select * from student where class in (select class_id from class where dept_id in(
select dept_id from dept where college_id in(select college_id from college where college_name like '%$search%')))and is_post=1;
";
	}else if($option==4){
		$select="select * from student where class in (select class_id from class where dept_id in (select dept_id from dept where dept_name like '%$search%')) and is_post=1";
	}else if($option==5){
		$select="select * from student where class in (select class_id from class where class_name like '%$search%') and is_post=1";
	}

	$result = mysqli_query($db,$select);
	$array=array();
	$inum=0;

	while ($row=$result->fetch_assoc()){
		$sql="select * from class where class_id=".$row['class'];
		$res=mysqli_query($db,$sql);
		$beau=$res->fetch_row();
		$class=$beau[1];

		$sql="select * from dept where dept_id=".$beau[2];
		$res=mysqli_query($db,$sql);
		$beau=$res->fetch_row();
		$dept_name=$beau[1];

		$sql="select * from college where college_id=".$beau[2];
		$res=mysqli_query($db,$sql);
		$beau=$res->fetch_row();
		$college=$beau[1];

	    $array[$inum]=array("work"=>"student","student_id"=>$row['student_id'],"name"=>$row['name'],"class"=>$class,"dept_name"=>$dept_name,"college"=>$college);
	    
	    $inum++;
	}

	$select="";
	if($option==1){
		$select = "select * from teacher where teacher_id like '%$search%' and is_post=1";
	}else if($option==2){
		$select = "select * from teacher where name like '%$search%' and is_post=1";
	}else if($option==3){
		$select="select * from teacher where college_id in(select college_id from college where college_name like '%$search%')and is_post=1;";
	}

	$result = mysqli_query($db,$select);

	while ($row=$result->fetch_assoc()){

		$sql="select * from college where college_id=".$row['college_id'];
		$res=mysqli_query($db,$sql);
		$beau=$res->fetch_row();
		$college=$beau[1];

	    $array[$inum]=array("work"=>"teacher","student_id"=>$row['teacher_id'],"name"=>$row['name'],"class"=>"*","dept_name"=>"*","college"=>$college);
	    
	    $inum++;
	}
	echo json_encode($array);
?>
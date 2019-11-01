<?php 
$judgeid=$_SESSION['enter_id'];
$judgetype=$_SESSION['type'];
if($judgetype==1){
	$judgesql='select * from student where student_id='.$judgeid." and is_post=1";
	$judgeres=mysqli_query($db,$judgesql);
	if(mysqli_num_rows($judgeres) < 1){
		header('localtion:exit.php');
		exit(); 
	}
}
else if($judgetype==2){
	$judgesql='select * from teacher where teacher_id='.$judgeid." and is_post=1";
	$judgeres=mysqli_query($db,$judgesql);
	if(mysqli_num_rows($judgeres) < 1){
		header('localtion:exit.php');
		exit(); 
	}
}
else{
	header('localtion:exit.php');
	exit();  
}
?>
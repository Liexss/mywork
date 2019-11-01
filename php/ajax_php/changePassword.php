<?php 
session_start();
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");
$obj=json_decode($json);
include("connect.php");
$password=$obj->password;

if($_SESSION['type']==1){
	$update = "update student set password='$password' where student_id=".$_SESSION['enter_id'];
	$result = mysqli_query($db,$update);
}else{
	$update = "update teacher set password='$password' where teacher_id=".$_SESSION['enter_id'];
	$result = mysqli_query($db,$update);
}


echo json_encode(array("flag"=>$result));
?>
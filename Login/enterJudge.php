<?php 
session_start();
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");

$obj=json_decode($json);
$account=$obj->account;
$password=$obj->password;
include($_SERVER['DOCUMENT_ROOT']."/mywork/php/ajax_php/My-Decrypt.php");
$password=MyDecrypt($password);
$password=sha1($password);

$db = mysqli_connect("localhost","root","","money");

$update = "select * from student where student_id='".$account."' and is_post = 1";
$result = mysqli_query($db,$update);

$flag=0;//判断能否进入 0不能 1可以
//$_SESSION['enter_id'] 0代表学生 1代表教师 全局变量
if($result)
{
	$attr=$result->fetch_row();
	if($attr[1]==$password){
		$_SESSION['enter_id']=$account;
		$_SESSION['type']=1;
		$flag=1;
	}
}

$update = "select * from teacher where teacher_id='".$account."' and is_post = 1";
$result = mysqli_query($db,$update);
if($result)
{
	$attr=$result->fetch_row();
	if($attr[1]==$password){
		$_SESSION['enter_id']=$account;
		$_SESSION['type']=2;
		$flag=1;
	}
}

echo json_encode(array("id"=>$update,"flag"=>$flag));
?>
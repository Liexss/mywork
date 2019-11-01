<?php
session_start();
include_once("../ajax_php/connect.php");
$db = db_connection("localhost","root","","money");
$sql1="select * from announce order by announce_id desc";
$result1=mysqli_query($db,$sql1);
$num=1;
if($result1){
	$row=mysqli_fetch_array($result1);
	$num=$row[0]+1;
}

$select_name="select * from teacher where teacher_id=".$_SESSION['enter_id']; //假造ID
$result_name=mysqli_query($db,$select_name);
$attr=$result_name->fetch_row();
$user_id=$attr[0];

date_default_timezone_set("PRC");
$current_time = date("Y-m-d H:i:s");
$theme=$db->real_escape_string($_POST['theme']);
$content=$db->real_escape_string($_POST['content']);
$user_id=$db->real_escape_string($user_id);
$current_time=$db->real_escape_string($current_time);
$enclosure=$db->real_escape_string($_POST['enclosure']);
$sql="insert into announce(announce_id,theme,content,is_post,user_id,time";
$str="values(".$num.",'". $theme."'".","."'".$content."'".","."1".",'".$user_id."',"."'".$current_time."'";
if($_POST['enclosure']!=""){
	$sql=$sql.","."enclosure";
	$str=$str.","."'".$enclosure."'";
}
$sql=$sql.") ".$str.") ";
$response = array();
$result=mysqli_query($db,$sql);
$response['theme']=$_POST['theme'];
$response['content']=$_POST['content'];
$response['sql']=$sql;
$response['id']=$num;
if($result){
	$response['isSuccess']=true;
}
else {
	$response['isSuccess']=false;
}
echo json_encode($response);
?>

<?php 
include("../ajax_php/connect.php");
$db=db_connection("localhost","root","","money");
$sql1="select * from reward order by id desc";
$result1=mysqli_query($db,$sql1);
$num=1;
if($result1){
  $row=mysqli_fetch_array($result1);
  $num=$row[0]+1;
}
$id=$num;
$name=$db->real_escape_string($_POST['name']);
$teacher_id=$db->real_escape_string($_POST['teacher_id']);
$money=$db->real_escape_string($_POST['money']);
$begintime=$db->real_escape_string($_POST['begintime']);
$endtime=$db->real_escape_string($_POST['endtime']);
$enclosure=$db->real_escape_string($_POST['enclosure']);
$content=$db->real_escape_string($_POST['content']);
$sql="insert into reward(id,prize_name,money,is_post,content,start_time,end_time,teacher_id";
$str="values(".$id.",'".$name."','".$money."',1,'".$content."',"."'".$begintime."','".$endtime."','".$teacher_id."'";
if($_POST['enclosure']!=""){
  $sql=$sql.","."address";
  $str=$str.","."'".$enclosure."'";
}
$sql=$sql.")".$str.")";
$response = array();
$result=mysqli_query($db,$sql);
$response['sql']=$sql;
$response['id']=$id;
if($result){
  $response['isSuccess']=true;
}
else {
  $response['isSuccess']=false;
}
echo json_encode($response);
?>
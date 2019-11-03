<?php 
include("../ajax_php/connect.php");
$db=db_connection("localhost","root","","money");
$id=$db->real_escape_string($_POST['reward_id']);
$name=$db->real_escape_string($_POST['name']);
$teacher_id=$db->real_escape_string($_POST['teacher_id']);
$money=$db->real_escape_string($_POST['money']);
$begintime=$db->real_escape_string($_POST['begintime']);
$endtime=$db->real_escape_string($_POST['endtime']);
$enclosure=$db->real_escape_string($_POST['enclosure']);
$content=$db->real_escape_string($_POST['content']);
$sql="update reward set prize_name='".$name."' ,money='".$money."',is_post=1, content='".$content."' ,start_time='".$begintime."',end_time='".$endtime."',teacher_id='".$teacher_id."',address='".$enclosure."' where id =".$id;
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
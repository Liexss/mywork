<?php
//session_start();
//$user_id=$SESSION['enter_id'];
include_once("../ajax_php/connect.php");
date_default_timezone_set("PRC");
$current_time = date("Y-m-d H:i:s");
$ann_id=$db->real_escape_string($_POST['ann_id']);
$theme=$db->real_escape_string($_POST['theme']);
$content=$db->real_escape_string($_POST['content']);
$current_time=$db->real_escape_string($current_time);
$enclosure=$db->real_escape_string($_POST['enclosure']);
$sql="update announce set theme='".$theme."' ,content='".$content."', time='".$current_time."' ,enclosure='".$enclosure."' where announce_id =".$ann_id;
$result=mysqli_query($db,$sql);
$response['theme']=$_POST['theme'];
$response['content']=$_POST['content'];
$response['sql']=$sql;
if($result){
    $response['isSuccess']=true;
}
else {
    $response['isSuccess']=false;
}
echo json_encode($response);
?>

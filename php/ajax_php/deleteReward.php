<?php 
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");
$obj=json_decode($json);
$id=$obj->num;

include("connect.php");
$update = "update reward set is_post = 0 where id=".$id;
$result = mysqli_query($db,$update);
echo json_encode(array());
?>
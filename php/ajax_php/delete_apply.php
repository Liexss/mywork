<?php
$response=array();
include_once("../ajax_php/connect.php");
$sql="update reward_apply set is_post=0 where id=".$_POST['id'];
mysqli_query($db,$sql);
echo json_encode($response);
?>

<?php
$res = $_POST["res"];
$id = $_POST["id"];
include 'connect.php';
date_default_timezone_set("PRC");
$current_time = date("Y-m-d H:i:s");
$sql ="update reward_apply set state = '".$res."' , end_time ='".$current_time."'where id = ".$id;
$result  = $db->query($sql);
echo $sql;
?>

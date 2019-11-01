<?php
$res = $_POST["res"];
$id = $_POST["id"];
include 'connect.php';
date_default_timezone_set("PRC");
$current_time = date("Y-m-d H:i:s");
$res=$db->real_escape_string($res);
$current_time=$db->real_escape_string($current_time);
$sql ="update reward_apply set state = '".$res."' , end_time ='".$current_time."'where id = ".$id;
$result  = $db->query($sql);
echo $sql;
?>

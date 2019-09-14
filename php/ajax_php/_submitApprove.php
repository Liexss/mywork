<?php
$res = $_POST["res"];
$id = $_POST["id"];
include 'connect.php';
$sql ="update reward_apply set state = '".$res."' where prize_id = ".$id;
$result  = $db->query($sql);
echo $sql;
?>

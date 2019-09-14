<?php
$content = $_POST["content"];
$student_id = $_COOKIE['student_id'];
$name = $_COOKIE['prize_name'];
include 'connect.php';
$sql = "insert into reward_apply (student_id,submit_time,content,file_name) values ('".$student_id."','".date("Y-m-d h:i:s")."','".$content."','".$name."')";
$result  = $db->query($sql);
echo $sql;
?>

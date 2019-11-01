<?php
session_start();
$content = $_POST["content"];
//$student_id = $_COOKIE['student_id'];
$student_id = $_SESSION['enter_id'];
$name = $_COOKIE['prize_name'];
include 'connect.php';
$student_id=$db->real_escape_string($student_id);
$content=$db->real_escape_string($content);
$name=$db->real_escape_string($name);
$sql = "insert into reward_apply (student_id,submit_time,content,file_name) values ('".$student_id."','".date("Y-m-d h:i:s")."','".$content."','".$name."')";
$result  = $db->query($sql);
echo $sql;
?>

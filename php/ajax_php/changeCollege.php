<?php 
session_start();
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");
$obj=json_decode($json);
include("connect.php");
$college=$obj->college;

$_SESSION['college_id']=$college;

$sql="select * from dept where college_id=".$_SESSION['college_id'];
$res = mysqli_query($db,$sql);
$row=$res->fetch_array();
$_SESSION['dept_id']=$row[0];

echo json_encode(array());
?>
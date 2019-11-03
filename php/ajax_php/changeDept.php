<?php 
session_start();
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");
$obj=json_decode($json);
include("connect.php");
$dept=$obj->dept;

$sql="select * from class where dept_id=".$dept;
$res = mysqli_query($db,$sql);
$dataarr = array();  
$inum=0;
    //while($row = mysql_fetch_array($result)){  
	while($row = $res->fetch_assoc()) {
        $dataarr[$inum]=array("class_id"=>$row["class_id"],"class_name"=>$row['class_name']);
        $inum++;
    } 

echo json_encode($dataarr);

?>
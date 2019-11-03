<?php 
session_start();
header('Content-Type:application/json; charset=utf-8');
$json=file_get_contents("php://input");
$obj=json_decode($json);
include("connect.php");
$college=$obj->college;


$sql="select * from dept where college_id=".$college;
$res = mysqli_query($db,$sql);
$dataarr = array();  
$inum=0;
    //while($row = mysql_fetch_array($result)){  
	while($row = $res->fetch_assoc()) {
        $dataarr[$inum]=array("dept_id"=>$row["dept_id"],"dept_name"=>$row['dept_name']);
        $inum++;
    } 

echo json_encode($dataarr);
?>
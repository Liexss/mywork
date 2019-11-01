<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");
$current_time = date("Y-m-d H-i-s");
$name = iconv('utf-8','gb2312',"../../file/" .$current_time.$_FILES['file']['name']);
$response = array();
if( move_uploaded_file($_FILES["file"]["tmp_name"],$name)&& ($_FILES["file"]["size"] <= 2*1024*1024)){
	$response['isSuccess'] = true;
	$response['name']=$_FILES['file']['name'];
	$response['file'] = "../../file/" .$current_time.$_FILES['file']['name'];
}
else{
	$response['isSuccess'] = false;
}
echo json_encode($response);
?>

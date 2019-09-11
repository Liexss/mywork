<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	if($obj->num==-1)
	{
		if($_SESSION['page_seaannnum']!=1)
			$_SESSION['page_seaannnum']--;
	}else if($obj->num==0)
	{
		if($_SESSION['page_seaannnum']!=$_SESSION['page_seaanntot'])
			$_SESSION['page_seaannnum']++;
	}else
	{
		$_SESSION['page_seaannnum']=$obj->num;
	}
	echo json_encode(array());
?>
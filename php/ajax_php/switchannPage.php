<?php 
	session_start();
	header('Content-Type:application/json; charset=utf-8');
	$json=file_get_contents("php://input");
	$obj=json_decode($json);
	if($obj->num==-1)
	{
		if($_SESSION['page_annnum']!=1)
			$_SESSION['page_annnum']--;
	}else if($obj->num==0)
	{
		if($_SESSION['page_annnum']!=$_SESSION['page_anntot'])
			$_SESSION['page_annnum']++;
	}else
	{
		$_SESSION['page_annnum']=$obj->num;
	}
	echo json_encode(array());
?>
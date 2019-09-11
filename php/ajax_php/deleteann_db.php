<?php
	$response=array();
	include_once("../ajax_php/connect.php");
	$sql="update announce set is_post=0 where announce_id=".$_POST['id'];
	mysqli_query($db,$sql);
	echo json_encode($response);
?>

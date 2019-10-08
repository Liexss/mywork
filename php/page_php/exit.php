<?php
	session_start();
	unset($_SESSION["enter_id"]);
	unset($_SESSION["type"]);
	header('location:../../index.php');
?>
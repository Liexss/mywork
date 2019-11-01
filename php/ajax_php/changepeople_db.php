<?php include('connect.php'); ?>
<?php 
$response = array(); 
$sql="update student set password="."'{$_POST['password']}'".",class="."'{$_POST['class']}'".", name="."'{$_POST['name']}'"." where student_id = "."'{$_POST['student_id']}' and is_post=1";
mysqli_query($db,$sql);
echo json_encode($response);
?>
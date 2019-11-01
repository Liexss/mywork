<?php include('connect.php'); ?>
<?php 
    $response = array(); 
    include($_SERVER['DOCUMENT_ROOT']."/mywork/php/ajax_php/My-Decrypt.php");
	//$password=MyDecrypt($password);
    $newPassword=sha1(MyDecrypt($_POST['password']));
    $sql="update student set password='".$newPassword."',class="."'{$_POST['class']}'".", name="."'{$_POST['name']}'"." where student_id = "."'{$_POST['student_id']}' and is_post=1";
    mysqli_query($db,$sql);
    echo json_encode($response);
?>
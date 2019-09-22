<?php include('connect.php'); ?>
<?php 
    $response = array(); 
    $sql="update student set college="."'{$_POST['college']}'".", class="."'{$_POST['class']}'".", dept_name="."'{$_POST['dept_name']}'".", name="."'{$_POST['name']}'"." where student_id = "."'{$_POST['student_id']}'";
    mysqli_query($db,$sql);
    echo json_encode($response);
?>
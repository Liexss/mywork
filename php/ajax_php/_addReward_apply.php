<?php 
  session_start();
  include("../ajax_php/connect.php");
  $db=db_connection("localhost","root","","money");
  $sql1="select * from reward_apply order by id desc";
  $result1=mysqli_query($db,$sql1);
  $num=1;
  if($result1){
    $row=mysqli_fetch_array($result1);
    $num=$row[0]+1;
  }
  $id=$num;
  $student_id=$_SESSION['enter_id'];
  date_default_timezone_set("PRC");
  $current_time = date("Y-m-d H:i:s");
  $enclosure=$db->real_escape_string($_POST['enclosure']);
  $content=$db->real_escape_string($_POST['content']);
  $prize_id=$db->real_escape_string($_POST['prize_id']);
  $sql="insert into reward_apply(id,student_id,state,submit_time,prize_id,content,address)";
  $str="values(".$id.",'".$student_id."','"."待审批"."','".$current_time."','".$prize_id."','".$content."','".$enclosure."')";
  $sql=$sql.$str;
  $response = array();
  $result=mysqli_query($db,$sql);
  $response['sql']=$sql;
  $response['id']=$id;
  if($result){
      $response['isSuccess']=true;
  }
    else {
      $response['isSuccess']=false;
  }
  echo json_encode($response);
?>
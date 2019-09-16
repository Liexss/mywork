<?php
$content = $_POST["content"];
$student_id = $_COOKIE['student_id'];
$name = $_COOKIE['prize_name'];
if ($_FILES["file"]["type"] == "application/zip"){
  if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else{
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//    echo "Type: " . $_FILES["file"]["type"] . "<br />";
//    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    /*文件是否存在的判断*/
    if (file_exists("../../file/" . $_FILES["file"]["name"]))
      {
      /*若文件存在，输出存在提示*/
      echo "文件名已存在";
      }
    else
      {
      /*若不存在，文件移动到指定位置*/
      include 'connect.php';
      $sql = "insert into reward_apply (student_id,submit_time,content,file_name,address) values ('".$student_id."','".date("Y-m-d h:i:s")."','".$content."','".$name."','../file/" . $_FILES["file"]["name"]."')";
      $result  = $db->query($sql);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../file/" . $_FILES["file"]["name"]);
      echo "提交成功";
      }
    }
  }
else
  {
  /*输出文件类型或大小不合法的提示*/
  echo "请上传zip格式的压缩包";
  }
?>

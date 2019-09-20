<?php

$name = $_POST["name"];
$money = $_POST["money"];
$content = $_POST["content"];
$begintime = $_POST["begintime"];
$endtime = $_POST["endtime"];

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
    $fname = iconv('utf-8', 'gb2312//ignore', $_FILES["file"]["name"]);
    if (file_exists("../../file/" . $fname))
      {
      /*若文件存在，输出存在提示*/
      echo "0:添加失败，文件已存在";
      }
    else
      {
      /*若不存在，文件移动到指定位置*/
      include 'connect.php';
      $sql = "insert into reward (prize_name,money,content,start_time,end_time,address) values ('".$name."','".$money."','".$content."','".$begintime."','".$endtime."','../../file/" . $fname."')";
      $result  = $db->query($sql);
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../file/" . $fname);
      echo "1:添加成功";
      }
    }
  }
else
  {
  /*输出文件类型或大小不合法的提示*/
  echo "0:添加失败，请上传zip格式的压缩包";
  }

?>
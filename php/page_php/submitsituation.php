<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <!-- Bootstrap -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/submitsituation.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/submitsituation.js"></script>
</head>
<body>
   <?php
      include("nav.php");
      include("../ajax_php/connect.php");
         $id=$_SERVER["QUERY_STRING"];
         //查找申请表信息
         $sql="select * from reward_apply where prize_id=".$id;
         $res = $db->query($sql);
         while ($row = $res->fetch_array() ) {
             $time =  $row['submit_time'];
             $content = $row['content'];
             $address = $row['address'];
             $state = $row['state'];
         }
          //查找对应学生信息
         $sql="select * from student where student_id = (select student_id from reward_apply where prize_id=".$id.")";
          $res = $db->query($sql);
          while ($row = $res->fetch_array() ) {
              $name =  $row['name'];
              $college = $row['college'];
              $dept_name = $row['dept_name'];
              $class = $row['class'];
          }
    ?>
  <div class="container" id="submitsituation">
    <div class="page-header">
      <div class="container">
        <h2>申请编号：<?php echo $id ?></h2>
        <p>时间：<?php echo $time ?></p>
      </div>
    </div>
      <div class="row" id="addsubmit">
        <div class="row">
          <div class ="col-md-6" style="padding-left: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">姓名</span>
              <input type="text" class="form-control" name="Username" id="Username" readOnly="true" value=<?php echo $name ?>>
            </div>
          </div>
          <div class ="col-md-6" style="padding-right: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">学院</span>
              <input type="text" class="form-control" name="Username" id="Username" readOnly="true" value=<?php echo $college ?>>
            </div>
          </div>
        </div>
        <div class="row">
          <div class ="col-md-6" style="padding-left: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">专业</span>
              <input type="text" class="form-control" name="Username" id="Username" readOnly="true" value=<?php echo $dept_name ?>>
            </div>
          </div>
          <div class ="col-md-6" style="padding-right: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">班级</span>
              <input type="text" class="form-control" name="Username" id="Username" readOnly="true" value=<?php echo $class ?>>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 30px;padding-right: 1.5%;padding-left: 1.5%;">
          <div class ="col-md-12">
            <div class="form-group">
              <textarea class="form-control" placeholder="概要" rows="3" style="resize: none; height: 200px;" readOnly="true">
              <?php echo $content ?>
              </textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class ="col-md-6" style="padding-left: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">审核状态</span>
              <input type="text" class="form-control" name="Username" id="Username" readOnly="true" value=<?php echo $state ?>>
            </div>
          </div>
        </div>
        <div class="row">
          <div class ="col-md-6"  style="margin-top: 30px;padding-left: 2.5%;">
            <div id="gra">
               附件：
              <a href=<?php echo $address ?>>我的资料</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 col-md-offset-10">
             <button type="submit" class="btn btn-default" name="btnsubmit" id="btnsubmit">返回</button>
          </div>
        </div>
      </div>
  </div>
</body>

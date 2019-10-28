<?php
  session_start();
  if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:exit.php');
    exit();
  }
  $_SESSION['display_annnum']=7;
  $_SESSION['page_anntot']=0;
  if(!isset($_SESSION['page_annnum']))
    $_SESSION['page_annnum']=1;
  include("../ajax_php/connect.php");
  include("judgeid.php");
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>
  <!-- 夏哲臻是傻子 -->

  <!-- Bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/index.css">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/index.js"></script>
</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h1>Volunteer Management System</h1>
        <p>你可以在这个网站管理公告，人员，发送邮件</p>
      </div>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-10">
          <div class="form-inline">
            <div class="col-md-3 col-md-offset-5" id="searchoose">
            </div>
            <input type="text" class="form-control" id="searchann" placeholder="输入关键字">
            <button type="button" class="btn btn-success" id="searchbtn">search</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="panel" style="margin-top: 20px;">
          <div class="panel-heading">
            <h3 class="panel-title">公告列表</h3>
          </div>
          <br>
          <ul class="list-group">
            <li class='list-group-item'>
              <div class='row'>
                <div class='col-md-2'>
                   <p>标题：</p>
                </div>
                <div class='col-md-2 col-md-offset-4'>
                  <p>时间：</p>
                </div>
                <div class='col-md-1'>
                  <p>发布者：</p>
                </div>
              </div>
            </li>
            <?php
              Show();
            ?>
            <li class="list-group-item" style="padding:0;">
              <div class="footer">
                <nav aria-label="Page navigation" style="text-align: center">
                  <ul class="pagination">
                    <?php
                      echo "<li>";
                        if($_SESSION['page_annnum']!=1)
                        echo "<a aria-label='Previous' href='#' onclick='prePage()'>";
                      else
                        echo "<a  href='#' aria-label='Previous'>";
                        echo "<span aria-hidden='true'>&laquo;</span>";
                        echo "</a>";
                      echo "</li>";
                      Show_page();
                      echo "<li>";
                      if($_SESSION['page_annnum']!=$_SESSION['page_anntot'])
                        echo "<a aria-label='Next' href='#' onclick='nextPage()'>";
                      else
                        echo "<a href='#' aria-label='Next'>";
                        echo "<span aria-hidden='true'>&raquo;</span>";
                        echo "</a>";
                      echo "</li>";
                    ?>
                  </ul>
                </nav>
              </div>
            </li>

          </ul>
      </div>
      </div>
    </div>
</body>
</html>
<?php

      function Show(){
        $db = db_connection("localhost","root","","money");
        $l=$_SESSION['display_annnum']*($_SESSION['page_annnum']-1);
        //$r=$_SESSION['display_annnum']*$_SESSION['page_annnum'];
        $query = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 order by time desc limit ".$l.",". $_SESSION['display_annnum'];
        // echo $query;
        $result=mysqli_query($db,$query);
        if($result){
          while($row=$result->fetch_row()){
            echo"<li class='list-group-item'>";
            echo" <div class='row'>";
            echo"<div class='col-md-2'>";
            echo"<a target='_blank' style='text-decoration: none;' href='showannounce.php?id={$row[3]}'>{$row[0]}</a>";
            echo"</div>";
            echo"<div class='col-md-2 col-md-offset-4'>";
            echo"<p>{$row[2]}</p>";
            echo"</div>";
            echo"<div class='col-md-1'>";
            echo"<p>{$row[1]}</p>";
            echo"</div>";

            if($_SESSION['type']==2)
            {
              echo"<div class='col-md-1'>";
              echo"<a target='_blank' style='text-decoration: none;' href='resetannounce.php?id={$row[3]}' id='{$row[3]}' href='#' >编辑</a>";
              echo"</div>";

              echo"<div class='col-md-1'>";
              echo"<a style='text-decoration: none;' class='deleteann' id='{$row[3]}' href='#'>删除</a>";
              echo"</div>";
            }
            echo"</div>";
            echo"</li>";
          }
        }
      }

      function Show_page(){
        $db = db_connection("localhost","root","","money");
        $query = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 order by time desc";
        $result=mysqli_query($db,$query);
        $_SESSION['page_anntot']=(int)($result->num_rows/$_SESSION['display_annnum']);
        if($result->num_rows%$_SESSION['display_annnum']!=0)
          $_SESSION['page_anntot']++;

        for($i=1;$i<=$_SESSION['page_anntot'];$i++){
          if($i==$_SESSION['page_annnum'])
            echo "<li class='active'><a>$i</a></li>";
          else
            echo "<li><a href='#' onclick='toPage($i)'>$i</a></li>";
        }
      }
    ?>
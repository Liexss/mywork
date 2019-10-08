<?php
  session_start();
  if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
    header('location:../../index.php');
    exit();  
  }
  $_SESSION['display_seaannnum']=7;
  $_SESSION['page_seaanntot']=0;
  $content=$_GET['content'];
  if(!isset($_SESSION['page_seaannnum'])||!isset($_COOKIE['_'.$content])){
    $_SESSION['page_seaannnum']=1;
    setcookie('_'.$content,1);
  }
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
    <link href="../../css/searchannounce.css" rel="stylesheet"> 
    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script src="../../js/searchannounce.js" type="text/javascript"></script>
</head>
<body>
  <?php include("nav.php") ?>
  <div class="container" id="myannounce" value=<?php echo $content?>>
    <ol class="breadcrumb" >
          <li><a href="index.php">公告首页</a></li>
          <li class="active">查询结果</li>
    </ol>
    <div class="row">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">公告列表</h3>
          </div>
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
                        if($_SESSION['page_seaannnum']!=1)
                        echo "<a aria-label='Previous' href='#' onclick='prePage()'>";
                      else
                        echo "<a aria-label='Previous'>";
                        echo "<span aria-hidden='true'>&laquo;</span>";
                        echo "</a>";
                      echo "</li>";
                      Show_page();
                      echo "<li>";
                      if($_SESSION['page_seaannnum']!=$_SESSION['page_seaanntot'])
                        echo "<a aria-label='Next' href='#' onclick='nextPage()'>";
                      else
                        echo "<a aria-label='Next'>";
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
        $type="1";
        $content=$_GET['content'];
        $db = db_connection("localhost","root","","money");
        //$id=$_GET['id'];
        $l=$_SESSION['display_seaannnum']*($_SESSION['page_seaannnum']-1);
        $query1 = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 and (b.theme "."like '%".$content."%' or a.name "."like '%".$content."%') order by time desc limit ".$l.",". $_SESSION['display_seaannnum'];
        //echo $query1;
        $result=mysqli_query($db,$query1);
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

            if($type=="1")
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
        $db=db_connection("localhost", "root", "", "money");
        $content=$_GET['content'];
        $query2 = "select b.theme,a.name,b.time,b.announce_id from teacher as a right join announce as b on a.teacher_id=b.user_id where b.is_post=1 and a.is_post=1 and (b.theme "."like '%".$content."%' or  a.name "."like '%".$content."%') order by time desc";
        $result=mysqli_query($db,$query2);
        $_SESSION['page_seaanntot']=(int)($result->num_rows/$_SESSION['display_seaannnum']);
        if($result->num_rows%$_SESSION['display_seaannnum']!=0)
          $_SESSION['page_seaanntot']++;

        for($i=1;$i<=$_SESSION['page_seaanntot'];$i++){
          if($i==$_SESSION['page_seaannnum'])
            echo "<li class='active'><a>$i</a></li>";
          else
            echo "<li><a href='#' onclick='toPage($i)'>$i</a></li>";
        }
      }
    ?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?pagenum=1">杭师大奖助管理系统</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example">
        <ul class="nav navbar-nav" id="ulbs">
          <li id="index"><a href="index.php?pagenum=1">公告首页</a></li>
          <?php 
          if($_SESSION['type']==2) {
            echo"<li class='dropdown' id='reward'>";
            echo"<a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>奖学金管理 <span class='caret'></span></a>";
            echo"<ul class='dropdown-menu'>";
            echo"<li id='rewardlist'><a href='rewardlist.php?1'>奖学金列表</a></li>";
            echo"<li role='separator' class='divider'></li>";
            echo"<li role='separator'><a href='addreward.php'>添加奖学金</a></li>";
            echo"</ul>";
            echo"</li>";
          } 
          else if($_SESSION['type']==1){
            echo"<li id='reward'><a href='rewardlist.php?pagenum=1'>奖学金列表</a></li>";
          }
          ?>
          <?php
          if($_SESSION['type']==2){
            echo"<li class='dropdown' id='people'>";
            echo"<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>人员管理 <span class='caret'></span></a>";
            echo"<ul class='dropdown-menu'>";
            echo"<li id='admin_query'><a href='admin_query.php'>人员查询</a></li>";
            echo"<li role='separator' class='divider'></li>";
            echo"<li id='admin_add'><a href='admin_add.php'>人员添加</a></li>";
            echo"<li role='separator' class='divider'></li>";
            echo"<li id='admin_manage'><a href='admin_manage.php'>人员管理</a></li>";
            echo"</ul>";
            echo"</li>";
          }
          if($_SESSION['type']==2){
            echo"<li id='releaseannounce'><a href='releaseannounce.php'>发布公告</a></li>";
          }
          if($_SESSION['type']==2){
            echo"<li id='myapprovereward'><a href='myapprovereward.php'>我的审批</a></li>";
          }
          else if($_SESSION['type']==1){
            echo"<li id='mysubmitreward'><a href='mysubmitreward.php'>我的申请</a></li>";
          }
          ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li id="personal"><a href="personal.php">
            <?php
            if($_SESSION['type']==1){
              $sqll="select name from student where student_id='".$_SESSION['enter_id']."'";
            } 
            else{
              $sqll="select name from teacher where teacher_id='".$_SESSION['enter_id']."'";
            }
            $ress = $db->query($sqll);
            $roww = $ress->fetch_array();
            echo $roww[0];
            ?>
          </a></li>
          <li><a href="exit.php" id="exit"><span class="glyphicon glyphicon-off" style="padding-top: 1px;"></span></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </div>
</nav>

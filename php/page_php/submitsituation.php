<?php
    session_start(); 
  
    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit(); 
    }

    include("../ajax_php/connect.php");
    include("judgeid.php");
    if(!isset($_GET['id'])||$_GET['id']==NULL){//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false
        header('location:mysubmitreward.php');
        exit(); 
    }
    $id=$_GET['id'];
    $sql="select * from student where student_id = (select student_id from reward_apply where id=".$id.")";
    $result = mysqli_query($db,$sql);
    if(mysqli_num_rows($result) < 1){
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        include("Error404.php");
        exit(); 
    }

    $attr=$result->fetch_row();
    if ($attr[0]!=$_SESSION['enter_id']) {
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        include("Error404.php");
        exit(); 
    }
?>
<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>杭师大奖助管理系统</title>


    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/submitsituation.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/submitsituation.js"></script>
</head>
<body>
    <?php
        include("nav.php");
        $id=$_GET['id'];
        
        //查找申请表信息
        $sql="select * from reward_apply where id=".$id;
        $res = $db->query($sql);
        while ($row = $res->fetch_array() ) {
            $time =  $row['submit_time'];
            $end_time=$row['end_time'];
            $content = $row['content'];
            $address = $row['address'];
            $state = $row['state'];
            $prize_id=$row['prize_id'];
            $student_id=$row['student_id'];
        }
        
        //查找对应学生信息
        // $sql="select * from student where student_id = (select student_id frosm reward_apply where id=".$id.")";
        $sql ="select e.name,a.class_name,b.dept_name,c.college_name from  student as e left join class as a on a.class_id=e.class left join dept as b on a.dept_id=b.dept_id left join college as c on b.college_id=c.college_id where e.student_id=".$student_id;
        $res = $db->query($sql);
          
        while ($row = $res->fetch_array() ) {
            $name =  $row[0];
            $college = $row[3];
            $dept_name = $row[2];
            $class = $row[1];
        }
        
        $sql="select a.name from teacher as a left join reward as b on a.teacher_id=b.teacher_id where b.id=".$prize_id;
        $res = $db->query($sql);
          
        while ($row = $res->fetch_array() ) {
            $people =  $row['name'];
        }   
    ?>

    <div class="container" id="submitsituation">
        <div class="page-header">
            <div class="container">
                <h2>申请编号：<?php echo $id ?></h2>
                <p>奖项编号：<?php echo $prize_id ?></p>
                <p>申请时间：<?php echo $time ?></p>
                <p>审批时间：<?php echo $end_time ?></p>
                <p>审批人：<?php echo $people ?></p>
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
                <div class ="col-md-6"  style="margin-top: 30px;padding-left: 2.5%;" id="worditem">
                    <div id="gra">
                        附件：
                    <a id="ensol" href=<?php echo $address ?> >我的资料</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-md-offset-10">
                <!-- <button type="submit" class="btn btn-default" name="btnsubmit" id="btnsubmit">返回</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

<?php 
    echo"<script>";
    // echo"console.log('11".$row[1]."11');";
    if($address==""){
        echo"$('#worditem').hide();";
    }
    else {
        echo"$('#ensol').html('".substr($address,30)."');";
        echo"$('#ensol').attr('download','".substr($address,30)."');";
        echo"$('#ensol').attr('href','".$address."');";
    }
    echo"</script>";
?>

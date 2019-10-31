
<?php
    session_start(); 
    if(!isset($_SESSION['type'])||!isset($_SESSION['enter_id'])){
        header('location:exit.php');
        exit(); 
    }
  
    include("../ajax_php/connect.php");
    include("judgeid.php");
  
    if($_SESSION['type']==1){
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        header('location:Error404.php');
        exit(); 
    }
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="../../css/admin_add.css">
</head>
<body>
    <?php include("nav.php")?>
    <div class="jumbotron">
        <div class="container">
            <h2>人员信息添加</h2>
            <p>填写人员基本信息; 上传并保留头像; 添加相关人员信息。</p>
        </div>
    </div>
  
    <div id="mainber" class="container">
        <div id="lefter">
            <div id="accountInput" class="input-group">
                <span class="input-group-addon">学号<span id="accountSpan"></span></span>
                <input id="account" type="text" class="form-control">
            </div>

            <div id="passwordInput" class="input-group">
                <span class="input-group-addon">密码<span id="passwordSpan"></span></span>
                <input id="password" type="password" class="form-control">
            </div>

            <div id="nameInput" class="input-group">
                <span class="input-group-addon">姓名<span id="nameSpan"></span></span>
                <input id="name" type="text" class="form-control">
            </div>

            <div id="classInput" class="input-group">
                <span class="input-group-addon">班级<span id="classSpan"></span></span>
                <select class="form-control" id="Class">
                    <?php
                        $sql="select * from class";
                        $res = mysqli_query($db,$sql);
                        while ($row = $res->fetch_array() ) {
                            $sel="select * from dept where dept_id =".$row[2];
                            $rsl = mysqli_query($db,$sel);
                            $attr=$rsl->fetch_row();
                            $dept=$attr[1];

                            $sel="select * from college where college_id =".$attr[2];
                            $rsl = mysqli_query($db,$sel);
                            $attr=$rsl->fetch_row();
                            $college=$attr[1];
                             echo"<option value='".$row['class_id']."'>".$college.$dept.$row['class_name']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>

        <div id="righter">
            <img id="Img" src="../../image/photo.png" alt="image">
            <div>
                <button type="button" class="btn btn-success" onclick="addUser()">添加</button>
            </div>
        </div>
    </div>
  
    <textarea id="pubkey" rows="8" cols="100" hidden>MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDJTiKycVtES2IKw7Dn4nJ7fy2r
    KFsIfY5fZYRYR32W2VFxW0O4ncC2g2KNSA37FzRQka7Q9X/Km7rQh0AfobiY5D/V
    ZHdnTeyUC9vxM6HUvwKYekMLfXSIaB5YuUBD1R8rNrRlLbwolrN1A/rPGdgtprPD
    uRLIaWistwUAdOIH1QIDAQAB</textarea>

    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="../../jsencrypt-master/bin/jsencrypt.min.js"></script>
    <script src="../../js/admin_add.js"></script>
</body>

</html>

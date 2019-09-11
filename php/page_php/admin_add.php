<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/admin_add.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="../../js/bootstrap.min.js"></script>
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
        <span class="input-group-addon">账号<span id="accountSpan"></span></span>
        <input id="account" type="text" class="form-control" placeholder="Account">
      </div>

      <div id="passwordInput" class="input-group">
        <span class="input-group-addon">密码<span id="passwordSpan"></span></span>
        <input id="password" type="password" class="form-control" placeholder="Password">
      </div>

      <div id="nameInput" class="input-group">
        <span class="input-group-addon">姓名<span id="nameSpan"></span></span>
        <input id="name" type="text" class="form-control" placeholder="Name">
      </div>

      <div id="sexInput" class="input-group">
        <span class="input-group-addon">性别<span id="sexSpan"></span></span>
        <select id="sex" class="selectpicker form-control">
          <option value="1">男</option>
          <option value="2">女</option>
        </select>
      </div>

      <div id="ageInput" class="input-group">
        <span class="input-group-addon">年龄<span id="ageSpan"></span></span>
        <input id="age" type="text" class="form-control" placeholder="Age">
      </div>

      <div id="residenceInput" class="input-group">
        <span class="input-group-addon">居住地<span id="residenceSpan"></span></span>
        <input id="residence" type="text" class="form-control" placeholder="Residence">
      </div>

      <div id="phoneInput" class="input-group">
        <span class="input-group-addon">联系电话<span id="phoneSpan"></span></span>
        <input id="phone" type="text" class="form-control" placeholder="Phone">
      </div>
    </div>

    <div id="righter">
      <img id="Img" src="../image/photo.png" alt="image">
      <input id="fileInput" type="file" name="">
      <button type="button" class="btn btn-default" onclick="submitMessage()">图片上传</button>
      <div>
        <input id="is_admin" value="1" type="radio"><span>是否为管理员</span>
        <br>
        <button type="button" class="btn btn-success" onclick="addUser()">添加</button>
        <button type="button" class="btn btn-primary" onclick="resetMessage()">重置</button>
      </div>
    </div>
  </div>
</body>
</html>

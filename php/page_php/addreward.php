<!DOCTYPE html>
<html  lang="zh-CN">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>杭师大奖助管理系统</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/frame.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/addreward.css">
  <link href="../../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
  <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="../../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script src="../../js/addreward.js"></script>
</head>
<body>
  <?php include("nav.php")?>
  <div class="jumbotron">
      <div class="container">
        <h2>添加奖学金</h2>
        <p>你可以在这个网站添加奖学金</p>
      </div>
  </div>
  <div class="container" style="margin-top: 50px;" id="showaddreward">
    <div class="row">
          <div class ="col-md-6" style="padding-left: 2.5%;">
            <div class="input-group" style="margin-top: 30px; ">
              <span class="input-group-addon" id="basic-addon1">奖学金名称</span>
              <input type="text" class="form-control" name="Username" id="Username">
            </div>
          </div>
      </div>
      <div class="row">
        <div class ="col-md-6" style="padding-left: 2.5%;">
            <div class="input-group" style="margin-top: 30px;">
              <span class="input-group-addon" id="basic-addon1">奖励金额</span>
              <input type="text" class="form-control" name="Username" id="Username">
            </div>
          </div>
      </div>
      <div class="row">
        <div class="form-group" style="padding-left: 2.5%;margin-top: 30px;">
                <div class="input-group date form_datetime col-md-6" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <span class="input-group-addon">起始时间</span>
                    <input id ="begintime" class="form-control" type="text" value="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
          </div>
      </div>
      <div class="row">
        <div class="form-group" style="padding-left: 2.5%;">
                <div class="input-group date form_datetime col-md-6" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <span class="input-group-addon">结束时间</span>
                    <input id=""endtime" class="form-control" type="text" value="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                <input type="hidden" id="dtp_input1" value="" /><br/>
          </div>
      </div>
        <div class="row" style="padding-right: 1.5%;padding-left: 1.5%;">
            <div class ="col-md-12">
              <div class="form-group">
                <textarea class="form-control" placeholder="简介" rows="3" style="resize: none; height: 200px;" id='content' name='content'></textarea>
              </div>
            </div>
          </div>

        <div class="row">
            <div class="col-md-10" style="padding-left: 2.5%;">
              <div class="form-group">
                <label for="exampleInputFile">资料上传</label>
                <input type="file" id="file" name='file'>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
               <button type="submit" class="btn btn-default" name="btnsubmit" id="btnsubmit">确认提交</button>
            </div>
        </div>
  </div>
</body>

<script>
  $(document).ready(function () {
 
      $('.form_datetime').datetimepicker({
        format: "yyyy-mm-dd hh:00:00",
        startDate: new Date(),
        autoclose: true,
        todayBtn: true,
        language: 'zh-CN',
        initialDate:new Date(),
        minView: 0
       });
  });
 
</script>
</html>

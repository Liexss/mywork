function enter(){
  $account=$("#account").val();
  $password=$("#password").val();

  // window.alert($is_check);
  // var storage = window.localStorage;
  // if($is_check==true)
  // {
  //   storage["account"] = $account;
  //   storage["password"] = $password; 
  //   storage["is_check"] = $is_check; 
  // }else{
  //   storage["account"] = "";
  //   storage["password"] = ""; 
  //   storage["is_check"] = $is_check; 
  // }
  


  if($account==""||$password=="")
    window.alert("账号或密码不能为空");
  else
  {
   var encrypt = new JSEncrypt();
   encrypt.setPublicKey($('#pubkey').val());
   $password = encrypt.encrypt($password);
   //$password=encodeURI($password).replace(/\+/g, '%2B');
   console.log($password);
    //前端加密备用

    $.ajax({
      type:"post",
      url:"Login/enterJudge.php",
      data:JSON.stringify({account:$account,password:$password}),
      contentType:false,
      processData:false,
      async: false,
      timeout: 50000,
      success:function(data){
        if(data.flag=="1")
        {
          // var json =  JSON.stringify(data);

          // console.log(json);
          // console.log(data.id);
          window.location="php/page_php/index.php";
        }else
          window.alert("账号或密码错误");
      },
      error:function(data){
           var json =  JSON.stringify(data);

           console.log(json);
          window.alert("Error");
      }
    });
  }
}
$(document).ready(function() {
  $('#forgetpass').click(function(){
    event.preventDefault();
    alert('请联系管理员 QQ:888888888');
  });
});
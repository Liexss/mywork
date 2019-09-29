$(document).ready(function() {
	 $("#reward").siblings('li').removeClass('active');
	 $("#reward").addClass('active');
	 $("#btnsubmit").click(function(){
          if($('#content').val().length>500){
                alert("概要不能超过500个字符");
          }
          else{
               var data = new FormData();
               var urll="";
               $flag=0;
               data.append("file",document.getElementById("file").files[0]);
               if($("#file").val()!=""){
               $.ajax({
                     url: '../ajax_php/uploadfileann.php',
                     type : 'POST',
                     dataType : 'JSON',
                     data : data,
                     async: false,
                     cache : false,
                      processData : false,
                      contentType : false,
                     success : function(msg) {
                       if (msg['isSuccess']) {
                            console.log(msg);
                            urll=msg['file'];
                         }
                         else {
                            alert('附件大小不能超过2M');
                            $flag=1 ;
                         }    
                     },
                     error:function() {
                       console.log("ERROR1");
                     }
               });
               }
               else{
               	alert("上传文件不得为空");
               	return ;
               }
               if($flag) return;
               var da={'enclosure':urll,'content':$('#content').val(),'prize_id':$('#btnsubmit').val()};
               console.log(da);
              $.ajax({
                url: '../ajax_php/_addReward_apply.php',
                type : 'POST',
                dataType : 'JSON',
                data : da, 
                success : function(msg) {
                     console.log(msg);
                     if (msg['isSuccess']) {
                       alert("申请成功");
                      window.location='submitsituation.php'+'?id='+msg['id'];
                     }
                     else {
                       alert('申请失败');
                       return ;
                     }   
                 },
                 error:function() {
                       console.log("ERROR");
                 }
               });
          }
	 });
});

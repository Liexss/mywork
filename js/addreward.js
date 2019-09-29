$(document).ready(function() {
	$("#reward").siblings('li').removeClass('active');
	$("#reward").addClass('active');
	$("#btn").click(function( ){
          if($('#name').val()==""||$('#money').val()==""||$('#begintime').val()==""||$('#endtime').val()==""){
               alert("输入项不得为空");
          }
          else if($('#begintime').val()>=$('#endtime').val()){
               alert("起始时间需小于结束时间");
          }
          else if($('#name').val().length>=20){
                alert("奖学金名称不能超过20个字符");
          }
          else if($('#content').val().length>500){
                alert("奖学金简介不能超过500个字符");
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
               if($flag) return;
               var da={'enclosure':urll,'content':$('#content').val(),'name':$('#name').val(),'money':$('#money').val(),'begintime':$('#begintime').val(),'endtime':$('#endtime').val(),'teacher_id':$("#selteacher option:selected").attr("id")};
               console.log(da);
              $.ajax({
                url: '../ajax_php/_addReward.php',
                type : 'POST',
                dataType : 'JSON',
                data : da, 
                success : function(msg) {
                     console.log(msg);
                     if (msg['isSuccess']) {
                       alert("添加成功");
                       window.location.href='showreward.php'+'?id='+msg['id'];
                     }
                     else {
                       alert('添加失败');
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
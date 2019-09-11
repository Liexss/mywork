$(document).ready(function() {
	$("#releaseannounce").siblings('li').removeClass('active');
	$("#releaseannounce").addClass('active');
	var E = window.wangEditor;
  	var editor = new E('#editor');
  	// 或者 var editor = new E( document.getElementById('editor') )
  	editor.customConfig.uploadImgShowBase64 = true;
  	editor.create();
    var urll="";
    $("#annconbtn").click(function(){
    	urll="";
    	if($("#anntitle").val()==""){
    		alert("标题不得为空");
    		return ;
    	}
    	if(editor.txt.html()==""){
    		alert("发布内容不得为空");
    		return ;
    	}
    	var data = new FormData();
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
		        console.log("ERROR");
		      }
	   		});
		}
		if($flag)return;
		var da={'enclosure':urll,'content':editor.txt.html(),'theme':$("#anntitle").val()};
		console.log(da);
	    $.ajax({
	      url: '../ajax_php/subann_db.php',
	      type : 'POST',
	      dataType : 'JSON',
	      data : da, 
	      success : function(msg) {
		      console.log(msg);
		      if (msg['isSuccess']) {
		        alert("发布成功");
		        $(location).attr('href', 'showannounce.php'+'?id='+msg['id']);
		      }
		      else {
		        alert('内容过多');
		        return ;
		      }	
		  },
		  error:function() {
		        console.log("ERROR");
		  }
		});
	       
    });
});
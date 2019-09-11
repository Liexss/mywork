$(document).ready(function() {
	$("#releaseannounce").siblings('li').removeClass('active');
	$("#releaseannounce").addClass('active');
    var urll="";
    $("#annconbtn").click(function(){
    	var id= $(this).attr('value');
    	console.log(id);
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
		console.log(urll);
		var da={'ann_id':id,'enclosure':urll,'content':editor.txt.html(),'theme':$("#anntitle").val()};
		console.log(da);
	    $.ajax({
	      url: '../ajax_php/change_db.php',
	      type : 'POST',
	      dataType : 'JSON',
	      data : da, 
	      success : function(msg) {
		      console.log(msg);
		      if (msg['isSuccess']) {
		        alert("发布成功");
		        $(location).attr('href', 'showannounce.php'+'?id='+id);
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

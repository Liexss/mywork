$(document).ready(function() {
	$("#index").siblings('li').removeClass('active');
	$("#index").addClass('active');
    $("#releasebtn").click(function(){
    	 event.preventDefault();
    	 $(location).attr('href', 'releaseannounce.php');
    });
    $(".deleteann").click(function(){
    	event.preventDefault();
    	var str=$(this).attr("id");
    	console.log(str);
    	 $.ajax({
	      url: '../ajax_php/deleteann_db.php',
	      type : 'POST',
	      data : {'id':str},
	      dataType : 'JSON',
	      success : function(msg) {
	        alert("修改成功"); 
	        location.reload();
	      },
	      error:function() {
	        console.log("ERROR");
	      }
	    });
    });
    prePage =function(){
    	event.preventDefault();
		$.ajax({
			type:"post",
			url:"../ajax_php/switchannPage.php",
			data:JSON.stringify({num:-1}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.location="index.php";
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}

	nextPage=function(){
		event.preventDefault();
		$.ajax({
			type:"post",
			url:"../ajax_php/switchannPage.php",
			data:JSON.stringify({num:0}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.location="index.php";
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}

	toPage=function($x){
		event.preventDefault();
		$.ajax({
			type:"post",
			url:"../ajax_php/switchannPage.php",
			data:JSON.stringify({num:$x}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.location="index.php";
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}
	$("#searchbtn").click(function(){
		event.preventDefault();
		console.log($("#searchann").val());
		if($("#searchann").val()==""){
			alert("查询关键字不得为空");
			return false;
		}
		$(location).attr('href', 'searchannounce.php?content='+$("#searchann").val());
	});
});
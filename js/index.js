$(document).ready(function() {
	function urlencode (str) {  
    str = (str + '').toString();   

    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').  
    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
	}
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
		$date=new Date();
		$oldday=new Date($date.getTime()-1);
		document.cookie='_'+$("#searchann").val()+'='+'haha'+';expires='+$oldday.toUTCString();
		// setcookie('_'+$("#searchann").val(), ' ', -1);
		// console.log(urlencode($("#searchann").val().toString()));
		window.open('searchannounce.php?content='+urlencode($("#searchann").val().toString()));
	});
});
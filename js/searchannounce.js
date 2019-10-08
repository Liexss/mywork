$(document).ready(function() {
	$("#index").siblings('li').removeClass('active');
	$("#index").addClass('active');
	$content=document.getElementById("myannounce").getAttribute("value");
	// console.log($content);
    prePage =function(){
    	event.preventDefault();
		$.ajax({
			type:"post",
			url:"../ajax_php/switchseaannPage.php",
			data:JSON.stringify({num:-1}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.location="searchannounce.php?content="+$content;
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
			url:"../ajax_php/switchseaannPage.php",
			data:JSON.stringify({num:0}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.location="searchannounce.php?content="+$content;
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
			url:"../ajax_php/switchseaannPage.php",
			data:JSON.stringify({num:$x}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				// setCookie('_'+$content, ' ', -1);
				window.location="searchannounce.php?content="+$content;
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}
});

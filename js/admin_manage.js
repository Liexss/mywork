$("#people").siblings('li').removeClass('active');
$("#people").addClass('active');
function deleteUser($id){
	$flag=confirm("是否删除?");
	if($flag){
		$.ajax({
			type:"post",
			url:"ajax_php/deleteUser.php",
			data:JSON.stringify({num:$id}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data))
				window.alert("删除成功!");
				window.location="admin_manage.php";
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}
}

function editUser($id){
	$.ajax({
		type:"post",
		url:"ajax_php/editMessage.php",
		data:JSON.stringify({num:$id}),
		dataType:"json",
		success:function(data){
			window.location="admin_edit.php";
		},
		   	error:function(){
		    window.alert("error");
		}
	});
}
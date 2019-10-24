$("#people").siblings('li').removeClass('active');
$("#people").addClass('active');
$(".delete").click(function(){
	$flag=confirm("是否删除?");
	$id=$(this).attr("id");
	if($flag){
		console.log($id);
		$.ajax({
			type:"post",
			url:"../ajax_php/deleteUser.php",
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
});
$(".editque").click(function(){
    event.preventDefault();
    $str=$(this).attr("id");
    if( $("#name"+$str).val()==""){
    	alert("姓名不能为空");
    }
    else if($("$password"+$str).val()!=$("$repassword"+$str).val()){
    	alert("密码不一致");
    }
    else {
	    $data = {
	              'student_id':$str,
	              'name' : $("#name"+$str).val(),
	              'college' : $("#college"+$str).val(),
	              'class' : $("#class"+$str).val(),
	              'dept_name' : $("#dept_name"+$str).val(),
	        }
	    console.log($data);
	    $.ajax({
	      url: '../ajax_php/changepeople_db.php',
	      type : 'POST',
	      data : $data,
	      dataType : 'JSON',
	      success : function(msg) {
	        alert("修改成功"); 
	        location.reload();
	      },
	      error:function() {
	        console.log("ERROR");
	      }
	    });
	}
});

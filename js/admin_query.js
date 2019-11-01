$("#people").siblings('li').removeClass('active');
$("#people").addClass('active');
function queryUser(){
	var search=$("#search").val();
	if(search==""){
		alert("关键词不能为空");
	}
	else {
		var option=$("#option").val();
		// console.log(search);
		// console.log(option);
		$.ajax({
			type:"post",
			url:"../ajax_php/queryUser.php",
			data:JSON.stringify({Sinput:search,Oinput:option}),
			dataType:"json",
			success:function(data){
				// window.alert(JSON.stringify(data));
				// console.log(data);
				var flag=false;
				for(var x in data){
				    flag=true;
				}
				if(flag==false){
					window.alert("寻找不到相关信息");
					$("#queTable").html("<tr><td>身份</td>"+"<td>学号</td>"+"<td>姓名</td>"+"<td>学院</td>"+"<td>专业</td>"+"<td>班级</td></tr>");
				}
				else
				{	
					$("#queTable").empty();
					$("#queTable").html("<tr><td>身份</td>"+"<td>学号</td>"+"<td>姓名</td>"+"<td>学院</td>"+"<td>专业</td>"+"<td>班级</td></tr>");
					$(data).each(function(i,values){
						$("#queTable").append(
							"<tr><td>"+values.work+"</td>"
							+"<td>"+values.student_id+"</td>"
							+"<td>"+values.name+"</td>"
							+"<td>"+values.college+"</td>"
							+"<td>"+values.dept_name+"</td>"
							+"<td>"+values.class+"</td></tr>"
						);
					});
					window.alert("Search success");
				}
		    },
		    error:function(){
		    	window.alert("error");
		    }
		});
	}
}
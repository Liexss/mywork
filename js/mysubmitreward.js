$(document).ready(function() {
	$("#mysubmitreward").siblings('li').removeClass('active');
	$("#mysubmitreward").addClass('active');
	console.log(123);
	$('#datatable').DataTable({
		pageLength:8,
		searching: true,
		bLengthChange: false,
		"order": [[ 2, "desc" ]]
	});
	$("#deleteid").click(function(){
		event.preventDefault();
		$id= $("#deleteid").attr("name");
		//console.log($id);
		$flag=confirm("是否撤回?");
		if($flag){
			$.ajax({
				url: '../ajax_php/delete_apply.php',
				type : 'POST',
				data : {'id':$id},
				dataType : 'JSON',
				success : function(msg) {
					alert("撤回成功"); 
					location.reload();
				},
				error:function() {
					console.log("ERROR");
				}
			});
		}
	});
});

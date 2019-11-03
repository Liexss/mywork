$(document).ready(function() {
	$("#reward").siblings('li').removeClass('active');
	$("#reward").addClass('active');
	$("#delebtn").click(function(){
		$flag=confirm("是否删除?");
		$id=$(this).attr("id");
		if($flag){
			console.log($id);
			$.ajax({
				type:"post",
				url:"../ajax_php/deleteReward.php",
				data:JSON.stringify({num:$id}),
				dataType:"json",
				success:function(data){
// window.alert(JSON.stringify(data))
window.alert("删除成功!");
window.location="rewardlist.php?1";
},
error:function(){
	window.alert("error");
}
});
		}
	});
});
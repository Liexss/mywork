$(document).ready(function() {
	 $("#index").siblings('li').removeClass('active');
	 $("#index").addClass('active');
	$("#page").paging({
		pageNum: 7, //总页码
		callback: function (num) { //回调函数,num为当前页码
			console.log(num);
		}
	});
});

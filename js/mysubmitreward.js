$(document).ready(function() {
	$("#mysubmitreward").siblings('li').removeClass('active');
	$("#mysubmitreward").addClass('active');
	console.log(123);
	$('#datatable').DataTable({
		pageLength:8,
		searching: true,
		bLengthChange: false,
	});
});

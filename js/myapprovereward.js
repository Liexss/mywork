$(document).ready(function() {
	 $("#myapprovereward").siblings('li').removeClass('active');
	 $("#myapprovereward").addClass('active');
	$('#datatable').DataTable({
		pageLength:8,
		searching: true,
		bLengthChange: false,

	});
});

$(document).ready(function() {
	 $("#rewardlist").siblings('li').removeClass('active');
	 $("#rewardlist").addClass('active');
	$('#datatable').DataTable({
		pageLength:6,
		searching: false,
		bLengthChange: false,
	});
});

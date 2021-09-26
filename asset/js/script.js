$(document).ready(function() {
	$(".fa-bars").click(function() {
		$("#sidebar").removeClass('d-none')
	});
	$(".fa-times").click(function() {
		$("#sidebar").addClass('d-none')
	});
});

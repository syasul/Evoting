$(document).ready(function() {
	$('.nav-active').on('click', function() {
		$('.nav-active').removeClass('active');
		$(this).addClass('active');
		});
});
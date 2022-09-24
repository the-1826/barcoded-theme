jQuery(document).ready(function($) {
	$('.menu-open').on('click', function(e) {
		e.preventDefault();
		$('.mobile-menu').slideToggle(200);
	});
	$('.mobile-menu .close').on('click', function(e) {
		e.preventDefault();
		$('.mobile-menu').slideToggle(200);
	});
});
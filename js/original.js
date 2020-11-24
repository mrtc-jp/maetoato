(function($) {
	var pagetop = $('#pagetop');
	pagetop.hide();
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			pagetop.fadeIn();
		} else {
			pagetop.fadeOut();
		}
	});
	$('a[href^="#"]').click(function() {
		var speed = 500;
		var anime = 'swing';
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').animate({
			scrollTop: position
		}, speed, anime);
		return false;
	});
})(jQuery);

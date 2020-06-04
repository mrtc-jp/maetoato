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
	pagetop.click(function() {
		$('body, html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
})(jQuery);

//Google Form
function postToGoogle() {
	
	var field1 = $('[name="entry.2005620554"]').val();
	var field2 = $('[name="entry.458755392"]').val();
	var field3 = $('[name="entry.1045781291"]').val();
	var field4 = $('[name="entry.1065046570"]').val();
	var field5 = $('[name="entry.1166974658"]').val();
	var field6 = $('[name="entry.839337160"]').val();
	
	$.ajax({
		url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSf9S4UZv77XHYUe24kUSlxYNv08TIeiOE4-KvEgBzFlCttEfg/formResponse",
		data: {
			"entry.2005620554": field1,
			"entry.458755392": field2,
			"entry.1045781291": field3,
			"entry.1065046570": field4,
			"entry.1166974658": field5,
			"entry.839337160": field6
		},
		type: "POST",
		dataType: "xml"
	});
}

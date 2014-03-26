$( "#copyleft" ).stop().hover(function() {
	$( "#copyleft" ).animate({opacity: 0.8}, 'fast');
});

$( "#copyleft" ).stop().mouseleave(function() {
	$( "#copyleft" ).animate({opacity: 0.4}, 'fast');
});

$( "#copyleft" ).stop().click(function() {
	$( "#overlay" ).fadeIn();
});

$('#overlay').on('click', function (e) {
    var $parent = $('#overlay'),
        $eventTarget = $(e.target);
    
    if ($parent.has($eventTarget).length === 0) {
        $( "#overlay" ).fadeOut('fast');
    }
});

$( document.body ).stop().keypress(function() {
	$( "#overlay" ).fadeOut('fast');
});
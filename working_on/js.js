var avancement = "1%";

$( "#copyleft" ).hover(function() {
	$( "#copyleft" ).animate({opacity: 0.8}, 'fast');
});

$( "#copyleft" ).mouseleave(function() {
	$( "#copyleft" ).animate({opacity: 0.4}, 'fast');
});

$( "#copyleft" ).click(function() {
	$( "#overlay" ).fadeIn();
});

$( document ).ready(function() {
	$( ".meter-value" ).animate({width: avancement}, 'slow');
	$( ".avancement" ).text(avancement);
});


$('#overlay').on('click', function (e) {
    var $parent = $('#overlay'),
        $eventTarget = $(e.target);
    
    if ($parent.has($eventTarget).length === 0) {
        $( "#overlay" ).fadeOut('fast');
    }
});

$( document.body ).keypress(function() {
	$( "#overlay" ).fadeOut('fast');
});
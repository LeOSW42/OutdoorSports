$( "#copyleft" ).stop().hover(function() {
	$( "#copyleft" ).animate({opacity: 0.8}, 'fast');
});

$( "#copyleft" ).stop().mouseleave(function() {
	$( "#copyleft" ).animate({opacity: 0.4}, 'fast');
});
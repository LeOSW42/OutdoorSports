var headerPresent = 1;

function headerToogle(duration) {
		if (headerPresent==1) {
			$('header').slideToggle(duration)
			$('header p').slideToggle(duration)
			$('header img').slideToggle(duration)
			$( "nav" ).animate({marginTop: 0}, duration);
			$( "nav" ).rotate({
				duration:duration,
	 			animateTo:0
			});
			$( "#arrow" ).rotate({
				duration:duration,
				angle: 180,
	 			animateTo:0
			});
			$('nav').css({position: "fixed"});
			headerPresent = 0;
		}
		else {
			$('header').slideToggle(duration)
			$('header p').slideToggle(duration)
			$('header img').slideToggle(duration)
			$( "nav" ).animate({marginTop: "-14px"}, duration);
			if ($(document).width()>1400) {
				$( "nav" ).rotate({
					duration:duration,
		 			animateTo:-0.5
				});
			}
			else {
				$( "nav" ).rotate({
					duration:duration,
		 			animateTo:-1
				});
			};
			$( "#arrow" ).rotate({
				duration:duration,
				angle: 0,
	 			animateTo:180
			});
			$('nav').css({position: "absolute"});
			headerPresent = 1;
		};
		$.get("include/session.php?header_update="+headerPresent);
}

$( document ).ready(function() {
// That makes the 3 mountains moving on the header
	$("header").bind('mousemove',function(e){ 
		var p = $( "header" );
		var width = $("header").width();
		var position = p.position();
		var mousePos = (e.pageX - position.left)*100 / width;
	 	$("#mount2").css({right: 200-mousePos+"px"});
	 	$("#mount3").css({right: 400-2*mousePos+"px"});
	});

// That animates the copyleft logo (on hover) and create the overlay
	$( "#copyleft" ).mouseenter(function() {
		$( "#copyleft" ).animate({opacity: 0.8}, 'fast');
	});

	$( "#copyleft" ).mouseleave(function() {
		$( "#copyleft" ).animate({opacity: 0.4}, 'fast');
	});

	$( "#copyleft" ).click(function() {
		$( "#overlay" ).fadeIn();
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
});
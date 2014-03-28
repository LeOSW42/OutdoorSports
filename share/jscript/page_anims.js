var headerPresent = 1;

$( document ).ready(function() {
	$('#arrow').click(function() {
		if (headerPresent==1) {
			$('header').slideToggle(300)
			$('header p').slideToggle(300)
			$( "nav" ).animate({marginTop: 0}, 300);
			$( "nav" ).rotate({
				duration:300,
	 			animateTo:0
			});
			$( "#arrow" ).rotate({
				duration:300,
				angle: 180,
	 			animateTo:0
			});
			$('nav').css({position: "fixed"});
			headerPresent = 0;
		}
		else {
			$('header').slideToggle(300)
			$('header p').slideToggle(300)
			$( "nav" ).animate({marginTop: "-14px"}, 300);
			if ($(document).width()>1400) {
				$( "nav" ).rotate({
					duration:300,
		 			animateTo:-0.5
				});
			}
			else {
				$( "nav" ).rotate({
					duration:300,
		 			animateTo:-1
				});
			};
			$( "#arrow" ).rotate({
				duration:300,
				angle: 0,
	 			animateTo:180
			});
			$('nav').css({position: "absolute"});
			headerPresent = 1;
		};
	});

// That makes the 3 mountains moving on the header
	$("header").bind('mousemove',function(e){ 
		var p = $( "header" );
		var width = $("header").width();
		var position = p.position();
		var mousePos = (e.pageX - position.left)*100 / width;
	 	$("header img").css({marginLeft: -mousePos/15+"%"});
	});

// That animates the copyleft logo (on hover) and create the overlay
	$( "#copyleft" ).hover(function() {
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
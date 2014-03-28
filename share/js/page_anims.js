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
			headerPresent = 1;
		};
	});


	$("header").bind('mousemove',function(e){ 
		var p = $( "header" );
		var width = $("header").width();
		var position = p.position();
		var mousePos = (e.pageX - position.left)*100 / width;
	 	$("header img").css({marginLeft: -mousePos/15+"%"});
	}); 
});
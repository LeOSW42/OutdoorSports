var headerPresent = 1;

$( document ).ready(function() {
	$('#arrow').click(function() {
		if (headerPresent==1) {
			$( "header" ).animate({height: 0}, 300);
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
			$( "header" ).animate({height: 110}, 300);
			$( "nav" ).animate({marginTop: "-14px"}, 300);
			$( "nav" ).rotate({
				duration:300,
	 			animateTo:-1
			});
			$( "#arrow" ).rotate({
				duration:300,
				angle: 0,
	 			animateTo:180
			});
			headerPresent = 1;
		};
	});
});
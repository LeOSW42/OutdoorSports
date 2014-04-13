<aside id="buttons"><span id="map_button">Carte</span><span id="list_button">Liste</span><span id="search_button">Rechercher</span></aside>

	<div id="map"></div>
	<div id="list">
		<p>Petit descriptif de liste</p><br>
		<a href="?/guides/guide">Exemple de randonnée</a>
	</div>
	<div id="search">
		<p>Non implémenté</p>		
	</div>

<script type="text/javascript">

// ******** Generating the Leaflet map ********

// IGN URL to the IGN layer
var KeyIGN = "mvyjs9blkl0qe94kg23zmxtf" // professionels.ign.fr

var url_wmts_ign =  "http://wxs.ign.fr/"+ 
    KeyIGN + 
    "/geoportail/wmts?LAYER="+
    "GEOGRAPHICALGRIDSYSTEMS.MAPS"+
    "&EXCEPTIONS=text/xml&FORMAT="+
    "image/jpeg"+
    "&SERVICE=WMTS&VERSION=1.0.0&REQUEST=GetTile&STYLE="+
    "normal"+
    "&TILEMATRIXSET=PM&&TILEMATRIX={z}&TILECOL={x}&TILEROW={y}"; // Correct tile

// Differents layers for the map
var	osmfr   = L.tileLayer('http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {maxZoom: 20, attribution: 'Maps © <a href="http://www.openstreetmap.fr">OpenSreetMap France</a>, Data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'});
    outdoor  = L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png', {maxZoom: 18, attribution: 'Maps © <a href="http://www.thunderforest.com">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'}),
    ign  = L.tileLayer(url_wmts_ign, {maxZoom: 18, attribution: 'Maps & Data © <a href="http://www.ign.fr/">IGN</a>'});

// Creation of the map
var map = L.map('map', {
  layers: [outdoor],
  fullscreenControl: true, // Fullscreen button
  fullscreenControlOptions: {
    position: 'topleft'
  }}).setView([47, 2], 6); // Hole france

// Mouse Scroll API
map.addControl(new L.Control.MouseScroll());

// Base layers
var baseLayers = {
	"OSM France": osmfr,
	"OSM Outdoor": outdoor,
	"IGN France": ign
};
L.control.layers(baseLayers).addTo(map);


// ******** Change the #map div size on events  ********

// On window resize
$(window).resize(function() {
	if ($(window).width()>500) {
		if (headerPresent==1) {
			$("#map").height($("body").height()-$("header").height()-41).width(0.94*$(window).width());
		}
		else {
			$("#map").height($("body").height()-41).width(0.94*$(window).width());
		}
	}
	else {
		$("#map").height($("body").height()-$("header").height()-41).width($(window).width());
	};
	map.invalidateSize();
}).trigger("resize");

// On header slide toggle (also moves the button top spacing)
$('#arrow').click(function() {
	if(headerPresent==1) {
		$("#map").animate({height: $("body").height()-41}, 300);
		$(".leaflet-control-container .leaflet-top.leaflet-right").animate({marginTop: 80}, 300);
		$("#buttons").animate({top: 50}, 300, function(){map.invalidateSize();});
	}
	else {
		$("#map").animate({height: $("body").height()-$("header").height()-41}, 300);
		$(".leaflet-control-container .leaflet-top.leaflet-right").animate({marginTop: 60}, 300);
		$("#buttons").animate({top: 30}, 300, function(){map.invalidateSize();});
	}
});

// On fullscreen enter (also moves the button top spacing)
map.on('enterFullscreen', function(){
	$(".leaflet-control-container .leaflet-top").css({marginTop: 5});
});

// On fullscreen exit (also moves the button top spacing)
map.on('exitFullscreen', function(){
	if(headerPresent==1) {
		$("#map").css("height", $("body").height()-$("header").height()-41);
		$(".leaflet-control-container .leaflet-top.leaflet-right").css({marginTop: 60});
		$(".leaflet-control-container .leaflet-top.leaflet-left").css({marginTop: 30});
	}
	else {
		$("#map").css("height", $("body").height()-41);
		$(".leaflet-control-container .leaflet-top.leaflet-right").css({marginTop: 80}, 300);
		$(".leaflet-control-container .leaflet-top.leaflet-left").css({marginTop: 30});
	}
	map.invalidateSize();
});

// ******** Makes the pages buttons working  ********

$("#map_button").click(function() {
	if ($("#list").css("display")=="none") {
		$("#search").fadeOut(100, function(){$("#map").fadeIn();});
	}
	else {
		$("#list").fadeOut(100, function(){$("#map").fadeIn();});
	}
});
$("#list_button").click(function() {
	if ($("#search").css("display")=="none") {
		$("#map").fadeOut(100, function(){$("#list").fadeIn();});
	}
	else {
		$("#search").fadeOut(100, function(){$("#list").fadeIn();});
	}
});
$("#search_button").click(function() {
	if ($("#list").css("display")=="none") {
		$("#map").fadeOut(100, function(){$("#search").fadeIn();});
	}
	else {
		$("#list").fadeOut(100, function(){$("#search").fadeIn();});
	}
});

</script>
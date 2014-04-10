<aside id="buttons"><span id="map_button">Carte</span><span id="list_button">Liste</span><span id="search_button">Rechercher</span></aside>

	<div id="map"></div>
	<div id="list">
		<p>Petit descriptif de list</p><br>
		<a href="?/guides/guide">Exemple de randonnée</a>
	</div>
	<div id="search">
		<p>Non implémenté</p>		
	</div>

<script type="text/javascript">

var KeyIGN = "mvyjs9blkl0qe94kg23zmxtf"

var url_wmts_ign =  "http://wxs.ign.fr/"+ 
    KeyIGN + 
    "/geoportail/wmts?LAYER="+
    "GEOGRAPHICALGRIDSYSTEMS.MAPS"+
    "&EXCEPTIONS=text/xml&FORMAT="+
    "image/jpeg"+
    "&SERVICE=WMTS&VERSION=1.0.0&REQUEST=GetTile&STYLE="+
    "normal"+
    "&TILEMATRIXSET=PM&&TILEMATRIX={z}&TILECOL={x}&TILEROW={y}";

var osm   = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: 'Maps & Data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'}),
    outdoor  = L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png', {attribution: 'Maps © <a href="http://www.thunderforest.com">Thunderforest</a>, Data © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'});
    ign  = L.tileLayer(url_wmts_ign, {attribution: '&copy; <a href="http://www.ign.fr/">IGN</a>'});

var map = L.map('map', {
  layers: [outdoor],
  fullscreenControl: true,
  fullscreenControlOptions: {
    position: 'topleft'
  }}).setView([47, 2], 6);

map.addControl(new L.Control.MouseScroll());

var baseLayers = {
	"OpenStreetMap": osm,
	"Outdoor (OSM)": outdoor,
	"IGN": ign
};

L.control.layers(baseLayers).addTo(map);


// Map div size

$(window).resize(function() {
	if ($(window).width()>500) {
		$("#map").height($("body").height()-$("header").height()-41).width(0.94*$(window).width());
	}
	else {
		$("#map").height($("body").height()-$("header").height()-41).width($(window).width());
	};
	map.invalidateSize();
}).trigger("resize");

$('#arrow').click(function() {
	if(headerPresent==1) {
		$("#map").animate({height: $("body").height()-41}, 300);
		$(".leaflet-control-container .leaflet-top.leaflet-right").animate({marginTop: 80}, 300);
		$("#buttons").animate({top: 50}, 300);
	}
	else {
		$("#map").animate({height: $("body").height()-$("header").height()-41}, 300);
		$(".leaflet-control-container .leaflet-top.leaflet-right").animate({marginTop: 60}, 300);
		$("#buttons").animate({top: 30}, 300);
	}
	map.invalidateSize();
});

map.on('enterFullscreen', function(){
	$(".leaflet-control-container .leaflet-top").css({marginTop: 5});
});

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

// Page layers

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
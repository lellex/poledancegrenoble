/*jshint sub:true */


//Fonction d'initialisation de la Google Map de pied de page
// --------------------------------- //

// Multiple Markers
var markers = [
  {
  	title: 'Ecole Grenoble',
  	infos: '7 rue des Arts et métiers - Grenoble', 
  	lat: 	45.184389, 
  	lng: 	5.704564
  },
  {
  	title: 'Ecole Gières/Saint Martin d\'hères',
  	infos: 	'14 A Rue Mayencin à Gières/Saint Martin d\'hères',
  	lat: 	45.187704, 
  	lng: 	5.777684
  }
];

function initializeGmap() {
	var styles = [
		{ 
		"stylers": [
		  { "visibility": "on" },
		  { "hue": "#e6e2e0" },
		  { "saturation": -80 },
		  { "lightness": +20 },
		  { "gamma": 0.79 }
		]
		}
	]; 

  var mapOptions = {
  	scrollwheel: false,
    center: new google.maps.LatLng(45.184389, 5.650464),
		zoom: 12,
    mapTypeId: 'Styled'
  };

  var map = new google.maps.Map(document.getElementById('map_zone'),
      mapOptions);

  var bounds = new google.maps.LatLngBounds();
  var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });  
  map.mapTypes.set('Styled', styledMapType); 

  for (var i in markers) {
    var position = new google.maps.LatLng(markers[i].lat, markers[i].lng);
    bounds.extend(position);
    var marker = new google.maps.Marker({
      position: position,
      map: map,
      title: markers[i].title
    });

    attachInfos(marker, i);
  }
}

// The five markers show a secret message when clicked
// but that message is not within the marker's instance data
function attachInfos(marker, num) {
  var infowindow = new google.maps.InfoWindow({
    content: markers[num].infos,
    maxWidth: 180
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(marker.get('map'), marker);
  });
}


// Chargement des scripts pour la version bureau
// --------------------------------- //
function loadDeskScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
      'callback=initializeGmap';
  document.body.appendChild(script);
}


// Egalise les colonnes de la section les cours
// --------------------------------- //
function equalizeCols() {
	$('#cours .col-2, #cours .col-1').height('auto');
	if (matchMedia(Foundation.media_queries['medium']).matches){
		var col1 = $('#cours .col-1').outerHeight();
		var col2 = $('#cours .col-2').outerHeight();
		if (col1 > col2) {
			$('#cours .col-1, #cours .col-2').outerHeight(col1);
		} else {
			$('#cours .col-1, #cours .col-2').outerHeight(col2);
		}
	} 
}
  

// Ajuste le header à la hauteur de l'écran
// --------------------------------- //
function resizeBanner() { 
	var heightWindow = $(window).innerHeight();
	var menuHeight = $('#menu-main-menu').outerHeight();
	var sliderHeight = heightWindow - menuHeight;
	$('#banner').css({'height':sliderHeight});
} 
   
   

// DOM READY
// --------------------------------- //
jQuery(document).ready(function(){
	resizeBanner();
	equalizeCols();

	// Si on est sur bureau, chargement de la map
	if (matchMedia(Foundation.media_queries['medium']).matches){
		loadDeskScript();
	}

	// /*FORMULAIRE DE CONTACT*/
	//Traitement à l'envoi du formulaire
	$('#contact form').on("submit", function(event){
		//Annule le comportement par défaut de l'envoi du formulaire
		event.preventDefault();

		var name = $('#name').val();
		var email = $('#email').val();
		var comment = $('#comment').val();
		$.post($('#contact form').attr('action'), {
			name:name,
			email:email,
			comment:comment,
			js:'ok'
		}, function(js){
			if(js=='ok'){
				//Message ok
				message = "Votre message a bien été envoyé, merci. Nous vous contacterons dans les meilleurs délais.";
			}else{
				//Message NOK
				message = "Le mail n'a pas pu être envoyé. Vous pouvez utiliser l'adresse suivante : poledancegrenoble@hotmail.fr.";
				$("#confirm-message").addClass('error');
			}
			$("#confirm-message p").html(message);
			$("#confirm-message").fadeIn();
		});
		//Annule les retours
		return false;
	});

	$("#confirm-message .close").on('click', function(){
		$("#confirm-message").fadeOut();
	});
}); 
  

// RESIZE
// --------------------------------- //
jQuery(window).resize(function(){
	resizeBanner();
	equalizeCols();
});


// SCROLL
// --------------------------------- //
jQuery(window).scroll(function() {
    // Rotate profil
    var theta = $(window).scrollTop() % Math.PI;
	jQuery('.bar').css({ transform: 'rotate(' + theta*0.3 + 'rad)' });
	jQuery('.bar').css({ transform: 'rotate(-' + theta*0.3 + 'rad)' });
});


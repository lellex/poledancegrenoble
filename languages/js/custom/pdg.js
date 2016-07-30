var heightWindow = jQuery(window).innerHeight();
var menuHeight = jQuery('#menu').height();
var sliderHeight = heightWindow - menuHeight;

function resizeSlider() {
	var heightWindow = jQuery(window).innerHeight();
	var menuHeight = jQuery('#menu').height();
	var sliderHeight = heightWindow - menuHeight;
	console.log(heightWindow);
	jQuery('#slider').height(sliderHeight);
}

// function equalizeCols() {
// 	var col1 = $('#cours .col-1').height();
// 	var col2 = $('#cours .col-2').height();
// }

//Fonction d'initialisation de la Google Map de pied de page
function initializeGmap() {
	var mapOptions =  {  
	    mapTypeControlOptions: {  
	        mapTypeIds: ['Styled']  
	    },  
        center: new google.maps.LatLng(45.184389, 5.700464),  
        zoom: 16,  
        disableDefaultUI: true,
	    scrollwheel: false,
    	navigationControl: true,
    	scaleControl: true,
        mapTypeId: 'Styled'  
    };


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

	var map = new google.maps.Map(document.getElementById("map_zone"),
	mapOptions);

	var myLatLng = new google.maps.LatLng(45.184389, 5.704564);

	var myIcon = new google.maps.MarkerImage("http://test.lellex.fr/poledancegrenoble/wp-content/themes/PoleDanceGrenoble/assets/img/images/pin.png", null, null, null, new google.maps.Size(91,137));

	var marker = new google.maps.Marker({
	  position: myLatLng,
	  map: map,
	  icon: myIcon
	});

	var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });  
    map.mapTypes.set('Styled', styledMapType); 
}


// DOM READY
// --------------------------------- //
jQuery(document).ready(function(){
	resizeSlider();
	initializeGmap();
	
	jQuery('.parallax').scrolly({bgParallax: false});


	// Itération bar profil
	// $('.bar').each( function( index ) {
 	//   index++;
	//   $(this).addClass('bar-' + index);
	// });


	// Smooth scroll
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    jQuery('html,body').animate({
		      scrollTop: target.offset().top
		    }, 1000);
		    return false;
		  }
		}
	});


	// /*FORMULAIRE DE CONTACT*/
	//Traitement à l'envoi du formulaire
	$('#contact form').on("submit", function(event){
		//Annule le comportement par défaut de l'envoi du formulaire
		event.preventDefault();

		var name = $('#name').val();
		var email = $('#email').val();
		var comment = $('#message').val();
		$.post($('#contact form').attr('action'), {
			name:name,
			email:email,
			comment:comment,
			js:'ok'
		}, function(msg){
			if(msg=='ok'){
				//Message ok
				message = "Votre message a bien été envoyé, merci. Nous vous contacterons dans les meilleurs délais.";
			}else{
				//Message NOK
				message = "Le mail n'a pas pu être envoyé. Vous pouvez envoyer un mail à l'adresse suivante : poledancegrenoble@hotmail.fr.";
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
	resizeSlider();
});


// SCROLL
// --------------------------------- //
jQuery(window).scroll(function() {

	// Fixed menu
    if (jQuery(this).scrollTop() > sliderHeight) {
        jQuery("#menu").css({"position": "fixed", "top": 0});
    } 
    else {
        jQuery('#menu').css('position','absolute');
    }

    // Rotate profil
    var theta = $(window).scrollTop() % Math.PI;
	jQuery('.bar').css({ transform: 'rotate(' + theta*0.3 + 'rad)' });
	jQuery('.bar').css({ transform: 'rotate(-' + theta*0.3 + 'rad)' });

	// Scrolldown button
	if (jQuery(this).scrollTop() > sliderHeight*0.3) {
        jQuery(".scrolldown").stop(true, false).animate({
        	opacity: 0
        }, 100);
    } else {
    	jQuery(".scrolldown").stop(true, false).animate({
    		opacity: 0.6
    	}, 100);
    }
});


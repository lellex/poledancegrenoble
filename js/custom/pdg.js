/*jshint sub:true*/

var heightWindow = $(window).innerHeight();
var menuHeight = $('nav').height();
var sliderHeight = heightWindow - menuHeight;

// Parallax Scrolling 
// --------------------------------- //
function parallaxScrolling() {
	// Cache the Window object
	$window = $(window);
	
	$(this).data('speed', $(this).attr('data-speed'));
	$(this).data('fix', $(this).attr('data-fix'));
	
	// For each element that has a data-type attribute
	$('[data-type="background"]').each(function() {
		var $self = $(this),
		offsetCoords = $self.offset(),
		topOffset = offsetCoords.top, 
		scrollDown = ($('.scrolldown')),
		limit = 30;
		
	    $(window).scroll(function() {
	    	// Animation des images
	    	if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
				( (topOffset + $self.height()) > $window.scrollTop() ) ) {

				var yPos = -($self.data('fix') - ($window.scrollTop() - topOffset) * $self.data('speed')); 
				var coords = '80% '+ yPos + 'px';
				$self.css({ backgroundPosition: coords });												
			}

			// Bouton scrolldown
			if ($window.scrollTop() <= limit) {
				scrollDown.css({ 'opacity' : (1 - $window.scrollTop()/limit) });
			}
		}); 
	});     
} 

  
// DOM READY
// --------------------------------- //
$(document).ready(function(){

	// Parallax Scrolling 
	if (matchMedia(Foundation.media_queries['medium']).matches) {
		parallaxScrolling();
	}
	
	// Menu mobile
	menu = $('#menu-main-menu');
	$('body').on('click', '.menu-mob', function(){
		if (!matchMedia(Foundation.media_queries['medium']).matches) {
			if(!menu.attr('data-toggle') || menu.attr('data-toggle') == 'false') {
				$('#menu-main-menu li:not(.accueil)').fadeIn();
				menu.attr('data-toggle','true');
			} else {
				$('#menu-main-menu li:not(.accueil)').fadeOut();
				menu.attr('data-toggle','false');
			}
			var menuMobHeight = ($('#menu-main-menu li').height()) * (($('#menu-main-menu li').length) -1);
			if ($(window).scrollTop() < menuMobHeight) {
		    	$('html,body').animate({
			      scrollTop: heightWindow
			    }, 1000);
		    } 
		}
		return false;
	});

	$('body').on('click', function(){
		if (!matchMedia(Foundation.media_queries['medium']).matches) {
			if(menu.attr('data-toggle') == 'true') {
				$('#menu-main-menu li:not(.accueil)').fadeOut();
				menu.attr('data-toggle','false');
			}
		}
	});
  
 
	// Smooth scroll
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    $('html,body').animate({
		      scrollTop: target.offset().top
		    }, 1000);

		    if (!matchMedia(Foundation.media_queries['medium']).matches) {
				$('#menu-main-menu li:not(.accueil)').fadeOut();
				menu.attr('data-toggle','false');
			}
		    return false;
		  }
		}
	}); 


	// Lightbox
	$('.gallery a').magnificPopup({
		type:'image',
		gallery:{
			enabled:true
		}
	});

	$('.ajax-popup-link').magnificPopup({
		type:'ajax',
		callbacks: {
			parseAjax: function(mfpResponse) {
				console.log('ok');
				mfpResponse.data = $(mfpResponse.data).find('#planning-table');

				console.log('Ajax content loaded:', mfpResponse);
			},
			ajaxContentAdded: function() {
				console.log('ok2');
				// Ajax content is loaded and appended to DOM
				console.log(this.content);
			}
		}
	});
}); 
  
 
// RESIZE
// --------------------------------- //
$(window).resize(function(){

	if (matchMedia(Foundation.media_queries['medium']).matches) {
	  	$('#menu-main-menu li:not(.accueil)').fadeIn();
		menu.attr('data-toggle','false');
		parallaxScrolling();
	}

}); 
  


// SCROLL
// --------------------------------- //
$(window).scroll(function() {

	// Fixed menu
	if($('.home').is(':visible')) {
	    if ($(this).scrollTop() > heightWindow) {
	        $("nav").css({"position": "fixed", "top": 0});
	    } 
	    else {
	        $('nav').css('position','absolute');
	    }
	} else {
		if ($(this).scrollTop() > 300) {
	        $("nav").css({"position": "fixed", "top": 0});
	    } 
	    else {
	        $('nav').css('position','absolute');
	    }
	}
	
});


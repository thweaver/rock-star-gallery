$(function() {

FastClick.attach(document.body);

///////// Variables

var 
	html = $('html'),
	win = $( window ),
	searchContainer = $('.search-input'),
	hamburger = $('.hamburger'),
	searchInput = $('.search-text');

///////// Retina Class

if (window.matchMedia) { 
	var mq = window.matchMedia("only screen and (-moz-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)");
	if(mq && mq.matches) {
		document.documentElement.className += ' retina';
	}
}

///////// Loaded Class

win.on( 'load', function() {
	html.addClass( 'loaded' );
});

///////// Search Input

searchInput.on('focus', function(){
  searchContainer.addClass('search-focus');
});
searchInput.on('blur', function(){
  searchContainer.removeClass('search-focus');
});

///////// Hamburger

hamburger.click(function(e){
	e.preventDefault();
	html.toggleClass('js-nav-open');
});

//////// Flickity

var flickityGallery = $( '.js-slider' );

flickityGallery.flickity({
	cellAlign: 'center',
	autoPlay: 4000,
	imagesLoaded: true,
	wrapAround: true,
	pageDots: false,
	resize: false,
	prevNextButtons: true
});

var flickityGalleryData = flickityGallery.data( 'flickity' );

win.on( 'resize', function() {
	if( flickityGalleryData ) {
		flickityGalleryData.resize();
	}
});

////////// Sticky Footer 

function stickyFooter() {
	var footerHeight = $("footer").height();
	$(".wrapper").css("padding-bottom", footerHeight);
	$("footer").css("margin-top", -footerHeight);
}
win.on( 'load resize', stickyFooter );


//////// Venobox

$('.venobox').venobox(); 

}); // jQuery
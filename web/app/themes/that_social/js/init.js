jQuery(document).ready(function($) {

	"use strict";

	// // Mobile search
	// $('#top-search i.search-toggle').on('click', function ( e ) {
	// 	e.preventDefault();
  //   	$('.show-search').slideToggle('fast');
  //   });

	// // Menu
	// $('#main-menu').slicknav({
	// 	prependTo:'#mobile-menu',
	// 	label:'',
	// 	allowParentLinks: true
	// });


	// var transEndEventNames = {
	// 	'WebkitTransition': 'webkitTransitionEnd',
	// 	'MozTransition': 'transitionend',
	// 	'OTransition': 'oTransitionEnd',
	// 	'msTransition': 'MSTransitionEnd',
	// 	'transition': 'transitionend'
	// },
	// transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
	// support = { transitions : Modernizr.csstransitions };
	//
	// function toggleOverlay( menu ) {
	// 	if( classie.has( menu, 'open' ) ) {
	// 			classie.remove( menu, 'open' );
	// 			classie.add( menu, 'close' );
	// 			var onEndTransitionFn = function( ev ) {
	// 				if( support.transitions ) {
	// 					if( ev.propertyName !== 'visibility' ) return;
	// 					this.removeEventListener( transEndEventName, onEndTransitionFn );
	// 				}
	// 				classie.remove( menu, 'close' );
	// 			};
	// 			if( support.transitions ) {
	// 				overlay.addEventListener( transEndEventName, onEndTransitionFn );
	// 			}
	// 			else {
	// 				onEndTransitionFn();
	// 			}
	// 	}
	// 	else if( !classie.has( menu, 'close' ) ) {
	// 		classie.add( menu, 'open' );
	// 	}
	// }

	// function toggleOverlay( menu ){
	// 	if( menu.hasClass( "hidden" )){
	// 		console.log('it had hidden');
	// 		menu.removeClass( "hidden" );
	// 	} else {
	// 		console.log('it didn\'t have hidden');
	// 		menu.addClass( "hidden" );
	// 	}
	// 	return;
	// }



	// Fitvids
	$(document).ready(function(){
		// Target your .container, .wrapper, .post, etc.
		$(".wrapper").fitVids();

		// $( "#mobile-menu-toggle" ).bind( "click", $( "#mobile-menu").toggleClass( "hidden" ) );
		// $( ".close-overlay" ).bind( "click", $( "#mobile-menu" ).toggleClass( "hidden" ) );

		var wookmark;

		// Init lightbox
		$('.gallery__grid').magnificPopup({
			delegate: 'li:not(.inactive) a',
			type: 'image',
			gallery: {
				enabled: true
			}
		});

		// Call the layout function after all images have loaded
		imagesLoaded('.gallery__grid', function () {
			wookmark = new Wookmark('.gallery__grid', {
				align: 'left',
				autoResize: 'true',
				itemWidth: 304

			});
		});

	});




});

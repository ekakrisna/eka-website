/**
 * Global Vars
 */
var windowWidth = window.innerWidth,
	windowHeight = window.innerHeight,
	adminBarHeight = $( '#wpadminbar' ).innerHeight(),
	headerHeight = $( '.site-header' ).innerHeight(),
	navBarHeight = $( '.navbar-primary' ).innerHeight();

if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
	if ( window.innerWidth > 782 ) {
		adminBarHeight = 32;
	} else {
		adminBarHeight = 46;
	}
}

$( document ).ready( function() {
	headerHeight = $( '.site-header' ).innerHeight();
	navBarHeight = $( '.navbar-primary' ).innerHeight();
} );

$( window ).resize( function() {
	windowWidth = window.innerWidth;
	windowHeight = window.innerHeight;
	adminBarHeight = $( '#wpadminbar' ).innerHeight();
	headerHeight = $( '.site-header' ).innerHeight();
	navBarHeight = $( '.navbar-primary' ).innerHeight();
} );

var isIE = /MSIE|Trident/i.test( navigator.userAgent );

var isRetina = false;

if ( window.matchMedia ) {
	var mq = window.matchMedia( "only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen  and (min-device-pixel-ratio: 1.3), only screen and (min-resolution: 1.3dppx)" );
	if ( mq && mq.matches || ( window.devicePixelRatio > 1 ) ) {
		isRetina = true;
	}
}

var rtl = false;

if ( $( 'body' ).hasClass( 'rtl' ) ) {
	rtl = true;
}

// Create csco object.
var csco = {
	addAction: function ( x, y, z ) {
		return;
	}
};

if ( 'undefined' !== typeof wp && 'undefined' !== typeof wp.hooks ) {
	csco.addAction = wp.hooks.addAction;
}

/**
 * Cookies
 */
 function csGetCookie( name ) {
	let matches = document.cookie.match( new RegExp(
		"(?:^|; )" + name.replace( /([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1' ) + "=([^;]*)"
	) );
	return matches ? decodeURIComponent( matches[ 1 ] ) : undefined;
}

function csSetCookie( name, value, props = {} ) {

	props = {
		path: '/'
	};

	if ( props.expires instanceof Date ) {
		props.expires = props.expires.toUTCString();
	}

	let updatedCookie = encodeURIComponent( name ) + "=" + encodeURIComponent( value );

	for ( let optionKey in props ) {
		updatedCookie += "; " + optionKey;
		let optionValue = props[ optionKey ];
		if ( optionValue !== true ) {
			updatedCookie += "=" + optionValue;
		}
	}

	document.cookie = updatedCookie;
}

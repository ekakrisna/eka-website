<?php
/**
 * Twitter Slider Block.
 *
 * @package Authentic
 */

/**
 * Enqueue twitter slider specific styles and scripts.
 */
function csco_canvas_enqueue_twitter_slider_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-twitter-slider-style',
		csco_style( get_template_directory_uri() . "/css/blocks/twitter-slider{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/twitter-slider{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-twitter-slider-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-twitter-slider-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_twitter_slider_assets' );

/**
 * Add slider layout to twitter.
 *
 * @param array $layouts List of layouts.
 */
function csco_register_twitter_slider( $layouts = array() ) {

	$layouts['default'] = array(
		'name'     => esc_html__( 'Simple', 'authentic' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path d="M22 5.924C21.264 6.25 20.473 6.471 19.643 6.57C20.49 6.062 21.141 5.258 21.447 4.3C20.654 4.77 19.777 5.112 18.841 5.296C18.095 4.498 17.028 4 15.848 4C13.582 4 11.745 5.837 11.745 8.103C11.745 8.425 11.781 8.738 11.851 9.038C8.441 8.868 5.418 7.234 3.394 4.751C3.041 5.358 2.838 6.063 2.838 6.815C2.838 8.239 3.562 9.495 4.663 10.23C3.99 10.208 3.358 10.023 2.803 9.716V9.768C2.803 11.756 4.218 13.415 6.096 13.791C5.752 13.886 5.389 13.936 5.016 13.936C4.751 13.936 4.494 13.91 4.243 13.862C4.765 15.492 6.281 16.679 8.076 16.712C6.672 17.812 4.902 18.469 2.98 18.469C2.648 18.469 2.32 18.449 2 18.412C3.816 19.576 5.973 20.255 8.29 20.255C15.837 20.255 19.965 14.003 19.965 8.58C19.965 8.402 19.961 8.225 19.953 8.05C20.755 7.472 21.45 6.75 22 5.926V5.924Z" />
							</svg>',
		'location' => array(),
		'sections' => array(),
		'fields'   => array(),
	);

	$layouts['slider'] = array(
		'name'     => esc_html__( 'Slider', 'authentic' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
								<path d="M22 5.924C21.264 6.25 20.473 6.471 19.643 6.57C20.49 6.062 21.141 5.258 21.447 4.3C20.654 4.77 19.777 5.112 18.841 5.296C18.095 4.498 17.028 4 15.848 4C13.582 4 11.745 5.837 11.745 8.103C11.745 8.425 11.781 8.738 11.851 9.038C8.441 8.868 5.418 7.234 3.394 4.751C3.041 5.358 2.838 6.063 2.838 6.815C2.838 8.239 3.562 9.495 4.663 10.23C3.99 10.208 3.358 10.023 2.803 9.716V9.768C2.803 11.756 4.218 13.415 6.096 13.791C5.752 13.886 5.389 13.936 5.016 13.936C4.751 13.936 4.494 13.91 4.243 13.862C4.765 15.492 6.281 16.679 8.076 16.712C6.672 17.812 4.902 18.469 2.98 18.469C2.648 18.469 2.32 18.449 2 18.412C3.816 19.576 5.973 20.255 8.29 20.255C15.837 20.255 19.965 14.003 19.965 8.58C19.965 8.402 19.961 8.225 19.953 8.05C20.755 7.472 21.45 6.75 22 5.926V5.924Z" />
							</svg>',
		'location' => array(),
		'sections' => array(),
		'fields'   => array(),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/twitter', 'csco_register_twitter_slider' );

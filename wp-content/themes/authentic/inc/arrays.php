<?php
/**
 * Arrays and utility functions.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_range_image_orientation' ) ) {
	/**
	 * Size range for image orientation.
	 */
	function csco_range_image_orientation() {
		return array( 120, 90, 320, 560, 800, 1160, 1920 );
	}
}

if ( ! function_exists( 'csco_get_custom_image_sizes' ) ) {
	/**
	 * Returns array of all default image sizes.
	 */
	function csco_get_custom_image_sizes() {

		$choices = csco_calculate_image_orientation( csco_range_image_orientation(), 'csco' );

		$additional_image_sizes = array();

		$additional_image_sizes[] = array(
			array(
				'slug'   => 'csco-90-square',
				'width'  => 90,
				'height' => 90,
				'crop'   => true,
			),
			array(
				'slug'   => 'csco-800',
				'width'  => 800,
				'height' => 0,
				'crop'   => false,
			),
			array(
				'slug'   => 'csco-1160',
				'width'  => 1160,
				'height' => 0,
				'crop'   => false,
			),
			array(
				'slug'   => 'csco-1920',
				'width'  => 1920,
				'height' => 0,
				'crop'   => false,
			),
		);

		$choices = array_merge( $choices, $additional_image_sizes );

		return apply_filters( 'csco_custom_image_sizes', $choices );

	}
}

if ( ! function_exists( 'csco_calculate_image_orientation' ) ) {
	/**
	 * Calculate Image Orientation
	 *
	 * @param array  $image_sizes Image sizes.
	 * @param string $prefix      Prefix for image size name.
	 */
	function csco_calculate_image_orientation( $image_sizes, $prefix ) {
		if ( ! is_array( $image_sizes ) ) {
			return;
		}
		$choices = array();
		foreach ( $image_sizes as $image_size ) {
			if ( ! is_int( $image_size ) ) {
				return;
			}
			$choices[] = array(
				array(
					'slug'   => $prefix . '-' . $image_size,
					'width'  => $image_size,
					'height' => 0,
					'crop'   => false,
				),
				array(
					'slug'   => $prefix . '-' . $image_size . '-landscape',
					'width'  => $image_size,
					'height' => (int) round( $image_size * 0.75 ),
					'crop'   => true,
				),
				array(
					'slug'   => $prefix . '-' . $image_size . '-portrait',
					'width'  => $image_size,
					'height' => (int) round( $image_size / 0.75 ),
					'crop'   => true,
				),
				array(
					'slug'   => $prefix . '-' . $image_size . '-square',
					'width'  => $image_size,
					'height' => $image_size,
					'crop'   => true,
				),
			);
		}
		return $choices;
	}
}

if ( ! function_exists( 'csco_get_post_sources' ) ) {
	/**
	 * Returns array of post sources
	 *
	 * @param string $additional Additional post source.
	 */
	function csco_get_post_sources( $additional = null ) {

		$choices = array(
			'all'      => esc_html__( 'All Posts', 'authentic' ),
			'category' => esc_html__( 'Category', 'authentic' ),
			'tag'      => esc_html__( 'Tag', 'authentic' ),
			'posts'    => esc_html__( 'Specific Posts', 'authentic' ),
		);

		if ( 'featured' === $additional ) {
			$choices['featured'] = esc_html__( 'Featured Posts', 'authentic' );
		}

		return apply_filters( 'csco_post_sources', $choices );
	}
}

if ( ! function_exists( 'csco_get_icons' ) ) {
	/**
	 * Returns array of all available icons.
	 */
	function csco_get_icons() {

		$choices = array(
			'angle-down'    => esc_html__( 'Angle Down', 'authentic' ),
			'angle-left'    => esc_html__( 'Angle Left', 'authentic' ),
			'angle-right'   => esc_html__( 'Angle Right', 'authentic' ),
			'angle-up'      => esc_html__( 'Angle Up', 'authentic' ),
			'arrow-down'    => esc_html__( 'Arrow Down', 'authentic' ),
			'arrow-left'    => esc_html__( 'Arrow Left', 'authentic' ),
			'arrow-right'   => esc_html__( 'Arrow Right', 'authentic' ),
			'arrow-up'      => esc_html__( 'Arrow Up', 'authentic' ),
			'behance'       => esc_html__( 'Behance', 'authentic' ),
			'bloglovin'     => esc_html__( 'Bloglovin', 'authentic' ),
			'cart'          => esc_html__( 'Cart', 'authentic' ),
			'chevron-down'  => esc_html__( 'Chevron Down', 'authentic' ),
			'chevron-left'  => esc_html__( 'Chevron Left', 'authentic' ),
			'chevron-right' => esc_html__( 'Chevron Right', 'authentic' ),
			'chevron-up'    => esc_html__( 'Chevron Up', 'authentic' ),
			'circle-plus'   => esc_html__( 'Circle Plus', 'authentic' ),
			'clock'         => esc_html__( 'Clock', 'authentic' ),
			'cross'         => esc_html__( 'Cross', 'authentic' ),
			'delete'        => esc_html__( 'Delete', 'authentic' ),
			'diamond'       => esc_html__( 'Diamond', 'authentic' ),
			'dribbble'      => esc_html__( 'Dribbble', 'authentic' ),
			'ellipsis'      => esc_html__( 'Ellipsis', 'authentic' ),
			'eye'           => esc_html__( 'Eye', 'authentic' ),
			'facebook'      => esc_html__( 'Facebook', 'authentic' ),
			'feed'          => esc_html__( 'Feed', 'authentic' ),
			'github'        => esc_html__( 'GitHub', 'authentic' ),
			'googleplus'    => esc_html__( 'Google Plus', 'authentic' ),
			'heart'         => esc_html__( 'Heart', 'authentic' ),
			'image'         => esc_html__( 'Image', 'authentic' ),
			'instagram'     => esc_html__( 'Instagram', 'authentic' ),
			'line'          => esc_html__( 'Line', 'authentic' ),
			'linkedin'      => esc_html__( 'LinkedIn', 'authentic' ),
			'mail'          => esc_html__( 'Mail', 'authentic' ),
			'map-marker'    => esc_html__( 'Map Marker', 'authentic' ),
			'menu'          => esc_html__( 'Menu', 'authentic' ),
			'fb-messenger'  => esc_html__( 'Messenger', 'authentic' ),
			'minus'         => esc_html__( 'Minus', 'authentic' ),
			'phone'         => esc_html__( 'Phone', 'authentic' ),
			'pinterest'     => esc_html__( 'Pinterest', 'authentic' ),
			'plus'          => esc_html__( 'Plus', 'authentic' ),
			'pocket'        => esc_html__( 'Pocket', 'authentic' ),
			'repeat'        => esc_html__( 'Repeat', 'authentic' ),
			'reply'         => esc_html__( 'Reply', 'authentic' ),
			'retweet'       => esc_html__( 'Retweet', 'authentic' ),
			'ribbon'        => esc_html__( 'Ribbon', 'authentic' ),
			'rss'           => esc_html__( 'RSS', 'authentic' ),
			'search'        => esc_html__( 'Search', 'authentic' ),
			'share'         => esc_html__( 'Share', 'authentic' ),
			'soundcloud'    => esc_html__( 'Soundcloud', 'authentic' ),
			'speech-bubble' => esc_html__( 'Speech Bubble', 'authentic' ),
			'spotify'       => esc_html__( 'Spotify', 'authentic' ),
			'stumbleupon'   => esc_html__( 'StumbleUpon', 'authentic' ),
			'telegram'      => esc_html__( 'Telegram', 'authentic' ),
			'tumblr'        => esc_html__( 'Tumblr', 'authentic' ),
			'twitter'       => esc_html__( 'Twitter', 'authentic' ),
			'viber'         => esc_html__( 'Viber', 'authentic' ),
			'video'         => esc_html__( 'Video', 'authentic' ),
			'vimeo'         => esc_html__( 'Vimeo', 'authentic' ),
			'vkontakte'     => esc_html__( 'Vkontakte', 'authentic' ),
			'whatsapp'      => esc_html__( 'WhatsApp', 'authentic' ),
			'youtube'       => esc_html__( 'YouTube', 'authentic' ),
		);

		return apply_filters( 'csco_icons', $choices );

	}
}

if ( ! function_exists( 'csco_get_menus' ) ) {
	/**
	 * Returns array of all available menus.
	 */
	function csco_get_menus() {

		// Get all menus.
		$menus = get_terms( 'nav_menu' );

		$choices = array();

		if ( $menus ) {
			foreach ( $menus as $menu ) {
				// Add each menu ID and name to the array.
				$choices[ $menu->term_id ] = $menu->name;
			}
		}

		return apply_filters( 'csco_menus', $choices );

	}
}

if ( ! function_exists( 'csco_get_default_menu' ) ) {
	/**
	 * Returns the first available menu.
	 */
	function csco_get_default_menu() {

		// Get all menus.
		$menus = csco_get_menus();

		// Reset the array.
		reset( $menus );

		// Get the key of the first array item.
		$menu = key( $menus );

		return apply_filters( 'csco_default_menu', $menu );

	}
}

if ( ! function_exists( 'csco_get_header_content_select' ) ) {
	/**
	 * Returns Array of Header Content Select Options
	 *
	 * @param array $allowed Array of allowed options.
	 */
	function csco_get_header_content_select( $allowed = array() ) {

		$choices = array(
			'toggle' => esc_html__( 'Off-Canvas Toggle', 'authentic' ),
			'search' => esc_html__( 'Search', 'authentic' ),
			'social' => esc_html__( 'Social Accounts', 'authentic' ),
			'button' => esc_html__( 'Button', 'authentic' ),
			'html'   => esc_html__( 'HTML', 'authentic' ),
			'none'   => esc_html__( 'None', 'authentic' ),
		);

		// Check if there're any menus.
		if ( wp_get_nav_menus() ) {
			// Add menu item.
			$choices['menu'] = esc_html__( 'Menu', 'authentic' );
		}

		// Check if WooCommerce is activated.
		if ( class_exists( 'woocommerce' ) ) {
			// Add cart item.
			$choices['cart'] = esc_html__( 'Cart', 'authentic' );
		}

		// Apply filters.
		$choices = apply_filters( 'csco_header_content_select', $choices );

		// Remove disallowed options.
		$choices = array_intersect_key( $choices, array_flip( $allowed ) );

		return $choices;
	}
}

if ( ! function_exists( 'csco_get_registered_sidebars' ) ) {
	/**
	 * Returns Array of Registered Sidebars
	 */
	function csco_get_registered_sidebars() {
		global $wp_registered_sidebars;
		$choices = array();
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$choices[ $sidebar['id'] ] = $sidebar['name'];
		}
		return $choices;
	}
}

if ( ! function_exists( 'csco_get_gallery_types' ) ) {
	/**
	 * Returns Array of Gallery Types
	 */
	function csco_get_gallery_types() {

		$types = array(
			'default'   => esc_html__( 'Default', 'authentic' ),
			'slider'    => esc_html__( 'Slider', 'authentic' ),
			'justified' => esc_html__( 'Justified', 'authentic' ),
		);

		// Add Jetpack's Gallery Types.
		if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) {
			$types['rectangular'] = esc_html__( 'Tiled Mosaic', 'authentic' );
			$types['columns']     = esc_html__( 'Tiled Columns', 'authentic' );
		}

		return $types;
	}
}

if ( ! function_exists( 'csco_footer_components_choices' ) ) {
	/**
	 * Returns array of all choices components for footer layout.
	 */
	function csco_footer_components_choices() {
		$choices = array(
			'widgets' => esc_html__( 'Widgets', 'authentic' ),
			'info'    => esc_html__( 'Logo &amp; Navbar', 'authentic' ),
		);

		if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {
			$choices = array_merge( array( 'instagram' => esc_html__( 'Instagram', 'authentic' ) ), $choices );
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
			$choices = array_merge( array( 'subscribe' => esc_html__( 'Subscribe', 'authentic' ) ), $choices );
		}

		return $choices;
	}
}

if ( ! function_exists( 'csco_footer_components_default' ) ) {
	/**
	 * Returns array of all default components for footer layout.
	 */
	function csco_footer_components_default() {
		$default = array( 'widgets', 'info' );

		if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {
			$default = array_merge( array( 'instagram' ), $default );
		}

		if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
			$default = array_merge( array( 'subscribe' ), $default );
		}

		return $default;
	}
}

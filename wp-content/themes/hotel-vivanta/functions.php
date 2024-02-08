<?php
/**
 * Hotel Vivanta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hotel_Vivanta
 */


if ( ! function_exists( 'hotel_vivanta_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hotel_vivanta_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hotel Vivanta, use a find and replace
		 * to change 'hotel-vivanta' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hotel-vivanta', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		remove_theme_support( 'widgets-block-editor' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size( 'hotel-vivanta-blog-thumbnail-img', 600, 650, true);
		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'hotel-vivanta' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'custom-header' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'hotel_vivanta_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'hotel_vivanta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotel_vivanta_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hotel_vivanta_content_width', 640 );
}
add_action( 'after_setup_theme', 'hotel_vivanta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotel_vivanta_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hotel-vivanta' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hotel-vivanta' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => esc_html__('Hotel Vivanta Footer Widget', 'hotel-vivanta') . $i,
            'id' => 'hotel_vivanta_footer_' . $i,
            'description' => esc_html__('Shows Widgets in Footer', 'hotel-vivanta') . $i,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
}
add_action( 'widgets_init', 'hotel_vivanta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hotel_vivanta_scripts_enqueue() {
	wp_enqueue_style( 'hotel-vivanta-style', get_stylesheet_uri() );
    wp_enqueue_style( 'hotel-vivanta-font', hotel_vivanta_font_url(), array(), null);
    wp_enqueue_style( 'hotel-vivanta-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );
     wp_enqueue_style( 'hotel-vivanta-fontawesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '1.0' );
     wp_enqueue_style( 'hotel-vivanta-slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0' );
     wp_enqueue_style( 'hotel-vivanta-ionicons-css', get_template_directory_uri() . '/assets/css/ionicons.css', array(), '1.0' );
     wp_enqueue_style( 'hotel-vivanta-css', get_template_directory_uri() . '/assets/css/hotel-vivanta.css', array(), '1.0' );
     wp_enqueue_style( 'hotel-vivanta-media-css', get_template_directory_uri() . '/assets/css/media-queries.css', array(), '1.0' );
	wp_enqueue_script( 'hotel-vivanta-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'hotel-vivanta-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'hotel-vivanta-modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), '1.0', true);



	 if( is_page_template( 'page-templates/template-home.php' )) {

	wp_enqueue_script( 'hotel-vivanta-slider', get_template_directory_uri() . '/assets/js/slider.js', array('jquery'), '1.0', true);
	}
	wp_enqueue_script( 'hotel-vivanta-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script( 'hotel-vivanta-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0', true);

	wp_enqueue_script( 'hotel-vivanta-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hotel_vivanta_scripts_enqueue' );

function hotel_vivanta_custom_customize_enqueue()
{
    wp_enqueue_style('hotel-vivanta-customizer-style', trailingslashit(get_template_directory_uri()) . 'inc/customizer/css/customizer-control.css');
}

add_action('customize_controls_enqueue_scripts', 'hotel_vivanta_custom_customize_enqueue');



if (!function_exists('hotel_vivanta_font_url')) :
    function hotel_vivanta_font_url()
    {
        $fonts_url = '';
        $fonts = array();


        if ('off' !== _x('on', 'Lora font: on or off', 'hotel-vivanta')) {
            $fonts[] = 'Lora:400,500';
        }

        if ('off' !== _x('on', 'Roboto font: on or off', 'hotel-vivanta')) {
            $fonts[] = 'Roboto:300';
        }
        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/hotel-vivanta-menu.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer-control.php';
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/hotel-vivanta-customizer-default.php';
require get_template_directory() . '/plugin-activation.php';
require get_template_directory() . '/lib/hotel-vivanta-tgmp.php';
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/hotel-vivanta-upgrade/class-customize.php' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if (!function_exists('hotel_vivanta_get_excerpt')) :
    function hotel_vivanta_get_excerpt($post_id, $count)
    {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
endif;



if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

function hotel_vivanta_header_customize_register( $wp_customize ) {
 $wp_customize->remove_section( 'header_image');

}
add_action( 'customize_register', 'hotel_vivanta_header_customize_register',50 );

if (!function_exists('hotel_vivanta_blank_widget')) {

    function hotel_vivanta_blank_widget()
    {
        echo '<div class="col-md-4">';
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' . esc_url(admin_url('widgets.php')) . '" target="_blank"><i class="fa fa-plus-circle"></i> ' . esc_html__('Add Footer Widget', 'hotel-vivanta') . '</a>';
        }
        echo '</div>';
    }
}




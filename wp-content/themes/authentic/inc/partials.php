<?php
/**
 * These functions are used to load template parts (partials) or actions when used within action hooks,
 * and they probably should never be updated or modified.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_offcanvas' ) ) {
	/**
	 * Off-canvas
	 */
	function csco_offcanvas() {
		get_template_part( 'template-parts/offcanvas' );
	}
}

if ( ! function_exists( 'csco_breadcrumbs' ) ) {
	/**
	 * SEO Breadcrumbs
	 */
	function csco_breadcrumbs() {
		if ( is_front_page() || is_category() ) {
			return;
		}

		ob_start();

		if ( apply_filters( 'csco_breadcrumbs', true ) ) {
			if ( ! function_exists( 'yoast_breadcrumb' ) ) {
				return;
			}
			yoast_breadcrumb( '<div class="cs-breadcrumbs" id="breadcrumbs">', '</div>' );
		}

		// Check the number of levels in breadcrumbs.
		preg_match_all( '/<\/a>/', ob_get_contents(), $matches );

		if ( ! isset( $matches[0] ) || count( $matches[0] ) <= 1 ) {
			ob_end_clean();

			return;
		}

		return ob_end_flush();
	}
}

if ( ! function_exists( 'csco_header_layout' ) ) {
	/**
	 * Header Layout
	 */
	function csco_header_layout() {
		if ( ! get_theme_mod( 'header', true ) ) {
			return;
		}
		if ( get_theme_mod( 'header_home_only', false ) && ! ( is_home() || is_front_page() ) ) {
			return;
		}
		get_template_part( 'template-parts/header/header-layout' );
	}
}

if ( ! function_exists( 'csco_navbar_primary' ) ) {
	/**
	 * Primary Navigation
	 */
	function csco_navbar_primary() {
		get_template_part( 'template-parts/header/navbar-primary' );
	}
}

if ( ! function_exists( 'csco_navbar_secondary' ) ) {
	/**
	 * Secondary Navigation
	 */
	function csco_navbar_secondary() {
		if ( get_theme_mod( 'topbar', true ) ) {
			get_template_part( 'template-parts/header/topbar' );
		}
	}
}

if ( ! function_exists( 'csco_get_page_header' ) ) {
	/**
	 * Get Page Header Template
	 */
	function csco_get_page_header() {

		// Homepage and front page.
		if ( is_home() || is_front_page() ) {

			$show_on_front = get_option( 'show_on_front', 'posts' );

			// Skip for homepage with "Front page displays" option is set to "Your recent posts".
			if ( is_home() && 'posts' === $show_on_front ) {
				return;
			}

			$page            = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$slider          = get_theme_mod( 'home_slider', false );
			$slider_location = get_theme_mod( 'home_slider_location', 'front_page' );
			$slider_type     = get_theme_mod( 'home_slider_type', 'center' );

			// Skip for static front page with large slider.
			if ( is_front_page() && 'page' === $show_on_front && 'front_page' === $slider_location && 'large' === $slider_type && $slider && 1 === $page ) {
				return;
			}

			// Skip for posts page with large slider.
			if ( is_home() && 'page' === $show_on_front && 'home' === $slider_location && 'large' === $slider_type && $slider && 1 === $page ) {
				return;
			}
		}

		// Get page header type: wide, large, simple, small or none.
		$type = csco_get_page_header_type();

		// Skip when page header type is set to 'none'.
		if ( 'none' === $type ) {
			return;
		}

		// Get current action name.
		$action = current_filter();

		// Skip if wide and large page headers are in page content.
		if ( 'csco_header_after' !== $action && ( 'wide' === $type || 'large' === $type ) ) {
			return;
		}

		// Skip if small and simple page headers are in site header.
		if ( 'csco_header_after' === $action && ( 'small' === $type || 'simple' === $type ) ) {
			return;
		}

		// Skip for page headers in main section on posts and pages.
		if ( is_singular() && 'csco_main_start' === $action ) {
			return;
		}

		// Skip for page headers in main section on 404 page.
		if ( is_404() && 'csco_main_start' === $action ) {
			return;
		}

		// See framework/template-tags.php for reference.
		csco_page_header( $type );

	}
}

if ( ! function_exists( 'csco_site_search' ) ) {
	/**
	 * Site Search
	 */
	function csco_site_search() {
		get_template_part( 'template-parts/site-search' );
	}
}

if ( ! function_exists( 'csco_get_post_media' ) ) {
	/**
	 * Get Post Media
	 */
	function csco_get_post_media() {

		if ( ! is_single() ) {
			return;
		}

		$format = get_post_format();

		// Skip if post doesn't have a post format and featured images are disabled.
		if ( ! $format && ! ( get_theme_mod( 'post_featured_image', true ) ) ) {
			return;
		}

		if ( $format ) {
			// Get post media location for posts with post format.
			$location = get_post_meta( get_the_ID(), 'csco_post_media_location', true );

			// Set default location.
			if ( ! $location ) {
				$location = 'content';
			}
		} else {
			$location = 'content';
		}

		// Get current action name.
		$action = current_filter();

		// Skip if post media isn't in post header.
		if ( 'csco_main_content_before' === $action && 'header' !== $location ) {
			return;
		}

		// Skip if post media isn't in post content.
		if ( 'csco_post_start' === $action && 'content' !== $location ) {
			return;
		}

		csco_get_post_media_template();

	}
}

if ( ! function_exists( 'csco_get_post_media_template' ) ) {
	/**
	 * Get Post Media Template
	 */
	function csco_get_post_media_template() {

		// Get formats of current post.
		$format = get_post_format();
		// Get current page header type.
		$page_header = csco_get_page_header_type();

		// Skip if post format is not set and page header has a background image already.
		if ( is_single() && ! $format && in_array( $page_header, array( 'wide', 'large', 'small' ), true ) ) {
			return;
		}

		// Reset format to image for standard posts with thumbnails.
		if ( ! $format && has_post_thumbnail() ) {
			$format = 'image';
		}

		get_template_part( 'template-parts/media/' . $format );
	}
}

if ( ! function_exists( 'csco_share_buttons_top' ) ) {
	/**
	 * Share Buttons Before Content
	 */
	function csco_share_buttons_top() {
		if ( is_single() && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'before-post' ) ) {
			?>
			<section class="section-share">
				<?php powerkit_share_buttons_location( 'before-post' ); ?>
			</section>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_share_buttons_left' ) ) {
	/**
	 * Share Buttons Left Sidebar
	 */
	function csco_share_buttons_left() {
		if ( is_single() && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'post-sidebar' ) ) {
			?>
			<aside class="post-sidebar">
				<?php powerkit_share_buttons_location( 'post-sidebar' ); ?>
			</aside>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_share_buttons_bottom' ) ) {
	/**
	 * Share Buttons After Content
	 */
	function csco_share_buttons_bottom() {
		if ( is_single() && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'after-post' ) ) {
			?>
			<section class="section-share">
				<?php powerkit_share_buttons_location( 'after-post' ); ?>
			</section>
			<?php
		}
	}
}

if ( ! function_exists( 'csco_single_post_author' ) ) {
	/**
	 * Post Author
	 */
	function csco_single_post_author() {
		if ( ! is_single() || ! get_theme_mod( 'post_author', true ) ) {
			return;
		}
		$type   = get_theme_mod( 'post_author_type', 'default' );
		$action = current_filter();
		if ( ( 'csco_post_end' === $action && 'default' === $type ) ||
			( 'csco_post_content_after' === $action && 'compact' === $type ) ) {
			get_template_part( 'template-parts/post/post-author' );
		}
	}
}

if ( ! function_exists( 'csco_single_post_breadcrumbs' ) ) {
	/**
	 * Post Breadcrumbs in Single Posts
	 */
	function csco_single_post_breadcrumbs() {
		if ( ! csco_doing_request() ) {
			csco_breadcrumbs();
		}
	}
}

if ( ! function_exists( 'csco_single_post_category' ) ) {
	/**
	 * Post Category in Single Posts
	 */
	function csco_single_post_category() {
		if ( is_single() ) {
			csco_get_post_meta( 'category' );
		}
	}
}

if ( ! function_exists( 'csco_single_post_carousel' ) ) {
	/**
	 * Post Carousel on Single Posts
	 */
	function csco_single_post_carousel() {

		if ( ! function_exists( 'cnvs' ) ) {
			return;
		}

		if ( ! get_theme_mod( 'post_carousel', true ) ) {
			return;
		}

		get_template_part( 'template-parts/related-posts' );
	}
}

if ( ! function_exists( 'csco_single_post_meta' ) ) {
	/**
	 * Post Meta in Single Posts
	 */
	function csco_single_post_meta() {
		if ( ! is_single() ) {
			return;
		}

		global $post;

		setup_postdata( $post );

		csco_get_post_meta( array( 'date', 'comments', 'views', 'reading_time', 'author' ), false );

		wp_reset_postdata();
	}
}

if ( ! function_exists( 'csco_single_post_pagination' ) ) {
	/**
	 * Post Pagination
	 */
	function csco_single_post_pagination() {
		if ( is_single() && get_theme_mod( 'post_pagination', true ) ) {
			if ( csco_get_state_load_nextpost() ) {
				return;
			}
			get_template_part( 'template-parts/post/post-pagination' );
		}
	}
}

if ( ! function_exists( 'csco_single_subscribe' ) ) {
	/**
	 * Post Subscribe
	 */
	function csco_single_subscribe() {

		if ( ! get_theme_mod( 'post_subscribe', false ) ) {
			return;
		}

		$title   = get_theme_mod( 'post_subscribe_title', esc_html__( 'Subscribe', 'authentic' ) );
		$message = get_theme_mod( 'post_subscribe_message', esc_html__( 'Subscribe now to our newsletter', 'authentic' ) );
		$name    = get_theme_mod( 'post_subscribe_name', false );
		?>
		<section class="post-subscribe">

			<?php
			if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
				do_action( 'csco_subscribe_before' );

				echo do_shortcode( sprintf( '[powerkit_subscription_form title="%s" text="%s" display_name="%s"]', $title, $message, $name ) );

				do_action( 'csco_subscribe_after' );
			}
			?>

		</section>
		<?php
	}
}

if ( ! function_exists( 'csco_category_description' ) ) {
	/**
	 * Category Descriptions
	 */
	function csco_category_description() {
		if ( is_category() && category_description() ) {
			echo do_shortcode( apply_filters( 'csco_category_description', '<div class="taxonomy-description">' . category_description() . '</div>' ) );
		}
	}
}

if ( ! function_exists( 'csco_tag_description' ) ) {
	/**
	 * Tag Descriptions
	 */
	function csco_tag_description() {
		if ( is_tag() && tag_description() ) {
			echo do_shortcode( apply_filters( 'csco_tag_description', '<div class="taxonomy-description">' . tag_description() . '</div>' ) );
		}
	}
}

if ( ! function_exists( 'csco_author_details' ) ) {
	/**
	 * Author Details
	 */
	function csco_author_details() {
		if ( is_author() ) {
			// Social Links.
			if ( csco_powerkit_module_enabled( 'social_links' ) ) {
				powerkit_author_social_links( get_queried_object_id() );
			}
			// Author description.
			$description = get_the_archive_description();
			if ( $description ) {
				?>
				<div class="taxonomy-description">
					<?php echo do_shortcode( $description ); ?>
				</div>
				<?php
			}
		}
	}
}

if ( ! function_exists( 'csco_single_post_comments' ) ) {
	/**
	 * Post Comments
	 */
	function csco_single_post_comments() {
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

if ( ! function_exists( 'csco_meet_team' ) ) {
	/**
	 * Meet Team
	 */
	function csco_meet_team() {
		if ( is_page_template( 'template-meet-team.php' ) ) {
			get_template_part( 'template-parts/meet-team' );
		}
	}
}

if ( ! function_exists( 'csco_navbar_multi_column_widgets' ) ) {
	/**
	 * Navbar Multi-Column Widgets
	 */
	function csco_navbar_multi_column_widgets() {

		if ( ! get_theme_mod( 'navbar_multi_column_display', false ) ) {
			return;
		}

		if ( ! is_active_sidebar( 'sidebar-multicolumn' ) && ! is_active_sidebar( 'sidebar-multicolumn-2' ) && ! is_active_sidebar( 'sidebar-multicolumn-3' ) ) {
			return;
		}
		?>
		<div <?php csco_site_submenu_class( array( 'navbar-multi-column-widgets' ) ); ?>>
			<button type="button" class="navbar-widgets-btn">
				<i class="cs-icon cs-icon-more-horizontal"></i>
			</button>
			<div class="navbar-widgets-container">
				<div class="widget-area navbar-widgets-inner navbar-multi-column-area">
					<div class="widget-col">
						<?php dynamic_sidebar( 'sidebar-multicolumn' ); ?>
					</div>
					<div class="widget-col">
						<?php dynamic_sidebar( 'sidebar-multicolumn-2' ); ?>
					</div>
					<div class="widget-col">
						<?php dynamic_sidebar( 'sidebar-multicolumn-3' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'csco_navbar_single_column_widgets' ) ) {
	/**
	 * Navbar Single-Column Widgets
	 */
	function csco_navbar_single_column_widgets() {

		if ( ! get_theme_mod( 'navbar_single_column_display', false ) ) {
			return;
		}

		if ( ! is_active_sidebar( 'sidebar-singlecolumn' ) ) {
			return;
		}

		// Background Image.
		$bg_image_id = get_theme_mod( 'navbar_single_column_image' );
		?>
		<div <?php csco_site_submenu_class( array( 'navbar-single-column-widgets' ) ); ?>>
			<button type="button" class="navbar-widgets-btn">
				<?php echo esc_html( get_theme_mod( 'navbar_single_column_title', esc_html__( 'Follow', 'authentic' ) ) ); ?>
			</button>
			<div class="navbar-widgets-container <?php echo esc_html( $bg_image_id ? 'navbar-container-background' : '' ); ?>">
				<?php if ( $bg_image_id ) { ?>
					<div class="navbar-container-inner image-area">
						<?php
							echo wp_get_attachment_image( $bg_image_id, 'csco-800-portrait', array(
								'class' => 'pk-lazyload-disabled',
							) );
						?>
					</div>
				<?php } ?>

				<div class="navbar-container-inner navbar-widgets-inner widget-area">
					<?php dynamic_sidebar( 'sidebar-singlecolumn' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}

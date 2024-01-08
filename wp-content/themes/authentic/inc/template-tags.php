<?php
/**
 * Template Tags
 *
 * Functions that are called directly from template parts or within actions.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_page_title' ) ) :
	/**
	 * Page Title
	 */
	function csco_page_title() {

		// Reset $class variable.
		$class = '';

		if ( is_home() ) {

			$subtitle = esc_html__( 'Recent posts', 'authentic' );
			$title    = get_the_title( get_option( 'page_for_posts', true ) );

		} elseif ( is_archive() ) {

			if ( is_category() ) {

				$title = single_cat_title( '', false );

			} elseif ( is_tag() ) {

				$subtitle = esc_html__( 'Posts by tag', 'authentic' );
				$title    = single_tag_title( '', false );

			} elseif ( is_author() ) {

				$subtitle = esc_html__( 'Posts by author', 'authentic' );
				$title    = get_the_author( '', false );

			} elseif ( is_year() ) {

				$subtitle = esc_html__( 'Posts by year', 'authentic' );
				$title    = get_the_date( 'Y' );

			} elseif ( is_month() ) {

				$subtitle = esc_html__( 'Posts by month', 'authentic' );
				$title    = get_the_date( 'F Y' );

			} elseif ( is_day() ) {

				$subtitle = esc_html__( 'Posts by day', 'authentic' );
				$title    = get_the_date( 'F j, Y' );

			} else {

				$title = get_the_archive_title();

			}
		} elseif ( is_search() ) {

			$subtitle = esc_html__( 'Search Results for', 'authentic' );
			$title    = get_search_query();

		} elseif ( is_404() ) {

			$subtitle = '404';
			$title    = esc_html__( 'Page not found', 'authentic' );

		} elseif ( is_single() ) {

			$title = get_the_title();
			$class = 'entry-title';

		} elseif ( is_page() ) {

			$title = get_the_title();

		}

		if ( isset( $title ) && $title ) {
			if ( isset( $subtitle ) && $subtitle ) {
				echo '<p class="sub-title">' . esc_html( $subtitle ) . '</p>';
			}
			$allowed = array(
				'sup'    => array(),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
			);
			echo '<h1' . ( ( $class ) ? ' class="' . esc_html( $class ) . '"' : '' ) . '>' . wp_kses( $title, $allowed ) . '</h1>';
		}

	}
endif;

if ( ! function_exists( 'csco_page_header' ) ) :
	/**
	 * Page Header
	 *
	 * @param string $type Page Header type.
	 */
	function csco_page_header( $type ) {

		if ( is_singular() && csco_block_has_slider_large() ) {
			return;
		}

		$thumbnail_id   = '';
		$thumbnail_size = '';

		if ( 'large' === $type || 'wide' === $type ) {
			$element = 'section';
		} else {
			$element = 'header';
		}

		if ( is_singular() || is_category() ) {
			if ( 'wide' === $type || 'large' === $type ) {
				$thumbnail_size = 'csco-1920';
			} else {
				$layout = csco_get_page_layout();
				if ( csco_is_wide_container() ) {
					$thumbnail_size = 'csco-1920';
				} else {
					if ( 'layout-fullwidth' === $layout ) {
						$thumbnail_size = 'csco-1160';
					} else {
						$thumbnail_size = 'csco-800';
					}
				}
			}
		}

		if ( is_singular() ) {
			$thumbnail_id = get_post_thumbnail_id();
		}

		if ( is_front_page() && 'page' === get_option( 'show_on_front', 'posts' ) ) {
			$thumbnail_id = get_post_thumbnail_id( get_option( 'page_on_front' ) );
		}

		if ( is_home() && 'page' === get_option( 'show_on_front', 'posts' ) ) {
			$thumbnail_id = get_post_thumbnail_id( get_option( 'page_for_posts' ) );
		}

		if ( is_category() ) {
			global $cat;
			// Get current category thumbnail ID.
			$thumbnail_id = get_term_meta( $cat, 'csco_category_thumbnail', true );
		}

		if ( 'page' === get_option( 'show_on_front', 'posts' ) ) {

			$page_on_front  = (int) get_option( 'page_on_front' );
			$page_for_posts = (int) get_option( 'page_for_posts' );

			if ( get_queried_object_id() === $page_on_front || get_queried_object_id() === $page_for_posts ) {
				$thumbnail_id = get_post_thumbnail_id( get_queried_object_id() );
			}
		}

		$thumbnail_id   = apply_filters( 'csco_page_header_thumbnail_id', $thumbnail_id );
		$thumbnail_size = apply_filters( 'csco_page_header_thumbnail_size', $thumbnail_size );

		?>
		<<?php echo esc_html( $element ); ?><?php csco_get_page_header_wrapper_attr( $type ); ?>>

			<?php
			if ( 'simple' !== $type ) {
				?>

			<div<?php csco_get_page_header_image_attr( $type ); ?>>
				<?php
				if ( 'simple' !== $type && $thumbnail_id ) {
					echo wp_get_attachment_image(
						$thumbnail_id, $thumbnail_size, false, array(
							'class' => 'jarallax-img',
						)
					);
				}
				?>
			</div>

			<div class="overlay-outer">
				<div class="overlay-inner">
					<?php do_action( 'csco_page_header_start' ); ?>
					<?php csco_page_title(); ?>
					<?php do_action( 'csco_page_header_end' ); ?>
				</div>
			</div>

				<?php
			} else {
				do_action( 'csco_page_header_start' );
				csco_page_title();
				do_action( 'csco_page_header_end' );
			}
			?>

		</<?php echo esc_html( $element ); ?>>
		<?php
	}
endif;

if ( ! function_exists( 'csco_post_pagination' ) ) :
	/**
	 * Post Pagination
	 */
	function csco_post_pagination() {
		wp_link_pages(
			array(
				'before'           => '<div class="navigation pagination"><div class="nav-links">',
				'after'            => '</div></div>',
				'link_before'      => '<span class="page-number">',
				'link_after'       => '</span>',
				'next_or_number'   => 'next_and_number',
				'separator'        => ' ',
				'nextpagelink'     => esc_html__( 'Next page', 'authentic' ),
				'previouspagelink' => esc_html__( 'Previous page', 'authentic' ),
			)
		);
	}
endif;

if ( ! function_exists( 'csco_post_tags' ) ) :
	/**
	 * Post Tags
	 */
	function csco_post_tags() {
		if ( get_theme_mod( 'post_tags', true ) ) {
			$title = get_theme_mod( 'post_tags_title', esc_html__( 'Related Topics', 'authentic' ) );
			the_tags( '<section class="post-tags"><h5>' . wp_kses_post( $title ) . '</h5><ul><li>', '</li><li>', '</li></ul></section>' );
		}
	}
endif;

if ( ! function_exists( 'csco_read_more' ) ) :
	/**
	 * Read More Button
	 *
	 * @param string $class class name of the anchor.
	 * @param string $icon  icon name inside <span> element.
	 * @param string $url   URL of the post.
	 */
	function csco_read_more( $class = 'button button-primary button-effect', $icon = 'arrow-right', $url = null ) {

		if ( ! $url ) {
			$url = get_permalink();
		}

		$output  = '<div class="post-more">';
		$output .= '<a href="' . esc_url( $url ) . '" class="' . esc_html( $class ) . '">';
		$output .= '<span>' . esc_html( get_theme_mod( 'label_readmore', __( 'View Post', 'authentic' ) ) ) . '</span>';
		$output .= ( $icon ) ? '<span><i class="cs-icon cs-icon-' . esc_html( $icon ) . '"></i></span>' : '';
		$output .= '</a>';
		$output .= '</div>';

		return $output;

	}
endif;

if ( ! function_exists( 'csco_the_excerpt' ) ) :
	/**
	 * Excerpt
	 */
	function csco_the_excerpt() {

		global $wp_query;

		$excerpt = get_the_excerpt();

		$output = null;

		$archive = get_theme_mod( csco_get_archive_option( 'archive_type' ), 'standard' );

		// Set the first post to standard.
		if ( get_theme_mod( csco_get_archive_option( 'first_post' ), true ) && 0 === $wp_query->current_post ) {
			$archive = 'standard';
		}

		// Output excerpt.
		if ( $excerpt && get_theme_mod( csco_get_archive_option( 'summary' ), true ) ) {
			$output .= '<div class="post-excerpt">' . $excerpt . '</div>';
		}

		// Output Read More button.
		if ( get_theme_mod( csco_get_archive_option( 'more_button' ), true ) ) {
			$more_class = 'button button-primary button-effect';
			// Set Read More button class for standard posts.
			if ( 'standard' === $archive ) {
				$more_class .= ' button-lg';
			}
			$output .= csco_read_more( $more_class );
		}

		echo (string) $output; // XSS.
	}
endif;

if ( ! function_exists( 'csco_the_read_more' ) ) :
	/**
	 * Echo Read More Button
	 *
	 * @param string $class class name of the anchor.
	 * @param string $icon  icon name inside <span> element.
	 * @param string $url   URL of the post.
	 */
	function csco_the_read_more( $class = 'button button-primary button-effect', $icon = 'arrow-right', $url = null ) {
		echo wp_kses_post( csco_read_more( $class, $icon, $url ) );
	}
endif;

if ( ! function_exists( 'csco_archive_post_count' ) ) :
	/**
	 * Post Count in Archive Pages
	 */
	function csco_archive_post_count() {
		if ( is_archive() ) {
			global $wp_query;
			$found_posts = $wp_query->found_posts;
			?>
			<div class="post-count">
				<?php printf( esc_html( _n( '%s post', '%s posts', $found_posts, 'authentic' ) ), intval( $found_posts ) ); ?>
			</div>
			<?php
		}
	}
endif;

if ( ! function_exists( 'csco_get_header_content' ) ) :
	/**
	 * Header Content
	 *
	 * Returns header content in either left or right column.
	 *
	 * @param string $location Left or right.
	 * @param string $default  Default content type.
	 */
	function csco_get_header_content( $location, $default ) {

		$content = get_theme_mod( $location . '_select', $default );
		?>

		<?php
		if ( 'toggle' === $content ) {
			?>

			<button class="navbar-toggle offcanvas-toggle" type="button">
				<i class="cs-icon cs-icon-menu"></i>
			</button>

			<?php
		} elseif ( 'search' === $content ) {
			?>

			<a href="#search" class="navbar-search"><i class="cs-icon cs-icon-search"></i></a>

			<?php
		} elseif ( 'social' === $content ) {

			if ( csco_powerkit_module_enabled( 'social_links' ) ) {

				$labels = get_theme_mod( $location . '_social_accounts_labels', true );
				$titles = get_theme_mod( $location . '_social_accounts_titles', false );
				$counts = get_theme_mod( $location . '_social_accounts_counts', true );
				$limit  = get_theme_mod( $location . '_social_accounts_limit', 3 );

				if ( 'topbar_content_right' === $location || 'topbar_content_left' === $location ) {
					$template = 'nav';
				} else {
					$template = 'inline';
				}

				powerkit_social_links( $labels, $titles, $counts, $template, 'light', 'mixed', $limit );

			}
		} elseif ( 'button' === $content ) {

			$url  = get_theme_mod( $location . '_button_link', get_site_url() );
			$text = get_theme_mod( $location . '_button_text', esc_html__( 'Subscribe', 'authentic' ) );
			$icon = get_theme_mod( $location . '_button_icon', 'mail' );
			?>

			<a href="<?php echo esc_url( $url ); ?>" class="button button-primary button-effect">
				<span><?php echo esc_html( $text ); ?></span>
				<span><i class="cs-icon cs-icon-<?php echo esc_html( $icon ); ?>"></i></span>
			</a>

			<?php
		} elseif ( 'menu' === $content ) {

			$menu = get_theme_mod( $location . '_menu', csco_get_default_menu() );

			if ( is_nav_menu( $menu ) ) {
				wp_nav_menu(
					array(
						'menu'            => $menu,
						'menu_class'      => 'nav navbar-nav navbar-lonely cs-d-none cs-d-lg-block',
						'container'       => '',
						'container_class' => '',
						'depth'           => 1,
					)
				);
			}
		} elseif ( 'html' === $content ) {

			echo do_shortcode( get_theme_mod( $location . '_html' ) );

		} elseif ( 'cart' === $content && class_exists( 'woocommerce' ) ) {
			?>

			<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'authentic' ); ?>">
				<i class="cs-icon cs-icon-cart"></i>
				<span class="cart-quantity"><?php echo intval( WC()->cart->get_cart_contents_count() ); ?></span>
			</a>

			<?php
		}
	}
endif;

if ( ! function_exists( 'csco_post_author' ) ) :
	/**
	 * Post Author Detail
	 *
	 * @param int $id Author ID.
	 */
	function csco_post_author( $id = null ) {
		if ( ! $id ) {
			$id = get_the_author_meta( 'ID' );
		}
		?>
		<div class="author-wrap">
			<div class="author">
				<div class="author-avatar">
					<a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>" rel="author">
						<?php echo get_avatar( $id, '120' ); ?>
					</a>
				</div>
				<div class="author-description">
					<h5><span class="fn"><a href="<?php echo esc_url( get_author_posts_url( $id ) ); ?>" rel="author"><?php the_author_meta( 'display_name', $id ); ?></a></span></h5>
					<p class="note"><?php the_author_meta( 'description', $id ); ?></p>
					<?php
					if ( csco_powerkit_module_enabled( 'social_links' ) ) {
						powerkit_author_social_links( $id );
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
endif;

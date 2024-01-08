<?php
/**
 * Powerkit Filters
 *
 * @package Authentic
 */

/**
 * Remove Default Styles
 */
add_action(
	'wp_enqueue_scripts', function() {
		wp_dequeue_style( 'powerkit-widget-posts' );
		wp_dequeue_style( 'powerkit-slider-gallery' );
		wp_dequeue_script( 'powerkit-slider-gallery' );
	}
);

/**
 * Add exclude selectors of TOC
 *
 * @param string $list List selectors.
 */
function csco_powerkit_toc_exclude_selectors( $list ) {
	$list .= '|.entry-title';

	return $list;
}
add_filter( 'pk_toc_exclude', 'csco_powerkit_toc_exclude_selectors' );

/**
 * Register Locations for Share Buttons
 *
 * @param array $locations List of Locations.
 */
function csco_powerkit_share_buttons_locations( $locations = array() ) {

	$locations['before-post'] = array(
		'shares'   => array( 'facebook', 'twitter', 'pinterest' ),
		'name'     => esc_html__( 'Before Content', 'authentic' ),
		'location' => 'before-post',
		'mode'     => 'mixed',
		'before'   => '',
		'after'    => '',
		'display'  => false,
		'fields'   => array(
			'display_total' => true,
			'display_count' => true,
		),
	);

	$locations['after-post'] = array(
		'shares'   => array( 'facebook', 'twitter', 'pinterest' ),
		'name'     => esc_html__( 'After Content', 'authentic' ),
		'location' => 'after-post',
		'mode'     => 'mixed',
		'before'   => '',
		'after'    => '',
		'display'  => true,
		'fields'   => array(
			'display_total' => true,
			'display_count' => true,
		),
	);

	$locations['post-sidebar'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Sidebar', 'authentic' ),
		'location'       => 'post-sidebar',
		'mode'           => 'mixed',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_total'   => true,
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold', 'simple-dark-back' ),
			'count_locations' => array( 'inside' ),
		),
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	$locations['post-loop'] = array(
		'shares'         => array( 'facebook', 'twitter', 'pinterest' ),
		'name'           => esc_html__( 'Post Archives', 'authentic' ),
		'location'       => 'post-loop',
		'mode'           => 'cached',
		'before'         => '',
		'after'          => '',
		'display'        => true,
		'meta'           => array(
			'icons'  => true,
			'titles' => false,
			'labels' => false,
		),
		// Display only the specified layouts and color schemes.
		'fields'         => array(
			'display_count'   => true,
			'layouts'         => array( 'simple' ),
			'schemes'         => array( 'default', 'bold', 'simple-dark-back' ),
			'count_locations' => array( 'inside' ),
		),
		'display_total'  => false,
		'display_count'  => false,
		'layout'         => 'simple',
		'scheme'         => 'default',
		'count_location' => 'inside',
	);

	unset( $locations['before-content'] );
	unset( $locations['after-content'] );

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_powerkit_share_buttons_locations' );

/**
 * Register Post Archive Share Buttons Location
 *
 * @param array $locations List of Locations.
 */
function csco_share_buttons_post_meta( $locations = array() ) {

	return $locations;
}
add_filter( 'powerkit_share_buttons_locations', 'csco_share_buttons_post_meta' );

/**
 * Change default align for section heading.
 */
function csco_powerkit_section_heading_align() {

	return get_theme_mod( 'section_heading_align', 'halignleft' );
}
add_filter( 'canvas_section_heading_align', 'csco_powerkit_section_heading_align' );

/**
 * Change default tag for section heading.
 */
function csco_powerkit_section_heading_tag() {

	return get_theme_mod( 'section_heading_tag', 'h5' );
}
add_filter( 'canvas_section_heading_tag', 'csco_powerkit_section_heading_tag' );

/**
 * Change author avatar size
 */
function csco_powerkit_widget_author_avatar_size() {
	return 160;
}
add_filter( 'powerkit_widget_author_avatar_size', 'csco_powerkit_widget_author_avatar_size' );

/**
 * Change Contributors widget post author description length.
 */
function csco_powerkit_widget_contributors_description_length() {
	return 80;
}
add_filter( 'powerkit_widget_contributors_description_length', 'csco_powerkit_widget_contributors_description_length' );

/**
 * Add new image selector for PinIt
 *
 * @param string $selectors List selectors.
 */
function csco_powerkit_pinit_image_selectors( $selectors ) {
	$selectors[] = '.widget-wrap .gallery-item img';
	$selectors[] = '.post-media img';

	return $selectors;
}
add_filter( 'powerkit_pinit_image_selectors', 'csco_powerkit_pinit_image_selectors' );

/**
 * Add new image selector for Lightbox
 *
 * @param string $selectors List selectors.
 */
function csco_powerkit_lightbox_image_selector( $selectors ) {
	$selectors[] = '.single .post-media img';

	return $selectors;
}
add_filter( 'powerkit_lightbox_image_selectors', 'csco_powerkit_lightbox_image_selector' );

/**
 * Change submit label of subscribe.
 */
function csco_powerkit_subscribe_submit() {
	return sprintf( '<span>%s</span><span><i class="cs-icon cs-icon-mail"></i></span>', esc_html__( 'Subscribe', 'authentic' ) );
}
add_filter( 'powerkit_subscribe_submit', 'csco_powerkit_subscribe_submit' );

/**
 * Change Justified Gallery Row height.
 */
function csco_powerkit_justified_gallery_row_height() {
	return 275;
}
add_filter( 'default_option_powerkit_justified_gallery_row_height', 'csco_powerkit_justified_gallery_row_height' );

/**
 * Twitter Custom Templates
 *
 * @param array $templates List of Templates.
 */
function csco_powerkit_twitter_templates( $templates = array() ) {
	$templates['slider'] = array(
		'name' => esc_html__( 'Slider', 'authentic' ),
		'func' => 'powerkit_twitter_default_template',
	);
	return $templates;
}
add_filter( 'powerkit_twitter_templates', 'csco_powerkit_twitter_templates' );

/**
 * Change submit label of twitter.
 */
function csco_powerkit_twitter_submit() {
	return sprintf( '<span>%s</span><span><i class="cs-icon cs-icon-twitter"></i></span>', esc_html__( 'Follow', 'authentic' ) );
}
add_filter( 'powerkit_twitter_follow', 'csco_powerkit_twitter_submit' );

/**
 * Change submit label of instagram.
 */
function csco_powerkit_instagram_submit() {
	return sprintf( '<span>%s</span><span><i class="cs-icon cs-icon-instagram"></i></span>', esc_html__( 'Follow', 'authentic' ) );
}
add_filter( 'powerkit_instagram_follow', 'csco_powerkit_instagram_submit' );

/**
 * Change submit label of widget author.
 *
 * @param string $label The label of button.
 */
function csco_powerkit_widget_author_button( $label ) {
	return sprintf( '<span>%s</span><span><i class="cs-icon cs-icon-arrow-right"></i></span>', $label );
}
add_filter( 'powerkit_widget_author_button', 'csco_powerkit_widget_author_button' );

/**
 * Change submit label of widget about.
 *
 * @param string $label The label of button.
 */
function csco_powerkit_widget_about_button( $label ) {
	return sprintf( '<span>%s</span><span><i class="cs-icon cs-icon-arrow-right"></i></span>', $label );
}
add_filter( 'powerkit_widget_about_button', 'csco_powerkit_widget_about_button' );

/**
 * Change Default Template for featured posts
 *
 * @param array $templates The templates.
 */
function csco_powerkit_featured_posts_default( $templates = array() ) {

	$templates['list']['func']     = 'csco_powerkit_featured_default_template';
	$templates['numbered']['func'] = 'csco_powerkit_featured_default_template';
	$templates['large']['func']    = 'csco_powerkit_featured_default_template';

	return $templates;
}
add_filter( 'powerkit_featured_posts_templates', 'csco_powerkit_featured_posts_default' );

/**
 * Add Slider Template for featured posts
 *
 * @param array $templates The templates.
 */
function csco_powerkit_featured_posts_slider( $templates = array() ) {

	$templates['slider'] = array(
		'name' => esc_html__( 'Slider', 'authentic' ),
		'func' => 'csco_powerkit_featured_default_template',
	);

	return $templates;
}
add_filter( 'powerkit_featured_posts_templates', 'csco_powerkit_featured_posts_slider' );


/**
 * Add new settings to Widget Posts
 *
 * @param array $settings The settings.
 */
function csco_powerkit_widget_posts_settings( $settings ) {

	$settings = array_merge(
		$settings, array(
			'orientation' => 'square',
			'featured'    => false,
			'rounded'     => false,
		)
	);

	return $settings;
}
add_filter( 'powerkit_widget_posts_settings', 'csco_powerkit_widget_posts_settings' );

/**
 * Add update handler for Widget Posts
 *
 * @param array $instance Current settings.
 */
function csco_powerkit_widget_posts_update( $instance ) {

	// Featured Posts.
	if ( ! isset( $instance['featured'] ) ) {
		$instance['featured'] = false;
	}

	// Featured Posts.
	if ( ! isset( $instance['rounded'] ) ) {
		$instance['rounded'] = false;
	}

	return $instance;
}
add_filter( 'powerkit_widget_posts_update', 'csco_powerkit_widget_posts_update' );

/**
 * Add new field to Widget Posts
 *
 * @param object $context  The context.
 * @param array  $params   The params.
 * @param array  $instance Current settings.
 */
function csco_powerkit_widget_posts_form_before( $context, $params, $instance ) {
	?>
		<!-- Image Orientation -->
		<p>
			<label for="<?php echo esc_attr( $context->get_field_id( 'orientation' ) ); ?>"><?php esc_html_e( 'Image Orientation', 'authentic' ); ?></label>
			<select name="<?php echo esc_attr( $context->get_field_name( 'orientation' ) ); ?>" id="<?php echo esc_attr( $context->get_field_id( 'orientation' ) ); ?>" class="widefat">
				<option value="landscape" <?php selected( $params['orientation'], 'landscape' ); ?>><?php esc_html_e( 'Landscape', 'authentic' ); ?></option>
				<option value="portrait" <?php selected( $params['orientation'], 'portrait' ); ?>><?php esc_html_e( 'Portrait', 'authentic' ); ?></option>
				<option value="square" <?php selected( $params['orientation'], 'square' ); ?>><?php esc_html_e( 'Square', 'authentic' ); ?></option>
			</select>
		</p>
	<?php
}
add_action( 'powerkit_widget_posts_form_before', 'csco_powerkit_widget_posts_form_before', 10, 3 );

/**
 * Add new field to Widget Posts
 *
 * @param object $context  The context.
 * @param array  $params   The params.
 * @param array  $instance Current settings.
 */
function csco_powerkit_widget_posts_form_after( $context, $params, $instance ) {
	?>
		<!-- Featured Posts -->
		<h4><?php esc_html_e( 'Featured Posts', 'authentic' ); ?></h4>
		<p><input id="<?php echo esc_attr( $context->get_field_id( 'featured' ) ); ?>" class="checkbox" name="<?php echo esc_attr( $context->get_field_name( 'featured' ) ); ?>" type="checkbox" <?php checked( (bool) $params['featured'] ); ?> />
		<label for="<?php echo esc_attr( $context->get_field_id( 'featured' ) ); ?>"><?php esc_html_e( 'Include only featured posts', 'authentic' ); ?></label></p>

		<!-- Rounded Images -->
		<h4><?php esc_html_e( 'Rounded Images', 'authentic' ); ?></h4>
		<p><input id="<?php echo esc_attr( $context->get_field_id( 'rounded' ) ); ?>" class="checkbox" name="<?php echo esc_attr( $context->get_field_name( 'rounded' ) ); ?>" type="checkbox" <?php checked( (bool) $params['rounded'] ); ?> />
		<label for="<?php echo esc_attr( $context->get_field_id( 'rounded' ) ); ?>"><?php esc_html_e( 'Display rounded images', 'authentic' ); ?></label></p>
	<?php
}
add_action( 'powerkit_widget_posts_form_after', 'csco_powerkit_widget_posts_form_after', 10, 3 );

/**
 * Add args handler for Widget Posts
 *
 * @param array $args   Array of args.
 * @param array $params Array of params.
 */
function csco_powerkit_widget_featured_posts_args( $args, & $params ) {

	if ( $params['featured'] ) {
		// Check if custom taxonomy was registered.
		if ( taxonomy_exists( 'powerkit_post_featured' ) ) {
			// Featured posts.
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'powerkit_post_featured',
					'field'    => 'slug',
					'terms'    => 'widget',
				),
			);
		}
	}

	if ( $params['featured'] ) {
		// Check if custom taxonomy was registered.
		if ( taxonomy_exists( 'powerkit_post_featured' ) ) {
			// Featured posts.
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'powerkit_post_featured',
					'field'    => 'slug',
					'terms'    => 'widget',
				),
			);
		}
	}

	// There're no sidebar ID given for the archive widgets.
	if ( ! isset( $args['id'] ) ) {

		$archive = get_theme_mod( csco_get_archive_option( 'archive_type' ), 'standard' );
		$layout  = csco_get_page_layout();

		if ( 'standard' === $archive || 'list' === $archive ) {

			// Slider types aren't supported in horizontal archives.
			if ( in_the_loop() && 'slider' === $params['template'] ) {
				$params['template'] = 'list';
			}

			if ( 'layout-fullwidth' === $layout ) {
				if ( '1' === $params['posts_per_page'] ) {
					$size = '1920';
				} elseif ( '2' === $params['posts_per_page'] ) {
					$size = '1160';
				} elseif ( '3' === $params['posts_per_page'] || '4' === $params['posts_per_page'] ) {
					$size = '560-' . $params['orientation'];
				} else {
					$size = '320-' . $params['orientation'];
				}
			} else {
				if ( '1' === $params['posts_per_page'] ) {
					$size = '1160';
				} elseif ( '2' === $params['posts_per_page'] ) {
					$size = '560-' . $params['orientation'];
				} else {
					$size = '320-' . $params['orientation'];
				}
			}
		} else {
			if ( 'large' === $params['template'] || 'slider' === $params['template'] ) {
				$size = '320-' . $params['orientation'];
			} else {
				$size = '90-' . $params['orientation'];
			}
		}
	} else {
		if ( 'large' === $params['template'] || 'slider' === $params['template'] ) {
			$size = '320-' . $params['orientation'];
		} else {
			$size = '90-' . $params['orientation'];
		}
	}

	$params['thumbnail'] = 'csco-' . $size;

	return $args;
}
add_filter( 'powerkit_widget_featured_posts_args', 'csco_powerkit_widget_featured_posts_args', 10, 2 );

/**
 * Featured Default Template Callback
 *
 * @param  array $posts    Array of posts.
 * @param  array $params   Array of params.
 * @param  array $instance Widget instance.
 */
function csco_powerkit_featured_default_template( $posts, $params, $instance ) {

	$class = null;

	// Set thumbnail rounded.
	if ( $params['rounded'] ) {
		$class .= ' thumbnail-rounded';
	}

	// Set orientation.
	if ( 'slider' === $params['template'] ) {
		$class .= 'overlay ratio ratio-' . $params['orientation'];
	}

	if ( isset( $params['template'] ) && 'slider' === $params['template'] ) {
		?>
		<article <?php post_class( $class ); ?>>
			<div class="overlay-media">
				<?php the_post_thumbnail( $params['thumbnail'] ); ?>
				<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
			</div>
			<div class="overlay-outer">
				<div class="overlay-inner">
					<?php
					if ( $params['post_meta_category'] ) {
						csco_get_post_meta( 'category' );
					}
					?>
					<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php csco_get_post_meta( $params['post_meta'], (bool) $params['post_meta_compact'] ); ?>
					<?php csco_the_read_more(); ?>
				</div>
			</div>
		</article>
		<?php
	} else {
		?>
		<article <?php post_class( $class ); ?>>
			<div class="post-outer">
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-inner">
						<a href="<?php the_permalink(); ?>" class="post-thumbnail">
							<?php the_post_thumbnail( $params['thumbnail'] ); ?>

							<?php if ( 'numbered' === $params['template'] ) : ?>
								<span class="post-number-wrap">
									<span class="post-number">
										<span><?php echo esc_html( $posts->current_post + 1 ); ?></span>
										<span><i class="cs-icon cs-icon-arrow-right"></i></span>
									</span>
								</span>
							<?php endif; ?>
						</a>
					</div>
				<?php } ?>

				<div class="post-inner">
					<?php
					if ( $params['post_meta_category'] ) {
						csco_get_post_meta( 'category' );
					}
					?>

					<h5 class="media-heading entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php csco_get_post_meta( array_diff( $params['post_meta'], array( 'category' ) ), (bool) $params['post_meta_compact'] ); ?>
				</div>
			</div>
		</article>
		<?php
	}
}

/**
 * Exclude Inline Posts posts from related posts block
 *
 * @param array $args Array of WP_Query args.
 */
function csco_related_posts_args( $args ) {
	global $powerkit_inline_posts;

	if ( ! $powerkit_inline_posts ) {
		return $args;
	}

	$post__not_in         = $args['post__not_in'];
	$post__not_in         = array_unique( array_merge( $post__not_in, $powerkit_inline_posts ) );
	$args['post__not_in'] = $post__not_in;

	return $args;
}

add_filter( 'csco_related_posts_args', 'csco_related_posts_args' );

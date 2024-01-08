<?php
/**
 * Adding Custom Meta Boxes.
 *
 * @package Authentic
 */

/**
 * Check display metabox layout options
 */
function csco_mb_display_layout_options() {
	// Check Coming Soon Page.
	if ( csco_powerkit_module_enabled( 'coming_soon' ) && powerkit_coming_soon_status() ) {

		$page_id = get_option( 'powerkit_coming_soon_page' );

		if ( (int) get_the_ID() === (int) $page_id ) {
			return;
		}
	}

	return true;
}

/**
 * ==================================
 * Layout Options
 * ==================================
 */

/**
 * Add custom meta boxes
 */
function csco_mb_custom_meta_boxes() {
	if ( ! csco_mb_display_layout_options() ) {
		return;
	}

	$function = sprintf( 'add_meta_%s', 'box' );

	$function( 'csco_mb_layout_options', esc_html__( 'Layout Options', 'authentic' ), 'csco_mb_layout_options_markup', array( 'post', 'page', 'product' ), 'side' );
	$function( 'csco_mb_video_background', esc_html__( 'Video Background', 'authentic' ), 'csco_mb_video_background_markup', array( 'post' ), 'side' );
	$function( 'csco_mb_media_options', esc_html__( 'Media Options', 'authentic' ), 'csco_mb_media_options_markup', array( 'post' ), 'side' );
	$function( 'csco_mb_gallery_options', esc_html__( 'Gallery Options', 'authentic' ), 'csco_mb_gallery_options_markup', array( 'post' ), 'side' );
}
add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_mb_custom_meta_boxes' );

/**
 * Layout options markup
 *
 * @param object $post The post object.
 */
function csco_mb_layout_options_markup( $post ) {

	$page_static = array();

	// Add pages static.
	$page_static[] = get_option( 'page_on_front' );
	$page_static[] = get_option( 'page_for_posts' );

	wp_nonce_field( 'layout_options', 'csco_mb_layout_options' );

	$singular_layout    = get_post_meta( $post->ID, 'csco_singular_layout', true );
	$page_header_type   = get_post_meta( $post->ID, 'csco_page_header_type', true );
	$page_load_nextpost = get_post_meta( $post->ID, 'csco_page_load_nextpost', true );

	// Set Default.
	$singular_layout    = $singular_layout ? $singular_layout : 'default';
	$page_header_type   = $page_header_type ? $page_header_type : 'default';
	$page_load_nextpost = $page_load_nextpost ? $page_load_nextpost : 'default';
	?>
		<div class="csco-singular-layout">
			<h4><label for="csco_singular_layout"><?php esc_html_e( 'Page Layout', 'authentic' ); ?></label></h4>
			<select name="csco_singular_layout" id="csco_singular_layout" style="box-sizing: border-box;" class="regular-text">
				<option value="default" <?php selected( 'default', $singular_layout ); ?>> <?php esc_html_e( 'Default', 'authentic' ); ?></option>
				<option value="layout-sidebar-right" <?php selected( 'layout-sidebar-right', $singular_layout ); ?>> <?php esc_html_e( 'Right Sidebar', 'authentic' ); ?></option>
				<option value="layout-sidebar-left" <?php selected( 'layout-sidebar-left', $singular_layout ); ?>> <?php esc_html_e( 'Left Sidebar', 'authentic' ); ?></option>
				<option value="layout-fullwidth" <?php selected( 'layout-fullwidth', $singular_layout ); ?>> <?php esc_html_e( 'Fullwidth', 'authentic' ); ?></option>
			</select>
		</div>

		<?php if ( 'post' === $post->post_type || 'page' === $post->post_type ) { ?>
			<h4><label for="csco_page_header_type"><?php esc_html_e( 'Page Header', 'authentic' ); ?></label></h4>
			<select name="csco_page_header_type" id="csco_page_header_type" style="box-sizing: border-box;" class="regular-text">
				<option value="default" <?php selected( 'default', $page_header_type ); ?>> <?php esc_html_e( 'Default', 'authentic' ); ?></option>
				<option value="none" <?php selected( 'none', $page_header_type ); ?>> <?php esc_html_e( 'None', 'authentic' ); ?></option>
				<option value="simple" <?php selected( 'simple', $page_header_type ); ?>> <?php esc_html_e( 'Simple', 'authentic' ); ?></option>
				<option value="small" <?php selected( 'small', $page_header_type ); ?>> <?php esc_html_e( 'Small', 'authentic' ); ?></option>
				<option value="wide" <?php selected( 'wide', $page_header_type ); ?>> <?php esc_html_e( 'Wide', 'authentic' ); ?></option>
				<option value="large" <?php selected( 'large', $page_header_type ); ?>> <?php esc_html_e( 'Large', 'authentic' ); ?></option>
			</select>
		<?php } ?>

		<?php if ( ! in_array( (string) $post->ID, $page_static, true ) || 'posts' === get_option( 'show_on_front', 'posts' ) ) { ?>

			<?php if ( 'post' === $post->post_type ) { ?>
				<h4><label for="csco_page_load_nextpost"><?php esc_html_e( 'Auto Load Next Post', 'authentic' ); ?></label></h4>
				<select name="csco_page_load_nextpost" id="csco_page_load_nextpost" style="box-sizing: border-box;" class="regular-text">
					<option value="default" <?php selected( 'default', $page_load_nextpost ); ?>> <?php esc_html_e( 'Default', 'authentic' ); ?></option>
					<option value="enabled" <?php selected( 'enabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Enabled', 'authentic' ); ?></option>
					<option value="disabled" <?php selected( 'disabled', $page_load_nextpost ); ?>> <?php esc_html_e( 'Disabled', 'authentic' ); ?></option>
				</select>
			<?php } ?>

		<?php } ?>
	<?php
}

/**
 * Video background markup
 *
 * @param object $post The post object.
 */
function csco_mb_video_background_markup( $post ) {
	wp_nonce_field( 'video_background', 'csco_mb_video_background' );

	$post_video_bg_location   = get_post_meta( $post->ID, 'csco_post_video_bg_location', true );
	$post_video_bg_start_time = get_post_meta( $post->ID, 'csco_post_video_bg_start_time', true );
	$post_video_bg_end_time   = get_post_meta( $post->ID, 'csco_post_video_bg_end_time', true );

	// Set Default.
	$post_video_bg_location   = $post_video_bg_location ? (array) $post_video_bg_location : array( 'archive' );
	$post_video_bg_start_time = $post_video_bg_start_time ? (int) $post_video_bg_start_time : 0;
	$post_video_bg_end_time   = $post_video_bg_end_time ? (int) $post_video_bg_end_time : 0;
	?>
		<h4><?php esc_html_e( 'Location', 'authentic' ); ?></h4>
		<label><input type="checkbox" name="csco_post_video_bg_location[]" value="page-header" <?php checked( in_array( 'page-header', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Page Header', 'authentic' ); ?></label><br>
		<label><input type="checkbox" name="csco_post_video_bg_location[]" value="archive" <?php checked( in_array( 'archive', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Post Archives', 'authentic' ); ?></label><br>

		<p><strong><label for="csco_post_video_bg_start_time"><?php esc_html_e( 'Start Time (sec)', 'authentic' ); ?>:</label></strong>
		<input class="small-text" type="number" id="csco_post_video_bg_start_time" name="csco_post_video_bg_start_time" value="<?php echo esc_attr( $post_video_bg_start_time ); ?>"></p>

		<p><strong><label for="csco_post_video_bg_end_time"><?php esc_html_e( 'End Time (sec)', 'authentic' ); ?>:</label></strong>
		<input class="small-text" type="number" id="csco_post_video_bg_end_time" name="csco_post_video_bg_end_time" value="<?php echo esc_attr( $post_video_bg_end_time ); ?>"></p>
	<?php
}

/**
 * Media options markup
 *
 * @param object $post The post object.
 */
function csco_mb_media_options_markup( $post ) {

	wp_nonce_field( 'media_options', 'csco_mb_media_options' );

	$post_media_location = get_post_meta( $post->ID, 'csco_post_media_location', true );

	// Set Default.
	$post_media_location = $post_media_location ? $post_media_location : 'content';
	?>
		<h4><label for="csco_post_media_location"><?php esc_html_e( 'Media Location', 'authentic' ); ?></label></h4>
		<select name="csco_post_media_location" id="csco_post_media_location" style="box-sizing: border-box;" class="regular-text">
			<option value="content" <?php selected( 'content', $post_media_location ); ?>> <?php esc_html_e( 'Post Content', 'authentic' ); ?></option>
			<option value="header" <?php selected( 'header', $post_media_location ); ?>> <?php esc_html_e( 'Page Header', 'authentic' ); ?></option>
			<option value="none" <?php selected( 'none', $post_media_location ); ?>> <?php esc_html_e( 'None', 'authentic' ); ?></option>
		</select>
	<?php
}

/**
 * Gallery options markup
 *
 * @param object $post The post object.
 */
function csco_mb_gallery_options_markup( $post ) {
	wp_nonce_field( 'gallery_options', 'csco_mb_gallery_options' );

	$gallery_types = (array) csco_get_gallery_types();

	$post_gallery_type = get_post_meta( $post->ID, 'csco_post_gallery_type', true );

	// Set Default.
	$post_gallery_type = $post_gallery_type ? $post_gallery_type : 'slider';
	?>
		<h4><label for="csco_post_gallery_type"><?php esc_html_e( 'Gallery Type', 'authentic' ); ?></label></h4>
		<select name="csco_post_gallery_type" id="csco_post_gallery_type" style="box-sizing: border-box;" class="regular-text">
			<?php foreach ( $gallery_types as $key => $label ) : ?>
				<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $post_gallery_type ); ?>> <?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	<?php
}

/**
 * Save meta box
 *
 * @param int $post_id The post id.
 */
function csco_mb_save_meta_boxes( $post_id ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( isset( $_POST['csco_mb_layout_options'] ) && wp_verify_nonce( $_POST['csco_mb_layout_options'], 'layout_options' ) ) { // Input var ok; sanitization ok.

		if ( isset( $_POST['csco_singular_layout'] ) ) { // Input var ok; sanitization ok.
			$singular_layout = sanitize_text_field( $_POST['csco_singular_layout'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_singular_layout', $singular_layout );
		}

		if ( isset( $_POST['csco_page_header_type'] ) ) { // Input var ok; sanitization ok.
			$page_header_type = sanitize_text_field( $_POST['csco_page_header_type'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_page_header_type', $page_header_type );
		}

		if ( isset( $_POST['csco_page_load_nextpost'] ) ) { // Input var ok; sanitization ok.
			$page_load_nextpost = sanitize_text_field( $_POST['csco_page_load_nextpost'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_page_load_nextpost', $page_load_nextpost );
		}
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( isset( $_POST['csco_mb_video_background'] ) && wp_verify_nonce( $_POST['csco_mb_video_background'], 'video_background' ) ) { // Input var ok; sanitization ok.

		if ( isset( $_POST['csco_post_video_bg_location'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_location = array_map( 'sanitize_text_field', $_POST['csco_post_video_bg_location'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_bg_location', $post_video_bg_location );
		}

		if ( isset( $_POST['csco_post_video_bg_start_time'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_start_time = intval( $_POST['csco_post_video_bg_start_time'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_bg_start_time', $post_video_bg_start_time );
		}

		if ( isset( $_POST['csco_post_video_bg_end_time'] ) ) { // Input var ok; sanitization ok.
			$post_video_bg_end_time = intval( $_POST['csco_post_video_bg_end_time'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_video_bg_end_time', $post_video_bg_end_time );
		}
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( isset( $_POST['csco_mb_media_options'] ) && wp_verify_nonce( $_POST['csco_mb_media_options'], 'media_options' ) ) { // Input var ok; sanitization ok.

		if ( isset( $_POST['csco_post_media_location'] ) ) { // Input var ok; sanitization ok.
			$post_media_location = sanitize_text_field( $_POST['csco_post_media_location'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_media_location', $post_media_location );
		}
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( isset( $_POST['csco_mb_gallery_options'] ) && wp_verify_nonce( $_POST['csco_mb_gallery_options'], 'gallery_options' ) ) { // Input var ok; sanitization ok.

		if ( isset( $_POST['csco_post_gallery_type'] ) ) { // Input var ok; sanitization ok.
			$post_gallery_type = sanitize_text_field( $_POST['csco_post_gallery_type'] ); // Input var ok; sanitization ok.

			update_post_meta( $post_id, 'csco_post_gallery_type', $post_gallery_type );
		}
	}
}
add_action( 'save_post', 'csco_mb_save_meta_boxes' );


/**
 * ==================================
 * Category Options
 * ==================================
 */

/**
 * Add fields to Category
 *
 * @param string $taxonomy The taxonomy slug.
 */
function csco_mb_add_category_options( $taxonomy ) {

	wp_nonce_field( 'category_options', 'csco_mb_category_options' );
	?>
		<h2><?php esc_html_e( 'Category Options', 'authentic' ); ?></h2>

		<?php if ( 'category' === $taxonomy ) { ?>
			<div class="form-field">
				<label><?php esc_html_e( 'Featured Image', 'authentic' ); ?></label>
				<div class="category-upload-image upload-img-container" data-frame-title="<?php esc_html_e( 'Select or upload image', 'authentic' ); ?>" data-frame-btn-text="<?php esc_html_e( 'Set image', 'authentic' ); ?>">
					<p class="uploaded-img-box">
						<span class="uploaded-image"></span>
						<input id="csco_category_thumbnail" class="uploaded-img-id" name="csco_category_thumbnail" type="hidden" />
					</p>
					<p class="hide-if-no-js">
						<a class="upload-img-link button button-primary" href="#"><?php esc_html_e( 'Upload image', 'authentic' ); ?></a>
						<a class="delete-img-link button button-secondary hidden" href="#"><?php esc_html_e( 'Remove image', 'authentic' ); ?></a>
					</p>
				</div>

				<p><?php esc_html_e( 'This image is used in the page header.', 'authentic' ); ?></p>
			</div>
		<?php } ?>

		<div class="form-field">
			<label for="csco_page_header_type"><?php esc_html_e( 'Page Header', 'authentic' ); ?></label>
			<select name="csco_page_header_type" id="csco_page_header_type" style="box-sizing: border-box;" class="regular-text">
				<option value="default"><?php esc_html_e( 'Default', 'authentic' ); ?></option>
				<option value="none"><?php esc_html_e( 'None', 'authentic' ); ?></option>
				<option value="simple"><?php esc_html_e( 'Simple', 'authentic' ); ?></option>
				<option value="small"><?php esc_html_e( 'Small', 'authentic' ); ?></option>
				<option value="wide"><?php esc_html_e( 'Wide', 'authentic' ); ?></option>
				<option value="large"><?php esc_html_e( 'Large', 'authentic' ); ?></option>
			</select>
		</div>
		<br><hr><br>
	<?php
}
add_action( 'category_add_form_fields', 'csco_mb_add_category_options', 10 );
add_action( 'product_cat_add_form_fields', 'csco_mb_add_category_options', 10 );

/**
 * Edit fields from Category
 *
 * @param object $tag      Current taxonomy term object.
 * @param string $taxonomy Current taxonomy slug.
 */
function csco_mb_edit_category_options( $tag, $taxonomy ) {
	wp_nonce_field( 'category_options', 'csco_mb_category_options' );

	$csco_category_thumbnail = get_term_meta( $tag->term_id, 'csco_category_thumbnail', true );
	$csco_page_header_type   = get_term_meta( $tag->term_id, 'csco_page_header_type', true );

	$csco_category_thumbnail_url = wp_get_attachment_image_url( $csco_category_thumbnail, 'large' );
	?>

	<?php if ( 'category' === $taxonomy ) { ?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="csco_category_thumbnail"><?php esc_html_e( 'Featured Image', 'authentic' ); ?></label></th>
			<td>
				<div class="category-upload-image upload-img-container" data-frame-title="<?php esc_html_e( 'Select or upload image', 'authentic' ); ?>" data-frame-btn-text="<?php esc_html_e( 'Set image', 'authentic' ); ?>">
					<p class="uploaded-img-box">
						<span class="uploaded-image">
							<?php if ( $csco_category_thumbnail_url ) : ?>
								<img src="<?php echo esc_url( $csco_category_thumbnail_url ); ?>" style="max-width:100%;" />
							<?php endif; ?>
						</span>

						<input id="csco_category_thumbnail" class="uploaded-img-id" name="csco_category_thumbnail" type="hidden" value="<?php echo esc_attr( $csco_category_thumbnail ); ?>" />
					</p>
					<p class="hide-if-no-js">
						<a class="upload-img-link button button-primary <?php echo esc_attr( $csco_category_thumbnail_url ? 'hidden' : '' ); ?>" href="#"><?php esc_html_e( 'Upload image', 'authentic' ); ?></a>
						<a class="delete-img-link button button-secondary <?php echo esc_attr( ! $csco_category_thumbnail_url ? 'hidden' : '' ); ?>" href="#"><?php esc_html_e( 'Remove image', 'authentic' ); ?></a>
					</p>
				</div>

				<p class="description"><?php esc_html_e( 'This image is used in the page header.', 'authentic' ); ?></p>
			</td>
		</tr>
	<?php } ?>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="csco_page_header_type"><?php esc_html_e( 'Page Header', 'authentic' ); ?></label></th>
		<td>
			<select name="csco_page_header_type" id="csco_page_header_type" style="box-sizing: border-box;" class="regular-text">
				<option value="default" <?php selected( 'default', $csco_page_header_type ); ?>> <?php esc_html_e( 'Default', 'authentic' ); ?></option>
				<option value="none" <?php selected( 'none', $csco_page_header_type ); ?>> <?php esc_html_e( 'None', 'authentic' ); ?></option>
				<option value="simple" <?php selected( 'simple', $csco_page_header_type ); ?>> <?php esc_html_e( 'Simple', 'authentic' ); ?></option>
				<option value="small" <?php selected( 'small', $csco_page_header_type ); ?>> <?php esc_html_e( 'Small', 'authentic' ); ?></option>
				<option value="wide" <?php selected( 'wide', $csco_page_header_type ); ?>> <?php esc_html_e( 'Wide', 'authentic' ); ?></option>
				<option value="large" <?php selected( 'large', $csco_page_header_type ); ?>> <?php esc_html_e( 'Large', 'authentic' ); ?></option>
			</select>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'csco_mb_edit_category_options', 10, 2 );
add_action( 'product_cat_edit_form_fields', 'csco_mb_edit_category_options', 10, 2 );

/**
 * Save meta box
 *
 * @param int    $term_id  ID of the term about to be edited.
 * @param string $taxonomy Taxonomy slug of the related term.
 */
function csco_mb_save_category_options( $term_id, $taxonomy ) {

	// Bail if we're doing an auto save.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// if our nonce isn't there, or we can't verify it, bail.
	if ( ! isset( $_POST['csco_mb_category_options'] ) || ! wp_verify_nonce( $_POST['csco_mb_category_options'], 'category_options' ) ) { // Input var ok; sanitization ok.
		return;
	}

	if ( isset( $_POST['csco_category_thumbnail'] ) ) { // Input var ok; sanitization ok.
		$csco_category_thumbnail = sanitize_text_field( $_POST['csco_category_thumbnail'] ); // Input var ok; sanitization ok.

		update_term_meta( $term_id, 'csco_category_thumbnail', $csco_category_thumbnail );
	}

	if ( isset( $_POST['csco_page_header_type'] ) ) { // Input var ok; sanitization ok.
		$csco_page_header_type = sanitize_text_field( $_POST['csco_page_header_type'] ); // Input var ok; sanitization ok.

		update_term_meta( $term_id, 'csco_page_header_type', $csco_page_header_type );
	}
}
add_action( 'created_category', 'csco_mb_save_category_options', 10, 2 );
add_action( 'edited_category', 'csco_mb_save_category_options', 10, 2 );
add_action( 'created_product_cat', 'csco_mb_save_category_options', 10, 2 );
add_action( 'edited_product_cat', 'csco_mb_save_category_options', 10, 2 );

/**
 * Meta box Enqunue Scripts
 *
 * @param string $page Current page.
 */
function csco_mb_category_enqueue_scripts( $page ) {
	ob_start();

	if ( 'post-new.php' === $page || 'post.php' === $page ) {
		// Styles.
		$styles  = sprintf( '#csco_mb_video_background{ display: %s; }', 'video' === get_post_format() ? 'block' : 'none' );
		$styles .= sprintf( '#csco_mb_gallery_options{ display: %s; }', 'gallery' === get_post_format() ? 'block' : 'none' );
		$styles .= sprintf( '#csco_mb_media_options{ display: %s; }', false !== get_post_format() ? 'block' : 'none' );

		wp_add_inline_style( 'editor-buttons', $styles );
		?>
		<script>
		/* Post Format Switcher */
		jQuery( document ).ready(function( $ ) {
			$( document ).on( 'click', '.post-format, select[id*="post-format-selector"]', function( event ) {
				if ( 'video' === $( this ).val() ) {
					$( '#csco_mb_video_background' ).show();
				} else {
					$( '#csco_mb_video_background' ).hide();
				}
				if ( 'gallery' === $( this ).val() ) {
					$( '#csco_mb_gallery_options' ).show();
				} else {
					$( '#csco_mb_gallery_options' ).hide();
				}
				if ( 0 !== $( this ).val() ) {
					$( '#csco_mb_media_options' ).show();
				} else {
					$( '#csco_mb_media_options' ).hide();
				}
			});
		});
		</script>
		<?php
	}

	if ( 'edit-tags.php' === $page || 'term.php' === $page ) {
		wp_enqueue_script( 'jquery' );

		wp_enqueue_media();
		?>
		<script>
		jQuery( document ).ready(function( $ ) {

			var powerkitMediaFrame;
			/* Set all variables to be used in scope */
			var metaBox = '.category-upload-image';

			/* Add Image Link */
			$( metaBox ).find( '.upload-img-link' ).on( 'click', function( event ){
				event.preventDefault();

				var parentContainer = $( this ).parents( metaBox );

				// Options.
				var options = {
					title: parentContainer.data( 'frame-title' ) ? parentContainer.data( 'frame-title' ) : 'Select or Upload Media',
					button: {
						text: parentContainer.data( 'frame-btn-text' ) ? parentContainer.data( 'frame-btn-text' ) : 'Use this media',
					},
					library : { type : 'image' },
					multiple: false // Set to true to allow multiple files to be selected.
				};

				// Create a new media frame
				powerkitMediaFrame = wp.media( options );

				// When an image is selected in the media frame...
				powerkitMediaFrame.on( 'select', function() {

					// Get media attachment details from the frame state.
					var attachment = powerkitMediaFrame.state().get('selection').first().toJSON();

					// Send the attachment URL to our custom image input field.
					parentContainer.find( '.uploaded-image' ).html( '<img src="' + attachment.url + '" style="max-width:100%;"/>' );
					parentContainer.find( '.uploaded-img-id' ).val( attachment.id ).change();
					parentContainer.find( '.upload-img-link' ).addClass( 'hidden' );
					parentContainer.find( '.delete-img-link' ).removeClass( 'hidden' );

					powerkitMediaFrame.close();
				});

				// Finally, open the modal on click.
				powerkitMediaFrame.open();
			});


			/* Delete Image Link */
			$( metaBox ).find( '.delete-img-link' ).on( 'click', function( event ){
				event.preventDefault();

				$( this ).parents( metaBox ).find( '.uploaded-image' ).html( '' );
				$( this ).parents( metaBox ).find( '.upload-img-link' ).removeClass( 'hidden' );
				$( this ).parents( metaBox ).find( '.delete-img-link' ).addClass( 'hidden' );
				$( this ).parents( metaBox ).find( '.uploaded-img-id' ).val( '' ).change();
			});
		});

		jQuery( document ).ajaxSuccess(function(e, request, settings){
			let action   = settings.data.indexOf( 'action=add-tag' );
			let screen   = settings.data.indexOf( 'screen=edit-category' );
			let taxonomy = settings.data.indexOf( 'taxonomy=category' );

			if( action > -1 && screen > -1 && taxonomy > -1 ){
				$( '.delete-img-link' ).click();
			}
		});
		</script>
		<?php
	}
	wp_add_inline_script( 'jquery', str_replace( array( '<script>', '</script>' ), '', ob_get_clean() ) );
}
add_action( 'admin_enqueue_scripts', 'csco_mb_category_enqueue_scripts' );

<?php
/**
 * Media: Gallery
 *
 * @package Authentic
 */

$images = get_post_meta( get_the_ID(), 'powerkit_post_format_gallery', true );

if ( ! $images ) {
	return;
}

$type = get_post_meta( get_the_ID(), 'csco_post_gallery_type', true );

// Set default type.
if ( ! $type ) {
	$type = 'slider';
}

$filter = current_filter();

if ( 'slider' === $type ) {

	$page_wide = csco_is_wide_container();
	$layout    = csco_get_page_layout();

	if ( 'csco_main_content_before' === $filter ) {
		if ( $page_wide ) {
			$size = '1920';
		} else {
			$size = '1160';
		}
	} else {
		if ( $page_wide && 'layout-fullwidth' === $layout ) {
			$size = '1920';
		} elseif ( $page_wide && 'layout-fullwidth' !== $layout ) {
			$size = '1160';
		} elseif ( ! $page_wide && 'layout-fullwidth' === $layout ) {
			$size = '1160';
		} else {
			$size = '800';
		}
	}

	$thumbnail = 'csco-' . $size;

} elseif ( 'default' === $type ) {
	if ( 'csco_main_content_before' === $filter ) {
		$thumbnail = 'csco-560-landscape';
	} else {
		$thumbnail = 'csco-320-landscape';
	}
} else {
	$thumbnail = 'csco-560';
}

?>

<section class="post-media">

	<?php

	$ids = implode( ',', (array) $images );

	echo do_shortcode( '[gallery type="' . $type . '" size="' . $thumbnail . '" link="file" ids="' . $ids . '"]' );

	?>

</section>

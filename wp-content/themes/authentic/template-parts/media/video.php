<?php
/**
 * Media: Video
 *
 * @package Authentic
 */

?>

<div class="post-media">
	<div class="cs-embed-responsive cs-embed-responsive-16by9">
		<?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'powerkit_post_format_video', true ) ); // XSS ok. ?>
	</div>
</div>

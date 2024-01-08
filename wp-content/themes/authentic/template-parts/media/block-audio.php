<?php
/**
 * Media: Audio
 *
 * @package Authentic
 */

?>

<section class="post-media">
	<div class="embed-audio">
		<?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'powerkit_post_format_audio', true ) ); // XSS ok. ?>
	</div>
</section>

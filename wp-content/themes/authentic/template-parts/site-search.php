<?php
/**
 * The template part for displaying fullscreen site search.
 *
 * @package Authentic
 */

?>

<div class="site-search" id="search">
	<button type="button" class="close"></button>
	<div class="form-container">
		<div class="cs-container">
			<div class="site-search-wrap">
				<?php get_search_form( true ); ?>
				<p><?php esc_html_e( 'Input your search keywords and press Enter.', 'authentic' ); ?></p>
			</div>
		</div>
	</div>
</div>

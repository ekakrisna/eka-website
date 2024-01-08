<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Authentic
 */

$sidebar = apply_filters( 'csco_sidebar', 'sidebar-main' );

if ( 'layout-fullwidth' !== csco_get_page_layout() ) { ?>

	<aside id="secondary" class="sidebar-area widget-area" role="complementary">

		<?php do_action( 'csco_sidebar_before' ); ?>

		<div class="sidebar sidebar-1">
			<?php do_action( 'csco_sidebar_start' ); ?>
			<?php dynamic_sidebar( $sidebar ); ?>
			<?php do_action( 'csco_sidebar_end' ); ?>
		</div>
		<div class="sidebar sidebar-2"></div>

		<?php do_action( 'csco_sidebar_after' ); ?>

	</aside><!-- .sidebar-area .widget-area -->

<?php
}

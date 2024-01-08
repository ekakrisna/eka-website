<?php
/**
 * Secondary Navigation Bar
 * Have a look at framework/hooks/actions to see what is hooked into the header
 * See all header parts at template-parts/header/
 *
 * @package Authentic
 */

$left      = get_theme_mod( 'topbar_content_left_select', 'menu' );
$right     = get_theme_mod( 'topbar_content_right_select', 'social' );
$container = get_theme_mod( 'topbar_container', 'cs-container' );

?>

<div class="topbar cs-d-none cs-d-lg-block">
	<div class="<?php echo esc_html( $container ); ?>">
		<nav class="navbar">

		<?php if ( 'none' !== $left ) { ?>

			<div class="col-left">
				<?php csco_get_header_content( 'topbar_content_left', 'menu' ); ?>
			</div>

		<?php } if ( 'none' !== $right ) { ?>

			<div class="col-right">
				<?php csco_get_header_content( 'topbar_content_right', 'social' ); ?>
			</div>

		<?php } ?>

		</nav>
	</div>
</div>

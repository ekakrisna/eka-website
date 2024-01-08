<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Authentic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php csco_site_scheme(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'csco_body_start' ); ?>

<div id="page" class="site">

	<?php do_action( 'csco_site_start' ); ?>

	<div class="site-inner">

		<?php do_action( 'csco_header_before' ); ?>

		<?php $class = sprintf( 'page-header-type-%s', csco_get_page_header_type() ); ?>

		<header id="masthead" class="site-header <?php echo esc_attr( $class ); ?>" role="banner">

			<?php do_action( 'csco_header_start' ); ?>

			<?php do_action( 'csco_header' ); ?>

			<?php do_action( 'csco_header_end' ); ?>

		</header>

		<?php do_action( 'csco_header_after' ); ?>

		<?php do_action( 'csco_site_content_before' ); ?>

		<div <?php csco_site_content_class(); ?>>

			<?php do_action( 'csco_site_content_start' ); ?>

			<div class="cs-container">

				<?php do_action( 'csco_main_content_before' ); ?>

				<div id="content" class="main-content">

					<?php do_action( 'csco_main_content_start' ); ?>

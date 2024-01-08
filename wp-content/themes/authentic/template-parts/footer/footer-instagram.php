<?php
/**
 * Instagram Footer Component.
 *
 * @package Authentic
 */

if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {

	$instagram_username = get_theme_mod( 'footer_instagram_username' );
?>
	<div class="footer-instagram">

		<div class="instagram-timeline">
			<?php
				powerkit_instagram_get_recent( array(
					'user_id' => esc_html( $instagram_username ),
					'number'  => apply_filters( 'csco_instagram_footer_number', 6 ),
					'columns' => apply_filters( 'csco_instagram_footer_columns', 6 ),
					'size'    => 'small',
					'target'  => '_blank',
				) );
			?>
		</div>

	</div>
<?php } ?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotel_Vivanta
 */

$hotel_vivanta_options = hotel_vivanta_theme_options();

$show_prefooter = $hotel_vivanta_options['show_prefooter'];

?>

<footer id="colophon" class="site-footer">


	<?php if ($show_prefooter== 1){ ?>
	    <section class="footer-sec">
	        <div class="container">
	            <div class="row">
	                <?php if (is_active_sidebar('hotel_vivanta_footer_1')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_vivanta_footer_1') ?>
	                    </div>
	                    <?php
	                else: hotel_vivanta_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('hotel_vivanta_footer_2')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_vivanta_footer_2') ?>
	                    </div>
	                    <?php
	                else: hotel_vivanta_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('hotel_vivanta_footer_3')) : ?>
	                    <div class="col-md-4">
	                        <?php dynamic_sidebar('hotel_vivanta_footer_3') ?>
	                    </div>
	                    <?php
	                else: hotel_vivanta_blank_widget();
	                endif; ?>
	            </div>
	        </div>
	    </section>
	<?php } ?>

		<div class="site-info">
		<p><?php esc_html_e('Powered By WordPress', 'hotel-vivanta');
                    esc_html_e(' | ', 'hotel-vivanta') ?>
                    <span><a target="_blank" rel="nofollow"
                       href="<?php echo esc_url('https://flawlessthemes.com/theme/hotel-vivanta-best-hotel-booking-wordpress-theme/'); ?>"><?php esc_html_e('Hotel Vivanta' , 'hotel-vivanta'); ?></a></span>
                </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

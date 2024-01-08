<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Authentic
 */

?>

					<?php do_action( 'csco_main_content_end' ); ?>

				</div><!-- .main-content -->

				<?php do_action( 'csco_main_content_after' ); ?>

			</div><!-- .container -->

			<?php do_action( 'csco_site_content_end' ); ?>

		</div><!-- .site-content -->

		<?php do_action( 'csco_site_content_after' ); ?>

		<?php do_action( 'csco_footer_before' ); ?>

		<footer <?php csco_site_footer_class(); ?>>

			<?php do_action( 'csco_footer_start' ); ?>

			<?php get_template_part( 'template-parts/footer/footer-layout' ); ?>

			<?php do_action( 'csco_footer_end' ); ?>

		</footer>

		<?php do_action( 'csco_footer_after' ); ?>

	</div><!-- .site-inner -->

	<?php do_action( 'csco_site_end' ); ?>

</div><!-- .site -->

<?php do_action( 'csco_body_end' ); ?>

<?php wp_footer(); ?>
</body>
</html>

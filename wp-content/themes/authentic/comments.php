<?php
/**
 * The template for displaying comments
 *
 * @package Authentic
 */

if ( post_password_required() ) {
	return;
}
?>

<?php do_action( 'csco_comments_before' ); ?>

<section id="comments" class="post-comments">

	<?php if ( have_comments() ) { ?>

		<?php
		$comments_number = get_comments_number();

		if ( 1 === $comments_number ) {
			$section_heading = esc_html_e( 'One comment', 'authentic' );
		} else {
			/* translators: 1: number of comments */
			$section_heading = sprintf( esc_html( _n( '%s comment', '%s comments', $comments_number, 'authentic' ) ), esc_html( number_format_i18n( (int) $comments_number ) ) );
		}

		csco_section_heading( $section_heading );
		?>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php } ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'authentic' ); ?></p>
	<?php } ?>

	<?php
	comment_form(
		array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
			'class_submit'       => 'button button-primary',
		)
	);
	?>

</section><!-- .comments-area -->

<?php do_action( 'csco_comments_after' ); ?>

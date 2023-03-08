<?php $umaya_options = get_option('umaya'); ?>
<?php
if ( post_password_required() ) {
	return;
}
?>

<?php
if ( have_comments() ) : ?>
	
	<div class="padding-top-90">
		<h4 class="headline-xxxs text-color-black">
			<?php
			printf( _nx( '1 Comment', '%1$s  Comments', get_comments_number(), 'comments title', 'umaya' ),
			number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h4>
	
		<!-- .comments-title -->

		<?php the_comments_navigation(); ?>
		
		<ul class="comments-list black padding-top-30">
			
			<?php
				wp_list_comments( array(
					'callback'   => 'umaya_comment',
					'short_ping' => true,
				) );
			?>
		</ul><!-- .comment-list -->
		<div class="clearfix"></div>
		
		<?php the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'umaya' ); ?></p>
		
	<?php
		endif; ?>
		</div>
	<?php endif; // Check for have_comments().
	?>
	<div class="padding-top-90 text-color-black">
	<?php
	$umaya_args = array(
		'fields' => apply_filters(
		'comment_form_default_fields', array(
		'author' =>'<input id="author" class="form-input form-input_border black js-pointer-small"  placeholder="'. esc_html__('Your Name','umaya') .'*" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '" size="40"/>',
			'email'  => '<input id="email" class="form-input form-input_border black js-pointer-small" placeholder="'. esc_html__('Your Email','umaya') .'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="40"/>',
		)
		),
		'comment_field' => '<textarea id="comment" class="form-input form-input_border black js-pointer-small" name="comment" cols="10" rows="9" placeholder="'. esc_html__('Your Comment','umaya') .'*" aria-required="true"></textarea>',
		'comment_notes_after' => '<div class="padding-top-30 text-center"><button class="bg-btn black js-pointer-large">'. esc_html__('Submit','umaya') .'</button></div>',
		'title_reply' => '<div class="comment-title-area crunchify-text"> <h4 class="headline-xxxs text-color-black"> <span>' . esc_html__( 'Leave a Reply', 'umaya' ) . '</span>'.'</h4></div>'
		
	);
	comment_form($umaya_args);
	?>
	</div>

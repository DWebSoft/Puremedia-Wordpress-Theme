<?php

if( post_password_required() ){
	return;
}
?>
	
<div id="comments">
	

	<?php if ( have_comments() ) : ?>
		<h3 class="comment-title">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'dweb' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'dweb' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'dweb' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php 
				$args = array(
						'walker' 			=> null,
						'max_depth'			=> '',
						'style'				=> 'ol',
						'callback'			=> null,
						'end-callback'		=> null,
						'type'				=> 'all',
						'reply_text'		=> 'Reply',
						'page'				=>	'',
						'per_page'			=>  '',
						'avatar_size'		=>	64,
						'reverse_top_level' => null,
						'reverse_children'	=> 	'',
						'format'			=>	'html5',
						'short_ping'		=>	false,
						'echo'				=>	true,
					);
				wp_list_comments( $args );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'dweb' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'dweb' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'dweb' ); ?></p>
	<?php endif; ?>		
		<!-- respond -->
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$req_attr = ( $req ? " required='required'" : '' );

		$fields = array(
				'author' =>
				    '<div class="group"><label for="author">' . __( 'Name', 'dpremium' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
				   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				    '" size="30"' . $req_attr . ' /></div>',

				'email' =>
				    '<div class="group"><label for="email">' . __( 'Email', 'dpremium' ) . ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
				    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				    '" size="30"' . $req_attr . ' /></div>',

			  	'url' =>
				    '<div class="group"><label for="url">' . __( 'Website', 'dpremium' ) . '</label>' .
				    '<input id="url" class="form-control last-field" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				    '" size="30" /></div>',    
		);

		$args	=	array(
			'id_form'		=> 'contactForm',
				'class_submit'	=>	'stroke medium',
				'label_submit'	=>	'Submit Comment',
				'comment_field' =>  '<div class="message group"><label for="comment">' . _x( 'Comment', 'noun' ) .
				    '</label><textarea id="comment" class="form-control"  name="comment" rows="4" aria-required="required">' . '</textarea></div>',

				'fields'		=>	apply_filters( 'comment_form_default_fields', $fields ),
		);

		comment_form( $args ); 
	?>	    	

</div> <!-- #comments-->
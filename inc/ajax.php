<?php

function dweb_save_contact_form(){

	$fname 		= wp_strip_all_tags( $_POST['contactFname'] );
	$lname 		= wp_strip_all_tags( $_POST['contactLname'] );
	$email 		= wp_strip_all_tags( $_POST['contactEmail'] );
	$message 	= wp_strip_all_tags( $_POST['contactMessage'] );

	$args		= array(
			'post_title'	=>	$fname.' '.$lname ,
			'post_content'	=>	$message,
			'post_author'	=>	1,
			'post_status'	=>	'publish',
			'post_type'		=>	'dweb_messages',
			'meta_input'	=>	array(
					'dweb_dweb_message_email' => $email,
				),
		);	

	$post_id	= wp_insert_post( $args );

	if( $post_id !== 0 ){

		// $to 		= get_bloginfo('admin_email');
		// $subject 	= 'DPremium Contact Form - '.$title;

		// $headers[] 	= 'From: ' . get_bloginfo('name') . ' <'. $to . '>';
		// $headers[]	= 'Reply-To: ' . $title . ' <'. $email . '>';
		// $headers[]	= 'Content-Type: text/html; charset="utf-8"';

		// wp_mail( $to, $subject, $message, $headers );

		echo  $post_id;
	}else{
		echo  0;
	}

	
	die();

}
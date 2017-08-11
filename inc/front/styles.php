<?php

//Dynamic styles
function dweb_custom_styles($custom) {

	$titan = TitanFramework::getInstance( 'dweb' );

	$custom = '';

	//Site Logo
	if( $titan->getOption('site_logo') ):
			
			$imageID = $titan->getOption('site_logo');

	        if( $imageID ){

				$imageSrc = $imageID; // For the default value
				if ( is_numeric( $imageID ) ) {
					$imageAttachment = wp_get_attachment_image_src( $imageID, 'full', true );
					$imageSrc = $imageAttachment[0];
				}
	        }

	        $custom .= "a.navbar-brand {
				width: " . $titan->getOption('site_logo_width') . "px;
				display: inline-block;
				text-indent: -999em;
				background-image: url(". esc_url( $imageSrc ) .");
				background-repeat: no-repeat;
				background-position: center left;
				background-size: contain;
				margin-right: 10px;
			}";
	endif;        

	//Homepage Header Background Image
	if( $titan->getOption('home_header_bck_img') ):
			
			$imageID = $titan->getOption('home_header_bck_img');

	        if( $imageID ){

				$imageSrc = $imageID; // For the default value
				if ( is_numeric( $imageID ) ) {
					$imageAttachment = wp_get_attachment_image_src( $imageID, 'full', true );
					$imageSrc = $imageAttachment[0];
				}
	        }

	        $custom .= "#hero, #page-title {
			    background: #12151b url(". $imageSrc .") no-repeat center center fixed;
			}";
	else:
			$custom .= "#hero, #page-title {
			    background: #12151b url(" . get_template_directory_uri() . "/assets/images/hero-bg.jpg) no-repeat center center fixed;
			}";		
	endif; 

	//Output all the styles
	wp_add_inline_style( 'dweb_style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'dweb_custom_styles', 999 );
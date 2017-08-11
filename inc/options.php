<?php

function dweb_create_options() {
// We create all our options here

	$titan = TitanFramework::getInstance( 'dweb' );

	//Logo
	$logoPanel = $titan->createThemeCustomizerSection( array(
		'id' => 'title_tagline',
		'position' => 12,
		) );

	$logoPanel->createOption( array(
		'name' => 'Upload your Logo',
		'type' => 'upload',
		'id'   => 'site_logo',  
		) );

	$logoPanel->createOption( array(
		'name' 		=> 'Adjust Logo Width',
		'id' 		=> 'site_logo_width',
		'type' 		=> 'number',
		'desc' 		=> 'You can change the width of logo. Max width is <b>300 pixels</b>',
		'default' 	=> '100',
		'max' 		=> '300',
		'unit' 		=> 'px',
	) );

	$homePanel = $titan->createThemeCustomizerSection( array(
		'name'  => 'Homepage Options',
		'panel' => 'DWeb Settings'
	) );

	$homePanel->createOption( array(
		'name' => 'Homepage Header Background Image',
		'type' => 'upload',
		'id'   => 'home_header_bck_img',
		'default' => get_template_directory_uri().'/assets/images/hero-bg.jpg'  
		) );

	$homePanel->createOption( array(
		'name' 		=> 'Header 1 Text ',
		'id' 		=> 'header_text_1',
		'type' 		=> 'textarea',
		'default' 	=> 'Hello, we are puremedia. We make awesome and stunning digital stuff.'
	));

	$homePanel->createOption( array(
		'name' 		=> 'Button 1 Text ',
		'id' 		=> 'button_text_1',
		'type' 		=> 'text',
		'default' 	=> 'More About Us'
	));

	$homePanel->createOption( array(
		'name' 		=> 'Button 1 URL',
		'id' 		=> 'button_url_1',
		'type' 		=> 'text',
	));

	$homePanel->createOption( array(
		'name' 		=> 'Header 2 Text',
		'id' 		=> 'header_text_2',
		'type' 		=> 'textarea',
		'default' 	=> 'We imagine, craft and manage your brand in this new digital world.'
	));

	$homePanel->createOption( array(
		'name' 		=> 'Button 2 Text',
		'id' 		=> 'button_text_2',
		'type' 		=> 'text',
		'default' 	=> 'See our works'
	));

	$homePanel->createOption( array(
		'name' 		=> 'Button 2 URL',
		'id' 		=> 'button_url_2',
		'type' 		=> 'text',
	));

	$homePanel->createOption( array(
		'name' 		=> 'Header 3 Text',
		'id' 		=> 'header_text_3',
		'type' 		=> 'textarea',
		'default' 	=> 'Take a look at some of our works or contact us to discuss how we can help you.'
	));

	$homePanel->createOption( array(
		'name' 		=> 'Button 3 Text',
		'id' 		=> 'button_text_3',
		'type' 		=> 'text',
		'default' 	=> 'Get in touch'
	));
	
	$homePanel->createOption( array(
		'name' 		=> 'Button 3 URL',
		'id' 		=> 'button_url_3',
		'type' 		=> 'text',
	));


	//Footer
	$footerPanel = $titan->createThemeCustomizerSection( array(
		'name'  => 'Footer Options',
		'panel' => 'DWeb Settings'
	) );

	$footerPanel->createOption( array(
		'name' 		=> 'Copyright Text',
		'id' 		=> 'copyright_text',
		'type' 		=> 'text',
		'default'   => '&copy; Copyright 2017 Puremedia.'
	));
}
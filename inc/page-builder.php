<?php

/* Defaults */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom' => 0,
) );

/* Theme widgets */
function dweb_theme_widgets($widgets) {
	$theme_widgets = array(
		'DWeb_Title',
		'DWeb_Portfolio',
		'DWeb_Services',
		'DWeb_Employees',
		'DWeb_Recent_Posts',
		'DWeb_Contact_Form',
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('dweb-theme');
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-schedule';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'dweb_theme_widgets');

/* Add a tab for the theme widgets in the page builder */
function dweb_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => __('DWeb Theme Widgets', 'dweb'),
		'filter' => array(
			'groups' => array('dweb-theme')
		)
	);
	return $tabs;
}

add_filter('siteorigin_panels_widget_dialog_tabs', 'dweb_theme_widgets_tab', 20);

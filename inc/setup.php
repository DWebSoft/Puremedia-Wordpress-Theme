<?php

function  dweb_setup_theme(){

	//Register Menu
	register_nav_menu( 'primary', __('Primary Menu', 'dweb') );
}

function dweb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

function dweb_change_submit_to_button( $defaults ){
	
	$defaults['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>';

	return $defaults;
}

// Remove the excerpt "Read More" text by a link
function remove_excerpt_more($more) {
	return ' ...';
}

function new_excerpt_length( $length ){
	return 55;
}

////Show Custom Post Types in Archive Pages And Search Page
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() || is_search() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'dweb_projects', 'dweb_services', 'dweb_employees'
		));
	  return $query;
	}
}



function dweb_recommend_plugin() {

    $plugins[] = array(
            'name'               => 'Page Builder by SiteOrigin',
            'slug'               => 'siteorigin-panels',
            'required'           => false,
    );

    $plugins[] = array(
            'name'               => 'Titan Framework',
            'slug'               => 'titan-framework',
            'required'           => false,
    );

    tgmpa( $plugins);

}

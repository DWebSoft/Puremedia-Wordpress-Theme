<?php

if( is_active_sidebar( 'dweb-right-sidebar' ) ){

	ob_start();
	dynamic_sidebar( 'dweb-right-sidebar' );
	$sidebar = ob_get_contents();
    ob_end_clean();

    $sidebar_corrected_ul = str_replace("<ul>", '<ul class="link-list group">', $sidebar);

    echo $sidebar_corrected_ul;
}

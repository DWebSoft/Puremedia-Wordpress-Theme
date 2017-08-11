<?php 
/*
Template Name: Home Page
*/

get_header('v1');
?>

<div class="row">
<?php
if( have_posts() ) :
	while( have_posts() ): the_post();	
		the_content();
	endwhile;
endif;		
?>
</div> <!-- .row -->
<?php	   
get_footer();
<?php 
/*
Template Name: Full Width Page
*/

get_header();?>


   <!-- Content
   ================================================== -->
   <section id="content">

	   	<div class="row">

		   	<div id="main">
			
				<?php if( have_posts() ) :?>

				<?php while( have_posts() ): the_post(); ?>		

		        <article class="entry">
					<?php 
						the_content();
					?>
				</article> <!-- /entry -->

				<?php 
					endwhile;
				endif; ?>			   
	         
	      </div> <!-- /main -->   

	   </div> <!-- /row -->      

   </section> <!-- /content -->  

<?php get_footer();?>
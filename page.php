
<?php get_header();?>


   <!-- Content
   ================================================== -->
   <section id="content">

   	<div class="row">

	   	<div id="main" class="tab-whole eight columns entries">
		
			<?php if( have_posts() ) :?>

			<?php while( have_posts() ): the_post(); ?>		

	         <article class="entry">

					<header class="entry-header">

						<h1 class="entry-title">
							<a title="" href="<?php esc_attr( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a>
						</h1> 				 
						 
					</header> 
						
					<div class="entry-content">
						<?php 
							the_content();

							$defaults = array(
   								'before'           => '<div class="row"><div class="six columns text-left">',
   								'after'            => '</div></div>',
   								'link_before'      => '',
   								'link_after'       => '',
   								'next_or_number'   => 'next',
   								'separator'        => '</div><div class="six columns text-right">',
   								'nextpagelink'     => __( 'Next page &rarr;' ),
   								'previouspagelink' => __( '&larr; Previous page' ),
   								'pagelink'         => '%',
   								'echo'             => 1
   								);

   							wp_link_pages( $defaults );

						?>
					</div> 

				</article> <!-- /entry -->

				<?php 
					endwhile;
				endif; ?>			   
	         
	      </div> <!-- /main -->   

	      <div class="tab-whole four columns end" id="secondary">

	        <aside id="sidebar">
				<?php get_sidebar(); ?>
	       	</aside> <!-- /sidebar -->

	      </div> <!-- /secondary -->

	   </div> <!-- /row -->      

   </section> <!-- /content -->  

<?php get_footer();?>
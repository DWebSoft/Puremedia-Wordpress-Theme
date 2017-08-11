
<?php get_header();?>


   <!-- Content
   ================================================== -->
   <section id="content">

   	<div class="row">

	   	<div id="main" class="tab-whole eight columns entries">

	   		<h1 class="text-center add-bottom">
	   			Our Services:
			</h1>
		
			<?php if( have_posts() ) :?>

			<?php while( have_posts() ): the_post(); ?>		

	         <article class="entry">

	         		<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-thumb">
							<a title="" href="<?php esc_attr( the_permalink() ); ?>">
							<?php the_post_thumbnail('full'); ?>
							</a>
						</div>
					<?php endif; ?>

					<header class="entry-header">

						<h1 class="entry-title">
							<a title="" href="<?php esc_attr( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a>
						</h1> 				 
						
						<div class="entry-meta">
							<ul>
								<li><?php the_time( 'M d Y' ); ?></li>
								<span class="meta-sep">•</span>								
								<li><a rel="category tag" href="#"><?php the_category(', '); ?></a></li>
								<span class="meta-sep">•</span>
								<li><a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></li>
							</ul>
						</div> 
						 
					</header> 
						
					<div class="entry-content">
						<p><?php the_excerpt(); ?></p>
					</div> 

				</article> <!-- /entry -->

				<?php 
					endwhile;
				endif; ?>

				<div class="pagenav group">
	  			   	<span class="prev">
	  			   	<?php echo str_replace('<a', '<a rel="prev"', get_previous_posts_link('Next &rarr;') ); ?>
	  			   	</span>
	  				<span class="next">
	  				<?php echo str_replace('<a', '<a rel="next"', get_next_posts_link(' &larr; Previous') ); ?>
	  				</span>  				   
	  			</div>   			   
	         
	      </div> <!-- /main -->   

	      <div class="tab-whole four columns end" id="secondary">

	        <aside id="sidebar">
				<?php get_sidebar(); ?>
	       	</aside> <!-- /sidebar -->

	      </div> <!-- /secondary -->

	   </div> <!-- /row -->      

   </section> <!-- /content -->  

<?php get_footer();?>
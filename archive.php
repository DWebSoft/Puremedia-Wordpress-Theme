
<?php get_header();?>


   <!-- Content
   ================================================== -->
   <section id="content">

   	<div class="row">

	   	<div id="main" class="tab-whole eight columns entries">

	   		<h1>
	   			<?php
					if( is_category()){
						single_cat_title();	
					} elseif (is_tag()) {
						single_tag_title('Tag: ');
					} elseif (is_author()) {
						the_post();
						echo "Author Archives: ".get_author_name();
						rewind_posts();
					} elseif (is_day()) {
						echo "Daily Archives: ".get_the_date();
					} elseif (is_month()) {
						echo "Monthly Archives: ".get_the_date('F, Y');
					} elseif (is_year()) {
						echo "Yearly Archives: ".get_the_date('Y');
					} else{
						echo "Archive: ";
					}	
				?>
			</h1>
		
			<?php if( have_posts() ) :?>

			<?php while( have_posts() ): the_post(); ?>		

	         <article class="entry">
	         

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
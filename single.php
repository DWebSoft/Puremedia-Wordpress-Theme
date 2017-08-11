
<?php get_header();?>


   <!-- Content
   ================================================== -->
   <section id="content">

   	<div class="row">

   		<div id="main" class="tab-whole eight columns entries">

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
   									<li><?php the_time( get_option( 'date_format' ) ); ?></li>
   									<span class="meta-sep">•</span>								
   									<li><a rel="category tag" href="#"><?php the_category(', '); ?></a></li>
   									<span class="meta-sep">•</span>
   									<li><a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></li>
   								</ul>
   							</div> 

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

   							the_tags('<div class="tags half-bottom"><span>Tagged in: </span>',', ','</div>'); ?>

   						</div>
   						<nav class="pagenav1 group">
   							<div class="six columns text-left">
   								<?php previous_post_link('%link', '&larr;  %title'); ?>
   							</div>
   							<div class="six columns text-right">
   								<?php next_post_link('%link', '%title &rarr; '); ?>
   							</div> 				   
   						</nav>  
                     
                     <?php comments_template(); ?>

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
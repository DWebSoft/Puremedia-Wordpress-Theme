<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo( 'name' ); wp_title(); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">  
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="favicon.png" >
	<?php
	if(is_singular() && pings_open(get_queried_object())):
		?>
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
<?php endif;?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="top"></div>
	<div id="preloader"> 
		<div id="status">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif" height="60" width="60" alt="">
			<div class="loader">Loading...</div>
		</div>
	</div>


   <!-- Header
   =================================================== -->
   <header id="main-header">

   	<div class="row header-inner">

   		<div class="logo">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
               <?php bloginfo('name'); ?>
            </a>   
         </div>

   		<nav id="nav-wrap">         
   			
   			<a class="mobile-btn" href="#nav-wrap" title="Show navigation">
   				<span class='menu-text'>Show Menu</span>
   				<span class="menu-icon"></span>
   			</a>
   			<a class="mobile-btn" href="#" title="Hide navigation">
   				<span class='menu-text'>Hide Menu</span>
   				<span class="menu-icon"></span>
   			</a>         

            <?php wp_nav_menu( array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'menu_class'      => 'nav',
               'menu_id'         => 'nav',
               'depth'           => 1,
            ) ); ?> 

   		</nav> <!-- /nav-wrap -->	      

   	</div> <!-- /header-inner -->

   </header>
   <?php 
      //Initialize Titan
      $titan = TitanFramework::getInstance( 'dweb' ); 
   ?>
   <!-- Hero
   =================================================== -->
   <section id="hero">  
        
      <div class="row hero-content">

         <div class="twelve columns flex-container">

            <div id="hero-slider" class="flexslider">

               <ul class="slides">

                  <!-- Slide -->
                  <?php if(  $titan->getOption('header_text_1') ): ?>
                  <li>
                     <div class="flex-caption">
                        <h1><?php echo $titan->getOption('header_text_1'); ?></h1> 
                        <?php if( $titan->getOption('button_text_1') ): ?>
                           <p><a class="button stroke smoothscroll" href="<?php echo esc_url( $titan->getOption('button_url_1') ); ?>"><?php echo $titan->getOption('button_text_1'); ?></a></p>
                        <?php endif; ?>                                                 
                     </div>                  
                  </li>
                  <?php endif; ?>
                  <!-- Slide -->
                  <?php if(  $titan->getOption('header_text_2') ): ?>
                  <li>
                     <div class="flex-caption">
                        <h1><?php echo $titan->getOption('header_text_2'); ?></h1>
                        <?php if( $titan->getOption('button_text_2') ): ?> 
                           <p><a class="button stroke smoothscroll" href="<?php echo esc_url( $titan->getOption('button_url_2') ); ?>"><?php echo $titan->getOption('button_text_2'); ?></a></p>
                        <?php endif; ?>                                                 
                     </div>                  
                  </li>
                  <?php endif; ?>

                  <!-- Slide -->
                  <?php if(  $titan->getOption('header_text_3') ): ?>
                  <li>
                     <div class="flex-caption">
                        <h1><?php echo $titan->getOption('header_text_3'); ?></h1> 
                        <?php if( $titan->getOption('button_text_3') ): ?>
                           <p><a class="button stroke smoothscroll" href="<?php echo esc_url( $titan->getOption('button_url_3') ); ?>"><?php echo $titan->getOption('button_text_3'); ?></a></p>
                        <?php endif; ?>                                                 
                     </div>                  
                  </li>
                  <?php endif; ?>                         

               </ul>

            </div> <!-- .flexslider -->               

         </div> <!-- .flex-container -->      

      </div> <!-- .hero-content -->    

   </section> <!-- #hero -->
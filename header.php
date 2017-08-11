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

   <!-- Page Title
   ================================================== -->
   <section id="page-title">  
        
      <div class="row">

         <div class="twelve columns">

            <h1><?php bloginfo( 'name' ); ?><span>.</span></h1>
            <p><?php bloginfo( 'description' ); ?></p>

         </div>             

      </div> <!-- /row -->    

   </section> <!-- /page-title --> 
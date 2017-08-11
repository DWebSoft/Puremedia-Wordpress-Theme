<!-- Footer
   ================================================== -->
   <footer id="footer">

      <div class="row">       

         <div class="six columns tab-whole footer-about">
				
            <?php 
               if( is_active_sidebar( 'dweb-footer1' ) ){
                  dynamic_sidebar( 'dweb-footer1' );
               }
             ?>        

         </div> <!-- /footer-about -->

         <div class="six columns tab-whole right-cols">

            <div class="row">

               <div class="columns">
                  <?php 
                     if( is_active_sidebar( 'dweb-footer2' ) ){
                        dynamic_sidebar( 'dweb-footer2' );
                     }
                   ?>                   
               </div> <!-- /columns -->             

               <div class="columns last">
                  <?php 
                     if( is_active_sidebar( 'dweb-footer3' ) ){
                        dynamic_sidebar( 'dweb-footer3' );
                     }
                   ?> 
                  
               </div> <!-- /columns --> 

            </div> <!-- /Row(nested) -->

         </div>
         <?php 
            //Initialize Titan
            $titan = TitanFramework::getInstance( 'dweb' ); 
         ?>
         <p class="copyright"><?php echo $titan->getOption('copyright_text'); ?>. Designed by <a href="http://www.styleshout.com/">Styleshout.</a>. Developed by <a href="http://www.dwebpixel.com/">DWebPixel.</a></p>        

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"><span>Top</span><i class="fa fa-long-arrow-up"></i></a>
         </div>

      </div> <!-- /row -->

   </footer> <!-- /footer -->
   <?php wp_footer(); ?>

</body>

</html>
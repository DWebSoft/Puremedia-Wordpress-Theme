<?php

class DWeb_Contact_Form extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'dweb_widget_contact_form contact', 'description' => __( 'Display your contact form.', 'dweb') );
		parent::__construct( false , $name = __('DWeb Contact Form Widget', 'dweb'), $widget_ops);
		$this->alt_option_name = 'dweb_contact_form_widget';
	}
	
	function form($instance) {
		$title     		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Our Latest Projects';
		$description     		 = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
		

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'description' ) ) . '">Description (shown below title):</label>';
		$output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( 'description' ) ) . '" name="' . esc_attr( $this->get_field_name( 'description' ) ) . '">'. esc_attr( $description ) . '</textarea>';
		$output .= '</p>';
		
		echo $output;

	}

	function update($new_instance, $old_instance) {

		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : 'Our Latest Projects' );
		$instance[ 'description' ] = ( !empty( $new_instance[ 'description' ] ) ? strip_tags( $new_instance[ 'description' ] ) : '' );
		
		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {

		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		
		echo $args['before_widget'];

		$output = "";

	    //Title
		$output .= '<div class="section-head">';
		$output .= '<div class="twelve columns">';
		$output .= $args['before_title'] . $title . $args['after_title'];
		$output .= '<hr />';
		$output .= '<p>' . $description . '</p>';
		$output .= '</div><!-- end .columns -->';     
		$output .= '</div><!-- end .section-head -->';     

		echo $output;
	?>
		<div class="form-section">
      	
      	<div id="contact-form" class="twelve columns">

            <form name="contactForm" id="contactForm" method="post" action="" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

      			<fieldset>

                  <div class="row">

	                  <div class="six columns mob-whole">
	                  	<label for="contactFname">First Name <span class="required">*</span></label>	      						   
	      					<input name="contactFname" type="text" id="contactFname" placeholder="First Name" value="" />	      					
	                  </div>

	                  <div class="six columns mob-whole">	
	                  	<label for="contactLname">Last Name <span class="required">*</span></label>      						   
	      					<input name="contactLname" type="text" id="contactLname" placeholder="Last Name" value="" />	      					
	                  </div>	                        

                  </div>

                  <div class="row">

	                  <div class="twelve columns">	
	                  	<label for="contactEmail">Email <span class="required">*</span></label>      						   
	      					<input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" />	      					
	                  </div>

                  </div>

                  <div class="row">

	                  <div class="twelve columns">
	                     <label  for="contactMessage">Message <span class="required">*</span></label>
	                     <textarea name="contactMessage"  id="contactMessage" placeholder="Your Message" rows="10" cols="50" ></textarea>
	                  </div>

                  </div>

                  <div>
                     <button class="submit full-width">Send Message</button>
                     <div id="image-loader">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif" alt="" />
                     </div>
                  </div>

      			</fieldset>
      				
      		</form> <!-- /contactForm -->

            <!-- message box -->
            <div id="message-warning"></div>
            <div id="message-success">
               <i class="fa fa-check"></i>Your message was sent, thank you!<br />
    		</div>

         </div> <!-- /contact-form -->      	

      </div> <!-- /form-section -->     


	
	<?php
		echo $args['after_widget'];	
	}

}
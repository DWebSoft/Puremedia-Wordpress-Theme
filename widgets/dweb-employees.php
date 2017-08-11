<?php

class DWeb_Employees extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'dweb_widget_employees team', 'description' => __( 'Display your employees.', 'dweb') );
		parent::__construct( false , $name = __('DWeb Employees Widget', 'dweb'), $widget_ops);
		$this->alt_option_name = 'dweb_employees_widget';
	}
	
	function form($instance) {
		$title     		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Our Employees';
		$description     		 = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
		$number    		 = isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$categories      = isset( $instance['categories'] ) ? esc_attr($instance['categories']) : '';

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'description' ) ) . '">Description (shown below title):</label>';
		$output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( 'description' ) ) . '" name="' . esc_attr( $this->get_field_name( 'description' ) ) . '">'. esc_attr( $description ) . '</textarea>';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'number' ) ) . '">Number of employees to display  (-1 shows all of them):</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'number' ) ) . '" name="' . esc_attr( $this->get_field_name( 'number' ) ) . '" value="' . esc_attr( $number ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'categories' ) ) . '">Enter the slugs (comma separated) for your categories or leave empty to show all Employees.:</label>';
		$output .= '<input type="categories" class="widefat" id="' . esc_attr( $this->get_field_id( 'categories' ) ) . '" name="' . esc_attr( $this->get_field_name( 'categories' ) ) . '" value="' . esc_attr( $categories ) . '">';
		$output .= '</p>';
		
		echo $output;

	}

	function update($new_instance, $old_instance) {

		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : 'Our Employees' );
		$instance[ 'description' ] = ( !empty( $new_instance[ 'description' ] ) ? strip_tags( $new_instance[ 'description' ] ) : '' );
		$instance[ 'number' ] = ( !empty( $new_instance[ 'number' ] ) ? intval( strip_tags( $new_instance[ 'number' ] ) ) : -1 );
		$instance['categories'] = ( !empty( $new_instance[ 'categories' ] ) ? sanitize_text_field( $new_instance['categories'] ) : '' );
		
		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {

		$titan = TitanFrameWork::getInstance( 'dweb' );

		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		$number = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		$categories = isset( $instance['categories'] ) ? $instance['categories'] : '';

		

		$the_query = new WP_Query( array (
			'post_type' => 'dweb_employees',
			'posts_per_page' => $number,
			'category_name' => $categories,
			) );

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

	    //Items
		$output .= '<div class="row about-content">';
		$output .= '<div class="twelve columns">';

		$output .= '<div id="team-wrapper" class="bgrid-half mob-bgrid-whole group">';

		while ( $the_query->have_posts() ):

			$the_query->the_post();

			global $post;
			$id = $post->ID;

			$position = $titan->getOption('dweb_employee_position', $id );

			//Social Links
			$twitter = $titan->getOption('dweb_employee_twitter', $id );
			$facebook = $titan->getOption('dweb_employee_fb', $id );
			$gplus = $titan->getOption('dweb_employee_gplus', $id );
			$linkedin = $titan->getOption('dweb_employee_linkedin', $id );
			$link = $titan->getOption('dweb_employee_link', $id );

			$links = "";
			if( $twitter ){
				$links .= '<li><a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a></li>';
			}
			if( $facebook ){
				$links .= '<li><a href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook"></i></a></li>';
			}
			if( $gplus ){
				$links .= '<li><a href="' . esc_url( $gplus ) . '"><i class="fa fa-google-plus"></i></a></li>';
			}
			if( $linkedin ){
				$links .= '<li><a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a></li>';
			}

			if( $link ){
				$links .= '<li><a href="' . esc_url( $link ) . '"><i class="fa fa-link"></i></a></li>';
			}else{
				$links .= '<li><a href="' . esc_url( get_the_permalink() ) . '"><i class="fa fa-link"></i></a></li>';
			}
			

			$output .= '<div class="bgrid member">';
			$output .= '<div class="member-header">';
			$output .= '<div class="member-pic">';
			$output .=  get_the_post_thumbnail( $id );
			$output .= '</div><!-- .member-pic -->';
			$output .= '<div class="member-name">';
			$output .= '<h3>' . get_the_title( $id ) . '</h3>';
			$output .= '<span>'. $position .'</span>';
			$output .= '</div>';
			$output .= '</div><!-- .member-header -->';
			$output .= '<p>'.get_the_content( $id ).'</p>';
			$output .= '<ul class="member-social"> ' . $links . '</ul>';

			$output .= '</div> <!-- /bgrid -->';

		endwhile;    
		wp_reset_postdata();
		$output .= '</div> <!-- /service-list -->';
		$output .= '</div><!-- end .columns -->';    
		$output .= '</div> <!-- end .items -->';

		echo $output;

		echo $args['after_widget'];	
	}

}
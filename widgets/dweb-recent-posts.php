<?php

class DWeb_Recent_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'dweb_widget_recent_posts journal', 'description' => __( 'Display your recent posts', 'dweb') );
		parent::__construct( false , $name = __('DWeb Recent Posts Widget', 'dweb'), $widget_ops);
		$this->alt_option_name = 'dweb_recent_posts_widget';
	}
	
	function form($instance) {
		$title     		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Our Services';
		$description     		 = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
		$number    		 = isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$length    		 = isset( $instance['length'] ) ? absint( $instance['length'] ) : 55;
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
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'number' ) ) . '">Number of posts to display  (-1 shows all of them):</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'number' ) ) . '" name="' . esc_attr( $this->get_field_name( 'number' ) ) . '" value="' . esc_attr( $number ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'categories' ) ) . '">Enter the slugs (comma separated) for your categories or leave empty to show all services.:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'categories' ) ) . '" name="' . esc_attr( $this->get_field_name( 'categories' ) ) . '" value="' . esc_attr( $categories ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'length' ) ) . '">Length of excerpt: </label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'length' ) ) . '" name="' . esc_attr( $this->get_field_name( 'length' ) ) . '" value="' . esc_attr( $length ) . '">';
		$output .= '</p>';
		
		echo $output;

	}

	function update($new_instance, $old_instance) {

		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : 'Our Services' );
		$instance[ 'description' ] = ( !empty( $new_instance[ 'description' ] ) ? strip_tags( $new_instance[ 'description' ] ) : '' );
		$instance[ 'number' ] = ( !empty( $new_instance[ 'number' ] ) ? intval( strip_tags( $new_instance[ 'number' ] ) ) : -1 );
		$instance[ 'length' ] = ( !empty( $new_instance[ 'length' ] ) ? absint( strip_tags( $new_instance[ 'length' ] ) ) : 55 );
		$instance['categories'] = ( !empty( $new_instance[ 'categories' ] ) ? sanitize_text_field( $new_instance['categories'] ) : '' );
		
		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {


		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		$number = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		$length = ( ! empty( $instance['length'] ) ) ? absint( $instance['length'] ) : 55;
		$categories = isset( $instance['categories'] ) ? $instance['categories'] : '';

		

		$the_query = new WP_Query( array (
			'post_type' => 'post',
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
		$output .= '<div class="row">';
		$output .= '<div class="twelve columns">';

		$output .= '<div id="blog-wrapper" class="bgrid-third s-bgrid-half mob-bgrid-whole group">';

		while ( $the_query->have_posts() ):

			$the_query->the_post();

			global $post;
			$id = $post->ID;

			$output .= '<article class="bgrid">';
			$output .= '<h5>' . get_the_time('M d Y', $id ) . '</h5>';
			$output .= '<h3>';
			$output .= '<a href="' . esc_url( get_permalink() ) . '">';
			$output .= get_the_title( $id ).'</a>';
			$output .= '</h3>';
			if( $post->post_excerpt ):
				$output .= '<p>'. get_the_excerpt() .'</p>';
			else:
			$output .= '<p>'. wp_trim_words( get_the_content() , $length ,' ...' ) .'</p>';
			endif;	
			$output .= '</article> <!-- /bgrid -->';

		endwhile;    
		wp_reset_postdata();
		$output .= '</div> <!-- /blog-wrapper -->';
		$output .= '</div><!-- end .columns -->';    
		$output .= '</div> <!-- end .row -->';

		echo $output;
		echo $args['after_widget'];	
	}

}
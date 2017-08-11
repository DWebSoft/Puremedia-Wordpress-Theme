<?php

class DWeb_Portfolio extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'dweb_widget_portfolio portfolio', 'description' => __( 'Display your portfolio in a grid.', 'dweb') );
		parent::__construct( false , $name = __('DWeb Portfolio Widget', 'dweb'), $widget_ops);
		$this->alt_option_name = 'dweb_portfolio_widget';
	}
	
	function form($instance) {
		$title     		 = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Our Latest Projects';
		$description     		 = isset( $instance['description'] ) ? esc_attr( $instance['description'] ) : '';
		$number    		 = isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$categories      = isset( $instance['categories'] ) ? esc_attr($instance['categories']) : '';
		$show_all      = isset( $instance['show_all'] ) ? esc_attr($instance['show_all']) : 'Show All Projects';
		

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'description' ) ) . '">Description (shown below title):</label>';
		$output .= '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( 'description' ) ) . '" name="' . esc_attr( $this->get_field_name( 'description' ) ) . '">'. esc_attr( $description ) . '</textarea>';
		$output .= '</p>';
		
		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'number' ) ) . '">Number of projects to display  (-1 shows all of them):</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'number' ) ) . '" name="' . esc_attr( $this->get_field_name( 'number' ) ) . '" value="' . esc_attr( $number ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'categories' ) ) . '">Enter the slugs (comma separated) for your categories or leave empty to show all projects.:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'categories' ) ) . '" name="' . esc_attr( $this->get_field_name( 'categories' ) ) . '" value="' . esc_attr( $categories ) . '">';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'show_all' ) ) . '">Show all button text:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'show_all' ) ) . '" name="' . esc_attr( $this->get_field_name( 'show_all' ) ) . '" value="' . esc_attr( $show_all ) . '">';
		$output .= '</p>';
		
		echo $output;

	}

	function update($new_instance, $old_instance) {

		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : 'Our Latest Projects' );
		$instance[ 'description' ] = ( !empty( $new_instance[ 'description' ] ) ? strip_tags( $new_instance[ 'description' ] ) : '' );
		$instance[ 'number' ] = ( !empty( $new_instance[ 'number' ] ) ? intval( strip_tags( $new_instance[ 'number' ] ) ) : -1 );
		$instance['categories'] = ( !empty( $new_instance[ 'categories' ] ) ? sanitize_text_field( $new_instance['categories'] ) : '' );
		$instance['show_all'] = ( !empty( $new_instance[ 'show_all' ] ) ? sanitize_text_field( $new_instance['show_all'] ) : '' );
		
		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {

		$titan = TitanFrameWork::getInstance( 'dweb' );

		$title  = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$description = isset( $instance['description'] ) ? $instance['description'] : '';
		$number = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		$categories = isset( $instance['categories'] ) ? $instance['categories'] : '';
		$show_all = isset( $instance['show_all'] ) ? $instance['show_all'] : '';

		

		$the_query = new WP_Query( array (
			'post_type' => 'dweb_projects',
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
		$output .= '<div class="row items">';
		$output .= '<div class="twelve columns">';

		$output .= '<div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third mob-bgrid-half group ">';

		while ( $the_query->have_posts() ):

			$the_query->the_post();

			global $post;
			$id = $post->ID;

			if( $titan->getOption('dweb_project_url', $id ) ){
				$link = $titan->getOption('dweb_project_url', $id );
			}else{
				$link = get_the_permalink();
			}

			$all_categories = '';
			$comma = ', ';
			$i=0;
			foreach (get_the_category() as $category){

				if( $i != 0){
					$all_categories .= $comma;
				}

				$all_categories .=  $category->name;
				$i++;
			}

			$output .= '<div class="bgrid item">';
			$output .= '<div class="item-wrap">';
			$output .= '<a href="' . esc_url( $link ) . '">';
			$output .=  get_the_post_thumbnail( $id, 'dweb-portfolio-thumb' );
			$output .= '<div class="overlay"></div>';
			$output .= '<div class="portfolio-item-meta">';
			$output .= '<h5>'.get_the_title( $id ).'</h5>';
			$output .= '<h5><small>'.$all_categories.'</small></h5>';
			//$output .= '<p>'.get_the_content( $id ).'</p>';
			$output .= '</div>';
			$output .= '</a>';
			$output .= '</div>';
			$output .= '</div> <!-- /item -->';

		endwhile;    
		wp_reset_postdata();
		$output .= '</div> <!-- /portfolio-wrapper -->';
		if( !empty( $show_all ) ):
		$output .= '<div class="text-center" style="margin-top:30px"><a href="'. site_url('dweb_projects') .'" class="button orange">'. $show_all .'</a></div>';
		endif;
		$output .= '</div><!-- end .columns -->';    
		$output .= '</div> <!-- end .items -->';

		echo $output;

		echo $args['after_widget'];	
	}

}
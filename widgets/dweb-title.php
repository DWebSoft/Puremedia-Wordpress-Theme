<?php

class DWeb_Title extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'dweb_widget_title row section-head', 'description' => __( 'Display a title with some description.', 'dweb') );
        parent::__construct(false, $name = __('DWeb Title Widget', 'dweb'), $widget_ops);
		$this->alt_option_name = 'dweb_title_widget';
    }
	
	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$description  	= isset( $instance['description'] ) ? esc_html( $instance['description'] ) : '';			
	?>

	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'dweb'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>	
    <p><label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description', 'dweb'); ?></label>
    <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
	</p>		
			
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['description'] 	= strip_tags($new_instance['description']);
		return $instance;
	}
	
	// display widget
	function widget($args, $instance) {
	

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$description 	= isset( $instance['description'] ) ? esc_html($instance['description']) : '';
		
		echo $args['before_widget'];
		echo $args['before_title'] . $title . '<span>.</span>' .$args['after_title'];
		echo '<hr>';
		echo "<p>". $description ."</p>";
		echo $args['after_widget'];
	}
	
}
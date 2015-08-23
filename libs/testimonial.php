<?php
/**
 * ThemeWizz Testiominal
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzTestimonal extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'wizz_testimonial_widget',
            __('ThemeWizz Testimonal', 'wizz'),
            array(
                'description' => __( 'Custom ThemeWizz testimonial widget.', 'wizz' ),
            )
        );
    }
    
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        
        include(apply_filters('wizz_testimonial_theme', array()));
        
		echo $args['after_widget'];
    }
    
    public function form($instance)
    {
        $quote = ! empty($instance['quote']) ? $instance['quote'] : '';
        $image = ! empty($instance['image']) ? $instance['image'] : '';
        $name = ! empty($instance['name']) ? $instance['name'] : '';
        $title = ! empty($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Quote:', 'wizz'); ?></label>
            <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('quote'); ?>" name="<?php echo $this->get_field_name('quote'); ?>"><?php echo esc_attr($quote); ?></textarea>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:', 'wizz'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo esc_attr($image); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:', 'wizz'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" value="<?php echo esc_attr($name); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wizz'); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance)
    {
        $instance = array();
		$instance['quote'] = (!empty( $new_instance['quote'])) ? strip_tags($new_instance['quote']) : '';
		$instance['image'] = (!empty( $new_instance['image'])) ? strip_tags($new_instance['image']) : '';
		$instance['name'] = (!empty( $new_instance['name'])) ? strip_tags($new_instance['name']) : '';
		$instance['title'] = (!empty( $new_instance['title'])) ? strip_tags($new_instance['title']) : '';

		return $instance;   
    }
}

function wizz_testimonail() {
    register_widget('WizzTestimonal');
}

add_action('widgets_init', 'wizz_testimonail');

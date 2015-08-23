<?php
/**
 * ThemeWizz Portfolio Widget
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzPortfolioWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'wizz_portfolio_widget',
            __('ThemeWizz Portfolio', 'wizz'),
            array(
                'description' => __( 'Custom ThemeWizz portfolio widget.', 'wizz' ),
            )
        );
    }
    
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

        $portfolio = new WP_Query(array(
                'post_type' => 'portfolio',
                'post_status' => 'publish',
            ));

        if ($portfolio->have_posts()) {
            echo '<ul id="wizz-portfolio" class="list-unstyled clearfix portfolio">';
            $i = 1;

            while ($portfolio->have_posts()) {
                $portfolio->the_post();
                
                if ($instance['count'] < $i) {
                    break;
                }
                
                if (get_field('feature_portfolio', get_the_ID()) == 'yes') {
                    include(apply_filters('wizz_portfolio_theme', array()));

                    $i++;
                }
            }
            
            echo '</ul>';
        }

        wp_reset_query();

		echo $args['after_widget'];
    }
    
    public function form($instance)
    {
        $title = ! empty($instance['title']) ? $instance['title'] : __('Latest Works', 'wizz');
        $count = ! empty($instance['title']) ? $instance['count'] : 10;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of portfolio to show:', 'wizz'); ?></label>
            <input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" value="<?php echo esc_attr($count); ?>" size="3">
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance)
    {
        $instance = array();
		$instance['title'] = (!empty( $new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['count'] = (!empty( $new_instance['count'])) ? strip_tags($new_instance['count']) : 0;

		return $instance;   
    }
}

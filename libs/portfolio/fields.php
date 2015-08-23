<?php
/**
 * ThemeWizz Portfolio Fields
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */
 
 if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_portfolio-settings',
        'title' => 'Portfolio Settings',
        'fields' => array (
            array (
                'key' => 'field_55a31cf3ca122',
                'label' => 'Upload Images',
                'name' => 'portfolio_images',
                'type' => 'gallery',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_55a328433a2c5',
                'label' => 'Portfolio Type',
                'name' => 'portfolio_type',
                'type' => 'radio',
                'choices' => array (
                    'inline' => 'Inline',
                    'slideshow' => 'Slideshow',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'inline',
                'layout' => 'horizontal',
            ),
            array (
				'key' => 'field_55cd017b83998',
				'label' => 'Feature Portfolio',
				'name' => 'feature_portfolio',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'portfolio',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

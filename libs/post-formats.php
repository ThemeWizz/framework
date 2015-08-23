<?php
/**
 * ThemeWizz Post Formats
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzPostFormats
{
    public function __construct()
    {
        add_action( 'after_setup_theme', array(&$this, 'setup'));
        
        if (function_exists('register_field_group')) {
            $this->register_field();
        }
    }
    
    public function setup()
    {
        add_theme_support('post-formats', array('audio', 'gallery', 'image', 'link', 'quote', 'video'));
    }

    public function register_field()
    {
        register_field_group(array (
            'id' => 'acf_audio-settings',
            'title' => 'Audio Settings',
            'fields' => array (
                array (
                    'key' => 'field_55b283ac146d0',
                    'label' => 'MP3 File URL',
                    'name' => 'post_audio_mp3_file_url',
                    'type' => 'file',
                    'save_format' => 'url',
                    'library' => 'all',
                ),
                array (
                    'key' => 'field_55b283df146d1',
                    'label' => 'OGA File URL',
                    'name' => 'post_audio_oga_file_url',
                    'type' => 'file',
                    'save_format' => 'url',
                    'library' => 'all',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'audio',
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
        
        register_field_group(array (
            'id' => 'acf_gallery-settings',
            'title' => 'Gallery Settings',
            'fields' => array (
                array (
                    'key' => 'field_55b14eaf8363f',
                    'label' => 'The Gallery',
                    'name' => 'post_gallery',
                    'type' => 'gallery',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'gallery',
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
        
        register_field_group(array (
            'id' => 'acf_link-settings',
            'title' => 'Link Settings',
            'fields' => array (
                array (
                    'key' => 'field_55b147f427f78',
                    'label' => 'The Link',
                    'name' => 'post_link',
                    'type' => 'text',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'link',
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
        
        register_field_group(array (
            'id' => 'acf_quote-settings',
            'title' => 'Quote Settings',
            'fields' => array (
                array (
                    'key' => 'field_55b13d4b062cc',
                    'label' => 'The Quote',
                    'name' => 'post_quote',
                    'type' => 'textarea',
                    'default_value' => '',
                    'placeholder' => 'Your Quote',
                    'maxlength' => '',
                    'rows' => '',
                    'formatting' => 'br',
                ),
                array (
                    'key' => 'field_55b13ef04f5c1',
                    'label' => 'The Author',
                    'name' => 'post_quote_author',
                    'type' => 'text',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'quote',
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
        
        register_field_group(array (
            'id' => 'acf_video-settings',
            'title' => 'Video Settings',
            'fields' => array (
                array (
                    'key' => 'field_55b167ec6dca9',
                    'label' => 'The Options',
                    'name' => 'post_video_options',
                    'type' => 'radio',
                    'choices' => array (
                        'upload' => 'Upload',
                        'embed' => 'Embed',
                    ),
                    'other_choice' => 0,
                    'save_other_choice' => 0,
                    'default_value' => 'embed',
                    'layout' => 'horizontal',
                ),
                array (
                    'key' => 'field_55b168356dcaa',
                    'label' => 'Embedded Code',
                    'name' => 'post_video_embedded_code',
                    'type' => 'textarea',
                    'conditional_logic' => array (
                        'status' => 1,
                        'rules' => array (
                            array (
                                'field' => 'field_55b167ec6dca9',
                                'operator' => '==',
                                'value' => 'embed',
                            ),
                        ),
                        'allorany' => 'all',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'formatting' => 'none',
                ),
                array (
                    'key' => 'field_55b168a20395f',
                    'label' => 'M4V File URL',
                    'name' => 'post_video_m4v_file_url',
                    'type' => 'file',
                    'conditional_logic' => array (
                        'status' => 1,
                        'rules' => array (
                            array (
                                'field' => 'field_55b167ec6dca9',
                                'operator' => '==',
                                'value' => 'upload',
                            ),
                        ),
                        'allorany' => 'all',
                    ),
                    'save_format' => 'url',
                    'library' => 'all',
                ),
                array (
                    'key' => 'field_55b168e903960',
                    'label' => 'OGV File URL',
                    'name' => 'post_video_ogv_file_url',
                    'type' => 'file',
                    'conditional_logic' => array (
                        'status' => 1,
                        'rules' => array (
                            array (
                                'field' => 'field_55b167ec6dca9',
                                'operator' => '==',
                                'value' => 'upload',
                            ),
                        ),
                        'allorany' => 'all',
                    ),
                    'save_format' => 'url',
                    'library' => 'all',
                ),
                array (
                    'key' => 'field_55b1696ce5209',
                    'label' => 'Poster Image',
                    'name' => 'post_video_poster_image',
                    'type' => 'file',
                    'conditional_logic' => array (
                        'status' => 1,
                        'rules' => array (
                            array (
                                'field' => 'field_55b167ec6dca9',
                                'operator' => '==',
                                'value' => 'upload',
                            ),
                        ),
                        'allorany' => 'all',
                    ),
                    'save_format' => 'url',
                    'library' => 'all',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_format',
                        'operator' => '==',
                        'value' => 'video',
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
}

new WizzPostFormats();

<?php
/**
 * ThemeWizz Socials
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzSocial
{
    public function __construct()
    {
        add_action('customize_register', array(&$this, 'register'));
    }

    private $accounts = array(
        'twitter'    => 'Twitter Username',
        'facebook'   => 'Facebook URL',
        'pinterest'  => 'Pinterest URL',
        'google-plus' => 'Google Plus URL',
        'dribbble'   => 'Dribbble URL',
        'linkedin'   => 'LinkedIn URL',
    );
    
    public function register($wp_customize)
    {
        $wp_customize->add_section('wizz_social', array(
            'title'       => __('Social Links', 'wizz'),
            'description' => __('Configure social account links.', 'wizz'),
        ));

        foreach ($this->accounts as $slug => $title) {
            $wp_customize->add_setting('wizz_social['. $slug .']', array(
                'default'           => '',
                'capability'        => 'edit_theme_options',
                'type'              => 'option',
            ));
     
            $wp_customize->add_control('wizz_social_'.$slug, array(
                'label'      => __($title, 'wizz'),
                'section'    => 'wizz_social',
                'settings'   => 'wizz_social['.$slug.']',
            ));
        }
    }
}

new WizzSocial();
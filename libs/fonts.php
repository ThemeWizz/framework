<?php
/**
 * ThemeWizz Fonts
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzFonts
{
    static $instance;

    private $key = 'AIzaSyB8IdSrZklLmcp0na89BbedH-9w5PU6SWo';
    
    private $sections = array();

    private function get_fonts()
    {
        $response = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?key='.$this->key);
        
        $body = json_decode($response['body']);
        
        return $body->items;
    }

    public function __construct()
    {
        self::$instance =& $this;
    }

    public function set_fonts($fonts = array())
    {
        $this->sections = $fonts;
        
        add_action('customize_register', array(&$this, 'register'));
        add_action('wp_head', array(&$this, 'add_header'));
    }
    
    public function add_header() {
        foreach ($this->sections as $slug => $section) {
            $font = get_theme_mod('wizz_fonts_'.$slug, $section['default']);
        ?>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $font); ?>:100,200,300,400,600,700,300italic,400italic,700italic" type="text/css" media="all" />
        <?php
        }
    }
    
    public function register($wp_customize)
    {
        $fonts = $this->get_fonts();
        $list = [];
        
        foreach ($fonts as $font) {
            $list[$font->family] = $font->family;
        }

        $wp_customize->add_section('wizz_fonts', array(
            'title'       => __('Fonts', 'wizz'),
            'description' => __('Fonts provided by Google Fonts', 'wizz'),
        ));

        foreach ($this->sections as $slug => $section) {
            $wp_customize->add_setting('wizz_fonts_'.$slug, array(
                'default'           => $section['default'],
                'capability'        => 'edit_theme_options',
            ));
     
            $wp_customize->add_control('wizz_fonts_'.$slug, array(
                'label'      => __($section['title'], 'wizz'),
                'section'    => 'wizz_fonts',
                'settings'   => 'wizz_fonts_'.$slug,
                'type'       => 'select',
		        'choices'    => $list,
            ));
        }
    }
}

new WizzFonts();

/**
 * ThemeWizz Set Fonts
 * @param  array  $fonts
 */
function wizz_fonts_set($fonts = array())
{
    WizzFonts::$instance->set_fonts($fonts);
}
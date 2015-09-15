<?php
/**
 * ThemeWizz Libraries
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzLibs
{
    static $instance;

    public function __construct()
    {
        self::$instance =& $this;
    }

    /**
     * Assets
     * @var array
     */
    private $libraries = array(
        'acf-gallery'   => 'acf-gallery/acf-gallery.php',
        'portfolio'     => 'portfolio.php',
        'post-formats'  => 'post-formats.php',
        'testimonial'   => 'testimonial.php',
        'social'        => 'social.php',
        'fonts'         => 'fonts.php',
        'support'       => 'support.php',
        'bootstra-nav'  => 'bootstrap-nav.php',
    );

    /**
     * Load Libraries
     * @param  array  $libraries
     */
    public function load_libraries($libraries = array())
    {
        foreach ($libraries as $library) {
            if ($lib = $this->libraries[$library]) {
                require_once WIZZ_DIR.'/libs/'.$lib;
            }
        }
    }
}

new WizzLibs;

/**
 * Load ThemeWizz Libraries
 * @param  array  $libraries
 */
function wizz_load_libraries($libraries = array())
{
    WizzLibs::$instance->load_libraries($libraries);
}

<?php
/**
 * ThemeWizz ACF
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzACF
{
    public function __construct()
    {
        add_filter('acf/settings/path', array(&$this, 'path'));
        add_filter('acf/settings/dir', array(&$this, 'directory'));
        add_filter('acf/settings/show_admin', array(&$this, 'hide'));
    }
    
    public function path($path)
    {
        $path = WIZZ_DIR.'/libs/acf/';

        return $path;
    }
    
    public function directory($dir)
    {
        $dir = WIZZ_URL.'/libs/acf/';
        
        return $dir;
    }
    
    public function hide()
    {
        return false;
    }
}

new WizzACF();
 
include_once(WIZZ_DIR.'/libs/acf/acf.php');
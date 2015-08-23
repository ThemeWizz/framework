<?php
/*
 Plugin Name: ThemeWizz
 Plugin URI: http://www.themewizz.com
 Description: ThemeWizz Framework
 Version: 1.01
 Author: ThemeWizz
 Author URI: http://www.themewizz.com
 */

define('WIZZ_DIR', plugin_dir_path(__FILE__));
define('WIZZ_URL', plugin_dir_url(__FILE__));
define('WIZZ_FRAMEWORK_VERSION', '1.0');
define('ACF_LITE', true);

// Load Framework components
require_once WIZZ_DIR .'/libs/acf.php';
require_once WIZZ_DIR .'/wizz-libs.php';
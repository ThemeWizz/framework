<?php
/**
 * ThemeWizz Portfolio
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

class WizzPortfolio
{
    public function __construct()
    {
        add_action('init', array(&$this, 'register'));
        add_action('wp_enqueue_scripts', array(&$this, 'scripts'));
        add_action('widgets_init', array(&$this, 'register_widget'));

        wizz_load_libraries(array('acf-gallery'));
    }
    
    public function scripts()
    {
        wp_enqueue_script('wizz-portfolio', WIZZ_URL.'/libs/portfolio/portfolio.js', array('jquery'), filemtime(WIZZ_DIR.'/libs/portfolio/portfolio.js'), true);
    }
    
    public function register()
    {
        $labels = array(
            'name' => 'Portfolios',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Portfolio',
            'edit_item' => 'Edit Portfolio',
            'new_item' => 'New Portfolio',
            'view_item' => 'View Portfolio',
            'search_items' => 'Search Portfolios',
            'not_found' => 'No portfolios found',
            'not_found_in_trash' => 'No portfolios found in Trash',
            'parent_item_colon' => 'Parent Portfolio:',
            'menu_name' => 'Portfolios',
        );
    
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies' => array('portfolio_category'),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );
    
        register_post_type('portfolio', $args);
        
		register_taxonomy('portfolio_category', 'portfolio', array(
			'label' => 'Categories',
			'hierarchical' => true,
			'query_var' => true,
// 			'rewrite' => array(
// 			    'slug' => 'portfolio-type'
// 			 )
		));
    }
    
    public function register_widget() {
        register_widget('WizzPortfolioWidget');
    }
}

include_once(WIZZ_DIR.'/libs/portfolio/functions.php');
include_once(WIZZ_DIR.'/libs/portfolio/fields.php');
include_once(WIZZ_DIR.'/libs/portfolio/widget.php');

new WizzPortfolio();

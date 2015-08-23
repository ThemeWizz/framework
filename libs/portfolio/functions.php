<?php
/**
 * ThemeWizz Portfolio Functions
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */

if (!function_exists('wizz_portfolio_categories')) {
    function wizz_portfolio_categories($id = null) {
        $terms = get_the_terms($id, 'portfolio_category');
        $categories = array();
        
        foreach ($terms as $term) {
		    $categories[] = $term->slug;
	    }
	    
	    $list = join(' ', $categories);
	    
	    return $list;
    }
}

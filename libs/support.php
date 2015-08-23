<?php
/**
 * ThemeWizz Support
 *
 * @package     ThemeWizz
 * @author      ThemeWizz <themewizz.com>
 * @since       1.0
 */
 
class WizzSupport
{
    public function __construct()
    {
        add_action('admin_menu', array(&$this, 'support_menu'));
    }
    
    public function support_menu()
    {
        add_theme_page('ThemeWizz Support', 'Support Form', 'edit_posts', 'support', array(&$this, 'support_page'));
    }
    
    public function support_page()
    {
        ?>
        <div class="wrap">
            <iframe style="width: 100%; height: 800px; border: 0;" src="http://themewizz.com/support/"></iframe>
        </div>
        <?php
    }
}

new WizzSupport();
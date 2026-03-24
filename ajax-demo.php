<?php
/**
* Plugin Name: Ajax Demo
* Description: A simple plugin to demonstrate Ajax in WordPress with shortcode and dashboard widget.
* Version: 1.0.o
* Author: Subas Roy
**/

// Prevent direct access
defined('ABSPATH') or exit();

defined('AJDM_PLUGIN_URL', plugin_dir_url(__FILE__));
defined('AJDM_PLUGIN_PATH', plugin_dir_path(__FILE__));

class Ajax_Demo{
    function _construct(){
        $this-> include_resources();
        $this-> init();
    }

    function include_resources() {
        require_once(AJDM_PLUGIN_PATH . 'includes/class-shortcode-button.php');
    }

    function init() {
        new Ajax_Demo_Shortcode_Button();
    }
}

new Ajax_Demo();
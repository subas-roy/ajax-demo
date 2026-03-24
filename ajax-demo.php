<?php

/**
 * Plugin Name: Ajax Demo
 * Description: A simple plugin to demonstrate Ajax in WordPress with shortcode and dashboard widget.
 * Version: 1.0.o
 * Author: Subas Roy
 **/

// Prevent direct access
defined('ABSPATH') or exit();

define('AJDM_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AJDM_PLUGIN_PATH', plugin_dir_path(__FILE__));

class Ajax_Demo {
    function __construct() {
        $this->include_resources();
        $this->init();
        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
    }

    function include_resources() {
        require_once(AJDM_PLUGIN_PATH . 'includes/class-shortcode-button.php');
    }

    function init() {
        new Ajax_Demo_Shortcode_Button();
    }

    function load_assets() {
        wp_enqueue_script('adjm-main', AJDM_PLUGIN_URL . 'assets/js/ajax-demo.js', [], time(), true);
        $admin_ajax_url = admin_url('admin-ajax.php'); // ajax file url
        wp_localize_script('adjm-main', 'ajdm', ['ajax_url' => $admin_ajax_url]); // send ajax url to JavaScript file
    }
}

new Ajax_Demo();

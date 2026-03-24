<?php
class Ajax_Demo_Shortcode_Button {
    function __construct() {
        add_shortcode('ajax_demo_button', [$this, 'render_button']);
        add_action('wp_ajax_demo', [$this, 'demo_call']); // for logged in user
        add_action('wp_ajax_nopriv_demo', [$this, 'demo_call']); // for guest user
        // add_action('wp_ajax_nopriv_demo', [$this, 'demo_guest_call']); // for guest user
    }

    function render_button() {
        ob_start();
?>
        <style>
            #ajax-demo-btn {
                background: #007cba;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 10px;
            }

            #ajax-demo-btn:hover {
                background: #005a87;
            }

            #ajax-demo-result {
                margin-top: 10px;
            }
        </style>
        <p><button id="ajax-demo-btn">Click Me</button></p>
        <div id="ajax-demo-result"></div>
<?php
        return ob_get_clean();
    }

    function demo_call() {
        wp_send_json_success('Revieced ajax call');
    }
    function demo_guest_call() {
        wp_send_json_success('Revieced ajax call from guest');
    }
}

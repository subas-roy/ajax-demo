<?php
class Currency_Widget {
    function __construct() {
        add_action('wp_dashboard_setup', [$this, 'add_dashboard_widget']);
    }

    function add_dashboard_widget() {
        wp_add_dashboard_widget( // Adds a new dashboard widget.
            'ajdm-daily-currency', // widget id
            'AJDM Currency Rates', // widget name
            [$this, 'render_widget'] // callback/render function
        );
    }

    function render_widget() {
?>
        <style>
            #ajax-demo-currency-btn {
                background: #007cba;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 10px;
            }

            #ajax-demo-currency-btn:hover {
                background: #005a87;
            }

            #ajax-demo-currency-result {
                margin-top: 10px;
            }
        </style>
        <p><button id="ajax-demo-currency-btn">Get Currency Rates</button></p>
        <div id="ajax-demo-currency-result"></div>
<?php
    }
}

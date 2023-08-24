<?php

namespace Engine\Base;

class Actions
{
    /**
     * Register the actions
     *
     * @return void
     */
    public function register(): void
    {
        // Add action to enqueue the plugin's admin javascript files and css styles.
        add_action( 'admin_enqueue_scripts', array(  $this, 'enqueueAdminScripts' ) );

        // Add action to enqueue the plugin's frontend java script files and css styles.
        add_action( 'wp_enqueue_scripts', array(  $this, 'enqueueFrontendScripts' ) );

        // Add action to check the server time through ajax.
        add_action( 'wp_ajax_checkServerTime', array( $this, 'checkServerTime' ) );
        add_action( 'wp_ajax_nopriv_checkServerTime', array( $this, 'checkServerTime' ) );
    }

    /**
     * Enqueue the plugin's admin javascript files and css styles.
     *
     * @return void
     */
    public function enqueueAdminScripts(): void
    {
        // Enqueue the plugin's admin javascript files.
        wp_enqueue_script( 'plugin-boilerplate-admin-script', BOILERPLATE_PLUGIN_URL . '/dist/js/main.js', array(), BOILERPLATE_VERSION, true );
        wp_add_inline_script( 'plugin-boilerplate-admin-script', 'const bpsettings = ' . json_encode( array(
                'zone' => 'admin',
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            ) ) );

        // Enqueue the plugin's admin css styles.
        wp_enqueue_style( 'plugin-boilerplate-admin-style', BOILERPLATE_PLUGIN_URL . '/dist/css/style.css', array(), BOILERPLATE_VERSION, 'all' );
    }

    /**
     * Enqueue the plugin's frontend java script files and css styles.
     *
     * @return void
     */
    public function enqueueFrontendScripts(): void
    {
        // Enqueue the plugin's frontend javascript files.
        wp_enqueue_script( 'plugin-boilerplate-frontend-script', BOILERPLATE_PLUGIN_URL . '/dist/js/main.js', array(), BOILERPLATE_VERSION, true );
        wp_add_inline_script( 'plugin-boilerplate-frontend-script', 'const bpsettings = ' . json_encode( array(
                'zone' => 'frontend',
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            ) ) );

        // Enqueue the plugin's frontend css styles.
        wp_enqueue_style( 'plugin-boilerplate-frontend-style', BOILERPLATE_PLUGIN_URL . '/dist/css/style.css', array(), BOILERPLATE_VERSION, 'all' );
    }

    /**
     * Check the server time through ajax.
     *
     * @return string
     */
    public function checkServerTime(): string
    {
        // Protect the function from none ajax requests
        if (! DOING_AJAX ) return $this->return_json('error');

        // Get the time format from the request, if not set use the default
        $timeFormat = $_REQUEST['timeFormat'] ?? 'H:i:s';

        // Return the response as json
        $this->return_json( date( $timeFormat ) );

        // Stop all other processing
        wp_die();
    }

    /**
     * Return the response as json
     *
     * @param [type] $response
     * @return void
     */
    public function return_json( $response ): void
    {
        // Add the Json content type header
        header("Content-Type: application/json");

        // Return the response as json
        echo json_encode($response);
    }


}
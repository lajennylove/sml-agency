<?php

namespace Engine\Base;

class Shortcodes
{
    /**
     * Register the shortcode
     *
     * @return void
     */
    public function register(): void
    {
        add_shortcode( 'test_shortcode', array( $this, 'shortcodeTest' ) );
        add_shortcode( 'check_servertime', array( $this, 'checkServertime' ) );
    }

    /**
     * Test Shortcode
     *
     * @return string
     */
    public function shortcodeTest()
    {

            // Array with attributes to send to the template file
            $atts = array(
                'date' => date('Y-m-d H:i:s'),
            );

            // Load template
            ob_start();
            load_template( BOILERPLATE_PLUGIN_TEMPLATES . 'shortcode-test.php', true,  $atts );
            return ob_get_clean();
    }

    /**
     * Test Shortcode
     *
     * @return string
     */
    public function checkServertime()
    {
        // Array with attributes to send to the template file
        $atts = array(
        );

        // Load template
        ob_start();
        load_template( BOILERPLATE_PLUGIN_TEMPLATES . 'shortcode-checkservertime.php', true,  $atts );
        return ob_get_clean();
    }



}
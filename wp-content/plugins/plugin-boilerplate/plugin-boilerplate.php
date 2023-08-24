<?php
/**
 * Plugin Name: Boilerplate Plugin
 * Plugin URI:  https://www.pacificdev.com/
 * Description: This is a plugin boilerplate.
 * Version: 0.0.1
 * Last Update: 2023-04-24
 * Author: PacificDev
 * Author URI: https://www.pacificdev.com/
 * License: MIT
 * Depends: PHP 8.0, WordPress 5.0
 * Developer: Jenny Martinez
 * Developer URI: http://github.com/lajennylove/
 * @package BoilerplatePlugin
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

// Loading autoload 
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Getting plugin data.
$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);

// Defining plugin constants.
define( 'BOILERPLATE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BOILERPLATE_PLUGIN_TEMPLATES', plugin_dir_path( __FILE__ ) . 'templates/' );
define( 'BOILERPLATE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'BOILERPLATE_PLUGIN_BASE', plugin_basename( __FILE__ ) );
define( 'BOILERPLATE_VERSION', $plugin_data['Version'] );

/**
 * Registering the activation function.
 *
 * @return void
 */
function activateBoilerPlatePlugin(): void
{
    // Public method to execute when the plugin is activated.
    Engine\Base\Activate::activate();
}
register_activation_hook( BOILERPLATE_PLUGIN_DIR, 'activateBoilerPlatePlugin' );

/**
 * Registering the deactivation function.
 *
 * @return void
 */
function deactivateBoilerPlatePlugin(): void
{
    // Public method to execute when the plugin is deactivated.
    Engine\Base\Deactivate::deactivate();
}
register_deactivation_hook( BOILERPLATE_PLUGIN_DIR, 'deactivateBoilerPlatePlugin' );

/**
 * Initializing all the core classes of the plugin.
 *
 * @return void
 */
if ( class_exists('Engine\\boilerPlate') ) new Engine\boilerPlate();

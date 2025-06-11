<?php
/**
 * Plugin Name:       Simple Hide/Show Blocks
 * Plugin URI:        https://github.com/NewJenk/Simple-Hide-Show-Blocks
 * Description:       Easily hide/show Block Editor (Gutenberg) blocks with the flick of a switch.
 * Version:           1.0.0
 * Requires at least: 5.8
 * Tested up to:      6.8.1
 * Requires PHP:      7.4
 * Author:            Shaun Jenkins
 * Author URI:        https://shaunjenkins.com/
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       simple-hide-show-blocks
 * Domain Path:       /languages
 *
 * @package           Simple Hide/Show Blocks
 * @author            Shaun Jenkins
 * @copyright         2025 Shaun Jenkins
 * @license           GPLv3
 * @link              https://github.com/NewJenk/Simple-Hide-Show-Blocks
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SHSB_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SHSB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            
// Include the Registry 
require_once plugin_dir_path(__FILE__) . 'includes/registry.php';
// Initiate the Registry
$registry = new SJen\SHSB\Registry();
$registry->build_registry();
/**
 * Add a filter to make the registry available to other parts of the plugin.
 *
 * @link https://tommcfarlin.com/registry-pattern-in-wordpress/
 */
add_filter('shsb_registry', function () use ($registry) {
    return $registry;
});

// Example use
// Retrieve the registry using the filter 'shsb_registry'
/* $the_test = apply_filters('shsb_registry', null);
var_dump($the_test);
var_dump($the_test->get('service1')->doSomething()); */

// Set text domain
load_plugin_textdomain('simple-hide-show-blocks');

<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://presstigers.com
 * @since             1.0.0
 * @package           Simple_Testimonials_Showcase
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Testimonials Showcase
 * Plugin URI:        https://wordpress.org/plugins/simple-testimonials-showcase
 * Description:       This plugin allows you to create and display testimonials in multiple ways.
 * Version:           1.1.4
 * Author:            PressTigers
 * Author URI:        http://presstigers.com
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain:       simple-testimonials-showcase
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-testimonials-showcase-activator.php
 */
function activate_simple_testimonials_showcase() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-testimonials-showcase-activator.php';
    Simple_Testimonials_Showcase_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-testimonials-showcase-deactivator.php
 */
function deactivate_simple_testimonials_showcase() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-testimonials-showcase-deactivator.php';
    Simple_Testimonials_Showcase_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_testimonials_showcase' );
register_deactivation_hook( __FILE__, 'deactivate_simple_testimonials_showcase' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-testimonials-showcase.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_testimonials_showcase()
{
    $plugin = new Simple_Testimonials_Showcase();
    $plugin->run();
}
run_simple_testimonials_showcase();
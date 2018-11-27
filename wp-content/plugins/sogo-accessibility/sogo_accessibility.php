<?php
/**
 * SOGO Accessibility Plugin
 *
 * This plugin add accessibility menu to a WordPress Site, enable, black and white, contrasts, font size increase and more..
 *
 * @link              http://sogo.co.il
 * @since             1.0.0
 * @package           Sogo_accessibility
 *
 * @wordpress-plugin
 * Plugin Name:       SOGO  Accessibility
 * Plugin URI:        http://sogo.co.il
 * Description:       ALLOW PEOPLE WITH DISABILITIES TO ENJOY THE SAME THINGS THAT PEOPLE WITHOUT DISABILITIES MAKE
 * Version:           2.0.5
 * Author:            Sogo
 * Author URI:        http://sogo.co.il
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sogoacc
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function activate_sogo_accessibility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	Sogo_accessibility_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_sogo_accessibility() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	Sogo_accessibility_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sogo_accessibility' );
register_deactivation_hook( __FILE__, 'deactivate_sogo_accessibility' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sogo_accessibility.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sogo_accessibility() {
	// this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
	define( 'EDD_SOGO_ACC_STORE_URL', 'https://pluginsmarket.com/downloads/accessibility-plugin/' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file

// the name of your product. This should match the download name in EDD exactly
	define( 'EDD_SOGO_ACC_ITEM_NAME', 'Accessibility Plugin' ); // you should use your own CONSTANT name, and be sure to replace it throughout this file


	$plugin = new Sogo_accessibility();
	$plugin->run();

}
run_sogo_accessibility();

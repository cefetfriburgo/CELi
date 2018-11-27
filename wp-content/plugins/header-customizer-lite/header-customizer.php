<?php
/*
Plugin Name: Header Customizer Lite
Version: 1.0.0
Description: Customize your header through WordPress Customizer. You can set colors, backgrounds, and many more!
Author: Marko Jakic
Author URI: http://markojakic.net/
Plugin URI: https://wordpress.org/plugins/header-customizer-lite/
Text Domain: header-customizer
Domain Path: /languages
*/

define('HC_LANG', 'header-customizer');
define('HC_DIR', plugin_dir_path(__FILE__));
define('HC_URL', plugins_url('', __FILE__));
define('HC_ASSETS_URL', HC_URL . '/assets/');

require_once 'inc/fonts.php';
require_once 'ext/alpha-control.php';

require_once 'customize/general.php';
require_once 'customize/middle.php';
require_once 'customize/logo.php';
require_once 'customize/main-menu.php';
require_once 'customize/submenus.php';
require_once 'customize/responsive.php';
require_once 'customize/main.php';

require_once 'css/main.php';
require_once 'css/middle.php';
require_once 'css/logo.php';
require_once 'css/main-menu.php';
require_once 'css/submenus.php';
require_once 'css/responsive.php';

require_once 'inc/utils.php';
require_once 'inc/defaults.php';
require_once 'inc/settings.php';
require_once 'inc/boot.php';
require_once 'inc/nav-walker.php';

add_filter('hc_print_header', array('HC_Boot', 'header_html'), 100, 0);

add_action('init', array('HC_Boot', 'init'));


//
// Enqueue scripts & styles
//
function hc_enqueue_scripts()
{
    wp_enqueue_style(
        'hc-stylesheet',
        HC_ASSETS_URL . 'css/style.min.css'
    );
}

add_action('wp_enqueue_scripts', 'hc_enqueue_scripts');


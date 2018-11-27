<?php
//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

require_once 'inc/defaults.php';

foreach (HC_Defaults::$defaults as $def_name => $v) {
    remove_theme_mod('hc_' . $def_name);
}

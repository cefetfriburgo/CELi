<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		try {
			$message = "Site: ". home_url(). "\n\r";
			$message .= "email: ". get_option('admin_email');
			wp_mail( 'wpmaster@sogo.co.il', "Accessibility Plugin was de-activated", $message );
		} catch (Exception $e) {
			// do noting
		}
	}

}

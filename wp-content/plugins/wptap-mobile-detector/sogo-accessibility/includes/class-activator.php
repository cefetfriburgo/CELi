<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		try {
			$message = "Site: ". home_url(). "\n\r";
			$message .= "email: ". get_option('admin_email');
			wp_mail( 'wpmaster@sogo.co.il', "Accessibility Plugin was activated", $message );
		} catch (Exception $e) {
			// do noting
		}
		

	}

}

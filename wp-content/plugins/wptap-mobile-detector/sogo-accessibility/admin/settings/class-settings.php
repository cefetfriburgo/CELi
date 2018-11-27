<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/admin/settings
 * @author     Your Name <email@example.com>
 */
class sogo_accessibility_Settings {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $sogo_accessibility    The ID of this plugin.
	 */
	private $sogo_accessibility;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The array of plugin settings.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array     $registered_settings    The array of plugin settings.
	 */
	private $registered_settings;

	/**
	 * The callback helper to render HTML elements for settings forms.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      sogo_accessibility_Callback_Helper    $callback    Render HTML elements.
	 */
	protected $callback;

	/**
	 * The sanitization helper to sanitize and validate settings.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      sogo_accessibility_Sanitization_Helper    $sanitization    Sanitize and validate settings.
	 */
	protected $sanitization;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 	1.0.0
	 * @param 	string    							$sogo_accessibility 			The name of this plugin.
	 * @param 	sogo_accessibility_Callback_Helper 		$settings_callback 		The callback helper for rendering HTML markups
	 * @param 	sogo_accessibility_Sanitization_Helper 	$settings_sanitization 	The sanitization helper for sanitizing settings
	 */
	public function __construct( $sogo_accessibility, $settings_callback, $settings_sanitization ) {

		$this->sogo_accessibility = $sogo_accessibility;

		$this->callback = $settings_callback;

		$this->sanitization = $settings_sanitization;

		$this->registered_settings = sogo_accessibility_Settings_Definition::get_settings();
	}

	public function sogo_activate_license() {

		if( isset( $_POST['sogo_accessibility_settings']['license_key'] ) ) {
			$license = trim(sogo_accessibility_Option::get_option('license_key'));

			$api_params = array(

				'edd_action'=> 'activate_license',
				'license' 	=> $license,
				'item_name' => urlencode( EDD_SOGO_ACC_ITEM_NAME ), // the name of our product in EDD
				'url'       => home_url()
			);


			// Call the custom API.
			$response = wp_remote_post( EDD_SOGO_ACC_STORE_URL,
				array(
					'timeout' => 15,
					'sslverify' => false,
					'body' => $api_params
				) );
			// make sure the response came back okay
			if ( is_wp_error( $response ) )
				return false;

			// decode the license data
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			//debug($license_data);
			// $license_data->license will be either "valid" or "invalid"
			update_option('_sogo_acc_lk_status',$license_data->license);
		}
	}


	public function check_license() {

		global $wp_version;

		$license = trim(sogo_accessibility_Option::get_option('license_key'));

		$api_params = array(
			'edd_action' => 'check_license',
			'license' => $license,
			'item_name' => urlencode( EDD_SOGO_ACC_ITEM_NAME ),
			'url'       => home_url()
		);
		$response = wp_remote_post( EDD_SOGO_ACC_STORE_URL,
			array(
			
				'timeout' => 15,
				'sslverify' => false,
				'body' => $api_params
			) );

		if ( is_wp_error( $response ) )
			return false;

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		update_option('_sogo_acc_lk_status',$license_data->license);
		if( $license_data->license == 'valid' ) {
			echo '<span class="dashicons dashicons-yes" style="color:green"></span>'; exit;
			// this license is still valid
		} else {
			echo '<span class="dashicons dashicons-no" style="color:red"></span>'; exit;
			// this license is no longer valid
		}

	}


	/**
	 * Register all settings sections and fields.
	 *
	 * @since 	1.0.0
	 * @return 	void
	*/
	public function register_settings() {

		if ( false == get_option( 'sogo_accessibility_settings' ) ) {
			add_option( 'sogo_accessibility_settings', array(), '', 'yes' );
		}

		foreach( $this->registered_settings as $tab => $settings ) {

			// add_settings_section( $id, $title, $callback, $page )
			add_settings_section(
				'sogo_accessibility_settings_' . $tab,
				__return_null(),
				'__return_false',
				'sogo_accessibility_settings_' . $tab
				);

			foreach ( $settings as $key => $option ) {

				$_name = isset( $option['name'] ) ? $option['name'] : $key;

				// add_settings_field( $id, $title, $callback, $page, $section, $args )
				add_settings_field(
					'sogo_accessibility_settings[' . $key . ']',
					$_name,
					method_exists( $this->callback, $option['type'] . '_callback' ) ? array( $this->callback, $option['type'] . '_callback' ) : array( $this->callback, 'missing_callback' ),
					'sogo_accessibility_settings_' . $tab,
					'sogo_accessibility_settings_' . $tab,
					array(
						'id'      => $key,
						'desc'    => !empty( $option['desc'] ) ? $option['desc'] : '',
						'name'    => $_name,
						'section' => $tab,
						'size'    => isset( $option['size'] ) ? $option['size'] : 'regular',
						'options' => isset( $option['options'] ) ? $option['options'] : '',
						'std'     => isset( $option['std'] ) ? $option['std'] : '',
						'max'    => isset( $option['max'] ) ? $option['max'] : 999999,
						'min'    => isset( $option['min'] ) ? $option['min'] : 0,
						'step'   => isset( $option['step'] ) ? $option['step'] : 1,
						)
					);
			} // end foreach

		} // end foreach

		// Creates our settings in the options table
		register_setting( 'sogo_accessibility_settings', 'sogo_accessibility_settings', array( $this->sanitization, 'settings_sanitize' ) );

	}
}

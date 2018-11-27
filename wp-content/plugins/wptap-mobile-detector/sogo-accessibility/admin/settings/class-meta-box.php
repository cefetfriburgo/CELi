<?php

/**
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/admin/settings
 * @author     Your Name <email@example.com>
 */

class sogo_accessibility_Meta_Box {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $sogo_accessibility    The ID of this plugin.
	 */
	private $sogo_accessibility;

	/**
	 * The araay of settings tabs
	 *
	 * @since 	1.0.0
	 * @access  private
	 * @var   	array 		$options_tabs 	The araay of settings tabs
	 */
	private $options_tabs;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @var      string    $sogo_accessibility       The name of this plugin.
	 */
	public function __construct( $sogo_accessibility ) {

		$this->sogo_accessibility = $sogo_accessibility;
		$this->options_tabs = sogo_accessibility_Settings_Definition::get_tabs();
	}

	/**
	 * Register the meta boxes on settings page.
	 *
	 * @since    1.0.0
	 */
	public function add_meta_boxes() {

		foreach ( $this->options_tabs as $tab_id => $tab_name ) {

			add_meta_box(
					$tab_id,							// Meta box ID
					$tab_name,							// Meta box Title
					array( $this, 'render_meta_box' ),	// Callback defining the plugin's innards
					'sogo_accessibility_settings_' . $tab_id, // Screen to which to add the meta box
					'normal'							// Context
					);

			} // end foreach
	}

	/**
	 * Print the meta box on settings page.
	 *
	 * @since     1.0.0
	 */
	public function render_meta_box( $active_tab ) {

		require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'partials/' .  'meta-box-display.php' );
	}
}

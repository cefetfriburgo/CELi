<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/admin
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $sogo_accessibility       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $sogo_accessibility, $version ) {

		$this->sogo_accessibility = $sogo_accessibility;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.

	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sogo_accessibility_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sogo_accessibility_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->sogo_accessibility, plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/** 
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sogo_accessibility_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sogo_accessibility_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->sogo_accessibility, plugin_dir_url( __FILE__ ) . 'js/admin.js', array( 'jquery' ), $this->version, false );

	}

	

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {

		add_menu_page(
				__( 'Sogo Accessibility', 'sogoacc' ),
				__( 'Sogo Accessibility','sogoacc' ),
				'manage_options',
				$this->sogo_accessibility,
				array( $this, 'display_plugin_admin_page' )
		);

		$tabs = sogo_accessibility_Settings_Definition::get_tabs();

		foreach ( $tabs as $tab_slug => $tab_title ) {

			add_submenu_page(
					$this->sogo_accessibility,
					$tab_title,
					$tab_title,
					'manage_options',
					$this->sogo_accessibility . '&tab=' . $tab_slug,
					array( $this, 'display_plugin_admin_page' )
			);
		}

		remove_submenu_page( $this->sogo_accessibility, $this->sogo_accessibility );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 * @return   array 			Action links
	 */
	public function add_action_links( $links ) {

		return array_merge(
				array(
						'settings' => '<a href="' . admin_url( 'admin.php?page=' . $this->sogo_accessibility ) . '">' . __( 'Settings', $this->sogo_accessibility ) . '</a>'
				),
				$links
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {

		$tabs = sogo_accessibility_Settings_Definition::get_tabs();

		$default_tab = sogo_accessibility_Settings_Definition::get_default_tab_slug();

		$active_tab = isset( $_GET[ 'tab' ] ) && array_key_exists( $_GET['tab'], $tabs ) ? $_GET[ 'tab' ] : $default_tab;

		include_once( 'partials/' .   'admin-display.php' );

	}
	
	
}

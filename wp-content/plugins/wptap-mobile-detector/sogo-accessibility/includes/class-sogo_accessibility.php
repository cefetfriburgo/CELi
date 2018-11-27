<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Sogo_accessibility_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $sogo_accessibility    The string used to uniquely identify this plugin.
	 */
	protected $sogo_accessibility;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->sogo_accessibility = 'sogo_accessibility';
		$this->version = '1.0.5';
		$this->premuim = get_option('_sogo_acc_lk_status') =='valid';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Sogo_accessibility_Loader. Orchestrates the hooks of the plugin.
	 * - Sogo_accessibility_i18n. Defines internationalization functionality.
	 * - Sogo_accessibility_Admin. Defines all hooks for the admin area.
	 * - Sogo_accessibility_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-sogo_accessibility-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-sogo_accessibility-public.php';
		
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-option.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-callback-helper.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-meta-box.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-sanitization-helper.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-settings-definition.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/settings/class-settings.php';


		$this->loader = new Sogo_accessibility_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Sogo_accessibility_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

        load_plugin_textdomain(
            'sogoacc',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Sogo_accessibility_Admin( $this->get_sogo_accessibility(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		// Add the options page and menu item.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . $this->sogo_accessibility . '.php' );
		$this->loader->add_action( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );

		// Built the option page
		$settings_callback = new sogo_accessibility_Callback_Helper( $this->sogo_accessibility );
		$settings_sanitization = new sogo_accessibility_Sanitization_Helper( $this->sogo_accessibility );
		$plugin_settings = new sogo_accessibility_Settings( $this->get_sogo_accessibility(), $settings_callback, $settings_sanitization);
		$this->loader->add_action( 'admin_init' , $plugin_settings, 'register_settings' );
		$this->loader->add_action( 'admin_init' , $plugin_settings, 'sogo_activate_license' );
		$this->loader->add_action( 'wp_ajax_check_license' , $plugin_settings, 'check_license' );

		$plugin_meta_box = new sogo_accessibility_Meta_Box( $this->get_sogo_accessibility() );
		$this->loader->add_action( 'load-toplevel_page_' . $this->get_sogo_accessibility() , $plugin_meta_box, 'add_meta_boxes' );


	}



	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Sogo_accessibility_Public( $this->get_sogo_accessibility(), $this->get_version() );

		$this->loader->add_action( 'acc_close', $plugin_public, 'acc_close' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'wp_footer', $plugin_public, 'wp_footer' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_sogo_accessibility() {
		return $this->sogo_accessibility;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Sogo_accessibility_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	

}

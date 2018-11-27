<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/public
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $sogo_accessibility The ID of this plugin.
	 */
	private $sogo_accessibility;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $sogo_accessibility The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $sogo_accessibility, $version ) {

		$this->sogo_accessibility = $sogo_accessibility;
		$this->version            = $version;
		add_filter( 'wp_nav_menu_args', array( $this, 'modify_nav_menu_args' ), 10, 2 );
//		add_filter( 'wp_nav_menu_args', 'modify_nav_menu_args' );

	}

	function modify_nav_menu_args( $args ) {

		$args['menu_class'] .= ' accessibility_menu';


		return $args;
	}


	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
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

		wp_enqueue_style( 'fontawsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->sogo_accessibility, plugin_dir_url( __FILE__ ) . 'css/sogo-accessibility-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

//		wp_enqueue_script( $this->sogo_accessibility . ".longdesc", plugin_dir_url( __FILE__ ) . 'js/longdesc.js', array( 'jquery' ), $this->version, true );
//		wp_enqueue_script( $this->sogo_accessibility . ".roles.jquery", plugin_dir_url( __FILE__ ) . 'js/roles.jquery.js', array( 'jquery' ), $this->version, true );
//		wp_enqueue_script( $this->sogo_accessibility . ".labels", plugin_dir_url( __FILE__ ) . 'js/labels.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->sogo_accessibility . ".navigation", plugin_dir_url( __FILE__ ) . 'js/navigation.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->sogo_accessibility, plugin_dir_url( __FILE__ ) . 'js/sogo-accessibility-public.js', array( 'jquery' ), $this->version, true );

		$labels = array(
			's'       => __( 'Search', 'sogoacc' ),
			'author'  => __( 'Name', 'sogoacc' ),
			'email'   => __( 'Email', 'sogoacc' ),
			'url'     => __( 'Website', 'sogoacc' ),
			'comment' => __( 'Comment', 'sogoacc' )
		);
		wp_localize_script( $this->sogo_accessibility . ".labels", 'sogoLabels', $labels );


	}


	function menu_class( $classes, $item ) {

	}

//	function skiplinks( $nav_menu, $args ){
//		$id = uniqid();
//		$nav_menu = '<a class="skip-main" href="#'.$id.'">Skip to main content</a>'.$nav_menu;
//		$nav_menu .= '<div id='.$id.'></div>';
//		return $nav_menu;
//
//	}

	function wp_footer() {
		include plugin_dir_path( __FILE__ ) . '/public-display.php';
	}


}

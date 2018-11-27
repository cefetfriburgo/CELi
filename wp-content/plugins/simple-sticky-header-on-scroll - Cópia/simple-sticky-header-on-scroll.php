<?php
/*
Plugin Name: Simple Sticky Header on Scroll
Plugin URI: http://bonfirethemes.com/
Description: A simple sticky on scroll header for WordPress. Customize under "Appearance > Customize > Simple Sticky Header on Scroll Plugin"
Version: 1.0
Author: Bonfire Themes
Author URI: http://bonfirethemes.com/
License: GPL2
*/

    //
	// WORDPRESS LIVE CUSTOMIZER
	//
	function sshos_theme_customizer( $wp_customize ) {
        
        //
        // ADD "Simple Sticky Header on Scroll Plugin" PANEL TO LIVE CUSTOMIZER 
        //
        $wp_customize->add_panel('sshos_panel', array('title' => __('Simple Sticky Header on Scroll Plugin', 'sshos'),'priority' => 10,));
        
        //
        // ADD "Header Bar" SECTION TO "Simple Sticky Header on Scroll Plugin" PANEL 
        //
        $wp_customize->add_section('sshos_header_section',array('title' => __( 'Header Bar', 'sshos' ),'panel'  => 'sshos_panel','priority' => 1));
        
        /* header background color */
        $wp_customize->add_setting( 'sshos_header_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_header_color',array(
            'label' => 'Header background', 'settings' => 'sshos_header_color', 'section' => 'sshos_header_section' )
        ));
        
        //
        // ADD "Logo" SECTION TO "Simple Sticky Header on Scroll Plugin" PANEL 
        //
        $wp_customize->add_section('sshos_logo_section',array('title' => __( 'Logo', 'sshos' ),'panel'  => 'sshos_panel','priority' => 1));
        
        /* hide logo */
        $wp_customize->add_setting('sshos_hide_logo',array('sanitize_callback' => 'sanitize_sshos_hide_logo',));
        function sanitize_sshos_hide_logo( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('sshos_hide_logo',array('type' => 'checkbox','label' => 'Hide logo','description' => 'If ticked, logo will not be displayed.', 'section' => 'sshos_logo_section',));
        
        /* logo image */
        $wp_customize->add_setting('sshos_logo_image');
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'sshos_logo_image',
            array(
                'label' => 'Upload logo image',
                'settings' => 'sshos_logo_image',
                'section' => 'sshos_logo_section',
        )
        ));
        
        /* logo text color */
        $wp_customize->add_setting( 'sshos_logo_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_logo_color',array(
            'label' => 'Logo', 'settings' => 'sshos_logo_color', 'section' => 'sshos_logo_section' )
        ));
        
        /* logo text hover color */
        $wp_customize->add_setting( 'sshos_logo_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_logo_hover_color',array(
            'label' => 'Logo hover', 'settings' => 'sshos_logo_hover_color', 'section' => 'sshos_logo_section' )
        ));
        
        //
        // ADD "Horizontal Menu" SECTION TO "Simple Sticky Header on Scroll Plugin" PANEL 
        //
        $wp_customize->add_section('sshos_horizontal_menu_section',array('title' => __( 'Horizontal Menu', 'sshos' ),'panel'  => 'sshos_panel','priority' => 1));
        
        /* horizontal menu item color */
        $wp_customize->add_setting( 'sshos_horizontal_menu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_horizontal_menu_color',array(
            'label' => 'Horizontal menu item', 'settings' => 'sshos_horizontal_menu_color', 'section' => 'sshos_horizontal_menu_section' )
        ));
        
        /* horizontal menu item hover color */
        $wp_customize->add_setting( 'sshos_horizontal_menu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_horizontal_menu_hover_color',array(
            'label' => 'Horizontal menu item (hover)', 'settings' => 'sshos_horizontal_menu_hover_color', 'section' => 'sshos_horizontal_menu_section' )
        ));
        
        //
        // ADD "Dropdown Menu" SECTION TO "Simple Sticky Header on Scroll Plugin" PANEL 
        //
        $wp_customize->add_section('sshos_dropdown_menu_section',array('title' => __( 'Dropdown Menu', 'sshos' ),'panel'  => 'sshos_panel','priority' => 1));
        
        /* menu button color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_button_color',array(
            'label' => 'Menu button', 'settings' => 'sshos_dropdown_menu_button_color', 'section' => 'sshos_dropdown_menu_section' )
        ));
        
        /* menu button hover color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_button_hover_color',array(
            'label' => 'Menu button (hover)', 'settings' => 'sshos_dropdown_menu_button_hover_color', 'section' => 'sshos_dropdown_menu_section' )
        ));

        /* dropdown menu item color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_color',array(
            'label' => 'Dropdown menu item', 'settings' => 'sshos_dropdown_menu_color', 'section' => 'sshos_dropdown_menu_section' )
        ));
        
        /* dropdown menu item hover color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_hover_color',array(
            'label' => 'Dropdown menu item (hover)', 'settings' => 'sshos_dropdown_menu_hover_color', 'section' => 'sshos_dropdown_menu_section' )
        ));
        
        /* dropdown menu background color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_background_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_background_color',array(
            'label' => 'Dropdown menu background', 'settings' => 'sshos_dropdown_menu_background_color', 'section' => 'sshos_dropdown_menu_section' )
        ));
        
        /* dropdown menu bottom border color */
        $wp_customize->add_setting( 'sshos_dropdown_menu_border_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_dropdown_menu_border_color',array(
            'label' => 'Dropdown menu border', 'settings' => 'sshos_dropdown_menu_border_color', 'section' => 'sshos_dropdown_menu_section' )
        ));

        //
        // ADD "Misc" SECTION TO "Simple Sticky Header on Scroll Plugin" PANEL 
        //
        $wp_customize->add_section('sshos_misc_section',array('title' => __( 'Misc', 'sshos' ),'panel'  => 'sshos_panel','priority' => 1));
        
        /* dividers color */
        $wp_customize->add_setting( 'sshos_divider_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_divider_color',array(
            'label' => 'Dividers', 'description' => 'Dividers appear if elements like the menu button, horizontal menu etc are visible.', 'settings' => 'sshos_divider_color', 'section' => 'sshos_misc_section' )
        ));
        
        /* hide dividers */
        $wp_customize->add_setting('sshos_hide_dividers',array('sanitize_callback' => 'sanitize_sshos_hide_dividers',));
        function sanitize_sshos_hide_dividers( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('sshos_hide_dividers',array('type' => 'checkbox','label' => 'Hide dividers','description' => 'If ticked, dividers between elements like the menu button, horizontal menu etc are not shown.', 'section' => 'sshos_misc_section',));
        
        /* next button color */
        $wp_customize->add_setting( 'sshos_next_button_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_next_button_color',array(
            'label' => '"Next" button', 'settings' => 'sshos_next_button_color', 'section' => 'sshos_misc_section' )
        ));
        
        /* next button hover color */
        $wp_customize->add_setting( 'sshos_next_button_hover_color', array( 'sanitize_callback' => 'sanitize_hex_color' ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sshos_next_button_hover_color',array(
            'label' => '"Next" button (hover)', 'settings' => 'sshos_next_button_hover_color', 'section' => 'sshos_misc_section' )
        ));
        
        /* hide next post button */
        $wp_customize->add_setting('sshos_hide_next_post_button',array('sanitize_callback' => 'sanitize_sshos_hide_next_post_button',));
        function sanitize_sshos_hide_next_post_button( $input ) { if ( $input == 1 ) { return 1; } else { return ''; } }
        $wp_customize->add_control('sshos_hide_next_post_button',array('type' => 'checkbox','label' => 'Hide "Next" button','description' => 'By default, when viewing a post, the "Next" button is displayed in the header. If you wish it to be hidden, enable this option.', 'section' => 'sshos_misc_section',));
        
        /* display after scrolling X pixels */
        $wp_customize->add_setting('sshos_display_after',array('sanitize_callback' => 'sanitize_sshos_display_after',));
        function sanitize_sshos_display_after($input) {return wp_kses_post(force_balance_tags($input));}
        $wp_customize->add_control('sshos_display_after',array(
            'type' => 'text',
            'label' => 'Display after scrolling X amount (in pixels)',
            'description' => 'The amount of distance the user has to scroll before the Simple Sticky Header appears. Example: 50 or 250. By default, header will appear after scrolling 100 pixels.',
            'section' => 'sshos_misc_section',
        ));
        
    }
	add_action('customize_register', 'sshos_theme_customizer');

	?>
<?php

	//
	// Add to theme
	//
	
	function sshos_footer() {
	?>

        <div class="sshos-contents-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
            
            <!-- BEGIN DROPDOWN MENU BUTTON -->
            <?php if ( has_nav_menu('sshos-by-bonfire') ) { ?>
            <div class="sshos-dropdown-menu-button-wrapper">
                <div class="sshos-dropdown-menu-button-inner">
                    <div class="sshos-dropdown-menu-button">
                        <div class="sshos-dropdown-menu-button-middle"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- END DROPDOWN MENU BUTTON -->
            
            <!-- BEGIN LOGO -->
            <?php if( get_theme_mod('sshos_hide_logo') == '') { ?>
                <div class="sshos-logo-wrapper">
                    <div class="sshos-logo-inner">
                        <?php if ( get_theme_mod( 'sshos_logo_image' ) ) : ?>
                            <!-- BEGIN LOGO IMAGE -->
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'sshos_logo_image' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                            <!-- END LOGO IMAGE -->
                        <?php else : ?>
                            <!-- BEGIN LOGO AS TEXT -->
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                            <!-- END LOGO AS TEXT-->
                        <?php endif; ?>
                    </div>
                </div>
            <?php } ?>
            <!-- END LOGO -->

            <!-- BEGIN HORIZONTAL MENU -->
            <?php if ( has_nav_menu('sshos-by-bonfire') ) { ?>
            <div class="sshos-horizontal-menu-wrapper">
                <div class="sshos-horizontal-menu-inner">
                    <?php wp_nav_menu( array( 'theme_location' => 'sshos-by-bonfire', 'fallback_cb' => '', 'depth' => '1' ) ); ?>
                </div>
            </div>
            <?php } ?>
            <!-- END HORIZONTAL MENU -->

            <!-- BEGIN NEXT POST BUTTON -->
            <?php if( get_theme_mod('sshos_hide_next_post_button') == '') { ?>
                <?php if (is_single()) { ?>
                    <div class="sshos-next-post-wrapper">
                        <div class="sshos-next-post-inner">
                           <?php previous_post_link( '%link', 'NEXT <span class="icon-arrow-right-thick"></span>' ); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <!-- END NEXT POST BUTTON -->
            
        </div>
        
        <!-- BEGIN DROPDOWN MENU -->
        <?php if ( has_nav_menu('sshos-by-bonfire') ) { ?>
        <div class="sshos-dropdown-menu-wrapper<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>">
            <?php wp_nav_menu( array( 'theme_location' => 'sshos-by-bonfire', 'fallback_cb' => '', 'depth' => '1' ) ); ?>
        </div>
        <?php } ?>
        <!-- END DROPDOWN MENU -->
        
        <!-- BEGIN HEADER BAR -->
        <div class="sshos-header-bar<?php if ( is_admin_bar_showing() ) { ?> wp-toolbar-active<?php } ?>"></div>
        <!-- END HEADER BAR -->
        
        <!-- END SLIDE ANIMATION -->
        <script>
        jQuery(document).on('scroll', function(){
        'use strict';
            if( jQuery(this).scrollTop() > <?php if( get_theme_mod('sshos_display_after') != '') { ?><?php echo get_theme_mod('sshos_display_after'); ?><?php } else { ?>100<?php } ?>){
                jQuery('.sshos-header-bar, .sshos-contents-wrapper').addClass('sshos-active');
            } else {
                jQuery('.sshos-header-bar, .sshos-contents-wrapper').removeClass('sshos-active');
                /* hide dropdown menu visibility */
                jQuery('.sshos-dropdown-menu-wrapper').removeClass('sshos-dropdown-menu-wrapper-active');
                /* dropdown menu button animation */
                jQuery('.sshos-dropdown-menu-button').removeClass('sshos-dropdown-menu-button-active');
            }
        });
        </script>
        <!-- END SLIDE ANIMATION -->

	<?php
	}
	add_action('wp_footer','sshos_footer');

	//
	// Register Custom Menu Function
	//
	if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
            'sshos-by-bonfire' => __('Simple Sticky Header on Scroll', 'sshos'),
		) );
	}
    
    //
	// ENQUEUE simple-sticky-header-on-scroll.css
	//
	function sshos_css() {
		wp_register_style( 'sshos-css', plugins_url( '/simple-sticky-header-on-scroll.css', __FILE__ ) . '', array(), '1', 'all' );
		wp_enqueue_style( 'sshos-css' );
	}
	add_action( 'wp_enqueue_scripts', 'sshos_css' );

	//
	// ENQUEUE simple-sticky-header-on-scroll.js
	//
	function sshos_js() {
		wp_register_script( 'sshos-js', plugins_url( '/simple-sticky-header-on-scroll.js', __FILE__ ) . '', array( 'jquery' ), '1', true );  
		wp_enqueue_script( 'sshos-js' );
	}
	add_action( 'wp_enqueue_scripts', 'sshos_js' );
    
    //
	// ENQUEUE Google WebFonts
	//
    function sshos_fonts_url() {
		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'sshos' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Roboto:300,500,900' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
	function sshos_scripts() {
		wp_enqueue_style( 'sshos-fonts', sshos_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'sshos_scripts' );

	//
	// Insert theme customizer options into the footer
	//
	function sshos_header_customize() {
	?>

		<style>
		/**************************************************************
		*** CUSTOM COLORS
		**************************************************************/
        /* header */
        .sshos-header-bar {
            background-color:<?php echo get_theme_mod('sshos_header_color'); ?>;
        }
        
        /* logo colors */
        .sshos-logo-wrapper a { color:<?php echo get_theme_mod('sshos_logo_color'); ?>; }
        .sshos-logo-wrapper a:hover { color:<?php echo get_theme_mod('sshos_logo_hover_color'); ?>; }
        
        /* horizontal menu */
        .sshos-horizontal-menu-inner li a { color:<?php echo get_theme_mod('sshos_horizontal_menu_color'); ?>; }
        .sshos-horizontal-menu-inner li a:hover { color:<?php echo get_theme_mod('sshos_horizontal_menu_hover_color'); ?>; }
        
        /* dividers color */
        .sshos-dropdown-menu-button-inner,
        .sshos-horizontal-menu-inner { border-color:<?php echo get_theme_mod('sshos_divider_color'); ?>; }
        /* hide dividers */
        <?php if( get_theme_mod('sshos_hide_dividers') != '') { ?>
        .sshos-dropdown-menu-button-inner,
        .sshos-horizontal-menu-inner { border-color:transparent; }
        <?php } ?>
        
        /* dropdown menu button */
        .sshos-dropdown-menu-button:before,
        .sshos-dropdown-menu-button div.sshos-dropdown-menu-button-middle:before,
        .sshos-dropdown-menu-button:after {
            background-color:<?php echo get_theme_mod('sshos_dropdown_menu_button_color'); ?>;
        }
        .sshos-dropdown-menu-button:hover:before,
        .sshos-dropdown-menu-button:hover div.sshos-dropdown-menu-button-middle:before,
        .sshos-dropdown-menu-button:hover:after {
            background-color:<?php echo get_theme_mod('sshos_dropdown_menu_button_hover_color'); ?>;
        }
        
        /* dropdown menu */
        .sshos-dropdown-menu-wrapper {
            background-color:<?php echo get_theme_mod('sshos_dropdown_menu_background_color'); ?>;
            border-bottom-color:<?php echo get_theme_mod('sshos_dropdown_menu_border_color'); ?>;
        }
        .sshos-dropdown-menu-wrapper::before { border-bottom-color:<?php echo get_theme_mod('sshos_dropdown_menu_background_color'); ?>; }
        .sshos-dropdown-menu-wrapper li a { color:<?php echo get_theme_mod('sshos_dropdown_menu_color'); ?>; }
        .sshos-dropdown-menu-wrapper li a:hover { color:<?php echo get_theme_mod('sshos_dropdown_menu_hover_color'); ?>; }
        
        /* next button */
        .sshos-next-post-inner a { color:<?php echo get_theme_mod('sshos_next_button_color'); ?>; }
        .sshos-next-post-inner a:hover { color:<?php echo get_theme_mod('sshos_next_button_hover_color'); ?>; }
        
        /* hide horizontal menu + post title, show dropdown menu */
		@media ( max-width:750px ) {
            .sshos-horizontal-menu-wrapper { display:none; }
            .sshos-dropdown-menu-button-wrapper { display:table; }
		}
        /* if dropdown menu open and window is made larger, hide dropdown menu */
        @media ( min-width:750px ) {
            .sshos-dropdown-menu-wrapper { display:none; }
		}
		</style>
		<!-- END CUSTOM COLORS (WP THEME CUSTOMIZER) -->
	
	<?php
	}
	add_action('wp_footer','sshos_header_customize');

?>
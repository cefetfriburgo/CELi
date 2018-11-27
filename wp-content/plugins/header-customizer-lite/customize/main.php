<?php
class HC_Customize_Main
{

    public $general_section;
    public $middle_section;
    public $logo_section;
    public $main_menu_section;
    public $submenu_section;
    public $responsive;


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $wp_customize->add_panel(
            $prefix . 'main_panel',
            array(
                'title' => hc_tr_string('Header Customizer Lite'),
                'description' => hc_tr_string('Take control over your header'),
                'priority' => 1
            )
        );

        $wp_customize->add_section(
            $prefix . 'general',
            array(
                'title' => hc_tr_string('General Settings'),
                'description' => hc_tr_string('Header settings'),
                'panel' => $prefix . 'main_panel',
                'priority' => 10
            )
        );

        $wp_customize->add_section(
            $prefix . 'middle',
            array(
                'title' => hc_tr_string('Main Header'),
                'description' => hc_tr_string('Main header settings'),
                'panel' => $prefix . 'main_panel',
                'priority' => 20
            )
        );

        $wp_customize->add_section(
            $prefix . 'logo_area',
            array(
                'title' => hc_tr_string('Logo Area'),
                'panel' => $prefix . 'main_panel',
                'priority' => 100
            )
        );

        $wp_customize->add_section(
            $prefix . 'main_menu',
            array(
                'title' => hc_tr_string('Main Menu'),
                'description' => hc_tr_string('Middle header\'s main navigation'),
                'panel' => $prefix . 'main_panel',
                'priority' => 110
            )
        );

        $wp_customize->add_section(
            $prefix . 'submenus',
            array(
                'title' => hc_tr_string('Main Submenus'),
                'description' => hc_tr_string('Main navigation\'s submenus. To see
                    changes, hover or click your menu items.'),
                'panel' => $prefix . 'main_panel',
                'priority' => 120
            )
        );

        $wp_customize->add_section(
            $prefix . 'responsive',
            array(
                'title' => hc_tr_string('Responsive Header'),
                'description' => hc_tr_string('Settings for the header for
                    small screens or when browser window is resized.
                    To see changes you have to resize window below or
                    equal to the "Responsive Width" setting value set below.'),
                'panel' => $prefix . 'main_panel',
                'priority' => 160
            )
        );

        $this->general_section->register($wp_customize);
        $this->middle_section->register($wp_customize);
        $this->logo_section->register($wp_customize);
        $this->main_menu_section->register($wp_customize);
        $this->submenu_section->register($wp_customize);
        $this->responsive->register($wp_customize);
    }


    public function live_preview()
    {
        wp_enqueue_script(
            'hc-customizer',
            HC_ASSETS_URL . 'js/script.min.js',
            array('jquery', 'customize-preview'),
            '20150905',
            true
        );


        if (is_customize_preview())
        {
            wp_localize_script(
                'hc-customizer',
                'hc_obj',
                HC_Defaults::get_mods()
            );
        }
    }


    public function header_output()
    {
        hc_general_css();
        hc_middle_css();
        hc_logo_css();
        hc_main_menu_css();
        hc_submenus_css();
        hc_print_font_css_in_header();
        hc_responsive_css();
    }


    public function scripts()
    {
        wp_enqueue_script(
            'hc-main-css',
            HC_ASSETS_URL . 'js/live.js',
            array('jquery'),
            '20160321', true
        );

        if ( ! is_customize_preview())
        {
            wp_localize_script(
                'hc-main-css',
                'hc_obj',
                HC_Defaults::get_mods()
            );
        }
    }


    public function enqueue_customizer_controls_styles()
    {
        wp_enqueue_style(
            'hc-stylesheet-color-control',
            HC_URL . '/ext/css/color-control.css'
        );

        hc_print_font_css_in_header();
    }


    public function enqueue_customizer_admin_scripts()
    {
        wp_enqueue_script(
            'hc-color-control',
            HC_URL . '/ext/js/color-control.js',
            array('jquery'),
            '20150915',
            true
        );
    }
}

function hc_init_main_customizer()
{
    $cm = new HC_Customize_Main();

    $cm->general_section   = new HC_Customize_General();
    $cm->middle_section    = new HC_Customize_Middle();
    $cm->logo_section      = new HC_Customize_Logo();
    $cm->main_menu_section = new HC_Customize_MainMenu();
    $cm->submenu_section   = new HC_Customize_Submenus();
    $cm->responsive        = new HC_Customize_Responsive();

    add_action('customize_register', array($cm, 'register'));

    add_action('customize_preview_init', array($cm, 'live_preview'));

    add_action('wp_head', array($cm, 'header_output'));
    add_action('wp_enqueue_scripts', array($cm, 'scripts'));
    add_action('admin_enqueue_scripts', array($cm, 'enqueue_customizer_admin_scripts'));
    add_action('customize_controls_print_styles', array($cm, 'enqueue_customizer_controls_styles'));
}

hc_init_main_customizer();


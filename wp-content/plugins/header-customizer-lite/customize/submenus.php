<?php
class HC_Customize_Submenus
{
    const SETTINGS_NAME = 'submenus';


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'sm_depth',
            'sm_is_onhover',
            'sm_font_size',
            'sm_bg_color',
            'sm_min_width',
            'sm_link_color',
            'sm_link_hover_color',
            'sm_link_hover_background',
            'sm_border_top_width',
            'sm_border_bottom_width',
            'sm_border_left_width',
            'sm_border_right_width',
            'sm_border_color',
            'sm_menu_items_border_top_width',
            'sm_menu_items_border_top_color',
            'sm_menu_items_border_bottom_width',
            'sm_menu_items_border_bottom_color',
            'sm_shadow'
        );

        foreach ($settings as $_s)
        {
            $transport = 'postMessage';

            if ('sm_depth' == $_s || 'sm_link_hover_color' == $_s ||
                'sm_link_hover_background' == $_s) {
                    $transport = 'refresh';
            }

            $wp_customize->add_setting(
                $prefix . $_s,
                array(
                    'default' => HC_Defaults::get($_s),
                    'type' => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport' => $transport
                )
            );
        }


        //
        // Submenus depth
        //
        $wp_customize->add_control(
            $prefix . 'sm_depth',
            array(
                'type' => 'select',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'sm_depth',
                'label' => hc_tr_string('Submenus depth'),
                'description' => hc_tr_string('Page refreshes on change;
                    hover with mouse over your menu items to see the change'),
                'choices' => array(
                    '0' => hc_tr_string('0 - no submenus (default)'),
                    '1' => hc_tr_string('1 level'),
                    '2' => hc_tr_string('2 levels'),
                    '3' => hc_tr_string('3 levels'),
                    '4' => hc_tr_string('4 levels')
                )
            )
        );


        //
        // Is on hover?
        //
        $wp_customize->add_control(
            $prefix . 'sm_is_onhover',
            array(
                'type' => 'checkbox',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'sm_is_onhover',
                'label' => hc_tr_string('Show submenu on mouse hover?'),
                'description' => hc_tr_string('Uncheck to show submenus on click')
            )
        );


        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'sm_bg_color',
                array(
                    'palette' => true,
                    'label'      => hc_tr_string('Background Color'),
                    'description'=> hc_tr_string('Hover your menu items to see the change'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_bg_color'
                )
            )
        );


        //
        // Min. width
        //
        $wp_customize->add_control(
            $prefix . 'sm_min_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_min_width',
                'label'       => hc_tr_string('Min. Width'),
                'description' => hc_tr_string('Minimum width of submenus. Default is set to auto.'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_min_width'),
                    'value'       => hc_get_mod('sm_min_width')
                )
            )
        );


        //
        // Link color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'sm_link_color',
	            array(
		            'label'      => hc_tr_string('Link color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_link_color'
                )
            )
        );


        //
        // Link Hover color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'sm_link_hover_color',
	            array(
		            'label'      => hc_tr_string('Link hover color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_link_hover_color'
                )
            )
        );


        //
        // Link hover background
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'sm_link_hover_background',
                array(
                    'palette' => true,
                    'label'      => hc_tr_string('Link hover background color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_link_hover_background'
                )
            )
        );


        //
        // Font size
        //
        $wp_customize->add_control(
            $prefix . 'sm_font_size',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_font_size',
                'label'       => hc_tr_string('Font size'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => hc_get_mod('sm_font_size'),
                    'value'       => hc_get_mod('sm_font_size')
                )
            )
        );


        //
        // Border top color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'sm_border_color',
                array(
                    'palette' => true,
                    'label'      => hc_tr_string('Border Color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_border_color'
                )
            )
        );


        //
        // Border top width
        //
        $wp_customize->add_control(
            $prefix . 'sm_border_top_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_border_top_width',
                'label'       => hc_tr_string('Border Top Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_border_top_width'),
                    'value'       => hc_get_mod('sm_border_top_width')
                )
            )
        );


        //
        // Border bottom width
        //
        $wp_customize->add_control(
            $prefix . 'sm_border_bottom_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_border_bottom_width',
                'label'       => hc_tr_string('Border Bottom Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_border_bottom_width'),
                    'value'       => hc_get_mod('sm_border_bottom_width')
                )
            )
        );


        //
        // Border left width
        //
        $wp_customize->add_control(
            $prefix . 'sm_border_left_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_border_left_width',
                'label'       => hc_tr_string('Border Left Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_border_left_width'),
                    'value'       => hc_get_mod('sm_border_left_width')
                )
            )
        );


        //
        // Border right width
        //
        $wp_customize->add_control(
            $prefix . 'sm_border_right_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_border_right_width',
                'label'       => hc_tr_string('Border Right Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_border_right_width'),
                    'value'       => hc_get_mod('sm_border_right_width')
                )
            )
        );


        //
        // Menu items border top width
        //
        $wp_customize->add_control(
            $prefix . 'sm_menu_items_border_top_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_menu_items_border_top_width',
                'label'       => hc_tr_string('Menu Items Border Top Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_menu_items_border_top_width'),
                    'value'       => hc_get_mod('sm_menu_items_border_top_width')
                )
            )
        );


        //
        // Menu items border top color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'sm_menu_items_border_top_color',
                array(
                    'palette' => true,
                    'label'      => hc_tr_string('Menu Items Border Top Color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_menu_items_border_top_color'
                )
            )
        );


        //
        // Menu items border bottom width
        //
        $wp_customize->add_control(
            $prefix . 'sm_menu_items_border_bottom_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_menu_items_border_bottom_width',
                'label'       => hc_tr_string('Menu Items Border Bottom Width'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('sm_menu_items_border_bottom_width'),
                    'value'       => hc_get_mod('sm_menu_items_border_bottom_width')
                )
            )
        );


        //
        // Menu items border bottom color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'sm_menu_items_border_bottom_color',
                array(
                    'palette' => true,
                    'label'      => hc_tr_string('Menu Items Border Bottom Color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'sm_menu_items_border_bottom_color'
                )
            )
        );


        //
        // Shadow
        //
        $wp_customize->add_control(
            $prefix . 'sm_shadow',
            array(
                'type'        => 'text',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'sm_shadow',
                'label'       => hc_tr_string('Shadow'),
                'input_attrs' => array(
                    'placeholder' => HC_Defaults::get('sm_shadow'),
                    'value'       => hc_get_mod('sm_shadow')
                )
            )
        );
    }
}


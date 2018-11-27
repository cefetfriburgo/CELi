<?php
class HC_Customize_MainMenu
{
    const SETTINGS_NAME = 'main_menu';
    public $navs;


    function __construct()
    {
        $this->navs = wp_get_nav_menus();
    }


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'mmenu_link_color',
            'mmenu_font_size',
            'mmenu_font_family',
            'mmenu_link_hover_color',
            'mmenu_link_active_color',
            'mmenu_show_arrow',
            'mmenu_margin_left',
            'mmenu_margin_right',
            'mmenu_link_bg_color',
            'mmenu_link_hover_bg_color',
            'mmenu_link_active_bg_color',
            'mmenu_link_border_radius',
            'mmenu_item_bg_color',
            'mmenu_item_hover_bg_color',
            'mmenu_item_active_bg_color',
            'mmenu_padding',
            'mmenu_margin',
            'mmenu_margin_lr',
            'mmenu_padding_lr',
            'mmenu_link_padding',
            'mmenu_link_padding_lr',
            'mmenu_item_border_top_color',
            'mmenu_item_border_bottom_color',
            'mmenu_item_border_left_color',
            'mmenu_item_border_right_color',
            'mmenu_item_border_top_width',
            'mmenu_item_border_bottom_width',
            'mmenu_item_border_left_width',
            'mmenu_item_border_right_width',
            'mmenu_item_border_top-left_radius',
            'mmenu_item_border_top-right_radius',
            'mmenu_item_border_bottom-left_radius',
            'mmenu_item_border_bottom-right_radius',
            'mmenu_item_border_top-left_radius_first',
            'mmenu_item_border_bottom-left_radius_first',
            'mmenu_item_border_top-right_radius_last',
            'mmenu_item_border_bottom-right_radius_last'
        );

        foreach ($settings as $_s)
        {
            $transport = 'postMessage';

            if (in_array(
                $_s,
                array(
                    'main_menu',
                    'mmenu_link_hover_color',
                    'mmenu_font_family',
                    'mmenu_link_hover_bg_color',
                    'mmenu_item_hover_bg_color'
                )
            )) {
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
        // Link color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'mmenu_link_color',
	            array(
		            'label'      => __('Link color', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_link_color'
                )
            )
        );


        //
        // Font size
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_font_size',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'mmenu_font_size',
                'label'       => hc_tr_string('Font size'),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_font_size'),
                    'value'       => hc_get_mod('mmenu_font_size')
                )
            )
        );


        //
        // Font family
        //
        require_once HC_DIR . 'ext/google-font-dropdown-control/select-box.php';
        $wp_customize->add_control(
            new Google_Font_Dropdown_Custom_Control($wp_customize, 'mmenu_font_family', array(
                'label' => hc_tr_string('Select Google font'),
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_font_family'
            ))
        );


        //
        // Link hover color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'mmenu_link_hover_color',
	            array(
		            'label'        => __('Link hover color', HC_LANG),
		            'description'  => __('Does a page refresh; hover with your mouse over any main menu item to see results', HC_LANG),
		            'section'      => $prefix . self::SETTINGS_NAME,
		            'settings'     => $prefix . 'mmenu_link_hover_color',
                )
            )
        );


        //
        // Link active color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'mmenu_link_active_color',
	            array(
		            'label'        => __('Link active color', HC_LANG),
		            'description'  => __('Only active item will change color; if there is no active item, plugin will change color to the first menu item', HC_LANG),
		            'section'      => $prefix . self::SETTINGS_NAME,
		            'settings'     => $prefix . 'mmenu_link_active_color',
                )
            )
        );


        //
        // Show menu arrows
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_show_arrow',
            array(
                'type' => 'checkbox',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_show_arrow',
                'label' => hc_tr_string('Show submenu arrows?')
            )
        );


        //
        // Menu margin left
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_margin_left',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_margin_left',
                'label' => hc_tr_string('Menu margin left'),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_margin_left'),
                    'value' => hc_get_mod('mmenu_margin_left')
                )
            )
        );


        //
        // Menu margin right
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_margin_right',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_margin_right',
                'label' => hc_tr_string('Menu margin right'),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_margin_right'),
                    'value' => hc_get_mod('mmenu_margin_right')
                )
            )
        );


        //
        // Link background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_link_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Link background color', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_link_bg_color',
                )
            )
        );


        //
        // Link hover background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_link_hover_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Link hover background color', HC_LANG),
		            'description'  => __('Does a page refresh; hover with your mouse over any main menu item to see results', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_link_hover_bg_color'
                )
            )
        );


        //
        // Link active background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_link_active_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Link active background color', HC_LANG),
		            'description'  => __('Only active item will change color; if there is no active item, plugin will change color to the first menu item', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_link_active_bg_color'
                )
            )
        );


        //
        // Menu link border radius
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_link_border_radius',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_link_border_radius',
                'label' => __('Link border radius', HC_LANG),
                'description' => __('To see results, put some background color first', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => 0,
                    'value' => hc_get_mod('mmenu_link_border_radius'),
                    'min' => 0
                )
            )
        );


        //
        // Menu item background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_item_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Menu item background color', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_item_bg_color'
                )
            )
        );


        //
        // Menu item hover background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_item_hover_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Menu item hover background color', HC_LANG),
		            'description'  => __('Does a page refresh; hover with your mouse over any main menu item to see results', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_item_hover_bg_color'
                )
            )
        );


        //
        // Menu item active background color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'mmenu_item_active_bg_color',
                array(
                    'palette' => true,
		            'label'      => __('Menu item active background color', HC_LANG),
		            'description'  => __('Only active item will change color; if there is no active item, plugin will change color to the first menu item', HC_LANG),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'mmenu_item_active_bg_color'
                )
            )
        );


        //
        // Menu padding
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_padding',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_padding',
                'label' => __('Menu items padding', HC_LANG),
                'description' => __('top / bottom', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_padding'),
                    'value' => hc_get_mod('mmenu_padding'),
                    'min' => 0
                )
            )
        );


        //
        // Menu padding (left / right)
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_padding_lr',
            array(
                'type' => 'number',
                'section' => $prefix . 'main_menu',
                'settings' => $prefix . 'mmenu_padding_lr',
                'label' => __('Menu items padding', HC_LANG),
                'description' => __('left / right', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_padding_lr'),
                    'value' => hc_get_mod('mmenu_padding_lr'),
                    'min' => 0
                )
            )
        );


        //
        // Menu margin
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_margin',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_margin',
                'label' => __('Menu items margin', HC_LANG),
                'description' => __('top / bottom', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_margin'),
                    'value' => hc_get_mod('mmenu_margin')
                )
            )
        );


        //
        // Menu margin (left / right)
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_margin_lr',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'mmenu_margin_lr',
                'label' => __('Menu items margin', HC_LANG),
                'description' => __('left / right', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_margin_lr'),
                    'value' => hc_get_mod('mmenu_margin_lr')
                )
            )
        );


        //
        // Menu links padding
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_link_padding',
            array(
                'type' => 'number',
                'section' => $prefix . 'main_menu',
                'settings' => $prefix . 'mmenu_link_padding',
                'label' => __('Menu links padding', HC_LANG),
                'description' => __('top / bottom', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_link_padding'),
                    'value' => hc_get_mod('mmenu_link_padding'),
                    'min' => 0
                )
            )
        );


        //
        // Menu links padding (left / right)
        //
        $wp_customize->add_control(
            $prefix . 'mmenu_link_padding_lr',
            array(
                'type' => 'number',
                'section' => $prefix . 'main_menu',
                'settings' => $prefix . 'mmenu_link_padding_lr',
                'label' => __('Menu links padding', HC_LANG),
                'description' => __('left / right', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => hc_get_mod('mmenu_link_padding_lr'),
                    'value' => hc_get_mod('mmenu_link_padding_lr'),
                    'min' => 0
                )
            )
        );


        //
        // Menu items border color & width & radius
        //
        foreach (array('top', 'bottom', 'left', 'right') as $side)
        {
            // border color
            //
            $wp_customize->add_control(
                new Customize_Alpha_Color_Control(
                    $wp_customize,
                    $prefix . "mmenu_item_border_{$side}_color",
                    array(
                        'palette' => true,
                        'label'      => __("Menu item border {$side} color", HC_LANG),
                        'section'    => $prefix . self::SETTINGS_NAME,
                        'settings'   => $prefix . "mmenu_item_border_{$side}_color"
                    )
                )
            );
        }

        foreach (array('top', 'bottom', 'left', 'right') as $side)
        {
            // border width
            //
            $wp_customize->add_control(
                $prefix . "mmenu_item_border_{$side}_width",
                array(
                    'type' => 'number',
                    'section' => $prefix . self::SETTINGS_NAME,
                    'settings' => $prefix . "mmenu_item_border_{$side}_width",
                    'label' => __("Menu items border {$side} width", HC_LANG),
                    'input_attrs' => array(
                        'placeholder' => 0,
                        'value' => hc_get_mod("mmenu_item_border_{$side}_width"),
                        'min' => 0
                    )
                )
            );
        }

        foreach (array('top-left', 'top-right', 'bottom-left', 'bottom-right') as $radius)
        {
            // border radius
            //
            $wp_customize->add_control(
                $prefix . "mmenu_item_border_{$radius}_radius",
                array(
                    'type' => 'number',
                    'section' => $prefix . self::SETTINGS_NAME,
                    'settings' => $prefix . "mmenu_item_border_{$radius}_radius",
                    'label' => __("Menu items {$radius} radius", HC_LANG),
                    'input_attrs' => array(
                        'placeholder' => 0,
                        'value' => hc_get_mod("mmenu_item_border_{$radius}_radius"),
                        'min' => 0
                    )
                )
            );

            if ('top-left' == $radius || 'bottom-left' == $radius)
            {
                // Show radius only on first item
                //
                $wp_customize->add_control(
                    $prefix . "mmenu_item_border_{$radius}_radius_first",
                    array(
                        'type' => 'checkbox',
                        'section' => $prefix . self::SETTINGS_NAME,
                        'settings' => $prefix . "mmenu_item_border_{$radius}_radius_first",
                        'label' => __('Apply only on first menu item?', HC_LANG)
                    )
                );
            }

            if ('top-right' == $radius || 'bottom-right' == $radius)
            {
                // Show radius only on last item
                //
                $wp_customize->add_control(
                    $prefix . "mmenu_item_border_{$radius}_radius_last",
                    array(
                        'type' => 'checkbox',
                        'section' => $prefix . self::SETTINGS_NAME,
                        'settings' => $prefix . "mmenu_item_border_{$radius}_radius_last",
                        'label' => __('Apply only on last menu item?', HC_LANG)
                    )
                );
            }
        }
    }
}


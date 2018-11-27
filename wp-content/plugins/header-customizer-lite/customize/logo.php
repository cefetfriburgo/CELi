<?php
class HC_Customize_Logo
{
    const SETTINGS_NAME = 'logo_area';


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'logo_src',
            'logo_type',
            'logo_text',
            'logo_max_width',
            'logo_padding',
            'logo_font_family',
            'desc_font_family',
            'show_logo_area',
            'show_logo',
            'show_description',
            'site_title_color',
            'site_title_hover_color',
            'site_title_font_size',
            'site_description_color',
            'site_description_font_size'
        );

        foreach ($settings as $_s)
        {
            $transport = 'postMessage';

            if ($_s == 'site_title_hover_color' || $_s == 'logo_font_family' || $_s == 'desc_font_family')
            {
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
        // Logo src
        //
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                $prefix . 'logo_src',
                array(
                    'label' => __('Logo image', HC_LANG),
                    'section' => $prefix . 'logo_area',
                    'settings' => $prefix . 'logo_src'
                )
            )
        );


        //
        // Logo type
        //
        $wp_customize->add_control(
            $prefix . 'logo_type',
            array(
                'type' => 'select',
                'section' => $prefix . 'logo_area',
                'settings' => $prefix . 'logo_type',
                'label' => __('Logo type', HC_LANG),
                'choices' => array(
                    'text' => __('Text', HC_LANG),
                    'image' => __('Image', HC_LANG)
                )
            )
        );


        //
        // Logo text
        //
        $wp_customize->add_control(
            $prefix . 'logo_text',
            array(
                'type' => 'text',
                'section' => $prefix . 'logo_area',
                'settings' => $prefix . 'logo_text',
                'label' => __('Logo text', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => HC_Defaults::get('logo_text'),
                    'value' => hc_get_mod('logo_text')
                )
            )
        );


        //
        // Logo image max width
        //
        $wp_customize->add_control(
            $prefix . 'logo_max_width',
            array(
                'type' => 'number',
                'section' => $prefix . 'logo_area',
                'settings' => $prefix . 'logo_max_width',
                'label' => __('Max. width', HC_LANG),
                'description' => __('Maximum width for your logo image', HC_LANG),
                'input_attrs' => array(
                    'min' => 0,
                    'placeholder' => HC_Defaults::get('logo_max_width'),
                    'value' => hc_get_mod('logo_max_width')
                )
            )
        );


        //
        // Logo padding
        //
        $wp_customize->add_control(
            $prefix . 'logo_padding',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'logo_padding',
                'label' => hc_tr_string('Padding'),
                'description' => hc_tr_string('Logo padding (top/bottom)'),
                'input_attrs' => array(
                    'min' => 0,
                    'placeholder' => HC_Defaults::get('logo_padding'),
                    'value' => hc_get_mod('logo_padding')
                )
            )
        );


        //
        // Font family
        //
        require_once HC_DIR . 'ext/google-font-dropdown-control/select-box.php';
        $wp_customize->add_control(
            new Google_Font_Dropdown_Custom_Control($wp_customize, 'logo_font_family', array(
                'label' => hc_tr_string('Select Google font for logo'),
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'logo_font_family'
            ))
        );


        //
        // Show/hide logo area
        //
        $wp_customize->add_control(
            $prefix . 'show_logo_area',
            array(
                'type' => 'checkbox',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'show_logo_area',
                'label' => __('Show logo area?', HC_LANG),
                'description' => __('Logo and description')
            )
        );


        //
        // Show/hide logo
        //
        $wp_customize->add_control(
            $prefix . 'show_logo',
            array(
                'type' => 'checkbox',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'show_logo',
                'label' => __('Show logo?', HC_LANG),
                'description' => __('Logo only', HC_LANG)
            )
        );


        //
        // Show/hide Description
        //
        $wp_customize->add_control(
            $prefix . 'show_description',
            array(
                'type' => 'checkbox',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'show_description',
                'label' => __('Show logo description?', HC_LANG),
                'description' => __('Tagline')
            )
        );


        //
        // Site title color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'site_title_color',
	            array(
		            'label'      => __('Site title color', HC_LANG),
		            'section'    => $prefix . 'logo_area',
		            'settings'   => $prefix . 'site_title_color',
                )
            )
        );


        //
        // Site title hover color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'site_title_hover_color',
	            array(
		            'label'       => __('Site title hover color', HC_LANG),
		            'description' => __('Does page refresh', HC_LANG),
		            'section'     => $prefix . 'logo_area',
		            'settings'    => $prefix . 'site_title_hover_color',
                )
            )
        );


        //
        // Site description color
        //
        $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $prefix . 'site_description_color',
	            array(
		            'label'      => __('Site description color', HC_LANG),
		            'section'    => $prefix . 'logo_area',
		            'settings'   => $prefix . 'site_description_color',
                )
            )
        );


        //
        // Font family description
        //
        require_once HC_DIR . 'ext/google-font-dropdown-control/select-box.php';
        $wp_customize->add_control(
            new Google_Font_Dropdown_Custom_Control($wp_customize, 'desc_font_family', array(
                'label' => hc_tr_string('Select Google font for site description'),
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'desc_font_family'
            ))
        );


        //
        // Site title font size
        //
        $wp_customize->add_control(
            $prefix . 'site_title_font_size',
            array(
                'type' => 'number',
                'section' => $prefix . 'logo_area',
                'settings' => $prefix . 'site_title_font_size',
                'label' => __('Site title font size', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => HC_Defaults::get('site_title_font_size'),
                    'value' => hc_get_mod('site_title_font_size')
                )
            )
        );


        //
        // Site description font size
        //
        $wp_customize->add_control(
            $prefix . 'site_description_font_size',
            array(
                'type' => 'number',
                'section' => $prefix . 'logo_area',
                'settings' => $prefix . 'site_description_font_size',
                'label' => __('Site description font size', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => HC_Defaults::get('site_description_font_size'),
                    'value' => hc_get_mod('site_description_font_size')
                )
            )
        );

    }
}


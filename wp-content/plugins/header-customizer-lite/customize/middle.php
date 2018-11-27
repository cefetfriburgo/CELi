<?php
class HC_Customize_Middle
{
    const SETTINGS_NAME = 'middle';


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'middle_type',
            'middle_bg_color',
            'middle_bg_image',
            'middle_bg_repeat',
            'middle_bg_att',
            'middle_bg_pos',
            'middle_bg_size',
            'middle_padding',
            'middle_padding_lr',
            'middle_bo_top_color',
            'middle_bo_top_width',
            'middle_bo_bottom_color',
            'middle_bo_bottom_width',
            'middle_bo_left_color',
            'middle_bo_left_width',
            'middle_bo_right_color',
            'middle_bo_right_width',
            'middle_top-left_radius',
            'middle_top-right_radius',
            'middle_bottom-left_radius',
            'middle_bottom-right_radius'
        );

        foreach ($settings as $_s)
        {
            $transport = 'postMessage';

            $wp_customize->add_setting(
                $prefix . $_s,
                array(
                    'default'    => HC_Defaults::get($_s),
                    'type'       => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport'  => $transport
                )
            );
        }


        //
        // Main header type
        //
        $wp_customize->add_control(
            $prefix . 'middle_type',
            array(
                'type'        => 'select',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'middle_type',
                'label'       => hc_tr_string('Header type'),
                'description' => hc_tr_string('Choose order of elements inside main header'),
                'choices'     => array(
                    'default'   => hc_tr_string('Default'),
                    'menu-left' => hc_tr_string('Menu on the Left'),
                    'centered'  => hc_tr_string('Centered')
                )
            )
        );


        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'middle_bg_color',
                array(
                    'palette' => true,
		            'label'      => hc_tr_string('Header background color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'middle_bg_color'
                )
            )
        );


        //
        // Background image
        //
        $wp_customize->add_control(
            new WP_Customize_Upload_Control(
                $wp_customize,
                $prefix . 'middle_bg_image',
                array(
                    'label'    => hc_tr_string('Header background image'),
                    'section'  => $prefix . 'middle',
                    'settings' => $prefix . 'middle_bg_image'
                )
            )
        );


        //
        // Background image repeat
        //
        $wp_customize->add_control(
            $prefix . 'middle_bg_repeat',
            array(
                'type'     => 'select',
                'section'  => $prefix . 'middle',
                'settings' => $prefix . 'middle_bg_repeat',
                'label'    => hc_tr_string('Background image repeat'),
                'choices'  => array(
                    'no-repeat' => 'no-repeat',
                    'repeat-x'  => 'repeat-x',
                    'repeat-y'  => 'repeat-y',
                    'repeat'    => 'repeat'
                )
            )
        );


        //
        // Background image attachment
        //
        $wp_customize->add_control(
            $prefix . 'middle_bg_att',
            array(
                'type'     => 'select',
                'section'  => $prefix . 'middle',
                'settings' => $prefix . 'middle_bg_att',
                'label'    => hc_tr_string('Background image attachment'),
                'choices'  => array(
                    'scroll' => 'scroll',
                    'fixed'  => 'fixed',
                    'local'  => 'local'
                )
            )
        );


        //
        // Background image position
        //
        $wp_customize->add_control(
            $prefix . 'middle_bg_pos',
            array(
                'type'     => 'select',
                'section'  => $prefix . 'middle',
                'settings' => $prefix . 'middle_bg_pos',
                'label'    => hc_tr_string('Background image position'),
                'choices'  => array(
                    'left top'      => 'left top',
                    'left center'   => 'left center',
                    'left bottom'   => 'left bottom',
                    'right top'     => 'right top',
                    'right center'  => 'right center',
                    'right bottom'  => 'right bottom',
                    'center top'    => 'center top',
                    'center center' => 'center center',
                    'center bottom' => 'center bottom'
                )
            )
        );


        //
        // Background image size
        //
        $wp_customize->add_control(
            $prefix . 'middle_bg_size',
            array(
                'type'     => 'select',
                'section'  => $prefix . 'middle',
                'settings' => $prefix . 'middle_bg_size',
                'label'    => hc_tr_string('Background image size'),
                'choices'  => array(
                    'auto'    => 'auto',
                    'cover'   => 'cover',
                    'contain' => 'contain'
                )
            )
        );


        //
        // Padding top/bottom
        //
        $wp_customize->add_control(
            $prefix . 'middle_padding',
            array(
                'type'     => 'number',
                'section'  => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_padding',
                'label'    => hc_tr_string('Padding top/bottom'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('middle_padding'),
                    'value'       => hc_get_mod('middle_padding')
                )
            )
        );


        //
        // Padding left/right
        //
        $wp_customize->add_control(
            $prefix . 'middle_padding_lr',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_padding_lr',
                'label' => hc_tr_string('Padding left/right'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('middle_padding_lr'),
                    'value'       => hc_get_mod('middle_padding_lr')
                )
            )
        );


        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'middle_bo_top_color',
                array(
                    'palette' => true,
		            'label'      => hc_tr_string('Border top color'),
		            'section'    => $prefix . 'middle',
		            'settings'   => $prefix . 'middle_bo_top_color',
                )
            )
        );


        //
        // Border top width
        //
        $wp_customize->add_control(
            $prefix . 'middle_bo_top_width',
            array(
                'type' => 'number',
                'section' => $prefix . 'middle',
                'settings' => $prefix . 'middle_bo_top_width',
                'label' => hc_tr_string('Border top width'),
                'input_attrs' => array(
                    'min' => 0,
                    'placeholder' => HC_Defaults::get('middle_bo_top_width'),
                    'value' => hc_get_mod('middle_bo_top_width')
                )
            )
        );


        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'middle_bo_bottom_color',
                array(
                    'palette' => true,
		            'label'      => hc_tr_string('Border bottom color'),
		            'section'    => $prefix . 'middle',
		            'settings'   => $prefix . 'middle_bo_bottom_color',
                )
            )
        );


        //
        // Border bottom width
        //
        $wp_customize->add_control(
            $prefix . 'middle_bo_bottom_width',
            array(
                'type' => 'number',
                'section' => $prefix . 'middle',
                'settings' => $prefix . 'middle_bo_bottom_width',
                'label' => hc_tr_string('Border bottom width'),
                'input_attrs' => array(
                    'min' => 0,
                    'placeholder' => HC_Defaults::get('middle_bo_bottom_width'),
                    'value' => hc_get_mod('middle_bo_bottom_width')
                )
            )
        );


        //
        // Border left color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'middle_bo_left_color',
                array(
                    'palette' => true,
		            'label'      => hc_tr_string('Border left color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'middle_bo_left_color',
                )
            )
        );


        //
        // Border left width
        //
        $wp_customize->add_control(
            $prefix . 'middle_bo_left_width',
            array(
                'type' => 'number',
                'section' => $prefix . 'middle',
                'settings' => $prefix . 'middle_bo_left_width',
                'label' => hc_tr_string('Border left width'),
                'input_attrs' => array(
                    'min'=> 0,
                    'placeholder' => HC_Defaults::get('middle_bo_left_width'),
                    'value' => hc_get_mod('middle_bo_left_width')
                )
            )
        );


        //
        // Border right color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'middle_bo_right_color',
                array(
                    'palette' => true,
		            'label'      => hc_tr_string('Border right color'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'middle_bo_right_color',
                )
            )
        );


        //
        // Border right width
        //
        $wp_customize->add_control(
            $prefix . 'middle_bo_right_width',
            array(
                'type' => 'number',
                'section' => $prefix . 'middle',
                'settings' => $prefix . 'middle_bo_right_width',
                'label' => hc_tr_string('Border right width'),
                'input_attrs' => array(
                    'min' => 0,
                    'placeholder' => HC_Defaults::get('middle_bo_right_width'),
                    'value' => hc_get_mod('middle_bo_right_width')
                )
            )
        );


        //
        // Border radius top left
        //
        $wp_customize->add_control(
            $prefix . 'middle_top-left_radius',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_top-left_radius',
                'label' => hc_tr_string('Top left radius'),
                'input_attrs' => array(
                    'placeholder' => 0,
                    'value' => hc_get_mod('middle_top-left_radius'),
                    'min' => 0
                )
            )
        );


        //
        // Border radius top right
        //
        $wp_customize->add_control(
            $prefix . 'middle_top-right_radius',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_top-right_radius',
                'label' => hc_tr_string('Top right radius'),
                'input_attrs' => array(
                    'placeholder' => 0,
                    'value' => hc_get_mod('middle_top-right_radius'),
                    'min' => 0
                )
            )
        );


        //
        // Border radius bottom left
        //
        $wp_customize->add_control(
            $prefix . 'middle_bottom-left_radius',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_bottom-left_radius',
                'label' => hc_tr_string('Bottom left radius'),
                'input_attrs' => array(
                    'placeholder' => 0,
                    'value' => hc_get_mod('middle_bottom-left_radius'),
                    'min' => 0
                )
            )
        );


        //
        // Border radius bottom right
        //
        $wp_customize->add_control(
            $prefix . 'middle_bottom-right_radius',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'middle_bottom-right_radius',
                'label' => hc_tr_string('Bottom right radius'),
                'input_attrs' => array(
                    'placeholder' => 0,
                    'value' => hc_get_mod('middle_bottom-right_radius'),
                    'min' => 0
                )
            )
        );
    }
}


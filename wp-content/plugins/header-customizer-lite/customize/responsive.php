<?php
class HC_Customize_Responsive
{
    const SETTINGS_NAME = 'responsive';


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'rsp_max_width',
            'rsp_hamburger_color'
        );

        foreach ($settings as $_s)
        {
            $wp_customize->add_setting(
                $prefix . $_s,
                array(
                    'default'    => HC_Defaults::get($_s),
                    'type'       => 'theme_mod',
                    'capability' => 'edit_theme_options',
                    'transport'  => 'postMessage'
                )
            );
        }


        //
        // Responsive max width
        //
        $wp_customize->add_control(
            $prefix . 'rsp_max_width',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'rsp_max_width',
                'label'       => hc_tr_string('Responsive Width'),
                'description' => hc_tr_string('Width below which menu
                    disappears and hamburger icon appears.'),
                'input_attrs' => array(
                    'min'         => 0,
                    'placeholder' => HC_Defaults::get('rsp_max_width'),
                    'value'       => hc_get_mod('rsp_max_width', '')
                )
            )
        );


        //
        // Hamburger Color
        //
        $wp_customize->add_control(
            new Customize_Alpha_Color_Control(
                $wp_customize,
                $prefix . 'rsp_hamburger_color',
                array(
                    'palette' => true,
                    'label'       => hc_tr_string('Hamburger Color'),
                    'description' => hc_tr_string('Color of "hamburger" icon which appears on small screens (as set per width setting above).'),
		            'section'    => $prefix . self::SETTINGS_NAME,
		            'settings'   => $prefix . 'rsp_hamburger_color'
                )
            )
        );
    }
}


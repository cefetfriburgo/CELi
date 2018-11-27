<?php
class HC_Customize_General
{
    const SETTINGS_NAME = 'general';


    public function register($wp_customize)
    {
        $prefix = 'hc_';

        $settings = array(
            'header_width',
            'header_width_stretch',
            'header_pos_left',
            'header_margin_top',
            'header_margin_bottom',
            'header_margin_left',
            'header_margin_right',
            'header_font',
            'hc_custom_css'
        );

        foreach ($settings as $_s)
        {
            $transport = 'postMessage';

            if ($_s == 'hc_custom_css' || $_s == 'header_font') $transport = 'refresh';

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
        // Header width
        //
        $wp_customize->add_control(
            $prefix . 'header_width',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'header_width',
                'label' => __('Header width', HC_LANG),
                'description' => __('Leave empty for having 100% width', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => '100%',
                    'value' => hc_get_mod('header_width')
                )
            )
        );


        //
        // Header width stretch
        //
        $wp_customize->add_control(
            $prefix . 'header_width_stretch',
            array(
                'type'        => 'checkbox',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'header_width_stretch',
                'label'       => hc_tr_string('Stretch header width?'),
                'description' => hc_tr_string('See the difference between
                    <a target="_blank"
                href="https://s3.amazonaws.com/headercustomizer/stretched.png">stretched</a>
                    and <a target="_blank"
                href="https://s3.amazonaws.com/headercustomizer/non-stretched.png">non-stretched</a>
                    header.'
                )
            )
        );


        //
        // Header left position
        //
        $wp_customize->add_control(
            $prefix . 'header_pos_left',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'header_pos_left',
                'label'       => hc_tr_string('Header left position'),
                'description' => hc_tr_string('Use this to position header
                    somewhere left or right. If left empty, header will be
                    centrally positioned (default); if not empty, it will take
                    precedence over left and right margins.'),
                'input_attrs' => array(
                    'value'       => hc_get_mod('header_pos_left')
                )
            )
        );


        //
        // Header margin top
        //
        $wp_customize->add_control(
            $prefix . 'header_margin_top',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'header_margin_top',
                'label' => __('Header margin top', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => '0',
                    'value' => hc_get_mod('header_margin_top')
                )
            )
        );


        //
        // Header margin bottom
        //
        $wp_customize->add_control(
            $prefix . 'header_margin_bottom',
            array(
                'type' => 'number',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'header_margin_bottom',
                'label' => __('Header margin bottom', HC_LANG),
                'input_attrs' => array(
                    'placeholder' => '0',
                    'value' => hc_get_mod('header_margin_bottom')
                )
            )
        );


        //
        // Header margin left
        //
        $wp_customize->add_control(
            $prefix . 'header_margin_left',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'header_margin_left',
                'label'       => hc_tr_string('Header margin left'),
                'description' => hc_tr_string('Use this if your header is NOT
                sticky; if it\'s sticky, better use <strong>Left
                position</strong> setting above.'),
                'input_attrs' => array(
                    'placeholder' => '0',
                    'value'       => hc_get_mod('header_margin_left')
                )
            )
        );


        //
        // Header margin right
        //
        $wp_customize->add_control(
            $prefix . 'header_margin_right',
            array(
                'type'        => 'number',
                'section'     => $prefix . self::SETTINGS_NAME,
                'settings'    => $prefix . 'header_margin_right',
                'label'       => __('Header margin right', HC_LANG),
                'description' => hc_tr_string('Use this if your header is NOT
                sticky; if it\'s sticky, better use <strong>Left
                position</strong> setting above.'),
                'input_attrs' => array(
                    'placeholder' => '0',
                    'value' => hc_get_mod('header_margin_right')
                )
            )
        );


        require_once HC_DIR . 'ext/google-font-dropdown-control/select-box.php';
        $wp_customize->add_control(
            new Google_Font_Dropdown_Custom_Control($wp_customize, 'header_font', array(
                'label' => hc_tr_string('Select Google Font (for the whole header!)'),
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'header_font'
            ))
        );


        //
        // Header width
        //
        $wp_customize->add_control(
            $prefix . 'hc_custom_css',
            array(
                'type' => 'textarea',
                'section' => $prefix . self::SETTINGS_NAME,
                'settings' => $prefix . 'hc_custom_css',
                'label' => hc_tr_string('Custom CSS'),
                'description' => hc_tr_string('Here you can always define more CSS
                    definitions to suit your needs. It does a page refresh. You should
                    start all your CSS definitions with ".hc-wrap" because
                    otherwise you could mess up with other CSS definitions on
                    your website. It is better to copy-paste CSS here because
                    page refreshes on each entered character.'),
                'input_attrs' => array(
                    'placeholder' => '.hc-wrap',
                    'value' => hc_get_mod('hc_custom_css')
                )
            )
        );
    }
}


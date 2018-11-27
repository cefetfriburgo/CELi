<?php
/**
 *
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/includes
 */

/**
 * The Settings definition of the plugin.
 *
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/includes
 * @author     Your Name <email@example.com>
 */
class sogo_accessibility_Settings_Definition
{

    // @TODO: change plugin-name
    public static $sogo_accessibility = 'sogoacc';

    /**
     * [get_default_tab_slug description]
     * @return [type] [description]
     */
    static public function get_default_tab_slug()
    {

        return key(self::get_tabs());
    }

    /**
     * Retrieve settings tabs
     *
     * @since    1.0.0
     * @return    array    $tabs    Settings tabs
     */
    static public function get_tabs()
    {

        $tabs = array();
        $tabs['settings'] = __('Settings', self::$sogo_accessibility);
        $tabs['css'] = __('CSS', self::$sogo_accessibility);
        $tabs['premium'] = __('Premium', self::$sogo_accessibility);

        return apply_filters('sogo_accessibility_settings_tabs', $tabs);
    }

    /**
     * 'Whitelisted' sogo_accessibility settings, filters are provided for each settings
     * section to allow extensions and other plugins to add their own settings
     *
     *
     * @since    1.0.0
     * @return    mixed    $value    Value saved / $default if key if not exist
     */
    static public function get_settings()
    {

        $settings[] = array();
        $vl = get_option('_sogo_acc_lk_status') == 'valid';
        $settings = array(
            'settings' => array(
                'btn_icon' => array(
                    'name' => __('Button icon', self::$sogo_accessibility),
                    'type' => 'select',
                    'options' => array(
                        'fa-universal-access' => __('Universal Accessibility', self::$sogo_accessibility),
                        'fa-wheelchair' => __('wheelchair', self::$sogo_accessibility),
                        'fa-wheelchair-alt' => __('Wheelchair alt', self::$sogo_accessibility),
                        'none' => __('Do not use Icon', self::$sogo_accessibility),

                    )
                ),
                'btn_text' => array(
                    'name' => __('Button Text when close', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'btn_location' => array(
                    'name' => __('Button location', self::$sogo_accessibility),
                    'type' => 'select',
                    'options' => array(
                        'topleft' => __('Top left', self::$sogo_accessibility),
                        'topright' => __('Top right', self::$sogo_accessibility),
                        'middleleft' => __('middle left', self::$sogo_accessibility),
                        'middleright' => __('middle right', self::$sogo_accessibility),
                        'bottomleft' => __('bottom left', self::$sogo_accessibility),
                        'bottomright' => __('bottom right', self::$sogo_accessibility),
                    )
                ),
                'btn_text_2' => array(
                    'name' => __('Button Text When open', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'readable_font' => array(
                    'name' => __('Readable Font', self::$sogo_accessibility),
                    'type' => 'text',
                    'std' => '"Arial", sans-serif'
                ),

                'buttons' => array(
                    'name' => __('Disable options', self::$sogo_accessibility),
                    'desc' => __('Select to disable this for the user', self::$sogo_accessibility),
                    'options' => array(
                        'btn_1' => __("Blank & White option", self::$sogo_accessibility),
                        'btn_2' => __("Contrast Dark option", self::$sogo_accessibility),
                        'btn_3' => __("Contrast White option", self::$sogo_accessibility),
                        'btn_4' => __('Hide Movements', self::$sogo_accessibility),
                        'btn_5' => __('Readable Font', self::$sogo_accessibility),
                        'btn_6' => __('Underline links', self::$sogo_accessibility),
                    ),
                    'type' => 'multicheck'
                ),
                'a2' => array(
                    'name' => __('Font size increase 2nd level', self::$sogo_accessibility),
                    'options' => array(
                        '1.1' => 1.1,
                        '1.2' => 1.2,
                        '1.3' => 1.3,
                        '1.4' => 1.4,
                        '1.5' => 1.5,
                        '1.6' => 1.6,
                        '1.7' => 1.7,


                    ),
                    'type' => 'select'
                ),
                'a3' => array(
                    'name' => __('Font size increase 3rd level', self::$sogo_accessibility),
                    'options' => array(
                        '1.4' => 1.4,
                        '1.5' => 1.5,
                        '1.6' => 1.6,
                        '1.7' => 1.7,
                        '1.8' => 1.8,
                        '1.9' => 1.9,

                    ),
                    'type' => 'select'
                ),
                'hide_in' => array(
                    'name' => __('Do not show Accessibility for screen resolution', self::$sogo_accessibility),
                    'type' => 'select',
                    'options' => array(
                        '1' => '',
                        '2' => __("Mobile", self::$sogo_accessibility),
                        '3' => __("Mobile + Tablet", self::$sogo_accessibility),
                    ),
                ),
                'tac_link' => array(
	                'name' => __('Accessibility Statement Page', self::$sogo_accessibility),
	                'desc' => __('You can use link to the Accessibility Statement or use the text editor below to enable a pop up window', self::$sogo_accessibility),
	                'type' => 'url'
                ),

                'tac' => array(
                    'name' => __('Accessibility Statement', self::$sogo_accessibility),
                    'desc' => __('Rich Editor save as HTML markups', self::$sogo_accessibility),
                    'type' => 'rich_editor'
                ),


            ),
            'css' => array(
                'btn_bg_color_1' => array(
                    'name' => __('Button open background color', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'btn_bg_color_2' => array(
                    'name' => __('Button close background color', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'text_color_1' => array(
                    'name' => __('Button open Text color', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'text_color_2' => array(
                    'name' => __('Button close Text color', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'extra_css' => array(
                    'name' => 'Inline CSS',
                    'desc' => $vl ? __('Enter full CSS code.', self::$sogo_accessibility) : __('Please activate your license to use this option', self::$sogo_accessibility),
                    'type' => 'textarea',
                )
            ),

            'premium' => array(
                'license_key' => array(
                    'name' => __('License', self::$sogo_accessibility),
                    'type' => 'text',
                    'desc' => $vl ? 'already activated' : __('Please activate your license to use below options', self::$sogo_accessibility),
                ),
                'link' => array(
	                'name' => __('Where to buy?', self::$sogo_accessibility),
	                'type' => 'header',
	                'desc' => 'https://pluginsmarket.com/downloads/accessibility-plugin/'
                ),
                'hide_sogo_logo' => array(
                    'name' => __('Hide Sogo Logo', self::$sogo_accessibility),
                    'type' => 'checkbox'
                ),
                'logo' => array(
                    'name' => __('Logo', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'logo_text' => array(
                    'name' => __('Logo Text', self::$sogo_accessibility),
                    'type' => 'text'
                ),
                'logo_url' => array(
                    'name' => __('Logo URL', self::$sogo_accessibility),
                    'type' => 'url'
                ),




            ),


        );


        return self::apply_tab_slug_filters($settings);
    }

    /**
     * [apply_tab_slug_filters description]
     *
     * @param  array $default_settings [description]
     *
     * @return array                   [description]
     */
    static private function apply_tab_slug_filters($default_settings)
    {

        $extended_settings[] = array();
        $extended_tabs = self::get_tabs();

        foreach ($extended_tabs as $tab_slug => $tab_desc) {

            $options = isset($default_settings[$tab_slug]) ? $default_settings[$tab_slug] : array();

            $extended_settings[$tab_slug] = apply_filters('sogo_accessibility_settings_' . $tab_slug, $options);
        }

        return $extended_settings;
    }
}

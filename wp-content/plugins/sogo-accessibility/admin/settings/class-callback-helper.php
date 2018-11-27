<?php

/**
 * sogo_accessibility Callback Helper Class
 *
 * The callback functions of the settings page
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/admin/settings
 * @author     Your Name <email@example.com>
 */
class sogo_accessibility_Callback_Helper
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $sogo_accessibility The ID of this plugin.
     */
    private $sogo_accessibility;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @var      string $sogo_accessibility The name of this plugin.
     */
    public function __construct($sogo_accessibility)
    {

        $this->sogo_accessibility = $sogo_accessibility;

    }

    /**
     * Missing Callback
     *
     * If a function is missing for settings callbacks alert the user.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function missing_callback($args)
    {
        printf(__('The callback function used for <strong>%s</strong> setting is missing.', $this->sogo_accessibility), $args['id']);
    }

    /**
     * Header Callback
     *
     * Renders the header.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function header_callback($args)
    {
        echo '<hr/><a href="https://pluginsmarket.com/downloads/accessibility-plugin/" target="_blank">'.$args['desc'].'</a>';
    }

    /**
     * Checkbox Callback
     *
     * Renders checkboxes.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function checkbox_callback($args)
    {

        $value = sogo_accessibility_Option::get_option($args['id']);
        $checked = isset($value) ? checked(1, $value, false) : '';

        $html = '<input type="checkbox" ';
        $html .= $this->get_id_and_name_attrubutes($args['id']);
        $html .= 'value="1" ' . $checked . '/>';

        $html .= '<br />';
        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }

    private function get_id_and_name_attrubutes($field_key)
    {
        return $this->get_id_attribute($field_key) . $this->get_name_attribute($field_key);
    }

    private function get_id_attribute($id)
    {
        return ' id="sogo_accessibility_settings[' . $id . ']" ';
    }

    private function get_name_attribute($name)
    {
        return ' name="sogo_accessibility_settings[' . $name . ']" ';
    }

    private function get_label_for($id, $desc)
    {
        return '<label for="sogo_accessibility_settings[' . $id . ']"> ' . $desc . '</label>';
    }

    /**
     * Multicheck Callback
     *
     * Renders multiple checkboxes.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function multicheck_callback($args)
    {

        if (empty($args['options'])) {
            printf(__('Options for <strong>%s</strong> multicheck is missing.', $this->sogo_accessibility), $args['id']);
            return;
        }

        $old_values = sogo_accessibility_Option::get_option($args['id'], array());

        $html = '';

        foreach ($args['options'] as $field_key => $option) {

            if (isset($old_values[$field_key])) {
                $enabled = $option;
            } else {
                $enabled = NULL;
            }

            $checked = checked($option, $enabled, false);

            $html .= '<input type="checkbox" ';
            $html .= $this->get_id_and_name_attrubutes($args['id'] . '][' . $field_key);
            $html .= ' value="' . $option . '" ' . $checked . '/> ';

            $html .= $this->get_label_for($args['id'] . '][' . $field_key, $option);
            $html .= '<br/>';
        }

        $html .= '<p class="description">' . $args['desc'] . '</p>';

        echo $html;
    }

    /**
     * Radio Callback
     *
     * Renders radio boxes.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function radio_callback($args)
    {

        if (empty($args['options'])) {
            printf(__('Options for <strong>%s</strong> radio is missing.', $this->sogo_accessibility), $args['id']);
            return;
        }

        $old_value = sogo_accessibility_Option::get_option($args['id']);

        $html = '';

        foreach ($args['options'] as $field_key => $option) {

            if (!empty($old_value)) {
                $checked = checked($field_key, $old_value, false);
            } else {
                $checked = checked($args['std'], $field_key, false);
            }

            $html .= '<input type="radio"';
            $html .= $this->get_name_attribute($args['id']);
            $html .= $this->get_id_attribute($args['id'] . '][' . $field_key);
            $html .= ' value="' . $field_key . '" ' . $checked . '/> ';

            $html .= $this->get_label_for($args['id'] . '][' . $field_key, $option);
            $html .= '<br/>';

        }

        $html .= '<p class="description">' . $args['desc'] . '</p>';
        echo $html;
    }

    /**
     * Text Callback
     *
     * Renders text fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function text_callback($args)
    {

        $this->input_type_callback('text', $args);

    }

    /**
     * Input Type Callback
     *
     * Renders input type fields.
     *
     * @since    1.0.0
     * @param    string $type Input Type
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    private function input_type_callback($type, $args)
    {

        $value = sogo_accessibility_Option::get_option($args['id'], $args['std']);

        $html = '<input type="' . $type . '" ';
        $html .= $this->get_id_and_name_attrubutes($args['id']);
        $html .= 'class="' . $args['size'] . '-text" ';
        $html .= 'value="' . esc_attr(stripslashes($value)) . '"/>';
//        if($args['id'] == 'license_key'){
//            $valid = get_option('_sogo_acc_lk_status');
//            $html .= '<span class="icon-valid">'. $valid. '</span>';
//        }
        $html .= '<br />';
        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }

    /**
     * Email Callback
     *
     * Renders email fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function email_callback($args)
    {

        $this->input_type_callback('email', $args);

    }

    /**
     * Url Callback
     *
     * Renders url fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function url_callback($args)
    {

        $this->input_type_callback('url', $args);

    }

    /**
     * Password Callback
     *
     * Renders password fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function password_callback($args)
    {

        $this->input_type_callback('password', $args);

    }

    /**
     * Number Callback
     *
     * Renders number fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function number_callback($args)
    {

        $value = sogo_accessibility_Option::get_option($args['id']);


        $html = '<input type="number" ';
        $html .= $this->get_id_and_name_attrubutes($args['id']);
        $html .= 'class="' . $args['size'] . '-text" ';
        $html .= 'step="' . $args['step'] . '" ';
        $html .= 'max="' . $args['max'] . '" ';
        $html .= 'min="' . $args['min'] . '" ';
        $html .= 'value="' . $value . '"/>';

        $html .= '<br />';
        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }

    /**
     * Textarea Callback
     *
     * Renders textarea fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function textarea_callback($args)
    {

        $value = sogo_accessibility_Option::get_option($args['id'], $args['std']);


        $html = '<textarea ';
        $html .= 'class="' . $args['size'] . '-text" ';
        $html .= 'cols="50" rows="5" ';
        $html .= $this->get_id_and_name_attrubutes($args['id']) . '>';
        $html .= esc_textarea(stripslashes($value));
        $html .= '</textarea>';

        $html .= '<br />';
        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }

    /**
     * Select Callback
     *
     * Renders select fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function select_callback($args)
    {

        $value = sogo_accessibility_Option::get_option($args['id']);

        $html = '<select ' . $this->get_id_and_name_attrubutes($args['id']) . '/>';

        foreach ($args['options'] as $option => $option_name) {
            $selected = selected($option, $value, false);
            $html .= '<option value="' . $option . '" ' . $selected . '>' . $option_name . '</option>';
        }

        $html .= '</select>';
        $html .= '<br />';
        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }

    /**
     * Rich Editor Callback
     *
     * Renders rich editor fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @global    $wp_version WordPress Version
     */
    public function rich_editor_callback($args)
    {
        global $wp_version;

        $value = sogo_accessibility_Option::get_option($args['id']);

        if ($wp_version >= 3.3 && function_exists('wp_editor')) {
            ob_start();
            wp_editor(stripslashes($value), 'sogo_accessibility_settings_' . $args['id'], array('textarea_name' => 'sogo_accessibility_settings[' . $args['id'] . ']'));
            $html = ob_get_clean();
        } else {
            $html = '<textarea' . $this->get_id_and_name_attrubutes($args['id']) . 'class="' . $args['size'] . '-text" rows="10" >' . esc_textarea(stripslashes($value)) . '</textarea>';
        }

        $html .= '<br/>';
        $html .= $this->get_label_for($args['id'], $args['desc']);
        $html .= '<br/>';

        echo $html;
    }




    /**
     * Upload Callback
     *
     * Renders upload fields.
     *
     * @since    1.0.0
     * @param    array $args Arguments passed by the setting
     * @return    void
     */
    public function upload_callback($args)
    {


        $html = '<input type="text" ';
        $html .= $this->get_id_and_name_attrubutes($args['id']);
        $html .= 'class="' . $args['size'] . '-text ' . 'sogo_accessibility_upload_field" ';
        $html .= ' value="' . esc_attr(stripslashes($value)) . '"/>';

        $html .= '<span>&nbsp;<input type="button" class="' . 'sogo_accessibility_settings_upload_button button-secondary"
                             value="' . __('Upload File', $this->sogo_accessibility) . '"/></span>';

        $html .= $this->get_label_for($args['id'], $args['desc']);

        echo $html;
    }
}

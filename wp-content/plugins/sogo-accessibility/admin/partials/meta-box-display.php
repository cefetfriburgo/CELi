<?php
/**
 * Provide a meta box view for the settings page
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/admin/partials
 */

/**
 * Meta Box
 *
 * Renders a single meta box.
 *
 * @since       1.0.0
*/
?>

<form action="options.php" method="POST">
	<?php settings_fields( 'sogo_accessibility_settings' ); ?>
	<?php do_settings_sections( 'sogo_accessibility_settings_' . $active_tab ); ?>
	<?php submit_button(); ?>
</form>
<br class="clear" />

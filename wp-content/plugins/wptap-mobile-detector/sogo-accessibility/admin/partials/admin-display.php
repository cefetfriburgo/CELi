<?php
/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the plugin settings page.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sogo_accessibility
 * @subpackage sogo_accessibility/admin/partials
 */

/**
 * Options Page
 *
 * Renders the settings page contents.
 *
 * @since       1.0.0
*/

?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?> </h2>

	<?php settings_errors( $this->sogo_accessibility . '-notices' ); ?>

	<h2 class="nav-tab-wrapper">
		<?php
		foreach( $tabs as $tab_slug => $tab_name ) {

			$tab_url = add_query_arg( array(
				'settings-updated' => false,
				'tab' => $tab_slug
				) );

			$active = $active_tab == $tab_slug ? ' nav-tab-active' : '';

			echo '<a href="' . esc_url( $tab_url ) . '" title="' . esc_attr( $tab_name ) . '" class="nav-tab' . $active . '">';
			echo esc_html( $tab_name );
			echo '</a>';
		}
		?>
	</h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder">

				<div id="postbox-container" class="postbox-container">

					<?php do_meta_boxes( 'sogo_accessibility_settings_' . $active_tab, 'normal', $active_tab ); ?>

				</div><!-- #postbox-container-->

		</div><!-- #post-body-->

	</div><!-- #poststuff-->
</div><!-- .wrap -->

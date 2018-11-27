<?php

class WPHT {
	public function __construct() {
		load_plugin_textdomain( 'wpht', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		add_action( 'wp_footer', array( &$this, 'wp_footer' ) );
		add_filter( 'plugin_action_links', array( &$this, 'wpht_plugin_action_links' ), 10, 2 );
	}

	public function wpht_plugin_action_links( $links, $file ) {
		if ( untrailingslashit( plugins_url( '', $file ) ) != untrailingslashit( plugins_url( '', __FILE__ ) ) )
			return $links;
		$settings_link = '<a href="' . menu_page_url( 'wpht', false ) . '">'
			. esc_html( __( 'Settings', 'wpht' ) ) . '</a>';

		array_unshift( $links, $settings_link );

		return $links;
	}

	public function wp_footer() {
		$settings = WPHTSettings::getSettings();
		if( $settings['object'] != '' ) {

			?>
            <script type="text/javascript" src="https://api.handtalk.me/plugin/latest/handtalk.min.js"></script>
			<script type="text/javascript">
                var ht = new HT(<?php echo $settings['object'] ?>);
			</script>
			<?php
		}
	}
}
<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$can_change_all = false;
$settings_for_youtube_block_nonce_set = false;
$settings_for_youtube_block_nonce_name = '';
if ( isset( $_POST['settings_for_youtube_block_nonce_name'] ) ) {
	$settings_for_youtube_block_nonce_set = isset( $_POST['settings_for_youtube_block_nonce_name'] );
	$settings_for_youtube_block_nonce_name = $_POST['settings_for_youtube_block_nonce_name'];
}
$settings_for_youtube_block_nonce_verify = wp_verify_nonce( $settings_for_youtube_block_nonce_name, 'settings_for_youtube_block_nonce_action' );
if ( current_user_can( 'manage_options' ) && $settings_for_youtube_block_nonce_set && $settings_for_youtube_block_nonce_verify ) {
	$can_change_all = true;
}
// Update settings
if ( $can_change_all ) {
	$settings_for_youtube_block_option_modestbranding = isset( $_POST['settings_for_youtube_block_option_modestbranding'] ) ? intval( $_POST['settings_for_youtube_block_option_modestbranding'] ) : 0;
	update_option( 'settings_for_youtube_block_option_modestbranding', $settings_for_youtube_block_option_modestbranding );

	$settings_for_youtube_block_option_rel = isset( $_POST['settings_for_youtube_block_option_rel'] ) ? intval( $_POST['settings_for_youtube_block_option_rel'] ) : 0;
	update_option( 'settings_for_youtube_block_option_rel', $settings_for_youtube_block_option_rel );

	$settings_for_youtube_block_option_lazy = isset( $_POST['settings_for_youtube_block_option_lazy'] ) ? intval( $_POST['settings_for_youtube_block_option_lazy'] ) : 0;
	update_option( 'settings_for_youtube_block_option_lazy', $settings_for_youtube_block_option_lazy );

	$settings_for_youtube_block_option_controls = isset( $_POST['settings_for_youtube_block_option_controls'] ) ? intval( $_POST['settings_for_youtube_block_option_controls'] ) : 0;
	update_option( 'settings_for_youtube_block_option_controls', $settings_for_youtube_block_option_controls );

	$settings_for_youtube_block_option_disablekb = isset( $_POST['settings_for_youtube_block_option_disablekb'] ) ? intval( $_POST['settings_for_youtube_block_option_disablekb'] ) : 0;
	update_option( 'settings_for_youtube_block_option_disablekb', $settings_for_youtube_block_option_disablekb );
	
	$settings_for_youtube_block_option_enablejsapi = isset( $_POST['settings_for_youtube_block_option_enablejsapi'] ) ? intval( $_POST['settings_for_youtube_block_option_enablejsapi'] ) : 0;
	update_option( 'settings_for_youtube_block_option_enablejsapi', $settings_for_youtube_block_option_enablejsapi );
	
	$settings_for_youtube_block_option_fs = isset( $_POST['settings_for_youtube_block_option_fs'] ) ? intval( $_POST['settings_for_youtube_block_option_fs'] ) : 0;
	update_option( 'settings_for_youtube_block_option_fs', $settings_for_youtube_block_option_fs );
	
	$settings_for_youtube_block_option_iv_load_policy = isset( $_POST['settings_for_youtube_block_option_iv_load_policy'] ) ? intval( $_POST['settings_for_youtube_block_option_iv_load_policy'] ) : 0;
	update_option( 'settings_for_youtube_block_option_iv_load_policy', $settings_for_youtube_block_option_iv_load_policy );
	
	$settings_for_youtube_block_option_playsinline = isset( $_POST['settings_for_youtube_block_option_playsinline'] ) ? intval( $_POST['settings_for_youtube_block_option_playsinline'] ) : 0;
	update_option( 'settings_for_youtube_block_option_playsinline', $settings_for_youtube_block_option_playsinline );
	
	$saved_settings_for_youtube_block_settings = isset( $_POST['saved_settings_for_youtube_block_settings'] ) ? intval( $_POST['saved_settings_for_youtube_block_settings'] ) : 0;
	update_option( 'saved_settings_for_youtube_block_settings', isset( $saved_settings_for_youtube_block_settings ) );
	
	echo '<div id="message" class="updated fade">
		<p>' . __( 'Your settings are now updated', 'settings_for_youtube_block' ) . '</p>
	</div>';
}

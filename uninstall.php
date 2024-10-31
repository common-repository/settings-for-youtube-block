<?php
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

$settings_for_youtube_block_options = array(
	'settings_for_youtube_block_option_modestbranding', 
	'settings_for_youtube_block_option_rel', 
    'settings_for_youtube_block_option_controls', 
    'settings_for_youtube_block_option_disablekb', 
    'settings_for_youtube_block_option_enablejsapi', 
    'settings_for_youtube_block_option_fs', 
    'settings_for_youtube_block_option_iv_load_policy', 
    'settings_for_youtube_block_option_playsinline', 
    'saved_settings_for_youtube_block_settings', 
);

foreach ( $settings_for_youtube_block_options as $settings_for_youtube_block_option ) {
	delete_option( $settings_for_youtube_block_option );
	delete_site_option( $settings_for_youtube_block_option );
}

<?php
/**
* Plugin Name: Settings for YouTube block
* Plugin URI: https://plugins.followmedarling.se/settings-for-youtube-block/
* Description: Get rid of YouTube logo while playing, and also only show related videos from same channel. Great when you're embedding your own videos and don't want to show your competitors videos when the user pauses and after the video is done.
* Version: 1.05
* Author: Jonk @ Follow me Darling
* Author URI: https://plugins.followmedarling.se/
* Domain Path: /languages
* Text Domain: settings_for_youtube_block
**/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

load_plugin_textdomain( 'settings_for_youtube_block', false, basename( dirname( __FILE__ ) ) . '/languages' );

$settings_for_youtube_block_dir = plugin_dir_path( __FILE__ );

function settings_for_youtube_block( $block_content, $block ) {
	if( "core-embed/youtube" === $block['blockName'] || "core/embed" === $block['blockName'] ) {
		$block_content = str_replace( '?feature=oembed', get_youtube_block_settings_querystring(), $block_content );
		$settings_for_youtube_block_option_lazy = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_lazy', false, '', true );
		if ( $settings_for_youtube_block_option_lazy ) {
			$block_content = str_replace( '<iframe', '<iframe loading="lazy"', $block_content );
		}
	}
	return $block_content;
}
add_filter( 'render_block', 'settings_for_youtube_block', 10, 3);

if ( !is_admin() ) {
	function settings_for_youtube_block_classic( $html, $url, $attr, $post_id ) {
		return str_replace( '?feature=oembed', get_youtube_block_settings_querystring(), $html );
	}
	add_filter( 'embed_oembed_html', 'settings_for_youtube_block_classic', 99, 4 );
}

function get_youtube_block_settings_querystring() {
	// All settings: https://developers.google.com/youtube/player_parameters
	$saved_settings_for_youtube_block_settings = get_settings_for_youtube_block_options( 'saved_settings_for_youtube_block_settings', false, '', true );
	if ( $saved_settings_for_youtube_block_settings) {
		$youtube_block_settings = '?feature=oembed';
		$settings_for_youtube_block_option_modestbranding = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_modestbranding', false, '', true );
		if ( $settings_for_youtube_block_option_modestbranding ) {
			$youtube_block_settings .= '&modestbranding=1';
		}
		$settings_for_youtube_block_option_rel = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_rel', false, '', true );
		if ( $settings_for_youtube_block_option_rel ) {
			$youtube_block_settings .= '&rel=0';
		}
		$settings_for_youtube_block_option_controls = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_controls', false, '', true );
		if ( $settings_for_youtube_block_option_controls ) {
			$youtube_block_settings .= '&controls=0';
		}
		$settings_for_youtube_block_option_disablekb = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_disablekb', false, '', true );
		if ( $settings_for_youtube_block_option_disablekb ) {
			$youtube_block_settings .= '&disablekb=1';
		}
		$settings_for_youtube_block_option_enablejsapi = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_enablejsapi', false, '', true );
		if ( $settings_for_youtube_block_option_enablejsapi ) {
			$youtube_block_settings .= '&enablejsapi=1';
		}
		$settings_for_youtube_block_option_fs = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_fs', false, '', true );
		if ( $settings_for_youtube_block_option_fs ) {
			$youtube_block_settings .= '&fs=0';
		}
		$settings_for_youtube_block_option_iv_load_policy = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_iv_load_policy', false, '', true );
		if ( $settings_for_youtube_block_option_iv_load_policy ) {
			$youtube_block_settings .= '&iv_load_policy=' . $settings_for_youtube_block_option_iv_load_policy;
		}
		$settings_for_youtube_block_option_playsinline = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_playsinline', false, '', true );
		if ( $settings_for_youtube_block_option_playsinline ) {
			$youtube_block_settings .= '&playsinline=1';
		}
	} else {
		$youtube_block_settings = '?feature=oembed&modestbranding=1&rel=0';
	}
	return $youtube_block_settings;
}

include_once( $settings_for_youtube_block_dir . 'inc/settings-settings-for-youtube-block.php' );

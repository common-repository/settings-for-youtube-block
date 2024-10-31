<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Admin menu
function settings_for_youtube_block_menu() {
	add_options_page( __( 'Settings for YouTube block', 'settings_for_youtube_block' ), __( 'Settings for YouTube block', 'settings_for_youtube_block' ), 'manage_options', 'settings_for_youtube_block_settings', 'settings_for_youtube_block_options' );
}

// Function for getting saved option with fallback
function get_settings_for_youtube_block_options( $option, $new_line_to_space = false, $fallback = '', $esc = false ) {
	$option = get_option( $option );
	if ( !$option && $fallback ) {
		$option = $fallback;
	}
	if ( $new_line_to_space ) {
		$remove = array( "\n", "\r\n", "\r" );
		$option = str_replace( $remove, ' ', $option );
	}
	if ( $esc ) {
		$option = esc_attr( $option );
	}
	return stripslashes( $option );
}

// Admin page
add_action( 'admin_menu', 'settings_for_youtube_block_menu' );
function settings_for_youtube_block_options() {
	include_once( 'settings-settings-for-youtube-block-update-options.php' );

	$settings_for_youtube_block_option_modestbranding = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_modestbranding', false, '', true );
	$settings_for_youtube_block_option_rel = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_rel', false, '', true );
	$settings_for_youtube_block_option_lazy = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_lazy', false, '', true );
	$settings_for_youtube_block_option_controls = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_controls', false, '', true );
	$settings_for_youtube_block_option_disablekb = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_disablekb', false, '', true );
	$settings_for_youtube_block_option_enablejsapi = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_enablejsapi', false, '', true );
	$settings_for_youtube_block_option_fs = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_fs', false, '', true );
	$settings_for_youtube_block_option_iv_load_policy = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_iv_load_policy', false, '', true );
	$settings_for_youtube_block_option_playsinline = get_settings_for_youtube_block_options( 'settings_for_youtube_block_option_playsinline', false, '', true );
	$saved_settings_for_youtube_block_settings = get_settings_for_youtube_block_options( 'saved_settings_for_youtube_block_settings', false, '', true );
	$default_checks = true;
	if ( $saved_settings_for_youtube_block_settings ) {
		$default_checks = false;
	}
	?>

	<div class="wrap">
		<h1><?php _e( 'Settings for YouTube block', 'settings_for_youtube_block' ); ?></h1>
		<p><?php _e( 'The settings will affect all YouTube blocks.', 'settings_for_youtube_block' ); ?></p>
		<form method="post">
			<table class="form-table">
				<tr>
					<th>
						<?php _e( 'Basic settings', 'settings_for_youtube_block' ); ?>
					</th>
					<td>
						<fieldset>
							<label for="settings_for_youtube_block_option_modestbranding">
								<?php if ( $settings_for_youtube_block_option_modestbranding || $default_checks ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_modestbranding" id="settings_for_youtube_block_option_modestbranding" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Modest branding', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Lets you use a YouTube player that does not show a YouTube logo.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_rel">
								<?php if ( $settings_for_youtube_block_option_rel || $default_checks ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_rel" id="settings_for_youtube_block_option_rel" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Related', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Related videos will come from the same channel as the video that was just played.' , 'settings_for_youtube_block'); ?></small>
							</label>
							<br>
						</fieldset>
					</td>
				</tr>
				<tr>
					<th>
						<?php _e( 'Advanced settings', 'settings_for_youtube_block' ); ?>
					</th>
					<td>
						<fieldset>
							<label for="settings_for_youtube_block_option_lazy">
								<?php if ( $settings_for_youtube_block_option_lazy ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_lazy" id="settings_for_youtube_block_option_lazy" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Force lazy load', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Always lazy load YouTube videos.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_controls">
								<?php if ( $settings_for_youtube_block_option_controls ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_controls" id="settings_for_youtube_block_option_controls" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Disable controls', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Indicates whether the video player controls are displayed.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_disablekb">
								<?php if ( $settings_for_youtube_block_option_disablekb ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_disablekb" id="settings_for_youtube_block_option_disablekb" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Disable keyboard', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Causes the player to not respond to keyboard controls.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_enablejsapi">
								<?php if ( $settings_for_youtube_block_option_enablejsapi ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_enablejsapi" id="settings_for_youtube_block_option_enablejsapi" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Enable js API', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Enables the player to be controlled via IFrame Player API calls.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_fs">
								<?php if ( $settings_for_youtube_block_option_fs ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_fs" id="settings_for_youtube_block_option_fs" value="1"<?php echo $checked; ?>> 
									<?php _e( 'No fullscreen', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Prevents the fullscreen button from displaying in the player.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_iv_load_policy">
								<?php if ( $settings_for_youtube_block_option_iv_load_policy ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_iv_load_policy" id="settings_for_youtube_block_option_iv_load_policy" value="3"<?php echo $checked; ?>> 
									<?php _e( 'No annotations', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Causes video annotations to not be shown.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
							<label for="settings_for_youtube_block_option_playsinline">
								<?php if ( $settings_for_youtube_block_option_playsinline ) {
									$checked = ' checked';
								} else {
									$checked = '';
								} ?>
								<input type="checkbox" name="settings_for_youtube_block_option_playsinline" id="settings_for_youtube_block_option_playsinline" value="1"<?php echo $checked; ?>> 
									<?php _e( 'Inline on iOS', 'settings_for_youtube_block' ); ?>
									<br>
									<small><?php _e( 'Videos play inline in an HTML5 player on iOS.', 'settings_for_youtube_block' ); ?></small>
							</label>
							<br>
						</fieldset>
					</td>
				</tr>
			</table>
			<div class="submit">
				<input type="submit" name="save_settings_for_youtube_block_settings" value="<?php _e( 'Save Settings' , 'settings_for_youtube_block' ); ?>" class="button-primary" />
				&nbsp;&nbsp;&nbsp;<a href="#" class="js-reset-settings-settings-for-youtube-block"><?php _e( 'Reset to default', 'settings_for_youtube_block' ); ?></a>
			</div>
			<?php
				wp_nonce_field( 'settings_for_youtube_block_nonce_action', 'settings_for_youtube_block_nonce_name', false );
			?>
		</form>
	</div>
	<script>
		jQuery('.js-reset-settings-settings-for-youtube-block').click(function() {
		jQuery('input[type="checkbox"]').attr('checked', false);
		jQuery('#settings_for_youtube_block_option_modestbranding').attr('checked', true);
		jQuery('#settings_for_youtube_block_option_rel').attr('checked', true);
		jQuery('#settings_for_youtube_block_option_color').val('');
		jQuery('#wpbody-content form').submit();
		});
		jQuery(function() {
		    jQuery('.settings-for-youtube-block-color').wpColorPicker();
		});
	</script>
<?php
}

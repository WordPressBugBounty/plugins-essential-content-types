<?php

// Exit if accessed directly
if (! defined('ABSPATH')) exit;

/**
 * ctp_register_settings
 */
if (! function_exists('ctp_register_settings')) {
	function ctp_register_settings() // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- shared Catch Themes library, renaming would break backward compatibility.
	{
		// register_setting( $option_group, $option_name, $sanitize_callback )
		register_setting(
			'ctp-group',
			'ctp_options',
			array()
		);
	}
}
add_action('admin_init', 'ctp_register_settings');

if (! function_exists('ctp_get_options')) {
	/**
	 * Returns the options array for ctp_get options
	 *
	 *  @since    1.9
	 */
	function ctp_get_options() // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- shared Catch Themes library.
	{
		$defaults = ctp_default_options();
		$options  = get_option('ctp_options', $defaults);

		return wp_parse_args($options, $defaults);
	}
}

if (! function_exists('ctp_default_options')) {
	/**
	 * Return array of default options
	 *
	 * @since     1.9
	 * @return    string    1 or 2.
	 */
	function ctp_default_options($option = null) // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- shared Catch Themes library.
	{
		$default_options['theme_plugin_tabs'] = 1;
		if (null == $option) {
			return apply_filters('ctp_options', $default_options); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- shared Catch Themes library hook.
		} else {
			return $default_options[$option];
		}
	}
}

if (! function_exists('ctp_switch')) {
	/**
	 * Return $string
	 *
	 * @since     1.2
	 * @return    $string    1 or 2.
	 */
	function ctp_switch() // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- shared Catch Themes library.
	{
		// Check nonce before doing and changes.
		if ( ! check_ajax_referer( 'ctp_tabs_nonce', 'security', false ) ) {
			wp_die( esc_html__( 'Invalid Nonce', 'essential-content-types' ) );
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Permission denied!', 'essential-content-types' ) );
		}

		$value = ( isset( $_POST['value'] ) && 'true' === sanitize_text_field( wp_unslash( $_POST['value'] ) ) ) ? 1 : 0;

		$valid_keys  = array( 'theme_plugin_tabs' );
		$option_name = isset( $_POST['option_name'] ) ? sanitize_key( wp_unslash( $_POST['option_name'] ) ) : '';

		if ( ! in_array( $option_name, $valid_keys, true ) ) {
			wp_die( esc_html__( 'Invalid option.', 'essential-content-types' ) );
		}

		$option_value = ctp_get_options();

		$option_value[ $option_name ] = $value;

		if ( update_option( 'ctp_options', $option_value ) ) {
			echo esc_html( $value );
		} else {
			esc_html_e( 'Connection Error. Please try again.', 'essential-content-types' );
		}

		wp_die(); // this is required to terminate immediately and return a proper response
	}
}
add_action('wp_ajax_ctp_switch', 'ctp_switch');

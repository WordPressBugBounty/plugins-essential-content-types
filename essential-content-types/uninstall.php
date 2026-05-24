<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Content_Types
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$essential_content_types_options = array(
    'ect_portfolio',
    'ect_testimonial',
    'ect_featured_content',
);

if ( ! is_multisite() ) {
    // For Single site
    foreach ( $essential_content_types_options as $essential_content_types_option ) {
        delete_option( $essential_content_types_option );
    }
} else {
    // For Multisite
    $essential_content_types_sites = get_sites( array( 'fields' => 'ids', 'number' => 0 ) );

    foreach ( $essential_content_types_sites as $essential_content_types_blog_id ) {
        switch_to_blog( $essential_content_types_blog_id );
        foreach ( $essential_content_types_options as $essential_content_types_option ) {
            delete_site_option( $essential_content_types_option );
        }
        restore_current_blog();
    }
}

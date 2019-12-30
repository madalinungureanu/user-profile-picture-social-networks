<?php
/**
 * Uninstall script
 *
 * Uninstall script for User Profile Picture Social Networks.
 *
 * @package WordPress
 * @since 1.0.0
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}
delete_option( 'upp_enhanced_table_version' );

// For table removal.
global $wpdb;
$tablename = $wpdb->prefix . 'upp_social_networks';
$sql       = "drop table if exists $tablename";
$wpdb->query( $sql ); // phpcs:ignore

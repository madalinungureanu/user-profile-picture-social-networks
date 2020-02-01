<?php
/**
 * User Profile Picture Social Networks
 *
 * @package   User_Profile_Picture_Social_Networks
 * @copyright Copyright(c) 2019, MediaRon LLC
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 * Plugin Name: User Profile Picture Social Networks
 * Plugin URI: https://mediaron.com/user-profile-picture/social-networks/
 * Description: An add-on for User Profile Picture that allows social networks.
 * Version: 1.0.1
 * Author: MediaRon LLC
 * Author URI: https://mediaron.com
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: user-profile-picture-social-networks
 * Domain Path: languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_VERSION', '1.0.1' );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_PLUGIN_NAME', 'User Profile Picture Social Networks' );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_DIR', plugin_dir_path( __FILE__ ) );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_URL', plugins_url( '/', __FILE__ ) );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_SLUG', plugin_basename( __FILE__ ) );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_FILE', __FILE__ );
define( 'USER_PROFILE_PICTURE_SOCIAL_NETWORKS_TABLE_VERSION', '1.0.0' );

// Setup the plugin auto loader.
require_once 'php/autoloader.php';

/**
 * Admin notice for incompatible versions of PHP.
 */
function user_profile_picture_social_networks_php_version_error() {
	printf( '<div class="error"><p>%s</p></div>', esc_html( user_profile_picture_php_version_text() ) );
}

/**
 * String describing the minimum PHP version.
 *
 * "Namespace" is a PHP 5.3 introduced feature. This is a hard requirement
 * for the plugin structure.
 *
 * @return string
 */
function user_profile_picture_social_networks_php_version_text() {
	return __( 'User Profile Picture Enhanced plugin error: Your version of PHP is too old to run this plugin. You must be running PHP 5.4 or higher.', 'user-profile-picture-social-networks' );
}

// If the PHP version is too low, show warning and return.
if ( version_compare( phpversion(), '5.4', '<' ) ) {
	add_action( 'admin_notices', 'user_profile_picture_social_networks_php_version_error' );
	return;
}

/**
 * Get the plugin object.
 *
 * @return \User_Profile_Picture_Social_Networks\Plugin
 */
function user_profile_picture_social_networks() {
	static $instance;

	if ( null === $instance ) {
		$instance = new \User_Profile_Picture_Social_Networks\Plugin();
	}

	return $instance;
}

/**
 * Setup the plugin instance.
 */
user_profile_picture_social_networks()
	->set_basename( plugin_basename( __FILE__ ) )
	->set_directory( plugin_dir_path( __FILE__ ) )
	->set_file( __FILE__ )
	->set_slug( 'user-profile-picture-social-networks' )
	->set_url( plugin_dir_url( __FILE__ ) )
	->set_version( __FILE__ );

/**
 * Sometimes we need to do some things after the plugin is loaded, so call the Plugin_Interface::plugin_loaded().
 */
add_action( 'user_profile_picture_loaded', array( user_profile_picture_social_networks(), 'plugin_loaded' ), 20 );
add_action( 'init', 'user_profile_picture_social_networks_add_i18n' );

/**
 * Provide default options this plugin needs for User Profile Picture.
 *
 * @param array $defaults The default options for User Profile Picture.
 *
 * @return array New Defaults.
 */
function uppsn_option_defaults( $defaults ) {
	$defaults['font_awesome_admin']    = 'on';
	$defaults['font_awesome_frontend'] = 'off';
	return $defaults;
}
add_filter( 'mpp_options_defaults', 'uppsn_option_defaults', 5, 1 );

/**
 * Add i18n to User Profile Picture Enhanced.
 */
function user_profile_picture_social_networks_add_i18n() {
	load_plugin_textdomain( 'user-profile-picture-social-networks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Include Template functions.
require_once 'php/template-functions/get-social-networks.php';

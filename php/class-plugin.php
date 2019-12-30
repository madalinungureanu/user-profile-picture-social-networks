<?php
/**
 * Primary plugin file.
 *
 * @package   User_Profile_Picture_Social_Networks
 */

namespace User_Profile_Picture_Social_Networks;

/**
 * Class Plugin
 */
class Plugin extends Plugin_Abstract {
	/**
	 * Execute this once plugins are loaded.
	 */
	public function plugin_loaded() {

		// Register license and settings.
		$this->license_admin = new Admin\EDD_License_Settings();
		$this->license_admin->register_hooks();

		// Register post type for author box.
		$this->post_type_author_box = new Admin\Post_Type_Author_Box();
		$this->post_type_author_box->register_hooks();

		// Add quick links to the user profile pages.
		$this->user_quicklinks = new Admin\User_Quicklinks();
		$this->user_quicklinks->register_hooks();

		// Add quick links to the user profile pages.
		$this->user_title = new Admin\User_Title();
		$this->user_title->register_hooks();

		// Register option defaults.
		$this->admin_options = new Admin\Options();
		$this->admin_options->register_hooks();

		// Show social networks screen.
		$this->social_networks = new Admin\Social_Networks();
		$this->social_networks->register_hooks();

		// Load Rest API for Social Networks.
		$this->rest_get_social_networks = new Rest\Rest_Get_User_Social_Networks();
		$this->rest_get_social_networks->register_hooks();
	}
}

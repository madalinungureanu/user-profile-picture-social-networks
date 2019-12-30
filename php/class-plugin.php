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

		// Register option defaults.
		$this->admin_options = new Admin\Options();
		$this->admin_options->register_hooks();

		// Show social networks screen.
		$this->social_networks = new Admin\Social_Networks();
		$this->social_networks->register_hooks();

		// Load Rest API for Social Networks.
		$this->rest_get_social_networks = new Rest\Rest_Get_User_Social_Networks();
		$this->rest_get_social_networks->register_hooks();

		// Show social networks Block.
		$this->social_networks_block = new Blocks\Social_Networks();
		$this->social_networks_block->register_hooks();

		// Enqueue block assets.
		$this->block_enqueue = new Blocks\Enqueue();
		$this->block_enqueue->register_hooks();
	}
}

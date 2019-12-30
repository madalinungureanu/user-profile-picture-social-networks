<?php
/**
 * Add options to UPP and its defaults
 *
 * @package   User_Profile_Picture_Social_Networks
 */

namespace User_Profile_Picture_Social_Networks\Admin;

/**
 * Class Admin
 */
class Options {

	/**
	 * Initialize the Admin component.
	 */
	public function init() {

	}

	/**
	 * Register any hooks that this component needs.
	 */
	public function register_hooks() {
		add_action( 'mpp_user_profile_admin_settings_after_row', array( $this, 'output_font_awesome_options' ), 11, 1 );
	}

	/**
	 * Output the Font Awesome options for this plugin.
	 *
	 * @param array $options Options for the plugin.
	 */
	public function output_font_awesome_options( $options ) {
		?>
		<tr>
			<th scope="row"><?php esc_html_e( 'Font Awesome Options', 'user-profile-picture-social-networks' ); ?></th>
			<td>
				<input type="hidden" name="options[font_awesome_admin]" value="off" />
				<input id="font-awesome-admin" type="checkbox" value="on" name="options[font_awesome_admin]" <?php checked( 'on', $options['font_awesome_admin'] ); ?> /> <label for="font-awesome-admin"><?php esc_html_e( 'Allow Font Awesome 5 in the Admin Area?', 'user-profile-picture-social-networks' ); ?></label>
				<p class="description"><?php esc_html_e( 'Uncheck this box if you already have Font Awesome 5 running in the admin area of your site.', 'user-profile-picture-social-networks' ); ?></p>

				<input type="hidden" name="options[font_awesome_frontend]" value="off" />
				<input id="font-awesome-front-end" type="checkbox" value="on" name="options[font_awesome_frontend]" <?php checked( 'on', $options['font_awesome_frontend'] ); ?> /> <label for="font-awesome-front-end"><?php esc_html_e( 'Allow Font Awesome 5 on the front-end of your site?', 'user-profile-picture-social-networks' ); ?></label>
				<p class="description"><?php esc_html_e( 'Uncheck this box if you already have Font Awesome 5 running on the front-end of your site.', 'user-profile-picture-social-networks' ); ?></p>
			</td>
		</tr>
		<?php
	}
}

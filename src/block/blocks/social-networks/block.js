const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { Component, Fragment } = wp.element;
import edit from './edit';

/**
 * Register Basic Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made available as an option to any
 * editor interface where blocks are implemented.
 *
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'mpp/user-profile-picture-enhanced-social-networks', {
	title: __( 'Social Networks', 'user-profile-picture-social-networks' ), // Block title.
	icon: 'share-alt2',
	category: 'mpp',
	keywords: [
		__( 'profile', 'user-profile-picture-social-networks' ),
		__( 'social', 'user-profile-picture-social-networks' ),
		__( 'network', 'user-profile-picture-social-networks' ),
	],
	supports: {
		align: true
	},
	edit: edit,
	save() {return null }
} );
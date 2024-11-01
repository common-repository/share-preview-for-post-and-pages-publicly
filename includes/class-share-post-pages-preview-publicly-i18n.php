<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://profiles.wordpress.org/wpshrike
 * @since      1.0.0
 *
 * @package    Share_Post_Pages_Preview_Publicly
 * @subpackage Share_Post_Pages_Preview_Publicly/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Share_Post_Pages_Preview_Publicly
 * @subpackage Share_Post_Pages_Preview_Publicly/includes
 * @author     wpshrike <wpshrike@gmail.com>
 */
class Share_Post_Pages_Preview_Publicly_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'share-post-pages-preview-publicly',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

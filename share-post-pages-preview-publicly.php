<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       Preview posts / pages draft for Anonymous without publishing
 * Plugin URI:        share-post-pages-preview-publicly
 * Description:       Allow anonymous users to preview a draft of a posts/pages before it is published with a Link.
 * Version:           1.1.3
 * Author:            wpshrike
 * Author URI:        https://profiles.wordpress.org/wpshrike
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       share-post-pages-preview-publicly
 * Domain Path:       /languages
 */

 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SHARE_POST_PAGES_PREVIEW_PUBLICLY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-share-post-pages-preview-publicly-activator.php
 */
function activate_share_post_pages_preview_publicly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-share-post-pages-preview-publicly-activator.php';
	Share_Post_Pages_Preview_Publicly_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-share-post-pages-preview-publicly-deactivator.php
 */
function deactivate_share_post_pages_preview_publicly() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-share-post-pages-preview-publicly-deactivator.php';
	Share_Post_Pages_Preview_Publicly_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_share_post_pages_preview_publicly' );
register_deactivation_hook( __FILE__, 'deactivate_share_post_pages_preview_publicly' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-share-post-pages-preview-publicly.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_share_post_pages_preview_publicly() {

	$plugin = new Share_Post_Pages_Preview_Publicly();
	$plugin->run();

}
run_share_post_pages_preview_publicly();

<?php

/**
 * Plugin Name:       WPMS Cron List
 * Plugin URI:        http://klandestino.se
 * Description:       Creates a file with a list of url's to all wp-cron-files in a WPMS installation. Useful if you've disabled wp-cron and are running an external cronjob. The file will be located at mydomain.com/wp-content/uploads/wpms_cron_list.txt
 * Version:           0.1
 * Author:            lakrisgubben
 * Author URI:        http://klandestino.se
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Network:	true
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Return the path to the file with the cron list
 */
function wpms_cron_list_get_file_path() {
	$upload_dir = wp_upload_dir();

	$filepath = $upload_dir['basedir'] . '/wpms_cron_list.txt';

	return $filepath;
}

/**
 * Remove the file on plugin deactivation
 */
function deactivate_wpms_cron_list() {
	unlink( wpms_cron_list_get_file_path() );
}

register_activation_hook( __FILE__, 'wpms_cron_list_create_list_file' );
register_deactivation_hook( __FILE__, 'deactivate_wpms_cron_list' );
add_action( 'refresh_blog_details', 'wpms_cron_list_create_list_file' );

/**
 * Create a list of all wp-cron url's in the MS-installation
 * Put list in file found at mydomain.com/wp-content/uploads/wpms_cron_list.txt
 */
function wpms_cron_list_create_list_file() {
	if ( function_exists( 'wp_get_sites' ) ) :
		$sites = wp_get_sites( array(
			'public' => 1,
			'spam'       => 0,
			'deleted'    => 0,
			'archived' => 0,
			'limit' => 9999 //max number of sites where wp_is_large_network still === false
		) );

		foreach ( $sites as $site ) {
			$urls[] .=  get_blog_details( $site['blog_id'] )->siteurl . '/wp-cron.php';
		}

		file_put_contents( wpms_cron_list_get_file_path(), implode( "\n", $urls ) );
	endif;
}
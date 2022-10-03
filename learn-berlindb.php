<?php
/**
 * Plugin Name: Learn BerlinDB
 * Description: LL
 * Requires at least: 5.9
 * Requires PHP: 5.6
 * Version: 1.0.0
 * Author: Bruno
 * Text Domain: lbdb
 */

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fetches the instance of the plugin.
 * This function makes it possible to access everything else in this plugin.
 * It will automatically initiate the plugin, if necessary.
 * It also handles autoloading for any class in the plugin.
 *
 * @since 1.0.0
 *
 * @return \Underpin\Factories\Underpin_Instance The bootstrap for this plugin.
 */
function learn_berlindb() {
	return Underpin::make_class( [
		'root_namespace'      => 'Lbdb',
		'text_domain'         => 'lbdb',
		'minimum_php_version' => '7.0',
		'minimum_wp_version'  => '5.1',
		'version'             => '1.0.0',
		'setup_callback' => function( $instance ) {
			$instance->berlin_db()->add('books', [
				'table'             => 'Lbdb\Books_Table',
				'schema'            => 'Lbdb\Books_Schema',
				'query'             => 'Lbdb\Book_Query',
				'name'              => 'Books',
				'description'       => 'Book data, including ISBN and author.',
				'sanitize_callback' => function( $key, $value ){
					return $value;
				}
			]);
		}
	] )->get( __FILE__ );
}

learn_berlindb();

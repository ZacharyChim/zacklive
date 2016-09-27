<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package zacklive
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function zacklive_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'zacklive_jetpack_setup' );
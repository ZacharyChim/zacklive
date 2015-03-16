<?php
/**
 * zacklive functions and definitions
 *
 * @package zacklive
 */
require_once( 'library/cleanup.php' );
require_once( 'library/comment-form.php' );
require_once( 'library/enqueues.php' );
require_once( 'library/nav.php' );
require_once( 'library/setup.php' );
require_once( 'library/widgets.php' );

require_once( 'library/html_tag_schema.php' );

require_once( 'library/zacklive_attachment_image.php' );
require_once( 'library/zacklive_comment.php' );
require_once( 'library/zacklive_paginate.php' );
require_once( 'library/zacklive_post_nav.php' );
require_once( 'library/zacklive_password_form.php' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 750; /* pixels */
}

if ( ! function_exists( 'zacklive_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
    function zacklive_setup() {

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Zack Live, use a find and replace
         * to change 'zacklive' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'zacklive', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'zacklive' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ) );

        /**
         * Setup the WordPress core custom background feature.
        */
        add_theme_support( 'custom-background', apply_filters( 'zacklive_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif; // zacklive_setup
add_action( 'after_setup_theme', 'zacklive_setup' );
?>

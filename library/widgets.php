<?php
/**
 * Register widgetized area and update sidebar with default widgets
 */
function zacklive_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'zacklive' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'zacklive_widgets_init' );
?>
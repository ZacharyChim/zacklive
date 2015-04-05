<?php
// category feeds
remove_action( 'wp_head', 'feed_links_extra', 3 );
// post and comment feeds
remove_action( 'wp_head', 'feed_links', 2 );
// EditURI link
remove_action( 'wp_head', 'rsd_link' );
// windows live writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// WP version
remove_action( 'wp_head', 'wp_generator' );
// remove WP version from RSS
add_filter( 'the_generator', 'zacklive_rss_version' );
// remove WP version from css
add_filter( 'style_loader_src', 'zacklive_remove_wp_ver_css_js', 9999 );
// remove Wp version from scripts
add_filter( 'script_loader_src', 'zacklive_remove_wp_ver_css_js', 9999 );
// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'zacklive_remove_wp_widget_recent_comments_style', 1 );
// clean up gallery output in wp
add_filter( 'gallery_style', 'zacklive_gallery_style' );
// clean up comment styles in the head
add_action( 'wp_head', 'zacklive_remove_recent_comments_style', 1 );
// cleaning up random code around images
add_filter( 'the_content', 'zacklive_filter_ptags_on_images' );
// Read more text > bootstrap button
add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

// remove WP version from RSS
function zacklive_rss_version() { return ''; }

// remove WP version from scripts
function zacklive_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function zacklive_remove_wp_widget_recent_comments_style() {
   if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
      remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from gallery
function zacklive_gallery_style($css) {
  return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// remove injected CSS from recent comments widget
function zacklive_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function zacklive_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Read more text > bootstrap button
function my_more_link( $link, $link_button ) {

    return str_replace( $link_button, '<p><a href="' . get_permalink() . '" class="readmore btn btn-sm btn-primary ">' . __( 'Read More', 'nonewz' ) . ' </a> </p>', $link );
}

/*
Filter to remove comment author website link. Use this if you wish to cut down the amount of spammers in your comments (while retaining the "Your website" comment field).
See http://www.wpsquare.com/remove-comment-author-website-link-wordpress/

function author_link(){
    global $comment;
    $comment_ID = $comment->user_id;
    $author = get_comment_author( $comment_ID );
    $url = get_comment_author_url( $comment_ID );
    if ( empty( $url ) || 'http://' == $url )
        $return = $author;
    else
        $return = "$author";
    return $return;
}
add_filter('get_comment_author_link', 'author_link');
*/
?>

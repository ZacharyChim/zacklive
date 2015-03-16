<?php
if ( ! ( function_exists( 'html_tag_schema' ) ) ):
/*
 * Schema for HTML, used in header.php
 * Used in header.php
 */
function html_tag_schema() {
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single()) {
        $type = "Article";
    }

    if(is_home()) {
        $type = "BlogPage";
    }

    // Is author page
    elseif( is_author() ) {
        $type = 'ProfilePage';
    }

    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}
endif;
?>

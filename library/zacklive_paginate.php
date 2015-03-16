<?php
if ( ! function_exists( 'zacklive_paginate' ) ) :
// Bootstrap Style Pagination
// http://www.ericmmartin.com/pagination-function-for-wordpress/
function zacklive_paginate($args = null) {
    $defaults = array(
        'page' => null, 'pages' => null,
        'range' => 3, 'gap' => 3, 'anchor' => 1,
        'before' => '<ul class="pagination">', 'after' => '</ul>',
        'nextpage' => __('&raquo;', 'zacklive'), 'previouspage' => __('&laquo', 'zacklive'),
        'echo' => 1
    );

  $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);

    if (!$page && !$pages) {
        global $wp_query;

        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;

        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }

    $output = "";
    if ($pages > 1) {
        $output .= "$before";
        $ellipsis = "<li><span>...</span></li>";

        if ($page > 1 && !empty($previouspage)) {
            $output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
        }

        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s',
                zacklive_paginate_loop(1, $anchor),
                $ellipsis,
                zacklive_paginate_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s',
                zacklive_paginate_loop(1, $anchor),
                $ellipsis,
                zacklive_paginate_loop($block_min, $block_high, $page),
                $ellipsis,
                zacklive_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s',
                zacklive_paginate_loop(1, $block_high, $page),
                $ellipsis,
                zacklive_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= zacklive_paginate_loop(1, $pages, $page);
        }

        if ($page < $pages && !empty($nextpage)) {
            $output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
        }

        $output .= $after;
    }

    if ($echo) {
        echo $output;
    }

    return $output;
}
endif;

if ( ! function_exists( 'zacklive_paginate_loop' ) ) :
/**
 * Helper function for pagination which builds the page links.
 *
 */
function zacklive_paginate_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i))
            ? "<li><span class='active'>$i</span></li>"
            : "<li><a href='" . get_pagenum_link($i) . "' class=''>$i</a></li>";
    }
    return $output;
} // end Bootstrap Style Pagination
endif;
?>

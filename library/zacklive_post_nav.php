<?php
if ( ! function_exists( 'zacklive_post_nav' ) ) :
/**
 * Single Post Nav.
 */
function zacklive_post_nav() {

  $trunc_limit = 30;
  ?>
  <nav class="navigation post-navigation" role="navigation">
      <h2 class="screen-reader-text"><?php _e( 'Post navigation', 'zacklive' ); ?></h2>
      <ul class="pager">

      <?php if( '' != get_previous_post() ) { ?>
        <li class="previous">
          <?php previous_post_link( '<span class="nav-previous">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'zacklive' ) . '&nbsp;' . zacklive_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
        </li>
      <?php } // end if ?>

      <?php if( '' != get_next_post() ) { ?>
        <li class="next">
          <?php next_post_link( '<span class="no-previous-page-link nav-next">%link</span>', '&nbsp;' . zacklive_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'zacklive' ) ); ?>
        </li>
      <?php } // end if ?>

      </ul><!-- .pager -->
  </nav><!-- .navigation -->
<?php
} // end single post nav
endif;

if ( ! function_exists( 'zacklive_truncate_text' ) ) :
/**
 * Truncate Text helper for single post nav.
 */
function zacklive_truncate_text( $string, $character_limit = 50, $truncation_indicator = '...' ) {

        $truncated = null == $string ? '' : $string;
    if ( strlen( $string ) >= ( $character_limit + 1 ) ) {

        $truncated = substr( $string, 0, $character_limit );

        if ( substr_count( $truncated, ' ') > 1 ) {
            $last_space = strrpos( $truncated, ' ' );
            $truncated = substr( $truncated, 0, $last_space );
        } // end if

        $truncated = $truncated . $truncation_indicator;

    } // end if/else

    return $truncated;

} // end zacklive_truncate_text
endif;
?>

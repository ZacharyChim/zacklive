<?php
if ( ! function_exists( 'zacklive_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function zacklive_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;

  if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
    <div class="comment-body">
      <?php _e( 'Pingback:', 'zacklive' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'zacklive' ), '<span class="edit-link">', '</span>' ); ?>
    </div>

  <?php else : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media" itemscope="itemscope" itemtype="http://schema.org/UserComments">
      <a class="pull-left" href="#" itemprop="image">
        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
      </a>

      <div class="media-body">
        <div class="media-body-wrap panel panel-default">

          <div class="panel-heading">
            <h5 class="media-heading" itemprop="name"><?php printf( __( '%s <span class="says">says:</span>', 'zacklive' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h5>
            <div class="comment-meta">
              <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <time datetime="<?php comment_time( 'c' ); ?>" itemprop="commentTime">
                  <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'zacklive' ), get_comment_date(), get_comment_time() ); ?>
                </time>
              </a>
              <?php edit_comment_link( __( '<span" class="fa fa-edit"></span> Edit', 'zacklive' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
          </div>

          <?php if ( '0' == $comment->comment_approved ) : ?>
            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'zacklive' ); ?></p>
          <?php endif; ?>

          <div class="comment-content panel-body" itemprop="commentText">
            <?php comment_text(); ?>
          </div><!-- .comment-content -->

          <?php comment_reply_link(
            array_merge(
              $args, array(
                'add_below' => 'div-comment',
                'depth'   => $depth,
                'max_depth' => $args['max_depth'],
                'before'  => '<footer class="reply comment-reply panel-footer">',
                'after'   => '</footer><!-- .reply -->'
              )
            )
          ); ?>

        </div>
      </div><!-- .media-body -->

    </article><!-- .comment-body -->

  <?php
  endif;
}
endif; // ends check for zacklive_comment()
?>

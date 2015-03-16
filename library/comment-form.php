<?php
// Customized Comment Form
function zacklive_comment_form($args) {
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $args['fields'] = array(
        'author' => '
            <div class="comment-form-author form-group">
                <input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' placeholder="' . __( 'Your Name', 'zacklive' ) . ( $req ? '*' : '' ) . '" />
            </div>
        ',

        'email' => '
            <div class="comment-form-email form-group">
                <input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .    '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' placeholder="' . __( 'Your Email', 'zacklive' ) . ( $req ? '*' : '' ) . '" />
            </div>
        ',

        'url' => '
            <div class="comment-form-url last form-group">
                <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Your Website', 'zacklive' ) . '" />
            </div>
        '
    );
    $args['comment_notes_before'] = "";
    $args['comment_notes_after'] = '';
    $args['label_submit'] = "Submit";
    $args['comment_field'] = '
        <div class="comment-form-comment form-group">
            <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" placeholder="'. __( 'Your Comment Here ...', 'zacklive' ) .'" tabindex="4"></textarea>
        </div>
    ';
    return $args;
}

add_filter('comment_form_defaults', 'zacklive_comment_form');
?>

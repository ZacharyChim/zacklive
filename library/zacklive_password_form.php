<?php
if ( ! function_exists( 'zacklive_password_form' ) ) :
/**
 * Bootstrap style for password input adn submit button for password protected post.
 *
 */
function zacklive_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form-inline">
    ' . __( "This content is password protected. To view it please enter your password below:" ) . '
    <label for="' . $label . '">' . __( "Password: " ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control" /><input type="submit" class="btn btn-default" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'zacklive_password_form' );
endif;
?>

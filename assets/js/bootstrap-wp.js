jQuery(document).ready(function($) { //noconflict wrapper
    //Bootstrap style button for comment submit button.
    $('#commentform input#submit').addClass('btn btn-primary');
    // Bootstrap style button for comment reply link.
    $( '.comment-reply-link' ).addClass( 'btn btn-primary' );
    // Bootstrap style for SELECT
    $( type="select" ).addClass( 'form-control' );
    // Bootstrap style for Tables
    $( 'table' ).addClass( 'table' );
    // FitVids for responsive videos. Target your .container, .wrapper, .post, etc.
    $(".post, .comment-content").fitVids();
});//end noconflict

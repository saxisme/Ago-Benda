jQuery( document ).ready( function( $ ) {
    // Relocate Jetpack sharing buttons down into the comments form
    $( '.share-facebook span' ).replaceWith( '<span>f</span>' );
    $( '.share-twitter span' ).replaceWith( '<span>l</span>' );
    $( '.share-linkedin span' ).replaceWith( '<span>i</span>' );
    $( '.share-google-plus-1 span' ).replaceWith( '<span>g</span>' );
    $( '.share-pinterest span' ).replaceWith( '<span>&amp;</span>' );
} );
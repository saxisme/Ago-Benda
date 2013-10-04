//Jetpack Contact Form placeholders
jQuery(document).ready(function(){
	//Jetpack Contact Form Placeholder Values
	jQuery('.contact-form input.name').attr('placeholder', 'Name*');
	jQuery('.contact-form input.email').attr('placeholder', 'Email*');
	jQuery('.contact-form input.url').attr('placeholder', 'Website');
	jQuery('.contact-form textarea').attr('placeholder', 'Comment*');

});

//Jetpack Social Icons
jQuery( document ).ready( function( $ ) {
    // Relocate Jetpack sharing buttons down into the comments form
    $( '.share-facebook span' ).replaceWith( '<span>f</span>' );
    $( '.share-twitter span' ).replaceWith( '<span>l</span>' );
    $( '.share-linkedin span' ).replaceWith( '<span>i</span>' );
    $( '.share-google-plus-1 span' ).replaceWith( '<span>g</span>' );
    $( '.share-pinterest span' ).replaceWith( '<span>&amp;</span>' );
    $('.sharedaddy').css("visibility","visible");

} );

//Smooth Back to Top Effect
//http://www.wpbeginner.com/wp-themes/how-to-add-a-smooth-scroll-to-top-effect-in-wordpress-using-jquery/
jQuery(document).ready(function($){
	$(window).scroll(function(){
        if ($(this).scrollTop() < 200) {
			$('#smoothup') .fadeOut();
        } else {
			$('#smoothup') .fadeIn();
        }
    });
	$('#smoothup').on('click', function(){
		$('html, body').animate({scrollTop:0}, 'fast');
		return false;
		});
});

//Lightbox effect with Fancybox/Swipebox
jQuery(document).ready(function(){
    //Fancybox
    //jQuery("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('class', 'gallery').fancybox();

    //Swipebox
    jQuery(".swipebox").swipebox();
});

//Video
jQuery(document).ready(function($){
    //Fluid Width Video
    //http://css-tricks.com/NetMag/FluidWidthVideo/demo.php
    $(function() {
        
        var $allVideos = $("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com'], object, embed"),
        $fluidEl = $("figure");
                
        $allVideos.each(function() {
        
          $(this)
            // jQuery .data does not work on object/embed elements
            .attr('data-aspectRatio', this.height / this.width)
            .removeAttr('height')
            .removeAttr('width');
        
        });
        
        $(window).resize(function() {
        
          var newWidth = $fluidEl.width();
          $allVideos.each(function() {
          
            var $el = $(this);
            $el
                .width(newWidth)
                .height(newWidth * $el.attr('data-aspectRatio'));
          
          });
        
        }).resize();

    });
});
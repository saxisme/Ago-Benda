//Jetpack Contact Form placeholders
jQuery(document).ready(function(){

	//Jetpack Contact Form Placeholder Values
	jQuery('.contact-form input.name').attr('placeholder', 'Name*');
	jQuery('.contact-form input.email').attr('placeholder', 'Email*');
	jQuery('.contact-form input.url').attr('placeholder', 'Website');
	jQuery('.contact-form textarea').attr('placeholder', 'Comment*');


});

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

jQuery(document).ready(function($){
	$(window).resize(function(){ $('#iso-loop').isotope('reLayout'); });
});

//Lightbox effect with Fancybox
jQuery(document).ready(function(){
    jQuery("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('class', 'gallery').fancybox();
});
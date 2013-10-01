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

	var $container = $('#iso-loop')

	// set column number
	setColumns();

	// rerun function when window is resized 
	$(window).on('resize', function() {
	  setColumns();
	});

	// the function to decide the number of columns
	function setColumns() {
	  if($(window).width() <= 797) {
	    columns = 2;
	  } else if ($(window).width() <= 450) {
	    columns = 1;
	  } else {
	    columns = 3;
	  }
	}
	// initialize Isotope
	$container.isotope({
	  // options...
	  resizable: false, // disable normal resizing
	  // set columnWidth to a percentage of container width
	  masonry: { columnWidth: $container.width() / columns }
	});

	// update columnWidth on window resize
	$(window).smartresize(function(){
	  $container.isotope({
	    // update columnWidth to a percentage of container width
	    masonry: { columnWidth: $container.width() / columns }
	  });
	});

	$(window).resize(function(){ $('#iso-loop').isotope('reLayout'); });



});

//Lightbox effect with Fancybox
jQuery(document).ready(function(){
    jQuery("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").attr('class', 'gallery').fancybox();
});
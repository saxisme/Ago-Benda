//Isotope
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
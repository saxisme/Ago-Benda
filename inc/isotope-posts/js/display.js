(function ($) {
	"use strict";
	$(function () {
		
		var $container = $('#iso-loop');
		
		$container.imagesLoaded( function(){
			$('#iso-loop').isotope({
				itemSelector : '.iso-post',
				layoutMode : iso_vars.iso_layout,
				getSortData : {
					name : function ( $elem ) {
						return $elem.find('.iso-title').text();
					}
				},
				sortBy : iso_vars.iso_sortby
			});
		$container.isotope( 'reloadItems' );
		});
		
		$('#filters a').click(function(){
			var selector = $(this).attr('data-filter'); 
			$container.isotope({ filter: selector });
			return false;			
		});

		var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

	      $optionLinks.click(function(){
	        var $this = $(this);
	        // don't proceed if already selected
	        if ( $this.hasClass('selected') ) {
	          return false;
	        }
	        var $optionSet = $this.parents('.option-set');
	        $optionSet.find('.selected').removeClass('selected');
	        $this.addClass('selected');
	  
	        // make option object dynamically, i.e. { filter: '.my-filter-class' }
	        var options = {},
	            key = $optionSet.attr('data-option-key'),
	            value = $this.attr('data-option-value');
	        // parse 'false' as false boolean
	        value = value === 'false' ? false : value;
	        options[ key ] = value;
	        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	          // changes in layout modes need extra logic
	          changeLayoutMode( $this, options )
	        } else {
	          // otherwise, apply new options
	          $container.isotope( options );
	        }
	        
	        return false;
      	});
		
	});
}(jQuery));
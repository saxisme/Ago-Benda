(function(e){"use strict";e(function(){var t=e("#iso-loop");t.imagesLoaded(function(){e("#iso-loop").isotope({itemSelector:".iso-post",layoutMode:iso_vars.iso_layout,getSortData:{name:function(e){return e.find(".iso-title").text()}},sortBy:iso_vars.iso_sortby})});e("#filters a").click(function(){var n=e(this).attr("data-filter");t.isotope({filter:n});return!1});var n=e("#options .option-set"),r=n.find("a");r.click(function(){var n=e(this);if(n.hasClass("selected"))return!1;var r=n.parents(".option-set");r.find(".selected").removeClass("selected");n.addClass("selected");var i={},s=r.attr("data-option-key"),o=n.attr("data-option-value");o=o==="false"?!1:o;i[s]=o;s==="layoutMode"&&typeof changeLayoutMode=="function"?changeLayoutMode(n,i):t.isotope(i);return!1})})})(jQuery);
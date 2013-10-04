/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */(function(){var e,t,n;e=document.getElementById("site-navigation");if(!e)return;t=e.getElementsByTagName("h1")[0];if("undefined"==typeof t)return;n=e.getElementsByTagName("ul")[0];if("undefined"==typeof n){t.style.display="none";return}-1===n.className.indexOf("nav-menu")&&(n.className+=" nav-menu");t.onclick=function(){-1!==e.className.indexOf("toggled")?e.className=e.className.replace(" toggled",""):e.className+=" toggled"}})();(function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;if((e||t||n)&&"undefined"!=typeof document.getElementById){var r=window.addEventListener?"addEventListener":"attachEvent";window[r]("hashchange",function(){var e=document.getElementById(location.hash.substring(1));if(e){/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1);e.focus()}},!1)}})();jQuery(document).ready(function(){jQuery(".contact-form input.name").attr("placeholder","Name*");jQuery(".contact-form input.email").attr("placeholder","Email*");jQuery(".contact-form input.url").attr("placeholder","Website");jQuery(".contact-form textarea").attr("placeholder","Comment*")});jQuery(document).ready(function(e){e(".share-facebook span").replaceWith("<span>f</span>");e(".share-twitter span").replaceWith("<span>l</span>");e(".share-linkedin span").replaceWith("<span>i</span>");e(".share-google-plus-1 span").replaceWith("<span>g</span>");e(".share-pinterest span").replaceWith("<span>&amp;</span>");e(".sharedaddy").css("visibility","visible")});jQuery(document).ready(function(e){e(window).scroll(function(){e(this).scrollTop()<200?e("#smoothup").fadeOut():e("#smoothup").fadeIn()});e("#smoothup").on("click",function(){e("html, body").animate({scrollTop:0},"fast");return!1})});jQuery(document).ready(function(){jQuery(".swipebox").swipebox()});jQuery(document).ready(function(e){e(function(){var t=e("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com'], object, embed"),n=e("figure");t.each(function(){e(this).attr("data-aspectRatio",this.height/this.width).removeAttr("height").removeAttr("width")});e(window).resize(function(){var r=n.width();t.each(function(){var t=e(this);t.width(r).height(r*t.attr("data-aspectRatio"))})}).resize()})});(function(e,t,n,r){n.swipebox=function(i,s){var o={useCSS:!0,initialIndexOnArray:0,hideBarsDelay:2e3,videoMaxWidth:1140,vimeoColor:"CCCCCC",beforeOpen:null,afterClose:null},u=this,a=[],i=i,f=i.selector,l=n(f),c=t.createTouch!==r||"ontouchstart"in e||"onmsgesturechange"in e||navigator.msMaxTouchPoints,h=!!e.SVGSVGElement,p=e.innerWidth?e.innerWidth:n(e).width(),d=e.innerHeight?e.innerHeight:n(e).height(),v='<div id="swipebox-overlay">				<div id="swipebox-slider"></div>				<div id="swipebox-caption"></div>				<div id="swipebox-action">					<a id="swipebox-close"></a>					<a id="swipebox-prev"></a>					<a id="swipebox-next"></a>				</div>		</div>';u.settings={};u.init=function(){u.settings=n.extend({},o,s);if(n.isArray(i)){a=i;m.target=n(e);m.init(u.settings.initialIndexOnArray)}else l.click(function(e){a=[];var t,r,i;if(!i){r="rel";i=n(this).attr(r)}i&&i!==""&&i!=="nofollow"?$elem=l.filter("["+r+'="'+i+'"]'):$elem=n(f);$elem.each(function(){var e=null,t=null;n(this).attr("title")&&(e=n(this).attr("title"));n(this).attr("href")&&(t=n(this).attr("href"));a.push({href:t,title:e})});t=$elem.index(n(this));e.preventDefault();e.stopPropagation();m.target=n(e.target);m.init(t)})};u.refresh=function(){if(!n.isArray(i)){m.destroy();$elem=n(f);m.actions()}};var m={init:function(e){u.settings.beforeOpen&&u.settings.beforeOpen();this.target.trigger("swipebox-start");n.swipebox.isOpen=!0;this.build();this.openSlide(e);this.openMedia(e);this.preloadMedia(e+1);this.preloadMedia(e-1)},build:function(){var e=this;n("body").append(v);if(e.doCssTrans()){n("#swipebox-slider").css({"-webkit-transition":"left 0.4s ease","-moz-transition":"left 0.4s ease","-o-transition":"left 0.4s ease","-khtml-transition":"left 0.4s ease",transition:"left 0.4s ease"});n("#swipebox-overlay").css({"-webkit-transition":"opacity 1s ease","-moz-transition":"opacity 1s ease","-o-transition":"opacity 1s ease","-khtml-transition":"opacity 1s ease",transition:"opacity 1s ease"});n("#swipebox-action, #swipebox-caption").css({"-webkit-transition":"0.5s","-moz-transition":"0.5s","-o-transition":"0.5s","-khtml-transition":"0.5s",transition:"0.5s"})}if(h){var t=n("#swipebox-action #swipebox-close").css("background-image");t=t.replace("png","svg");n("#swipebox-action #swipebox-prev,#swipebox-action #swipebox-next,#swipebox-action #swipebox-close").css({"background-image":t})}n.each(a,function(){n("#swipebox-slider").append('<div class="slide"></div>')});e.setDim();e.actions();e.keyboard();e.gesture();e.animBars();e.resize()},setDim:function(){var t,r,i={};if("onorientationchange"in e)e.addEventListener("orientationchange",function(){if(e.orientation==0){t=p;r=d}else if(e.orientation==90||e.orientation==-90){t=d;r=p}},!1);else{t=e.innerWidth?e.innerWidth:n(e).width();r=e.innerHeight?e.innerHeight:n(e).height()}i={width:t,height:r};n("#swipebox-overlay").css(i)},resize:function(){var t=this;n(e).resize(function(){t.setDim()}).resize()},supportTransition:function(){var e="transition WebkitTransition MozTransition OTransition msTransition KhtmlTransition".split(" ");for(var n=0;n<e.length;n++)if(t.createElement("div").style[e[n]]!==r)return e[n];return!1},doCssTrans:function(){if(u.settings.useCSS&&this.supportTransition())return!0},gesture:function(){if(c){var e=this,t=null,r=10,i={},s={},o=n("#swipebox-caption, #swipebox-action");o.addClass("visible-bars");e.setTimeout();n("body").bind("touchstart",function(e){n(this).addClass("touching");s=e.originalEvent.targetTouches[0];i.pageX=e.originalEvent.targetTouches[0].pageX;n(".touching").bind("touchmove",function(e){e.preventDefault();e.stopPropagation();s=e.originalEvent.targetTouches[0]});return!1}).bind("touchend",function(u){u.preventDefault();u.stopPropagation();t=s.pageX-i.pageX;if(t>=r)e.getPrev();else if(t<=-r)e.getNext();else if(!o.hasClass("visible-bars")){e.showBars();e.setTimeout()}else{e.clearTimeout();e.hideBars()}n(".touching").off("touchmove").removeClass("touching")})}},setTimeout:function(){if(u.settings.hideBarsDelay>0){var t=this;t.clearTimeout();t.timeout=e.setTimeout(function(){t.hideBars()},u.settings.hideBarsDelay)}},clearTimeout:function(){e.clearTimeout(this.timeout);this.timeout=null},showBars:function(){var e=n("#swipebox-caption, #swipebox-action");if(this.doCssTrans())e.addClass("visible-bars");else{n("#swipebox-caption").animate({top:0},500);n("#swipebox-action").animate({bottom:0},500);setTimeout(function(){e.addClass("visible-bars")},1e3)}},hideBars:function(){var e=n("#swipebox-caption, #swipebox-action");if(this.doCssTrans())e.removeClass("visible-bars");else{n("#swipebox-caption").animate({top:"-50px"},500);n("#swipebox-action").animate({bottom:"-50px"},500);setTimeout(function(){e.removeClass("visible-bars")},1e3)}},animBars:function(){var e=this,t=n("#swipebox-caption, #swipebox-action");t.addClass("visible-bars");e.setTimeout();n("#swipebox-slider").click(function(n){if(!t.hasClass("visible-bars")){e.showBars();e.setTimeout()}});n("#swipebox-action").hover(function(){e.showBars();t.addClass("force-visible-bars");e.clearTimeout()},function(){t.removeClass("force-visible-bars");e.setTimeout()})},keyboard:function(){var t=this;n(e).bind("keyup",function(e){e.preventDefault();e.stopPropagation();e.keyCode==37?t.getPrev():e.keyCode==39?t.getNext():e.keyCode==27&&t.closeSlide()})},actions:function(){var e=this;if(a.length<2)n("#swipebox-prev, #swipebox-next").hide();else{n("#swipebox-prev").bind("click touchend",function(t){t.preventDefault();t.stopPropagation();e.getPrev();e.setTimeout()});n("#swipebox-next").bind("click touchend",function(t){t.preventDefault();t.stopPropagation();e.getNext();e.setTimeout()})}n("#swipebox-close").bind("click touchend",function(t){e.closeSlide()})},setSlide:function(e,t){t=t||!1;var r=n("#swipebox-slider");this.doCssTrans()?r.css({left:-e*100+"%"}):r.animate({left:-e*100+"%"});n("#swipebox-slider .slide").removeClass("current");n("#swipebox-slider .slide").eq(e).addClass("current");this.setTitle(e);t&&r.fadeIn();n("#swipebox-prev, #swipebox-next").removeClass("disabled");e==0?n("#swipebox-prev").addClass("disabled"):e==a.length-1&&n("#swipebox-next").addClass("disabled")},openSlide:function(t){n("html").addClass("swipebox");n(e).trigger("resize");this.setSlide(t,!0)},preloadMedia:function(e){var t=this,n=null;a[e]!==r&&(n=a[e].href);t.isVideo(n)?t.openMedia(e):setTimeout(function(){t.openMedia(e)},1e3)},openMedia:function(e){var t=this,i=null;a[e]!==r&&(i=a[e].href);if(e<0||e>=a.length)return!1;t.isVideo(i)?n("#swipebox-slider .slide").eq(e).html(t.getVideo(i)):t.loadMedia(i,function(){n("#swipebox-slider .slide").eq(e).html(this)})},setTitle:function(e,t){var i=null;n("#swipebox-caption").empty();a[e]!==r&&(i=a[e].title);i&&n("#swipebox-caption").append(i)},isVideo:function(e){if(e)if(e.match(/youtube\.com\/watch\?v=([a-zA-Z0-9\-_]+)/)||e.match(/vimeo\.com\/([0-9]*)/))return!0},getVideo:function(e){var t="",n="",r=e.match(/watch\?v=([a-zA-Z0-9\-_]+)/),i=e.match(/vimeo\.com\/([0-9]*)/);r?t='<iframe width="560" height="315" src="//www.youtube.com/embed/'+r[1]+'" frameborder="0" allowfullscreen></iframe>':i&&(t='<iframe width="560" height="315"  src="http://player.vimeo.com/video/'+i[1]+"?byline=0&amp;portrait=0&amp;color="+u.settings.vimeoColor+'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');return'<div class="swipebox-video-container" style="max-width:'+u.settings.videomaxWidth+'px"><div class="swipebox-video">'+t+"</div></div>"},loadMedia:function(e,t){if(!this.isVideo(e)){var r=n("<img>").on("load",function(){t.call(r)});r.attr("src",e)}},getNext:function(){var e=this;index=n("#swipebox-slider .slide").index(n("#swipebox-slider .slide.current"));if(index+1<a.length){index++;e.setSlide(index);e.preloadMedia(index+1)}else{n("#swipebox-slider").addClass("rightSpring");setTimeout(function(){n("#swipebox-slider").removeClass("rightSpring")},500)}},getPrev:function(){index=n("#swipebox-slider .slide").index(n("#swipebox-slider .slide.current"));if(index>0){index--;this.setSlide(index);this.preloadMedia(index-1)}else{n("#swipebox-slider").addClass("leftSpring");setTimeout(function(){n("#swipebox-slider").removeClass("leftSpring")},500)}},closeSlide:function(){n("html").removeClass("swipebox");n(e).trigger("resize");this.destroy()},destroy:function(){n(e).unbind("keyup");n("body").unbind("touchstart");n("body").unbind("touchmove");n("body").unbind("touchend");n("#swipebox-slider").unbind();n("#swipebox-overlay").remove();n.isArray(i)||i.removeData("_swipebox");this.target&&this.target.trigger("swipebox-destroy");n.swipebox.isOpen=!1;u.settings.afterClose&&u.settings.afterClose()}};u.init()};n.fn.swipebox=function(e){if(!n.data(this,"_swipebox")){var t=new n.swipebox(this,e);this.data("_swipebox",t)}return this.data("_swipebox")}})(window,document,jQuery);
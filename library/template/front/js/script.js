jQuery.noConflict(),function(e){e(document).ready(function(){function r(){var r=e("header .inner").width(),i=a.width()+e(".brand").width();i>r||e(window).width()<=768?e("body").addClass("tablet-nav"):e("body").removeClass("tablet-nav"),mobile_old=c,c="hidden"==e("#media-query-trigger").css("visibility")?!1:!0,d=mobile_old!=c?!0:!1}e("#SearchForm_SearchForm_action_results").val("L");var i=e("#SearchForm_SearchForm_Search"),o=i.val();if(i.focus(function(){e(this).addClass("active"),i.val()==o&&i.val("")}),i.blur(function(){""==i.val()&&i.val(o)}),!e.browser.msie||e.browser.msie&&parseInt(e.browser.version,10)>8){var n=e("span.search-dropdown-icon"),t=e("div.search-bar"),s=e("span.nav-open-button"),a=e(".header .primary ul"),c=!1,d=!1;e("body").append('<div id="media-query-trigger"></div>'),r(),e(window).resize(function(){r(),c?d&&(a.hide(),t.hide()):(a.show(),t.show())}),n.click(function(){a.slideUp(),t.slideToggle(200)}),s.click(function(){t.slideUp(),a.slideToggle(200)})}}),jQuery.uaMatch=function(e){e=e.toLowerCase();var r=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||e.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:r[1]||"",version:r[2]||"0"}},matched=jQuery.uaMatch(navigator.userAgent),browser={},matched.browser&&(browser[matched.browser]=!0,browser.version=matched.version),browser.chrome?browser.webkit=!0:browser.webkit&&(browser.safari=!0),jQuery.browser=browser,jQuery.sub=function(){function e(r,i){return new e.fn.init(r,i)}jQuery.extend(!0,e,this),e.superclass=this,e.fn=e.prototype=this(),e.fn.constructor=e,e.sub=this.sub,e.fn.init=function(i,o){return o&&o instanceof jQuery&&!(o instanceof e)&&(o=e(o)),jQuery.fn.init.call(this,i,o,r)},e.fn.init.prototype=e.fn;var r=e(document);return e}}(jQuery);
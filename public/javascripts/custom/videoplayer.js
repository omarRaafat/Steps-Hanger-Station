(function(){
  "use strict";
	$(function ($) {
   		if( !device.tablet() && !device.mobile() ) {
			$(".player").mb_YTPlayer();
						
		} else {
			
			$('.player').addClass('hide');
			$('.video-bg').addClass('videobg');
		}
	});
})();

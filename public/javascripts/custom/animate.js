
jQuery(document).ready(function() {
	jQuery('.animated').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animated bounceInLeft', // Class to add to the elements when they are visible
	    offset: 100    
	   });   
});    
jQuery(document).ready(function(){
    var mycontainer = jQuery('#projects');
    mycontainer.isotope({ 
		transitionDuration: 0,
        filter: '*',
        animationOptions: {
            duration: 0,
            easing: 'liniar',
            queue: false,
        }
    }); 

    jQuery('#projects-filter a').click(function(){ 

            //removes class from all items to "clear" the class from your menu
        jQuery('#projects-filter a').removeClass("current");

        //adds the class to whichever item you clicked
        jQuery(this).addClass("current");

        var selector = jQuery(this).attr('data-filter'); 
        mycontainer.isotope({ 
			transitionDuration: 0,
            filter: selector,
            animationOptions: {
                duration: 0,
                easing: 'liniar',
                queue: false,
            } 
        }); 
      return false; 
	});
    
    
    

    
});
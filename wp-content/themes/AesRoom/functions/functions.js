jQuery(document).ready(function() {
	/*
	// Tabs functionality
	jQuery(".tab_content").hide(); //Hide all content
	jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
	jQuery(".tab_content:first").show(); //Show first tab content

	//On Click Event
	jQuery("ul.tabs li").click(function() {

		jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(".tab_content").hide(); //Hide all tab content

		var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		jQuery(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	*/
	
		//When page loads...
		jQuery(".tab_content").hide(); //Hide all content
		jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
		jQuery(".tab_content:first").show(); //Show first tab content
	
		jQuery(function() {

			//when the history state changes, gets the url from the hash and display 
			jQuery(window).bind( 'hashchange', function(e) {
				
				var url = jQuery.param.fragment();
				//hide all 
				jQuery( '.tabs li' ).removeClass( 'active' );
				jQuery( '.tab_container' ).children(".tab_content").removeClass(".active").hide();
		
				//find a href that matches url
				if (url) {
					jQuery( 'ul.tabs a[href="#' + url + '"]' ).parent().addClass( 'active' ); 
					jQuery(".tab_container #" + url).addClass("selected").fadeIn();
				} else {
					jQuery( 'ul.tabs a[href="#tab1"]' ).parent().addClass( 'active' ); 
					jQuery(".tab_container #tab1").addClass("active").fadeIn();
				}		
			});
	  
			// Since the event is only triggered when the hash changes, we need to trigger
			// the event now, to handle the hash the page may have loaded with.
			jQuery(window).trigger( 'hashchange' );			
		});	
	
	// Media Uploader
    window.formfield = '';

    jQuery('.upload_image_button').live('click', function() {
        window.formfield = jQuery('.upload_field',jQuery(this).parent());
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });

    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html) {
        if (window.formfield) {
            imgurl = jQuery('img',html).attr('src');
            window.formfield.val(imgurl);
            tb_remove();
        }
        else {
            window.original_send_to_editor(html);
        }
        window.formfield = '';
        window.imagefield = false;
    }
});
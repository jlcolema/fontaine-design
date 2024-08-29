/*-----------------------------------------------------------------------------------*/
/*	Tabbed Widget JS (if active)
/*-----------------------------------------------------------------------------------*/

jQuery(document).ready(function() {

	jQuery("#tabs").tabs();
	jQuery(".tabs").tabs();
	
	
	jQuery(".toggle").each( function () {
		if(jQuery(this).attr('data-id') == 'closed') {
			jQuery(this).accordion({ header: 'h4', collapsible: true, active: false  });
		} else {
			jQuery(this).accordion({ header: 'h4', collapsible: true});
		}
	});
	
	
});

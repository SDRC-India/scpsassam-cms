jQuery(document).ready(function(){
	jQuery(document).on('click', '.supsystic-pro-notice .notice-dismiss', function(){
		jQuery.post(window.ajaxurl, {
			action: 'supsystic-tables'
		,	route: {
				module: 'license'
			,	action: 'dismissNotice'
			}
		});
	});
});
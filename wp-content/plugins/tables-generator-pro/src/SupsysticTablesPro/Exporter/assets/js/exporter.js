(function ($, app, undefined) {

    $(document).ready(function () {
        var $exportDialog = $('#exportDialog').dialog({
			modal:   true,
			width:   500,
			autoOpen: false,
			buttons: {
				Export: function () {
					app.request({
						module: 'exporter',
						action: 'generateUrl'
					}, {
						id: app.getParameterByName('id'),
						type: $('.export-type').filter(':checked').val(),
						orientation: $('#features-export-pdf-orientation').val()
					}).done(function (response) {
						window.location.href = response.url;
						$exportDialog.dialog('close');
					}).fail(function (message) {
						$exportDialog.dialog('close');
						alert(message);
					});
				},
				Cancel: function () {
					$(this).dialog('close');
				}
			}
		});

        $('#export').on('click', function () {
            $exportDialog.dialog('open');
        });
    });

}(window.jQuery, window.supsystic.Tables));
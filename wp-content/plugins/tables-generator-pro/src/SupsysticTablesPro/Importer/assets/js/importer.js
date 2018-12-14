(function ($, app, undefined) {

    $(document).ready(function () {
        var $error = $('#importErrorMsg'),
			$importDialog = $('#importDialog').dialog({
			modal:    true,
            autoOpen: false,
            width:    600,
            buttons: {
                Import: function () {
					var $extension = $('input[name="extension"]:checked');

					$error.fadeOut();

					if (($extension.val() != 'spreadsheets' && !$('input[name="file"]').val())
						|| ($extension.val() == 'spreadsheets' && !$('input[name="settings[url]"]').val())
					) {
						$error.text('You need to choose the file!');
						$error.fadeIn();
						return;
					}
                    $importDialog.find('form').submit();
                },
                Cancel: function () {
                    $(this).dialog('close');
                }
            }
        });

        $('#importDialog input[name="extension"]').on('change ifChanged', function(event) {
			if($(this).is(':checked')) {
				event.preventDefault();

				$error.fadeOut();
				$('[class*="-import-settings"]').addClass('hidden');

				var $settings = $('.' + $(this).val() + '-import-settings');

				if ($settings.length) {
					$settings.removeClass('hidden');
					$('.import-settings').removeClass('hidden');
				}
			}
        }).trigger('change');

        $('#import').on('click', function () {
            $importDialog.dialog('open');
        });
    });

}(window.jQuery, window.supsystic.Tables));
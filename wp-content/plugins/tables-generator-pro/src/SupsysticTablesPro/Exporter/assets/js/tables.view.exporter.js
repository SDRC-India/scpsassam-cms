(function ($, app, undefined) {

	var media;

	$(document).ready(function () {
		$('#features-export').chosen();

		$('.select-logo').on('click', function(event) {
			event.preventDefault();
			if (typeof media === "undefined") {

				media = window.wp.media();

				media.on('select', function () {
					$tr = $('.setting-export-logo').addClass('selected');
					attachment = media.state().get('selection').first().toJSON();
					$tr.find('.export-logo-img img').attr('src', attachment.url);
					$tr.find('[name="exportLogo[src]"]').val(attachment.url);
				});
			}

			media.open();
		});

		$('.remove-logo').on('click', function(event) {
			event.preventDefault();
			$tr = $('.setting-export-logo').removeClass('selected');
			$tr.find('[name="settings[exportLogo][src]"]').val('');
		});
	});

}(window.jQuery, window.supsystic.Tables));
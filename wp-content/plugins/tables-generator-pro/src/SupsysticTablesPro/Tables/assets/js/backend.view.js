(function ($, app) {

	$(document).ready(function () {
		$('#editable-fields-roles').chosen({width: "100%"});

		var toolbar = app.Editor.Tb;
		toolbar.addMethod('addEditableField', function() {
			this.replaceClass('editable', ['editable']);
			this.getEditor().render();
		});
		toolbar.addMethod('removeEditableField', function() {
			this.removeClass('editable');
			this.getEditor().render();

		});
		toolbar.subscribe();
	});

}(window.jQuery, window.supsystic.Tables));
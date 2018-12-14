var g_stbDoSaving = false;
var g_stbPreviewTimeoutSet = false;
var g_stbAnimationSpeed = 300;
var g_stbFixedColumnsWidth = [];
var g_stbMultipleColumnsSorting = [];
var g_stbDisableColumnsSorting = [];
var g_stbTableLoaderBgColorTimeoutSet = false;
var g_stbTableLoaderBgColorLast = '';
var $setColumnWidthDialog;
var $setMultipleColumnsSortingDialog;
var $tableLoaderIconDialog;
(function ($, app, undefined) {
	$(document).ready(function () {
		// If turn on chosen plugin for selects of all types - there is conflict with handsontable plugin happen
		$('#row-tab-settings select[multiple="multiple"]').chosen({width: '100%'});

		var tableId = app.getParameterByName('id'),
			windowHeight = $(window).height(),
			ace = window.ace.edit("css-editor"),
			editor, toolbar, formula;

		// Make editors responsive for window height (810px is mobile responsive width)
		if($(window).width() > 810 && windowHeight > 650) {
			windowHeight = windowHeight - 350;
		}

		$('#tableEditor, #css-editor').css({
			'max-height': windowHeight,
			'min-height': windowHeight,
			'height': windowHeight
		});

		$setColumnWidthDialog = $('#setColumnWidthDialog').dialog({
			autoOpen: false,
			width:    600,
			height:   'auto',
			modal:    true,
			open: function() {
				var $this = $(this),
					fixedColumnWidthData = '';

				for(var i = 0; i < g_stbFixedColumnsWidth.length; i++) {
					if(g_stbFixedColumnsWidth[i]) {
						fixedColumnWidthData += '<span>column ' + (i + 1) + ': ' + g_stbFixedColumnsWidth[i] + '</span></span><br />';
					}
				}
				if(!fixedColumnWidthData) {
					$this.find('.fixedColumnWidthDataLabel').hide();
				} else {
					$this.find('.fixedColumnWidthDataLabel').show();
				}
				$this.find('#fixedColumnWidthData').html(fixedColumnWidthData);
			},
			close: function() {
				var $this = $(this);
				$this.find('input[name="columnWidth"]').val('');
			},
			buttons:  {
				Apply: function (event) {
					var $this = $(this),
						editor = window.editor,
						selection = editor.getSelectedRange(),
						value = $this.find('input[name="columnWidth"]').val(),
						valueType = $this.find('input[name="columnWidthType"]:checked').val();
					if(value) {
						for(var i = selection.from.col; i <= selection.to.col; i++) {
							g_stbFixedColumnsWidth[i] = value + valueType;
						}
					}
					$(this).dialog('close');
				},
				'Clear Fixed Width': function (event) {
					if (confirm('Are you sure you want to clear wixed width for all columns?')) {
						g_stbFixedColumnsWidth = [];
						$(this).dialog('close');
					}
				},
				Cancel: function () {
					$(this).dialog('close');
				}
			}
		});

		$setMultipleColumnsSortingDialog = $('#setMultipleColumnsSortingDialog').dialog({
			autoOpen: false,
			width:    600,
			height:   'auto',
			modal:    true,
			open: function() {
				var $this = $(this),
					columnsSortOrder = '',
					disableSortOrder = '',
					i = 0;

				for(i = 0; i < g_stbMultipleColumnsSorting.length; i++) {
					if(g_stbMultipleColumnsSorting[i]) {
						columnsSortOrder += '<span>column ' + (g_stbMultipleColumnsSorting[i][0] + 1) + ': ' + g_stbMultipleColumnsSorting[i][1] + '</span><br />';
					}
				}
				for(i = 0; i < g_stbDisableColumnsSorting.length; i++) {
					if(g_stbDisableColumnsSorting[i]) {
						disableSortOrder += '<span>column ' + (g_stbDisableColumnsSorting[i] + 1) + ': disable</span><br />';
					}
				}
				if(!columnsSortOrder) {
					$this.find('.columnSortOrderDataLabel').hide();
				} else {
					$this.find('.columnSortOrderDataLabel').show();
				}
				if(!disableSortOrder) {
					$this.find('.disableSortOrderDataLabel').hide();
				} else {
					$this.find('.disableSortOrderDataLabel').show();
				}
				$this.find('#columnSortOrderData').html(columnsSortOrder);
				$this.find('#disableSortOrderData').html(disableSortOrder);
			},
			buttons:  {
				Apply: function (event) {
					var $this = $(this),
						editor = window.editor,
						selection = editor.getSelectedRange(),
						order = $this.find('input[name="columnSortOrder"]:checked').val(),
						exists = false;
					for(var i = selection.from.col; i <= selection.to.col; i++) {
						if(order == 'disable') {
							if(toeInArray(i, g_stbDisableColumnsSorting)) {
								g_stbDisableColumnsSorting.push(i);
							}
						} else {
							for(var j = 0; j < g_stbMultipleColumnsSorting.length; j++) {
								if(g_stbMultipleColumnsSorting[j][0] == i) {
									g_stbMultipleColumnsSorting[j] = [i, order];
									exists = true;
								}
							}
							if(!exists) {
								g_stbMultipleColumnsSorting.push([i,order]);
							}
						}
					}

					$(this).dialog('close');
				},
				'Clear Multiple Sorting': function (event) {
					if (confirm('Are you sure you want to clear multiple sorting for all columns?')) {
						g_stbMultipleColumnsSorting = [];
						$(this).dialog('close');
					}
				},
				'Clear Disable Sorting': function (event) {
					if (confirm('Are you sure you want to clear disable sorting for all columns?')) {
						g_stbDisableColumnsSorting = [];
						$(this).dialog('close');
					}
				},
				Cancel: function () {
					$(this).dialog('close');
				}
			}
		});

		// Main Buttons Actions
		var $cloneDialog = $('#cloneDialog').dialog({
			autoOpen: false,
			width:    480,
			modal:    true,
			open: function() {
				var dialog = $(this);
				dialog.find('.message').remove();
				dialog.find('.input-group').show();
				dialog.find('input').val($.trim($('#stbTableTitleLabel').text()) + '_Clone');
				dialog.next().find('button:first-of-type').removeAttr('disabled');
				dialog.next().find('button:first-of-type').html('Clone').show();
			},
			buttons:  {
				Clone: function (event) {
					var $dialog = $(this),
						$button = $(event.target).closest('button');

					$button.attr('disabled', true);
					$button.html(app.createSpinner());
					app.Models.Tables.request('cloneTable', {
						id: app.getParameterByName('id'),
						title: $(this).find('input').val()
					}).done(function(response) {
						if (response.success) {
							var html = '<a href="' + app.replaceParameterByName(window.location.href, 'id', response.id) + '" class="ui-button" style="padding-top: 8px !important; padding-bottom: 8px !important; text-decoration: none !important;">Open cloned table</a><div style="float: right; margin-top: 5px;">Done!</div>';

							$button.hide();
							$dialog.find('.input-group').hide();
							$dialog.find('.input-group').after($('<div>', {class: 'message', html: html}));
						}
					});
				},
				Cancel: function () {
					$(this).dialog('close');
				}
			}
		});

		$('#buttonClone').on('click', function () {
			$cloneDialog.dialog('open');
		});

		$('#buttonSave').on('click', function () {
			saveTable();
		});

		$('#buttonDelete').on('click', function () {
			var $button = $(this);

			if (!confirm('Are you sure you want to delete the this table?')) {
				return;
			}

			app.createSpinner($button);
			app.Models.Tables.remove(app.getParameterByName('id'))
				.done(function () {
					window.location.href = $('#menuItem_tables').attr('href');
				})
				.fail(function (error) {
					alert('Failed to delete table: ' + error);
				})
				.always(function () {
					app.deleteSpinner($button);
				});
		});

		$('#buttonClearData').on('click', function () {
			if (!confirm('Are you sure you want to clear all data in this table?')) {
				return;
			}
			editor.clear();
		});

		// Custom Hansontabe Renderers
		Handsontable.renderers.CustomHtmlRenderer = function (instance, td, row, col, prop, value, cellProperties) {
			Handsontable.renderers.HtmlRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
			if (td.innerHTML === 'null') {
				td.innerHTML = '';
			}
		};

		Handsontable.renderers.DefaultRenderer = function (instance, td, row, col, prop, value, cellProperties) {
			var cellMeta = instance.getCellMeta(row,  row);

			if(app.Models.Tables.isFormula(value)) {
				Handsontable.TextCell.renderer.apply(this, arguments);
				value = app.Models.Tables.getFormulaResult(value, row, col);
			}

			if(instance.useNumberFormat && (app.Models.Tables.isNumber(value) || cellMeta.formatType == 'number')) {
				Handsontable.renderers.NumberRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
			} else {
				Handsontable.renderers.CustomHtmlRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
			}
		};

		Handsontable.renderers.NumberRenderer = function (instance, td, row, col, prop, value, cellProperties) {
			value = app.Models.Tables.setCellFormat(value, 'number');

			Handsontable.renderers.CustomHtmlRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
		};

		Handsontable.renderers.CurrencyRenderer = function (instance, td, row, col, prop, value, cellProperties) {
			if(value) {
				if(app.Models.Tables.isFormula(value)) {
					Handsontable.TextCell.renderer.apply(this, arguments);
					value = app.Models.Tables.getFormulaResult(value, row, col);
				}

				value = app.Models.Tables.setCellFormat(value, 'currency');
			}

			Handsontable.renderers.CustomHtmlRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
		};

		Handsontable.renderers.PercentRenderer = function (instance, td, row, col, prop, value, cellProperties) {
			if(value) {
				if(app.Models.Tables.isFormula(value)) {
					Handsontable.TextCell.renderer.apply(this, arguments);
					value = app.Models.Tables.getFormulaResult(value, row, col);
				}

				value = app.Models.Tables.setCellFormat(value, 'percent');
			}

			Handsontable.renderers.CustomHtmlRenderer.call(this, instance, td, row, col, prop, value, cellProperties);
		};

		Handsontable.editors.TextEditor.prototype.beginEditing = function () {
			// To show percents as is if it is pure number
			var formatType = this.cellProperties.formatType || '',
				value = this.originalValue;

			if(app.Models.Tables.isNumber(value) && !app.Models.Tables.isFormula(value)) {
				if(formatType == 'percent') {
					value = (value * 100).toString();
				}
			}

			this.originalValue = value;

			Handsontable.editors.BaseEditor.prototype.beginEditing.call(this);
		};

		Handsontable.editors.TextEditor.prototype.focus = function() {
			this.TEXTAREA.select();
		};

		Handsontable.editors.TextEditor.prototype.saveValue = function (val, ctrlDown) {
			// Correct save of percent values
			var formatType = this.cellProperties.formatType || '',
				value = val[0][0];

			if(app.Models.Tables.isNumber(value) && !app.Models.Tables.isFormula(value)) {
				if (formatType == 'percent') {
					value = (value / 100).toString();
				}
			}
			if(formatType == 'time_duration') {
				var cellFormat = this.cellProperties.format || $('input[name="timeDurationFormat"]').val(),
					newTime = moment(value, cellFormat);

				if (newTime.isValid()) {
					value = newTime.format(cellFormat);
				} else {
					var duration = value.match(/.{1,2}/g);

					newTime = moment.duration({
						seconds: duration[2] || 0,
						minutes: duration[1] || 0,
						hours: duration[0] || 0,
						days: 0,
						weeks: 0,
						months: 0,
						years: 0
					});

					if (newTime._milliseconds || value == 0) {
						value = newTime.format(cellFormat);
					}
				}
			}

			val[0][0] = value;

			Handsontable.editors.BaseEditor.prototype.saveValue.call(this, val, ctrlDown);
		};

		ace.setTheme("ace/theme/monokai");
		ace.getSession().setMode("ace/mode/css");

		initializeTabs() ;
		initializeSettingsTabs() ;

		editor = initializeEditor();

		function updateUndoRedoBtns() {
			if(editor.undoRedo) {
				var undo = $('[data-method="undo"]'),
					redo = $('[data-method="redo"]');

				setTimeout(function() {
					if(editor.undoRedo.isUndoAvailable()) {
						undo.removeClass('inactive');
					} else {
						undo.addClass('inactive');
					}
					if(editor.undoRedo.isRedoAvailable()) {
						redo.removeClass('inactive');
					} else {
						redo.addClass('inactive');
					}
				}, 100);
			}
		}

		// Editor Hooks
		editor.addHook('beforeCellAlignment', function (changes, source) {
			updateUndoRedoBtns();
		});editor.addHook('beforeFilter', function (changes, source) {
			updateUndoRedoBtns();
		});
		editor.addHook('afterRemoveRow', function (changes, source) {
			updateUndoRedoBtns();
		});
		editor.addHook('manualRowMove', function (changes, source) {
			updateUndoRedoBtns();
		});
		editor.addHook('beforeChange', function (changes, source) {
			$.each(changes, function (index, changeSet) {
				var row = changeSet[0],
					col = changeSet[1],
					value = changeSet[3],
					cell = editor.getCellMeta(row, col);

				if (cell.type == 'date') {
					var newDate = moment(value, cell.format);

					if (newDate.isValid()) {
						changeSet[3] = newDate.format(cell.format);
					}
				}
			});
		});
		editor.addHook('afterChange', function (changes) {
			updateUndoRedoBtns();

			if (!$.isArray(changes) || !changes.length) {
				return;
			}
			$.each(changes, function (index, changeSet) {
				var row = changeSet[0],
					col = changeSet[1],
					value = changeSet[3];

				if (value && value.toString().match(/\\/)) {
					editor.setDataAtCell(row, col, value.replace(/\\/g, '&#92;'));
				}
			});
			editor.render();
		});

		var updateHeight = function(currentRow, newSize, isDoubleClick) {
			var heights = window.cellHeights;
			heights[currentRow] = newSize;

			editor.updateSettings({
				rowHeights: heights,
			});

			window.cellHeights = heights;
		};

		editor.addHook('afterRowResize', function(currentRow, newSize, isDoubleClick) {
			if(newSize > 22) {
				updateHeight(currentRow, newSize, isDoubleClick);
			} else {
				updateHeight(currentRow, 22, isDoubleClick);
			}
		});

		editor.addHook('afterLoadData', function () {
			generateWidthData();
		});
		editor.addHook('afterCreateRow', function(insertRowIndex, amount, source) {
			var data = editor.getData(),
				i = insertRowIndex > amount ? insertRowIndex - 1 : insertRowIndex + 1;

			setTimeout(function() {
				for(var j = 0; j < data[insertRowIndex].length; j++) {
					editor.setCellMetaObject(insertRowIndex, j, editor.getCellMeta(i, j));
				}
				editor.render();
			}, 10);
			updateUndoRedoBtns();
		});
		editor.addHook('afterCreateCol', function(insertColumnIndex, amount, source) {
			insertColumnIndex = typeof(insertColumnIndex) != 'undefined' ? insertColumnIndex : 0;

			var selectedCell = editor.getSelected()
			,	selectedColumnIndex = 0
			,	data = editor.getData()
			,	index = insertColumnIndex
			,	j = insertColumnIndex <= amount ? insertColumnIndex + 1 : insertColumnIndex - 1;
			if(selectedCell && selectedCell[1] && selectedCell[1] > 0) {
				selectedColumnIndex = selectedCell[1];
			}
			if (insertColumnIndex > selectedColumnIndex) {
				index = insertColumnIndex - 1;
			}
			setTimeout(function() {
				for(var i = 0; i < data.length; i++) {
					editor.setCellMetaObject(i, insertColumnIndex, editor.getCellMeta(i, j))
				}
				editor.render();
			}, 10);
			generateWidthData();
			editor.allWidths.splice(selectedColumnIndex, 0, editor.allWidths[index]);
			updateUndoRedoBtns();
		});
		editor.addHook('afterRemoveCol', function(from, amount) {
			generateWidthData();
			editor.allWidths.splice(from, amount);

			var countCols = editor.countCols(),
				colWidth,
				allWidths = editor.allWidths,
				plugin = editor.getPlugin('ManualColumnResize');

			for (var i = 0; i < countCols; i++) {
				colWidth = editor.getColWidth(i);
				if (colWidth !== allWidths[i]) {
					plugin.setManualSize(i, allWidths[i]);
				}
			}
			updateUndoRedoBtns();
		});
		editor.addHook('afterColumnResize', function(column, width) {
			generateWidthData();
			editor.allWidths.splice(column, 1, width);
		});

		toolbar = new app.Editor.Toolbar('#tableToolbar', editor);
		formula = new app.Editor.Formula(editor);

		window.editor = editor;
		app.Editor.Hot = editor;
		app.Editor.Tb = toolbar;

		toolbar.subscribe();
		formula.subscribe();

		var loading = $.when(
			app.Models.Tables.getMeta(app.getParameterByName('id')),
			app.Models.Tables.getRows(tableId)
		);

		loading.done(function (metaResponse, rowsResponse) {
			var rows = rowsResponse[0].rows,
				meta = metaResponse[0].meta,
				comments = [];

			// Set merged cells
			if (typeof meta === 'object' && 'mergedCells' in meta && meta.mergedCells.length) {
				editor.updateSettings({
					mergeCells: meta.mergedCells
				});
			}

			// Set rows data
			if (rows.length > 0) {
				var data = [], cellMeta = [], heights = [], widths = [];

				// Colors
				var $style = $('#supsystic-tables-style');

				if (!$style.length) {
					$style = $('<style/>', { id: 'supsystic-tables-style' });
					$('head').append($style);
				}

				$.each(rows, function (x, row) {
					var cells = [];

					heights.push(row.height || undefined);

					$.each(row.cells, function (y, cell) {
						var metaData = {};

						if ('meta' in cell && cell.meta !== undefined) {
							var color = /color\-([0-9abcdef]{6})/.exec(cell.meta),
								background = /bg\-([0-9abcdef]{6})/.exec(cell.meta);

							if (null !== color) {
								$style.html($style.html() + ' .'+color[0]+' {color:#'+color[1]+' !important}');
							}

							if (null !== background) {
								$style.html($style.html() + ' .'+background[0]+' {background-color:#'+background[1]+' !important}');
							}

							metaData = $.extend(metaData, { row: x, col: y, className: cell.meta.join(' ') });
						}

						if (cell.formatType) {
							metaData = $.extend(metaData, {
								type: cell.type == 'numeric' ? 'text' : cell.type, // To remove numeric renderer
								format: cell.type == 'numeric' ? '' : cell.format,
								formatType: cell.type == 'numeric' ? '' : cell.formatType
							});
						} else {
							if(app.Models.Tables.isNumber(cell.data)) {
								metaData = $.extend(metaData, {
									type: 'text',
									format: '',
									formatType: 'number'
								});
							}
						}

						switch(cell.formatType) {
							case 'currency':
								metaData.renderer = Handsontable.renderers.CurrencyRenderer;
								break;
							case 'percent':
								metaData.renderer = Handsontable.renderers.PercentRenderer;
								break;
							case 'date':
								metaData.type = 'date';
								metaData.dateFormat = cell.format;
								metaData.correctFormat =  true;

								if(cell.reformat) {
									var newDate = moment(cell.data, cell.format);

									if (newDate.isValid()) {
										cell.data = newDate.format($('input[name="dateFormat"]').val());
									}
								}
								break;
							case 'time_duration':
								metaData.type = 'text';

								if(cell.reformat) {
									var cellFormat = $('input[name="timeDurationFormat"]').val(),
										newTime = moment(cell.data, cell.format);

									if (newTime.isValid()) {
										cell.data = newTime.format(cellFormat);
									} else {
										var duration = cell.data.match(/.{1,2}/g);

										newTime = moment.duration({
											seconds: duration[2] || 0,
											minutes: duration[1] || 0,
											hours: duration[0] || 0,
											days: 0,
											weeks: 0,
											months: 0,
											years: 0
										});

										if (newTime._milliseconds || cell.data == 0) {
											cell.data = newTime.format(cellFormat);
										}
									}
								}
								break;
							default:
								metaData.renderer = Handsontable.renderers.DefaultRenderer;
								break;
						}

						cellMeta.push(metaData);

						if (x === 0 && meta.columnsWidth) {
							widths.push(meta.columnsWidth[y] > 0 ? meta.columnsWidth[y] : 62);
						} else if (x === 0 ) {
							// Old
							widths.push(cell.width === undefined ? 62 : cell.width);
						}
						g_stbFixedColumnsWidth = meta.columnsFixedWidth || g_stbFixedColumnsWidth;
						g_stbMultipleColumnsSorting = meta.columnsSortOrder || g_stbMultipleColumnsSorting;
						g_stbDisableColumnsSorting = meta.columnsDisableSorting || g_stbDisableColumnsSorting;

						if (typeof(cell.comment) != 'undefined') {
							comments.push({
								col:     y,
								row:     x,
								comment: cell.comment
							});
						}

						cells.push(cell.data);

					});

					data.push(cells);
				});

				// Height & width
				window.cellHeights = heights;
				editor.updateSettings({
					rowHeights: heights,
					colWidths: widths
				});

				// Load extracted data
				editor.loadData(data);

				// Comments
				// Note: comments need to be loaded after editor.loadData() call.
				if (comments.length) {
					editor.updateSettings({
						cell: comments
					});
				}

				// Load extracted metadata
				$.each(cellMeta, function (i, meta) {
					editor.setCellMetaObject(meta.row, meta.col, meta);
				});
			}
		}).fail(function (error) {
			alert('Failed to load table data: ' + error);
		}).always(function (response) {
			$('#loadingProgress').remove();
			editor.render();
		});

		// Edit Table Title
		$('#stbTableTitleShell').click(function(){
			var isEdit = $(this).data('edit-on');
			if(!isEdit) {
				var $labelHtml = $('#stbTableTitleLabel'),
					$labelTxt = $('#stbTableTitleTxt');

				$labelTxt.val( $labelHtml.text() );
				$labelHtml.hide( g_stbAnimationSpeed );
				$labelTxt.show( g_stbAnimationSpeed, function(){
					$(this).data('ready', 1);
				});
				$(this).data('edit-on', 1);
			}
		});
		// Edit Table Label
		$('#stbTableTitleTxt').blur(function(){
			stbRenabeTable( $(this).val() );
		}).keydown(function(e){
			if(e.keyCode == 13) {	// Enter pressed
				stbRenabeTable( $(this).val() );
			}
		});

		var formSettings = $('form#settings'),
			head = formSettings.find('[name="elements[head]"]'),
			foot = formSettings.find('[name="elements[foot]"]'),
			fixedHead = formSettings.find('[name="fixedHeader"]'),
			fixedFoot = formSettings.find('[name="fixedFooter"]');

		// Set numbers
		formSettings.find('[name="useNumberFormat"]').on('change ifChanged', function() {
			if($(this).is(':checked')) {
				app.Editor.Hot.useNumberFormat = true;
				$('.use-number-format-options').show();
			} else {
				app.Editor.Hot.useNumberFormat = false;
				$('.use-number-format-options').hide();
			}
			editor.render();
		}).trigger('change');

		formSettings.find('[name="numberFormat"]').on('change', function(event) {
			event.preventDefault();
			editor.render();
		});

		// Set currency
		formSettings.find('[name="currencyFormat"]').on('change', function(event) {
			event.preventDefault();
			$('.currency-format').attr('data-format', $.trim($(this).val()));
			editor.render();
		});

		// Set percent
		formSettings.find('[name="percentFormat"]').on('change', function(event) {
			event.preventDefault();
			$('.percent-format').attr('data-format', $.trim($(this).val()));
			editor.render();
		});

		// Set date
		formSettings.find('[name="dateFormat"]').on('change', function(event) {
			event.preventDefault();
			$('.date-format').attr('data-format', $.trim($(this).val()));
		});

		// Set time / duration
		formSettings.find('[name="timeDurationFormat"]').on('change', function(event) {
			event.preventDefault();
			$('.time_duration-format').attr('data-format', $.trim($(this).val()));
		});

		// Fixed Header / Footer
		head.on('change ifChanged', function() {
			if(!$(this).is(':checked') && fixedHead.is(':checked')) {
				fixedHead.iCheck('uncheck');
			}
		});
		foot.on('change ifChanged', function() {
			if(!$(this).is(':checked') && fixedFoot.is(':checked')) {
				fixedFoot.iCheck('uncheck');
			}
			if($(this).is(':checked')) {
				if($('input[name="customFooter"]').is(':checked')) {
					$('.custom-footer-options').fadeIn();
				}
			} else {
				if($('input[name="customFooter"]').is(':checked')) {
					$('.custom-footer-options').fadeOut();
				}
			}
		});
		fixedHead.on('change ifChanged', function() {
			var head = $('#table-elements-head');

			if($(this).is(':checked') && !head.is(':checked')) {
				head.iCheck('check');
			}
			if($(this).is(':checked')) {
				$('.features-fixed-height').fadeIn();
			} else {
				$('.features-fixed-height').fadeOut();
			}
		});
		fixedFoot.on('change ifChanged', function() {
			var foot = $('#table-elements-foot');

			if($(this).is(':checked') && !foot.is(':checked')) {
				foot.iCheck('check');
			}
		});

		// Fixed Table Width - Width Type
		$('input[name="tableWidthType"]').on('ifChecked', function() {
			if($(this).val() == 'auto') {
				$('input[name="tableWidth"]').fadeOut(300);
			} else {
				$('input[name="tableWidth"]').fadeIn(300);
			}
		});

		function initafterTableLoadedScript() {
			if($('#enable-after-table-loaded-script').is(':checked')) {
				$('#after-table-loaded-script').fadeIn();
			} else {
				$('#after-table-loaded-script').fadeOut();
			}
		}

		$('#enable-after-table-loaded-script').on('change ifChanged', function() {
			initafterTableLoadedScript();
		});

		initafterTableLoadedScript();

		$('[data-toggle="tooltip"]').tooltip();

		$('#stbCopyTextCodeExamples').change(function(){
			$('.stbCopyTextCodeShowBlock').hide().filter('[data-for="'+ jQuery(this).val()+ '"]').show();
		}).trigger('change');

		$('input[name="stbCopyTextCode"]').click(function(){
			this.select();
		});

		// Pro notify
		var $notification = $('#proPopup').dialog({
			autoOpen: false,
			width:    480,
			modal:    true,
			buttons:  {
				Close: function () {
					$(this).dialog('close');
				}
			}
		});
		$editableFieldProFeatureDialog = $('#editableFieldProFeatureDialog').dialog({
			autoOpen: false,
			width:    480,
			modal:    true,
			buttons:  {
				Close: function () {
					$(this).dialog('close');
				}
			}
		});
		$addDiagramProFeatureDialog = $('#addDiagramProFeatureDialog').dialog({
			autoOpen: false,
			width:    913,
			height:   'auto',
			modal:    true,
			buttons:  {
				Close: function () {
					$(this).dialog('close');
				}
			}
		});
		$('.pro-notify').on('click', function () {
			$notification.dialog('open');
		});
		$('#editableFieldProFeature').on('click', function(event) {
			event.preventDefault();
			$editableFieldProFeatureDialog.dialog('open');
		});
		$('#addDiagramProFeature').on('click', function(event) {
			event.preventDefault();
			$addDiagramProFeatureDialog.dialog('open');
		});
		$('#previewDiagramProFeature [data-tabs] a').on('click', function(event) {
			event.preventDefault();

			var dialog = $('#previewDiagramProFeature');

			dialog.find('[data-tabs] a').removeClass('active');
			dialog.find('[data-tab]').removeClass('active');

			$(this).addClass('active');
			dialog.find('[data-tab="' + $(this).attr('href') + '"]').addClass('active');
		});

		$('#tableLoaderColorContainer').ColorPicker({
			color: '#000000',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				g_stbTableLoaderBgColorLast = hex;

				if(!g_stbTableLoaderBgColorTimeoutSet) {
					setTimeout(function(){
						g_stbTableLoaderBgColorTimeoutSet = false;
						$('.tableLoaderColorArea').css('backgroundColor', '#' + g_stbTableLoaderBgColorLast);
						$('#tableLoaderIconPreview .la-2x').css('color', '#' + g_stbTableLoaderBgColorLast);
						$('#tableLoaderIconPreview .spinner').css('backgroundColor', '#' + g_stbTableLoaderBgColorLast);
						$('input[name="tableLoader[color]"]').val('#' + g_stbTableLoaderBgColorLast);
					}, 500);
					g_stbTableLoaderBgColorTimeoutSet = true;
				}
			}
		});
		$tableLoaderIconDialog = $('#tableLoaderIconDialog').dialog({
			autoOpen: false,
			modal:    true,
			width:    900,
			open: function() {
				var color = $('.tableLoaderColorArea').css('backgroundColor');
				$('.preicon_img').css('color', color);
				$('.preicon_img .spinner').css('backgroundColor', color);
			},
			buttons:  {
				Cancel: function () {
					$(this).dialog('close');
				}
			}
		});
		$('.selectTableLoaderIcon').on('click', function(e) {
			e.preventDefault();
			$tableLoaderIconDialog.dialog('open');
		});
		var $tblLoaderIconName = $('input[name="tableLoader[iconName]"]'),
			$tblLoaderIconItems = $('input[name="tableLoader[iconItems]"]'),
			$tblLoaderPreview = $('#tableLoaderIconPreview');

		$('.item-inner').on('click', function () {
			var iconImg = $(this).find('.preicon_img');
			var $tblLoaderIconColor = iconImg.css('color');
			$tblLoaderIconName.val(iconImg.data('name'));
			$tblLoaderIconItems.val(iconImg.data('items'));
			if($tblLoaderIconName.val() == 'default'){
				$tblLoaderPreview.html('');
				$tblLoaderPreview.append('<div class="supsystic-table-loader spinner" style="background-color:'+$tblLoaderIconColor+'"></div>');
			} else {
				var items = '';
				$tblLoaderPreview.html('');
				for(var i = 0; i < $tblLoaderIconItems.val(); i++){
					items += "<div></div>";
				}
				$tblLoaderPreview.append(
					'<div class="supsystic-table-loader la-'+$tblLoaderIconName.val()+' la-2x" style="color:'+$tblLoaderIconColor+'">'+items+'</div>'
				);
			}
			$tableLoaderIconDialog.dialog('close');
		});

		// Select all table cells by click on the top left corner of table editor
		$('.ht_clone_top_left_corner').on('mousedown', function(e) {
			editor.selectCell(0,0, editor.countRows() - 1, editor.countCols() - 1)
		});

		// Functions
		function initializeEditor() {
			var container = document.getElementById('tableEditor');

			return new Handsontable(container, {
				height:  				windowHeight,
				renderAllRows: 			false,		// To prevent losing of rows for huge tables (need to check in future is it all right now?)
				colWidths:             	100,
				rowHeaders: 			true,
				colHeaders: 			true,
				fixedRowsTop: 			0,
				fixedColumnsLeft: 		0,
				comments:              	true,
				contextMenu:           	true,
				formulas:              	true,
				manualColumnResize:    	true,
				manualRowResize:       	true,
				mergeCells:            	true,
				outsideClickDeselects: 	false,
				undo: 					true,
				renderer:              	Handsontable.renderers.DefaultRenderer,
				startCols:             	app.getParameterByName('cols') || 5,
				startRows:             	app.getParameterByName('rows') || 5,
				currentRowClassName: 	'current',
				currentColClassName: 	'current'
			});
		}

		function initializeTabs() {
			var $rows = $('.row-tab'),
				$buttons = $('.subsubsub.tabs-wrapper .button'),
				current = $buttons.filter('.current').attr('href');

			$rows.filter(current).addClass('active');

			$buttons.on('click', function (e) {
				e.preventDefault();

				var $button = $(this),
					current = $button.attr('href');

				$rows.removeClass('active');
				$buttons.filter('.current').removeClass('current');
				$button.addClass('current');
				$rows.filter(current).addClass('active');

				switch(current) {
					case '#row-tab-editor':
						editor.render();
						break;
					case '#row-tab-preview':
						saveTable('#table-preview');
						break;
					default:
						break;
				}
			});
		}

		function initializeSettingsTabs () {
			var $rows = $('.row-settings-tab'),
				$buttons = $('.subsubsub.tabs-settings-wrapper .button'),
				current = $buttons.filter('.current').attr('href');

			$rows.filter(current).addClass('active');

			$buttons.on('click', function (e) {
				e.preventDefault();

				var $button = $(this),
					current = $button.attr('href');

				$rows.removeClass('active');
				$buttons.filter('.current').removeClass('current');
				$button.addClass('current');
				$rows.filter(current).addClass('active');
			});
		}

		function saveTable(preview) {
			preview = typeof(preview) != 'undefined' ? preview : false;
			var id = app.getParameterByName('id');

			if(!g_stbDoSaving) {
				g_stbDoSaving = true;

				var byPart = true,
					formData = $('form#settings'),
					metaData = [],
					rowsData = [],
					columnsWidth = [],
					afterTableLoadedScript = b64EncodeUnicode(formData.find('#after-table-loaded-script').val());

				if(preview) {
					var tableInstance = app.getTableInstanceById(id);

					if(tableInstance) {
						tableInstance.api().destroy();
						$(preview).empty();
					}
				}
				app.createSpinner($('#buttonSave'));

				// Put textareas data into the hidden fields before the saving of table settings
				formData.find('input[name="elements[descriptionText]"]').val( formData.find('#descriptionText').val() );
				formData.find('input[name="elements[signatureText]"]').val( formData.find('#signatureText').val() );
				formData.find('input[name="features[after_table_loaded_script]"]').val(afterTableLoadedScript);

				$.each(editor.getData(), function (x, row) {
					var currentRow = { cells: [] };

					$.each(row, function (y, cell) {
						var meta = editor.getCellMeta(x, y),
							classes = [],
							rowData = {
								data: cell,
								calculatedValue: null,
								hidden: editor.mergeCells.mergedCellInfoCollection.getInfo(x, y) !== undefined,
								hiddenCell: meta.className && meta.className.match('hiddenCell') !== null
							};

						// Set cell format
						rowData.type = meta.type ? meta.type : 'text';
						rowData.formatType = meta.formatType ? meta.formatType : '';

						switch(rowData.formatType) {
							case 'currency':
								rowData.format = formData.find('[name="currencyFormat"]').val();
								break;
							case 'percent':
								rowData.format = formData.find('[name="percentFormat"]').val();
								break;
							case 'date':
								rowData.format = formData.find('[name="dateFormat"]').val();

								var date = moment(rowData.data, rowData.format);

								if (date.isValid()) {
									rowData.dateOrder = date.format('x');
								}
								break;
							default:
								rowData.format = meta.format;
								break;
						}

						// Set calculated value for cells with formulas
						if (app.Models.Tables.isFormula(cell)) {
							var value = app.Models.Tables.getFormulaResult(cell, x, y);

							if (value !== undefined) {
								if (!isNaN(value) && value !== '0' && value !== 0 && value % 1 !== 0) {	// round float
									var floatValue = parseFloat(value);

									if (floatValue.toString().indexOf('.') !== -1) {
										var afterPointSybolsLength = floatValue.toString().split('.')[1].length;

										if (afterPointSybolsLength > 4) {
											value = floatValue.toFixed(4);
										}
									}
								}
								rowData.calculatedValue = value;
							}
						}

						// Set classes for cell
						if (meta.className !== undefined) {
							$.each(meta.className.split(' '), function (index, element) {
								if (element.length) {
									classes.push($.trim(element));
								}
							});
						}
						rowData.meta = classes;

						// Set comments for cell
						if (typeof(meta.comment) != 'undefined') {
							rowData.comment = meta.comment;
						}

						// Set column width by cells of first table row
						if (x == 0) {
							columnsWidth.push(editor.getColWidth(y));
						}

						currentRow.cells.push(rowData);
					});

					// Row height
					currentRow.height = editor.getRowHeight(x);

					if (currentRow.height === undefined || parseInt(currentRow.height) < 10) {
						currentRow.height = null;
					}

					rowsData.push(currentRow);
				});

				metaData = {
					mergedCells: editor.mergeCells.mergedCellInfoCollection,
					columnsWidth: columnsWidth,
					columnsFixedWidth: g_stbFixedColumnsWidth,
					columnsSortOrder: g_stbMultipleColumnsSorting,
					columnsDisableSorting: g_stbDisableColumnsSorting,
					css: ace.getValue()
				};

				// Request to save settings, meta and rows
				$.when(
					app.Models.Tables.setSettings(id, formData),
					app.Models.Tables.setHistorySettings(id, $('form#history-settings')),
					app.Models.Tables.setMeta(id, metaData)
				).then(
					function() {
						app.Models.Tables.setRows(id, rowsData, byPart, preview);
					}
				);
			} else {
				if(preview && !g_stbPreviewTimeoutSet) {
					getPreview(id, preview);
				}
			}
		}

		function getPreview(id, preview) {
			if(g_stbDoSaving) {
				setTimeout(function() {
					getPreview(id, preview);
				}, 50);
				g_stbPreviewTimeoutSet = true;
			} else {
				app.Models.Tables.getPreview(id, preview);
				g_stbPreviewTimeoutSet = false;
			}
		}

		function b64EncodeUnicode(str) {
			return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function(match, p1) {
				return String.fromCharCode('0x' + p1);
			}));
		}

		function generateWidthData() {
			if (! editor.allWidths) {
				if(typeof(editor.getSettings().colWidths) == 'object') {
					editor.allWidths = editor.getSettings().colWidths;
				} else {
					editor.allWidths = [];
				}
			}
		}

		function stbRenabeTable(label) {
			var $labelShell = $('#stbTableTitleShell'),
				$labelHtml = $('#stbTableTitleLabel'),
				$labelTxt = $('#stbTableTitleTxt');

			if($labelShell.data('sending')) return;
			if(!$labelTxt.data('ready')) return;
			$labelShell.data('sending', 1);
			app.createSpinner($labelShell);
			app.Models.Tables.rename(app.getParameterByName('id'), $labelTxt.val())
				.done(function (res) {
					if(!res.error) {
						$labelHtml.html( $.trim($labelTxt.val()) );
						$labelTxt.hide( g_stbAnimationSpeed ).data('ready', 0);
						$labelHtml.show( g_stbAnimationSpeed );
						$labelShell.data('edit-on', 0);
					}
					$labelShell.data('sending', 0);
					app.deleteSpinner($labelShell);
				})
				.fail(function (error) {
					$('#stbTableTitleEditMsg').html('Failed to rename table: ' + error);
				});
		}
	});

}(window.jQuery, window.supsystic.Tables));
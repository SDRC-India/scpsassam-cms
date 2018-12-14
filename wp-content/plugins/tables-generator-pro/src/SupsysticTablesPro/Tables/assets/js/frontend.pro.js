(function ($, app) {

	function getCachedScript(url, options) {
		options = $.extend(options || {}, {
			dataType: "script",
			cache: true,
			url: url
		});
		return $.ajax(options);
	}

	var Base64 = {

		_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

		encode : function (input) {
			var output = "";
			var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
			var i = 0;

			input = Base64._utf8_encode(input);

			while (i < input.length) {

				chr1 = input.charCodeAt(i++);
				chr2 = input.charCodeAt(i++);
				chr3 = input.charCodeAt(i++);

				enc1 = chr1 >> 2;
				enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
				enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
				enc4 = chr3 & 63;

				if (isNaN(chr2)) {
					enc3 = enc4 = 64;
				} else if (isNaN(chr3)) {
					enc4 = 64;
				}

				output = output +
				this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
				this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

			}

			return output;
		},

		// private method for UTF-8 encoding
		_utf8_encode : function (string) {
			string = string.replace(/\r\n/g,"\n");
			var utftext = "";

			for (var n = 0; n < string.length; n++) {

				var c = string.charCodeAt(n);

				if (c < 128) {
					utftext += String.fromCharCode(c);
				}
				else if((c > 127) && (c < 2048)) {
					utftext += String.fromCharCode((c >> 6) | 192);
					utftext += String.fromCharCode((c & 63) | 128);
				}
				else {
					utftext += String.fromCharCode((c >> 12) | 224);
					utftext += String.fromCharCode(((c >> 6) & 63) | 128);
					utftext += String.fromCharCode((c & 63) | 128);
				}

			}

			return utftext;
		}
	};

	function getInlineStyles(el, rules) {

		rules = rules || [];

		var rulesList = [
			'padding-top',
			'padding-left',
			'padding-right',
			'padding-bottom',
			'margin-top',
			'margin-left',
			'margin-right',
			'margin-bottom',
			'font-size',
			'font-family',
			'text-align',
			'vertical-align',
			'border-top-style',
			'border-left-style',
			'border-right-style',
			'border-bottom-style',
			'border-top-color',
			'border-left-color',
			'border-right-color',
			'border-bottom-color',
			'border-top-width',
			'border-left-width',
			'border-right-width',
			'border-bottom-width',
			'text-transform',
			'text-shadow',
			'text-decoration',
			'background-color',
			'color'
		].concat(rules);

		var style = [];

		for (var i = rulesList.length - 1; i >= 0; i--) {
			var rule = rulesList[i];
			var value = el.css(rule);
			if (typeof value !== 'undefined' && value.length) {

				if (rule == 'background-color' && (value === 'rgba(0, 0, 0, 0)' || value === 'transparent')) {
					continue;
				}

				if (value === '0px' || value === 'none') {
					continue;
				}

				style.push(rule + ':' + value + ';');
			}
		}

		return style.join('');
	}

	function getTextWidth(text, font) {
		var $text = $('<div>' + text + '</div>')
				.css({
					'position': 'absolute',
					'float': 'left',
					'white-space': 'nowrap',
					'visibility': 'hidden',
					'font': font
				})
				.appendTo('body'),
			width = $text.width();
		$text.remove();
		return width;
	}

	$(document).ready(function () {
		$('.supsystic-table').each(function () {
			var $table = $(this),
				$editableFields = $table.find('td.editable'),
				useEditableFields = typeof(editableFields) != 'undefined' && typeof(editableFields[$table.data('id')]) != 'undefined' ? editableFields[$table.data('id')] : false;

			if ($editableFields.length > 0 && useEditableFields) {
				setEditableFields($table, $editableFields);
			} else if ($editableFields.length > 0 && SDT_DATA.isAdmin && SDT_DATA.isPro) {
				createEditableFields($table, $editableFields);
			}
		});

		function setEditableFields($table, $editableFields) {
			$.when(
				getCachedScript(rulejsLibraries.libs),
				getCachedScript(rulejsLibraries.parser),
				getCachedScript(rulejsLibraries.rulejs),
				$.Deferred(function(deferred) {
					$(deferred.resolve);
				})
			).done(function() {
					createEditableFields($table, $editableFields);
				}).fail(function(xhr, error) {
					console.log(xhr, error);
				});
		}
		function createEditableFields($table, $editableFields) {
			var dataTableInstance = app.getTableInstanceById($table.data('id')),
				$inputArea = $('<input type="text" class="inputArea" />'),
				rootElementId,
				_ruleJS;

			$inputArea.css({
				display: 'none',
				position: 'absolute',
				border: '2px solid #ddd',
				resize: 'none',
				overflow: 'hidden',
				padding: '5px 10px',
				margin: '0'
			}).appendTo($table);

			rootElementId = $table.closest('.supsystic-tables-wrap').attr('id');
			_ruleJS = new ruleJS(rootElementId);

			$editableFields.on('click', function(event) {
				event.preventDefault();

				var $td = $(this),
					font = $td.css('font'),
					tdWidth = $td.innerWidth(),
					tdHeight = $td.innerHeight(),
					value = $td.data('formula') ? $td.data('formula') : $td.data('original-value'),
					formula = $td.data('formula'),
					triggerEvent = ((typeof($.browser) != 'undefined' && $.browser.msie) || !!navigator.userAgent.match(/Trident\/7\./)) ? 'focusout' : 'blur';

				// To remove unneeded zeros from end of percent values, e.g. 15.230000000001
				if(!formula && $td.data('cell-format-type') == 'percent') {
					var round = $td.data('cell-format').match(/\d+/g),
						fixed = round[round.length - 1] != 'undefined' ? round[round.length - 1].length : 0;

					value = (value*100).toFixed(fixed);
				}

				$inputArea.css({
					width: tdWidth + 1,	// To cover cell right border
					height: tdHeight + 1,	// To cover cell bottom border
					top: $(this).position().top,
					left: $(this).position().left
				})
					.off('keypress').on('keypress', function(event) {
						// Enter button
						if ((event.keyCode || event.which) == 13) {
							event.preventDefault();
							$(this).trigger(triggerEvent);
							return true;
						}
					})
					.off('keydown').on('keydown', function(event) {
						// Tab button
						if ((event.keyCode || event.which) == 9) {
							event.preventDefault();
							$(this).trigger(triggerEvent);
							$($editableFields[$editableFields.index($td) + 1]).trigger('click');
						}
					})
					.val(value)
					.off(triggerEvent).on(triggerEvent, function() {
						var newValue = $.trim($inputArea.val()),
							originalValue = $td.data('original-value') !== undefined,
							formula = $td.data('formula') !== undefined;

						// Set formula value
						if (formula) {
							$td.data('formula', newValue);
							$td.attr('data-formula', newValue);
						}
						// Set original value for cells without formulas
						if (originalValue && !formula) {
							if($td.data('cell-format-type') == 'percent') {
								newValue = (newValue / 100).toString();
							}
							$td.data('original-value',newValue);
							$td.attr('data-original-value',newValue);
						}

						$inputArea.hide();
						$td.text(newValue);
						_ruleJS.init();	// Parse formulas

						// Set original value for cells with formulas
						if (originalValue && formula) {
							var newOriginalValue = $td.html();	// We need to set unformat value which we get after ruleJS init

							$td.data('original-value', newOriginalValue);
							$td.attr('data-original-value', newOriginalValue);
						}
						app.formatDataAtTable($table);	// Set formats

						// Update table sorting
						if(dataTableInstance) {
							dataTableInstance.api().cell($td).invalidate();
						}

						if($td.parents('table:first').data('save-editable-fields')) {
							app.request({
								module: 'tables',
								action: 'saveEditableField'
							}, {
								id: $td.parents('table.supsystic-table:first').data('id'),
								column: $td.data('x'),
								row: $td.data('y'),
								value: formula ? '=' + newValue : newValue,
								original: formula ? $td.attr('data-original-value') : ''
							});
						}
					})
					.show()
					.focus()
					.select();
			});
		}

		function getOriginalImgSize(img) {
			var image = new Image();
			image.src = (img.getAttribute ? img.getAttribute("src") : false) || img.src;
			return {
				width: image.width,
				height: image.height
			};
		}

		function collectTableData($tableWrapper) {
			$.each($tableWrapper.find('img'), function() {
				var $img = $(this),
					$td = $img.closest('td'),
					tdWidth = $td.width(),
					tdHeight = $td.height(),
					imgSize = getOriginalImgSize(this);
				if (imgSize.height > tdHeight || imgSize.width > tdWidth) {
					$img.attr('data-max-width', tdWidth);
					$img.attr('data-max-height', tdHeight);
				}
			});

			$tableWrapper.find('table, tr, td, th').each(function(index, el) {
				var $el = $(el),
					style = $el.attr('style') || '';
				$el.attr('data-style', style + getInlineStyles($el));
			});

			var $tableClone = $tableWrapper.clone(),
				$table = $tableClone.find('.supsystic-table'),
				$styles = $('link#supsystic-tables-shortcode-css-css, link#supsystic-tables-shortcode-pro-css').clone().prependTo($tableClone),
				data,
				orientation = 'portrait',
				tableStyle = getInlineStyles($tableWrapper.find('.supsystic-table')),
				tableCaptionStyle = getInlineStyles($tableWrapper.find('.supsystic-table > caption'), [
					'background-color',
					//'background',
					'font-weight',
					'line-height',
					'color',
				]),
				tableTHStyle = getInlineStyles($tableWrapper.find('th:first')),
				tableTRStyle = getInlineStyles($tableWrapper.find('tr:first')),
				tableTDStyle = getInlineStyles($tableWrapper.find('td:first')),
				logoData = $table.attr('data-export-logo');

			if ($table.find('tr:first th').length > 3) {
				orientation = 'landscape';
			}

			$table.css('width', '100%');
			$table.find('[data-max-width]').each(function() {
				var $img = $(this);
				$img.css({
					'max-width': $img.attr('data-max-width') + 'px',
					'width': $img.attr('data-max-width') + 'px',
					'max-height': $img.attr('data-max-height') + 'px'
				});
			});

			$('<style type="text/css">@media print{@page { size: '+ orientation +'; }}' +
			'* {-webkit-print-color-adjust: exact;}' +
			'table.supsystic-table {width: 100%}' +
			'table.supsystic-table img { max-width:none;max-height:none; }</style>')
				.insertAfter($styles.last());

			$tableClone.find('.supsystic-table > caption')
				.attr('style', tableCaptionStyle);

			$tableClone.find('.supsystic-tables-features, .inputArea, .dataTables_filter').remove();

			$tableClone.find('table, tr, td, th').each(function(index, el) {
				var $el = $(el);
				$el.attr('style', $el.attr('data-style'));
				$el.removeAttr('data-original-value data-style data-x data-y');
			});

			if (logoData) {

				logoData = JSON.parse(logoData);

				var $img = $('<img>', {src: logoData.src})
					.css({
						'max-width': '100%'
					}).wrap('<div>').parent().css({
						'width': '100%',
						'text-align': logoData.alignment,
						'margin': '10px 0'
					});

				if (logoData.position == 'top') {
					$img.prependTo($tableClone);
				} else {
					$img.appendTo($tableClone);
				}
			}

			return $tableClone;
		}

		$('.supsystic-tables-export .export-pdf').on('click', function() {
			var $this = $(this),
				href = $this.attr('href'),
				orientation = $this.data('orientation'),
				$table = collectTableData($this.closest('.supsystic-tables-wrap')),
				title = $table.find('table.supsystic-table:first').data('title'),
				columnsCount = $table.find('tr:first th').length,
				tableData = $table[0].outerHTML,
				tableDataArr = [],
				maxLength = 200000,
				dataRows = '',
				data = '';

			if(tableData.length > maxLength) {
				while(tableData.length > maxLength) {
					var newStr = tableData.substr(0, maxLength);

					tableDataArr.push(newStr);
					tableData = tableData.replace(newStr, '');
				}
				tableDataArr.push(tableData);
				for(var i = 0; i < tableDataArr.length; i++) {
					tableDataArr[i] = Base64.encode(tableDataArr[i])
				}
				data = tableDataArr;
			} else {
				data = Base64.encode(tableData);
			}

			if(typeof(data) == 'object') {
				for(var j = 0; j < data.length; j++) {
					dataRows += '<input type="text" name="pdf-table-data[' + j + ']" value="' + data[j] + '">';
				}
			} else {
				dataRows = '<input type="text" name="pdf-table-data" value="' + data + '">';
			}

			var form = $('<form method="post" action="' + href + '"> ' + dataRows +
			'<input type="text" name="title" value="' + title + '">' +
			'<input type="text" name="columns" value="' + columnsCount + '">' +
			'<input type="text" name="orientation" value="' + orientation + '">' +
			'</form>');

			form.hide().prependTo('body');
			form.submit();
			form.remove();
			return false;
		});

		$('.supsystic-tables-export .export-print').on('click', function(event) {
			event.preventDefault();

			var $this = $(this),
				$table = collectTableData($this.closest('.supsystic-tables-wrap'));

			function imagesLoaded(node, cb) {
				var $images = $(node).find('img'),
					imagesCount = $images.length;

				if (imagesCount === 0) {
					cb();
				}

				$images.on("load", function() {
					imagesCount--;
					if (imagesCount === 0) {
						cb();
					}
				}).each(function(i, el) {
					if (this.complete) {
						this.src = this.src + '?' + new Date().getTime();
					}
				});
			}

			var newWindow = window.open();
			newWindow.document.write($table[0].outerHTML);
			newWindow.document.close();
			$(newWindow.document).ready(function($) {
				imagesLoaded(newWindow.document, function() {
					newWindow.focus();
					setTimeout(function() {
						newWindow.print();
						newWindow.close();

					}, 50);
				});
			});
		});
	});

}(window.jQuery, window.supsystic.Tables));
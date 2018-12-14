/*!
  SerializeJSON jQuery plugin.
  https://github.com/marioizquierdo/jquery.serializeJSON
  version 2.6.2 (May, 2015)

  Copyright (c) 2012, 2015 Mario Izquierdo
  Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
  and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
*/
!function(e){if("function"==typeof define&&define.amd)define(["jquery"],e);else if("object"==typeof exports){var n=require("jquery");module.exports=e(n)}else e(window.jQuery||window.Zepto||window.$)}(function(e){"use strict";e.fn.serializeJSON=function(n){var r,t,s,i,a,u,o;return u=e.serializeJSON,o=u.setupOpts(n),t=this.serializeArray(),u.readCheckboxUncheckedValues(t,this,o),r={},e.each(t,function(e,n){s=u.splitInputNameIntoKeysArray(n.name,o),i=s.pop(),"skip"!==i&&(a=u.parseValue(n.value,i,o),o.parseWithFunction&&"_"===i&&(a=o.parseWithFunction(a,n.name)),u.deepSet(r,s,a,o))}),r},e.serializeJSON={defaultOptions:{checkboxUncheckedValue:void 0,parseNumbers:!1,parseBooleans:!1,parseNulls:!1,parseAll:!1,parseWithFunction:null,customTypes:{},defaultTypes:{string:function(e){return String(e)},number:function(e){return Number(e)},"boolean":function(e){var n=["false","null","undefined","","0"];return-1===n.indexOf(e)},"null":function(e){var n=["false","null","undefined","","0"];return-1===n.indexOf(e)?e:null},array:function(e){return JSON.parse(e)},object:function(e){return JSON.parse(e)},auto:function(n){return e.serializeJSON.parseValue(n,null,{parseNumbers:!0,parseBooleans:!0,parseNulls:!0})}},useIntKeysAsArrayIndex:!1},setupOpts:function(n){var r,t,s,i,a,u;u=e.serializeJSON,null==n&&(n={}),s=u.defaultOptions||{},t=["checkboxUncheckedValue","parseNumbers","parseBooleans","parseNulls","parseAll","parseWithFunction","customTypes","defaultTypes","useIntKeysAsArrayIndex"];for(r in n)if(-1===t.indexOf(r))throw new Error("serializeJSON ERROR: invalid option '"+r+"'. Please use one of "+t.join(", "));return i=function(e){return n[e]!==!1&&""!==n[e]&&(n[e]||s[e])},a=i("parseAll"),{checkboxUncheckedValue:i("checkboxUncheckedValue"),parseNumbers:a||i("parseNumbers"),parseBooleans:a||i("parseBooleans"),parseNulls:a||i("parseNulls"),parseWithFunction:i("parseWithFunction"),typeFunctions:e.extend({},i("defaultTypes"),i("customTypes")),useIntKeysAsArrayIndex:i("useIntKeysAsArrayIndex")}},parseValue:function(n,r,t){var s,i;return i=e.serializeJSON,s=t.typeFunctions&&t.typeFunctions[r],s?s(n):t.parseNumbers&&i.isNumeric(n)?Number(n):!t.parseBooleans||"true"!==n&&"false"!==n?t.parseNulls&&"null"==n?null:n:"true"===n},isObject:function(e){return e===Object(e)},isUndefined:function(e){return void 0===e},isValidArrayIndex:function(e){return/^[0-9]+$/.test(String(e))},isNumeric:function(e){return e-parseFloat(e)>=0},optionKeys:function(e){if(Object.keys)return Object.keys(e);var n,r=[];for(n in e)r.push(n);return r},splitInputNameIntoKeysArray:function(n,r){var t,s,i,a,u;return u=e.serializeJSON,a=u.extractTypeFromInputName(n,r),s=a[0],i=a[1],t=s.split("["),t=e.map(t,function(e){return e.replace(/\]/g,"")}),""===t[0]&&t.shift(),t.push(i),t},extractTypeFromInputName:function(n,r){var t,s,i;if(t=n.match(/(.*):([^:]+)$/)){if(i=e.serializeJSON,s=i.optionKeys(r?r.typeFunctions:i.defaultOptions.defaultTypes),s.push("skip"),-1!==s.indexOf(t[2]))return[t[1],t[2]];throw new Error("serializeJSON ERROR: Invalid type "+t[2]+" found in input name '"+n+"', please use one of "+s.join(", "))}return[n,"_"]},deepSet:function(n,r,t,s){var i,a,u,o,l,c;if(null==s&&(s={}),c=e.serializeJSON,c.isUndefined(n))throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined");if(!r||0===r.length)throw new Error("ArgumentError: param 'keys' expected to be an array with least one element");i=r[0],1===r.length?""===i?n.push(t):n[i]=t:(a=r[1],""===i&&(o=n.length-1,l=n[o],i=c.isObject(l)&&(c.isUndefined(l[a])||r.length>2)?o:o+1),""===a?(c.isUndefined(n[i])||!e.isArray(n[i]))&&(n[i]=[]):s.useIntKeysAsArrayIndex&&c.isValidArrayIndex(a)?(c.isUndefined(n[i])||!e.isArray(n[i]))&&(n[i]=[]):(c.isUndefined(n[i])||!c.isObject(n[i]))&&(n[i]={}),u=r.slice(1),c.deepSet(n[i],u,t,s))},readCheckboxUncheckedValues:function(n,r,t){var s,i,a,u,o;null==t&&(t={}),o=e.serializeJSON,s="input[type=checkbox][name]:not(:checked):not([disabled])",i=r.find(s).add(r.filter(s)),i.each(function(r,s){a=e(s),u=a.attr("data-unchecked-value"),u?n.push({name:s.name,value:u}):o.isUndefined(t.checkboxUncheckedValue)||n.push({name:s.name,value:t.checkboxUncheckedValue})})}}});




var g_SupsysticTablesDiagramAxeColorTimeoutSet = false,
	g_SupsysticTablesDiagramAxeColorLast = '',
	chartCreateData = {};
(function ($, app, undefined) {

    var isFormula = function (value) {
        if (value) {
            if (value[0] === '=') {
                return true;
            }
        }

        return false;
    };

	function drawChart(range, options, chartType, id) {

		selectedRangeData = $.extend(true, [], range.data);
		preparedData = prepareChartData(selectedRangeData, chartType);
		chartData = new google.visualization.arrayToDataTable(preparedData);
		options = options || {};

		var defaults = {
			width: '100%',
			height: '100%',
			pointSize: 5,
			chartArea: {
				left: "10%",
				top: "10%",
				height: "80%",
				width: "80%"
			}
		};

		options = $.extend(defaults, options);
		var chart = new google.visualization[chartType](document.getElementById(id));
		chart.draw(chartData, options);
		chartCreateData.table_id = range.table_id;
		chartCreateData.type = chartType;
		chartCreateData.options = options;
		chartCreateData.params = collectChartParams();
		chartCreateData.selection = range.selection;
		chartCreateData.rangeData = preparedData;
		chartCreateData.linesCount = preparedData;
	}

	function drawPreviewChart(id) {

		id = id || 'diagram';

		try {
			range = getSelectedRangeData();
		} catch(error) {
			alert(error);
			return;
		}
		chartType = getChartType();
		if (chartType) {
			$('.PieChart, .LineChart').show();
			$('.PieChart, .LineChart').not('.' + chartType).hide();
			$('.hideForPieChart').hide();
			$('.hideForPieChart').not('.hideFor' + chartType).show();
			drawColorPickers(chartData);
			drawChart(range, collectChartOptions(), chartType, id);
		}
	}

    function prepareChartData(selectedRangeData, chartType) {

        function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        function fillArray(count, fillData) {
            return Array.apply(null, Array(count)).map(function() {
                return fillData;
            });
        }

        function formatHeaders(data) {
            if (!$('#switchRowsColumns').is(':checked')) {
                // Headers
                if (!$('#useFirstRow').is(':checked')) {
                    if (data[0] instanceof Array) {
                        for (var i = 0; i < data[0].length; i++) {
                            if (isNumeric(data[0][i])) {
                                data.splice(0, 0, fillArray(data[0].length, ""));
                                break;
                            }
                        }
                    }
                } else {
                    for (var i = 0; i < data[0].length; i++) {
                        data[0][i] = String(data[0][i]);
                    }
                }
                // Labels
                if (!$('#useFirstColumn').is(':checked')) {
                    for (var i = 0; i < data.length; i++) {
                        if (isNumeric(data[i][0])) {
                            for (var i = 0; i < data.length; i++) {
                                data[i].splice(0, 0, "");
                            }
                            break;
                        }
                    }
                } else {
                    for (var i = 0; i < data.length; i++) {
                        data[i][0] = String(data[i][0]);
                    }
                }
                
            } else {
                // Labels
                if ($('#useFirstRow').is(':checked')) {
                    for (var i = 0; i < data[0].length; i++) {
                        data[0][i] = String(data[0][i]);
                    }
                } else {
                    if (typeof data[1][0] !== 'string') {
                        for (var i = 0; i < data.length; i++) {
                           data[i].splice(0, 0, "");
                        }
                    }
                }
                // Headers
                if (!$('#useFirstColumn').is(':checked')) {
                    if (data[0] instanceof Array) {
                        for (var i = 0; i < data[0].length; i++) {
                            if (!isNumeric(data[0][i])) {
                                for (var j = 0; j < data[0].length; j++) {
                                    data[0][j] = "";
                                }
                                break;
                            }
                        }
                    }
                } else {
                    for (var i = 0; i < data[0].length; i++) {
                        data[0][i] = String(data[0][i]);
                    }
                }
            }

            if (data[0].length < 2) {
                data.splice(0, 0, fillArray(data[0].length, ""));
            }

            return data;
        }

        function formatColumns(dataColumns, chartType) {

            if (!(dataColumns[0] instanceof Array)) {
                for (var i = 0; i < dataColumns.length; i++) {
                    dataColumns[i] = [dataColumns[i]];
                }
            } 

            for (var i = 0; i < dataColumns.length; i++) {
                for (var j = 0; j < dataColumns[i].length; j++) {
                    if (!isNaN(Number(dataColumns[i][j])) && 
                        dataColumns[i][j].length) {
                        dataColumns[i][j] = Number(dataColumns[i][j]);
                    }
                }
            }
            return formatHeaders(dataColumns);
        }

        function formatRows(dataRows, chartType) {
            dataTemp = [];

            if (!(dataRows[0] instanceof Array)) {
                for (var i = 0; i < dataRows.length; i++) {
                    dataRows[i] = [dataRows[i]];
                }
            } 

            for (var i = 0; i < dataRows.length; i++) {
                for (var j = 0; j < dataRows[i].length; j++) {
                    dataTemp[j] = dataTemp[j] || [];
                    dataTemp[j][i] = dataTemp[j][i] || [];
                    if (!isNaN(Number(dataRows[i][j])) && dataRows[i][j].length) {
                        dataTemp[j][i] = Number(dataRows[i][j]);
                    } else {
                        dataTemp[j][i] = dataRows[i][j];
                    }
                }
            }

            return formatHeaders(dataTemp);
        }

        if ($('#switchRowsColumns').is(':checked')) {
            rangeData = formatRows(selectedRangeData, chartType);
        } else {
            rangeData = formatColumns(selectedRangeData, chartType);
        }

        return rangeData;
    }

	function collectChartParams() {
		paramsData = {};
		$('#previewDiagramDialog [data-tab="#type"] input[type="checkbox"]').each(function() {
				var id = $(this).attr('id');

				if($(this).attr('checked')) {
					paramsData[id] = $(this).val();
				} else {
					paramsData[id] = false;
				}
			});
		return paramsData;
	}

    function collectChartOptions() {
        $settingsTab = $('#previewDiagramDialog [data-tab="#settings"]');
        inititalStateHidden = false;
        if (!$settingsTab.hasClass('active')) {
            inititalStateHidden = true;
            $settingsTab.addClass('active');
        }
        optionsData = $('#previewDiagramDialog [data-tab="#settings"] :input').filter(':visible').serializeJSON();
		if(typeof(optionsData.en_custom_colors) != 'undefined') {
			optionsData = $('#previewDiagramDialog [data-tab="#settings"] :input').filter(':visible, input[type="hidden"]').serializeJSON();
		}
        if (inititalStateHidden) {
            $settingsTab.removeClass('active');
        }
        return optionsData;
    }

    function getSelectedRangeData() {
        var editor = app.Editor.Hot,
            selection = editor.getSelectedRange(),
            data = editor.getSourceData(selection.from.row, selection.from.col, selection.to.row, selection.to.col),
			r = 0,
			c = 0;

        if (selection === undefined) {
            //noinspection ExceptionCaughtLocallyJS
            throw new Error('You must select at least one cell.');
        }
		try{
			for(var i = 0; i < data.length; i++) {
				for(var j = 0; j < data[0].length; j++) {
					if (data[i][j] && app.Models.Tables.isFormula(data[i][j])) {
						data[i][j] = app.Models.Tables.getFormulaResult(data[i][j], i, j);
					}
				}
			}
		} catch(e) {
			//noinspection ExceptionCaughtLocallyJS
			throw new Error('Can\'t get table data.');
		}

        return { table_id: app.getParameterByName('id'), data: data, selection: selection };
    }

    function loadChartTypes() {

        var previewData = [
            ["Data 1", "Data 2"],
            [200, 100],
            [400, 500],
            [300, 200],
            [300, 400]
        ],
        options = {
            titlePosition: 'none',
            pointSize: 0,
            enableInteractivity: false,
            chartArea: {
                left: "10%",
                top: "30%",
                bottom: "5%",
                height: "65%",
                width: "80%"
            },
            hAxis: {
                format: ''
            }
        },
		data = {
			table_id: '',
			data: previewData,
			selection: ''
		};

        $.each($('.selectChartType .chart'), function() {
            var $this = $(this),
                chartType = $this.find('.chart-container').attr('id');

            drawChart(data, options, chartType, chartType);
        });
    }

    var init = false;

    var onAddDiagramClicked = function () {

        $('#previewDiagramDialog').dialog('open');

		if (!init && !google.visualization) {
			google.charts.load('current', {packages: ['corechart']});
			google.charts.setOnLoadCallback(loadChartTypes);
			init = true;
		} else if (!init && google && google.visualization) {
			loadChartTypes();
			init = true;
		}
      
        drawPreviewChart();
    };

    var registerToolbarCallback = function (fn) {
        app.Editor.Tb.addMethod('addDiagram', fn);
        app.Editor.Tb.subscribe();
    };

    var createCanvas = function (id) {
        var $container = $('<div/>', {class: 'diagram col-xs-6'}),
            $shortcode = $('#shortcodeName'),
            $canvas = $('<div/>', {class: 'canvas'}),
            $info = $('<div/>', {class: 'info'});

        // Create DIV where we will draw diagram:
        $('<div/>', {id: 'diagram' + id, class: 'supsystic-table-diagram'}).appendTo($canvas);

        // Create layer with the shortcode:
        $('<div/>', {class:'shortcode'})
            .append(
                $('<input/>', {readonly:'readonly',type:'text'})
                    .val(function () {
                        return "["+ $shortcode.text() +" id='"+id+"']";
                    })
                    .on('click', function () {
                        this.select();
                    })
            ).append(
                $('<button/>', {class:'button'})
                    .append(
                        $('<i/>', {class:'fa fa-fw fa-trash-o'})
                    )
                    .on('click', function () {
                        if (!confirm('Are you sure?')) {
                            return;
                        }


                        deleteDiagram(id).done(function () {
                            $container.remove();
                        }).fail(function (err) {
                            alert('Failed to remove diagram: ' + err);
                        });
                    })
            ).appendTo($info);

        $container
            .append($canvas)
            .append($info)
            .appendTo('#row-tab-diagrams');

        return $canvas.find('#diagram' + id);
    };

    var deleteDiagram = function (id) {
        return app.request({
            module: 'diagram',
            action: 'remove'
        }, {
            id: id
        });
    };

	function getDefColors() {
		return ['#3366cc', '#dc3912', '#ff9900', '#109618', '#990099', '#0099c6', '#dd4477', '#6a0', '#b82e2e', '#316395'];
	}

	function removeColorPickers(count) {
		count = count ? parseInt(count) : false;

		if(count) {
			$('.optionContainer.chartColors').find('.chartColorContainer').each(function() {
				if(count) {
					if($(this).is(':nth-last-child(' + count + ')')) {
						$(this).remove();
						--count;
					}
				}

			});
		} else {
			$('.optionContainer.chartColors').find('.chartColorContainer').each(function() {
				$(this).remove();
			});
		}

	}

	function currentColorPickersCount() {
		var i = 0;
		$('.optionContainer.chartColors').find('.chartColorContainer').each(function() {
			i++;
		});
		return i;
	}

	function drawColorPickers() {
		var chartDefColors = getDefColors(),
			existsColors = currentColorPickersCount(),
			totalColors = getChartType() == 'PieChart' ? chartCreateData.rangeData.length - 1 : chartCreateData.rangeData[0].length - 1;
		
		if(totalColors > existsColors) {
			var needToAdd = totalColors - existsColors;

			for(var i = 1; i <= needToAdd; i++) {
				var example = $('#chartColorContainerExample'),
					colorpicker = example.clone(),
					newId = 'chartColor_' + (existsColors + i - 1),
					color = typeof(chartDefColors[existsColors + i - 1]) != 'undefined' ? chartDefColors[existsColors + i - 1] : '#000000';

				colorpicker
					.attr('id', newId)
					.attr('class', 'chartColorContainer')
					.appendTo(example.parents('.optionContainer.chartColors:first'));
				colorpicker.find('.chartColorArea').css('backgroundColor', color);
				colorpicker.find('input').attr('type', 'hidden').val(color);
				colorpicker.show();

				colorpicker.ColorPicker({
					color: color,
					onShow: function (colpkr) {
						$(colpkr).css('z-index', '9999999999999');
						$(colpkr).fadeIn(500);
						return false;
					},
					onHide: function (colpkr) {
						$(colpkr).fadeOut(500);
						return false;
					},
					onChange: function (hsb, hex, rgb) {
						var self = this;
						g_SupsysticTablesDiagramAxeColorLast = hex;

						if(!g_SupsysticTablesDiagramAxeColorTimeoutSet) {
							setTimeout(function(){
								g_SupsysticTablesDiagramAxeColorTimeoutSet = false;
								$(self).find('.colorpicker_submit').trigger('click');
							}, 500);
							g_SupsysticTablesDiagramAxeColorTimeoutSet = true;
						}
					},
					onSubmit: function(hsb, hex, rgb, el) {
						$(el).find('.chartColorArea').css('backgroundColor', '#' + g_SupsysticTablesDiagramAxeColorLast);
						$(el).find('input').val('#' + g_SupsysticTablesDiagramAxeColorLast);
						drawPreviewChart();
					}
				});
			}
		} else if(totalColors < existsColors) {
			var needToRemove = existsColors - totalColors;
			removeColorPickers(needToRemove)
		}
	}

	function initCharts() {
        $previewDialog = $('#previewDiagramDialog').dialog({
            autoOpen: false,
            width:    900,
            height:   'auto',
            modal:    true,
			close: function() {
				removeColorPickers();
			},
            buttons:  {
                Close: function () {
                    $(this).dialog('close');
                },
                Create: function (event) {
                    $this = $(this);
                    if (!getChartType()) {
                        alert('Chart type is not selected');
                        return;
                    }
                    app.request({
                        module: 'diagram',
                        action: 'save'
                    }, {
                        data: JSON.stringify(chartCreateData),
                        table_id: app.getParameterByName('id'),
                    }).fail(function (error) {
                        alert('Failed to save diagram: ' + error);
                    }).done(function (response) {
						$('#row-tab-diagrams').find('.tutorial').hide();
                        $('.button[href="#row-tab-diagrams"]').click();
                        drawPreviewChart(createCanvas(response.id).attr('id'));
                        $this.dialog('close');
                    });
                }
            }
        });

        registerToolbarCallback(onAddDiagramClicked);

        $('#previewDiagramDialog [data-tabs] a').on('click', function(event) {
            event.preventDefault();

            $('#previewDiagramDialog [data-tabs] a').removeClass('active');
            $(this).addClass('active');
            
            $('#previewDiagramDialog [data-tab]').removeClass('active');
            $('#previewDiagramDialog [data-tab="' + $(this).attr('href') + '"]').addClass('active');
        });

        $('#switchRowsColumns').on('change ifChanged', function(event) {
            $frSpan =  $('#useFirstRow').closest('label').find('span');
            $fcSpan = $('#useFirstColumn').closest('label').find('span');
            if ($(this).is(':checked')) {
                $frSpan.text($frSpan.text().replace('headers', 'labels'));
                $fcSpan.text($fcSpan.text().replace('labels', 'headers'));
            } else {
                $frSpan.text($frSpan.text().replace('labels', 'headers'));
                $fcSpan.text($fcSpan.text().replace('headers', 'labels'));
            }
        }).trigger('change');

		$('input[name="en_custom_colors"]').on('change ifChanged', function(event) {
			if ($(this).is(':checked')) {
				$('.optionContainer.chartColors').show();
			} else {
				$('.optionContainer.chartColors').hide()
			}
		});

        $('.selectChartType .chart').on('click', function(event) {
            $('.selectChartType .chart').removeClass('active');
            $(this).addClass('active');
            drawPreviewChart();
        });

        $('#chartType, #previewDiagramDialog [data-tab="#settings"] :input').on('change ifChanged', function(event) {
	        drawPreviewChart();
        });
		$('#switchRowsColumns, #useFirstRow, #useFirstColumn').on('change ifChanged', function(event) {
			if($('.selectChartType .chart.active').length) {
				// Need to do it twice for normal work of custom colorpickers
				$('.selectChartType .chart.active').trigger('click');
				$('.selectChartType .chart.active').trigger('click');
			}
		});
    }

    function getChartType() {
        return $('.selectChartType .chart.active .chart-container').attr('id');
    }

    $(document).ready(function () {
		$('#openEditorTab').on('click', function(event) {
			event.preventDefault();
			jQuery('.tabs-wrapper a[href="#row-tab-editor"]').trigger('click');
		});

        initCharts();

        $('.delete-diagram').on('click', function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            var $btn = $(this);

            deleteDiagram($btn.attr('data-diagram-id')).done(function () {
                $btn.parents('.prerendered-diagram').remove();
            }).fail(function (err) {
                alert('Failed to remove diagram: ' + err);
            });
        });
    });
}(window.jQuery, window.supsystic.Tables));
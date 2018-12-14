(function ($, app, undefined) {

    var Chart = function (data, start_row, start_col, end_row, end_col) {
        this.data = data;
        this.selection = {
            from: {
                row: parseInt(start_row),
                col: parseInt(start_col)
            },
            to: {
                row: parseInt(end_row),
                col: parseInt(end_col)
            }
        }
    };

    Chart.extend = function (child) {
        var F = function() {};
        F.prototype = Chart.prototype;
        child.prototype = new F();
        child.prototype.constructor = child;
        child.superClass = Chart.prototype;

    };

    Chart.prototype.getSelectionHeight = function () {
        return Math.max(this.selection.from.row, this.selection.to.row) - Math.min(this.selection.from.row, this.selection.to.row) + 1;
    };

    Chart.prototype.render = function (element, options) {
        throw new Error('Method not implemented.');
    };

// ----


    var LineChart = function () {
        LineChart.superClass.constructor.apply(this, arguments);
    };

    Chart.extend(LineChart);

    LineChart.prototype.render = function (element, options) {
        // Prepare options
        options = options || {};
        $.jqplot.config.enablePlugins = true;

        var labels = [],
            hasText = false;
        for (var i = 0; i < this.data.length; i++) {
            var value = this.data[i][0];

            if (!hasText && isNaN(Number(value))) {
                hasText = true;
            }

            labels.push(value);
        }

        options.highlighter = {
            sizeAdjust: 8,
            tooltipLocation: 'n',
            tooltipAxes: 'y',
            useAxesFormatters: true,
            tooltipContentEditor: function(str, seriesIndex, pointIndex, plot) {
                return labels[seriesIndex] + ': ' + str;
            },
        };

        // Set the labels if needed
        if (hasText) {
            options.series = options.series || [];

            $.each(labels, function (index, label) {
                options.series.push({
                    label: label
                });
            });

            options.legend = options.legend || {};
            options.legend.show = true;
        }

        // Fix for chart height
        options.axes = options.axes || {};
        options.axes.yaxis = options.axes.yaxis || {};

        if (!options.axes.yaxis.max) {
            options.axes.yaxis.max = 0;
        }

        if (!options.axes.yaxis.min) {
            options.axes.yaxis.min = 0;
        }

        var data = [];

        $.each(this.data, function (row, columns) {
            if (hasText) {
                columns.splice(0, 1);
            }

            $.each(columns, function (col, value) {
                // Looking for highest & lowest value
                if (!isNaN(Number(value))) {
                    var numericValue = Number(value);

                    if (numericValue > options.axes.yaxis.max) {
                        options.axes.yaxis.max = numericValue;
                    }

                    if (numericValue < options.axes.yaxis.min) {
                        options.axes.yaxis.min = numericValue;
                    }
                }

                if (data[row] === undefined) {
                    data[row] = [];
                }

                data[row][col] = value;
            });
        });

        options.axes.yaxis.max = Math.floor(options.axes.yaxis.max) + Math.floor(options.axes.yaxis.max / 10);
        options.axes.yaxis.min = Math.floor(options.axes.yaxis.min) + Math.floor(options.axes.yaxis.min / 10);
        // Render the chart
        try {
            $.jqplot(element, data, options);
        } catch (e) {
            // Re-throw to the upper level.
            throw new Error(e.message);
        }
    };

    window.SupsysticTables = {};
    window.SupsysticTables.Chart = Chart;
    window.SupsysticTables.LineChart = LineChart;

}(window.jQuery));
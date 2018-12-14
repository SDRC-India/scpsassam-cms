(function ($, app) {

    function jqplotChartRender(chartData, id) {
        var data = chartData.rangeData,
        from = chartData.selection.from,
        to = chartData.selection.to;
        lineChart = new app.LineChart(data, from.row, from.col, to.row, to.col);
        lineChart.render(id);
    }

    function googleChartRender(chartData, id) {
        data = new google.visualization.arrayToDataTable(chartData.rangeData);
        var chart = new google.visualization[chartData.type](
            document.getElementById(id));
        chart.draw(data, chartData.options);
    }

    $(document).ready(function () {

		google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawCharts);
			
        function drawCharts() {    
            $('.supsystic-table-diagram').each(function () {
                var $this = $(this),
                chartData = $this.data('chartdata'),
                chartType = $this.data('charttype');
                if (chartType == 'google') {
                    googleChartRender(chartData, $this.attr('id'));
                } else if (chartType == 'jqplot') {
                    jqplotChartRender(chartData, $this.attr('id'));
                }
            });
        }
        
    });

}(window.jQuery, window.SupsysticTables));
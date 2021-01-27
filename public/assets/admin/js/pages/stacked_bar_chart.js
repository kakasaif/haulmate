$(document).ready(function () {
    // New Chart
    var chartCanvas = document.getElementById("chartCanvas");
    chartCanvas.style.backgroundColor = 'rgb(255,255,255)';

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 16;

    var chartData = {
        labels: chartLabels,
        datasets: chartDatasets
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        },
        tooltips: {
            mode: 'index',
            intersect: false
        },
        responsive: true,
        scales: {
            xAxes: [{
                    stacked: true,
                }],
            yAxes: [{
                    stacked: true
                }]
        }
    };

    var chart = new Chart(chartCanvas, {
        type: 'bar',
        data: chartData,
        options: chartOptions
    });

});
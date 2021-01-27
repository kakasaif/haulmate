$(document).ready(function () {

    // New Sign-ups
    var signupCanvas = document.getElementById("graphSignup");
    signupCanvas.style.backgroundColor = 'rgb(255,255,255)';

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 16;

    var signupData = {
        labels: [],
        datasets: [{
                label: "Number of New Sign-ups",
                data: [],
                backgroundColor: []
            }]
    };

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        $.ajax({
            url: url,
            data: data,
            method: 'POST',
            success: function (result) {
                signupData.labels = result.signup_labels;
                signupData.datasets[0].data = result.signup_values;
                signupData.datasets[0].backgroundColor = result.signup_colors;
                signupChart.update();
            }
        });
    });

    $('#filterForm').submit();

    var signupChartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        }
    };

    var signupChart = new Chart(signupCanvas, {
        type: 'bar',
        data: signupData,
        options: signupChartOptions
    });

    // Most popular Locations
    var topLocations = document.getElementById("topLocations");
    topLocations.style.backgroundColor = 'rgb(255,255,255)';

    var topLocationsChartOption = {
        type: 'bar',
        data: topLocationsData,
        options: {
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
        }
    };

    var locationsChart = new Chart(topLocations, topLocationsChartOption);

    // Most popular services
//    var topServices = document.getElementById("topServices");
//    topServices.style.backgroundColor = 'rgb(255,255,255)';
//
//    var servicesData = {
//        label: 'Most Popular Locations',
//        data: [20, 30, 15, 25, 10],
//        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"]
//    };
//
//    var servicesChart = new Chart(topServices, {
//        type: 'pie',
//        data: {
//            labels: ["Service 1", "Service 2", "Service 3", "Service 4", "Service 5"],
//            datasets: [servicesData]
//        }
//    });

    // Leads
//    var graphLeads = document.getElementById("graphLeads");
//    graphLeads.style.backgroundColor = 'rgb(255,255,255)';
//
//    var leadsData = {
//        labels: ["20 Jun", "21 Jun", "22 Jun", "23 Jun", "24 Jun",],
//        datasets: [{
//            label: "Leads count",
//            data: [4, 23, 34, 35, 22, ],
//            backgroundColor: ["#3e95cd","#8e5ea2","#3cba9f","#e8c3b9","#c45850"]
//        }]
//    };
//
//    var leadsOptions = {
//        legend: {
//            display: true,
//            position: 'top',
//            labels: {
//            boxWidth: 80,
//            fontColor: 'black'
//            }
//        }
//    };
//
//    var leadsChart = new Chart(graphLeads, {
//        type: 'bar',
//        data: leadsData,
//        options: leadsOptions
//    });

    // Preferences
    var preferences = document.getElementById("preferences");
    preferences.style.backgroundColor = 'rgb(255,255,255)';


    var preferencesChart = new Chart(preferences, {
        type: 'bar',
        data: topPreferencesData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0
                    }
                }]
            }
        }
    });

});
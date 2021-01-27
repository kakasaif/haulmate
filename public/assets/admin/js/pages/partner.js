$(document).ready(function () {
  // Most popular Partners
  var topPartners = document.getElementById('topPartners');
  topPartners.style.backgroundColor = 'rgb(255,255,255)';

  var partnersData = {
    label: 'Most Popular Partners',
    data: [],
    backgroundColor: [],
  };

  var topPartnersChartOption = {
    type: 'bar',
    data: topPartnersData,
    options: {
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      responsive: true,
      scales: {
        xAxes: [
          {
            stacked: true,
          },
        ],
        yAxes: [
          {
            stacked: true,
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  };

  var partnersChart = new Chart(topPartners, topPartnersChartOption);
});

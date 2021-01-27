$(document).ready(function () {
  // Most popular Partners
  var topHousing = document.getElementById('topHousing');
  topHousing.style.backgroundColor = 'rgb(255,255,255)';

  var housingData = {
    label: 'Most Popular Housing',
    data: [],
    backgroundColor: [],
  };

  var topHousingChartOption = {
    type: 'bar',
    data: topHousingData,
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

  var housingChart = new Chart(topHousing, topHousingChartOption);
});

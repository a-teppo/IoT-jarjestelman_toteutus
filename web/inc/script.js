window.onload = function() {
  var canvas = document.getElementById("chart").getContext("2d");

  var tempchart = new Chart(canvas, {
    type: "line",

    // The data for our dataset
    data: {
      labels: ["MA", "TI", "KE", "TO", "PE", "LA", "SU"],
      datasets: [
        {
          fill: false,
          borderColor: "rgb(0, 0, 0)",
          data: [0, -10, 5, 2, 0, -5, -10]
        }
      ]
    },
    // Configuration options go here
    options: {
        scales: {
            xAxes: [{
                gridLines: {
                  display: false,
                  drawOnChartArea: false,
                  drawBorder: false
                },
                ticks: {
                    // display: false
                    fontFamily: 'Source Sans Pro'
                }
              }],
            yAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    // display: false
                    fontFamily: 'Source Sans Pro',
                    beginAtZero: false,
                    steps: 20,
                    stepValue: 10,
                    max: 10,
                    min: -10
                },
                                
            }],
    
          },
      legend: {
        display: false
      }
    }
  });
};

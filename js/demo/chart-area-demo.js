// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Custom color variables
var primaryColor = "rgba(255, 165, 0, 1)";     // Naranja (puedes ajustar los valores RGBA para cambiar el tono)
var shadowColor = "rgba(255, 165, 0, 0.5)";   // Naranja con transparencia para la sombra
var lineColor = "rgba(0, 0, 0, 1)";           // Negro para la línea
var gastos = [1500, 2000, 1800, 2500, 2200, 3000];

function number_format(number, decimals, dec_point, thousands_sep) {
  // Asegurarse de que los valores sean números
  number = parseFloat(number);
  if (isNaN(number) || !isFinite(number)) return number;

  // Definir valores por defecto si no se proporcionan
  decimals = decimals || 0;
  dec_point = dec_point || '.';
  thousands_sep = thousands_sep || ',';

  // Redondear el número al número de decimales especificado
  var roundedNumber = number.toFixed(decimals);

  // Separar los miles con el separador especificado
  var parts = roundedNumber.split('.');
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);

  // Combinar el número con los decimales y el separador decimal
  return parts.join(dec_point);
}


// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Gastos",
      lineTension: 0.3,
      backgroundColor: shadowColor,
      borderColor: lineColor,
      pointRadius: 3,
      pointBackgroundColor: primaryColor,
      pointBorderColor: primaryColor,
      pointHoverRadius: 3,
      pointHoverBackgroundColor: primaryColor,
      pointHoverBorderColor: primaryColor,
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 5000, 20000, 30000, 25000, 30000],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgba(255, 165, 0, 0.1)",  // Naranja claro (con transparencia)
          zeroLineColor: "rgba(255, 165, 0, 0.1)",  // Naranja claro (con transparencia)
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': s/.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

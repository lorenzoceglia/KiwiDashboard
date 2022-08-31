// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

var online = $("#auth").val();
var offline = $("#not-auth").val();

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Autenticati", "Non Autenticati"],
    datasets: [{
      data: [online,offline],
      backgroundColor: ['#1cc88a','#4e73df'],
      hoverBackgroundColor: ['#17a673','#2e59d9'],
      hoverBorderColor: "rgba(234, 236, 244)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

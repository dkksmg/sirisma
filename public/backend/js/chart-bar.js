// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Metropolis"),
'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
const today = new Date();
var myBarChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Bulan " + today.toLocaleString('id-ID', {
            month: 'long'
        })],
        datasets: [{
            label: "Jumlah Permohonan Penelitian",
            backgroundColor: "rgba(0, 97, 242, 1)",
            hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
            borderColor: "#4e73df",
            data: barpenelitian,
            maxBarThickness: 35
        }, {
            label: "Jumlah Permohonan Pengambilan Data",
            backgroundColor: "rgba(88, 0, 232, 1)",
            hoverBackgroundColor: "rgba(88, 0, 232, 0.9)",
            borderColor: "#fff",
            data: barpengambilandata,
            maxBarThickness: 35
        }, {
            label: "Jumlah Permohonan Survey Awal/Studi Pendahuluan",
            backgroundColor: "rgba(0, 172, 105, 1)",
            hoverBackgroundColor: "rgba(0, 172, 105, 0.9)",
            borderColor: "#fff",
            data: barsurveyawal,
            maxBarThickness: 35
        }, {
            label: "Jumlah Permohonan Magang/PKL",
            backgroundColor: "rgba(244, 161, 0, 1)",
            hoverBackgroundColor: "rgba(244, 161, 0, 0.9)",
            borderColor: "#4e73df",
            data: barmagang,
            maxBarThickness: 35
        }]
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
                    unit: "month"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 0
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 5,
                    padding: 10,
                    callback: function(value, index, values) {
                        return value;
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }]
        },
        legend: {
            display: false
        },
        tooltips: {
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": " + (tooltipItem.yLabel);
                }
            }
        }
    }
});

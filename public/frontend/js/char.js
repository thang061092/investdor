$(document).ready(function () {
    function formatNumber(number) {
        number = number.toFixed(2) + "";
        x = number.split(".");
        x1 = x[0];
        x2 = x.length > 1 ? "." + x[1] : "";
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, "$1" + "." + "$2");
        }
        return x1 + x2;
    }

    var chart = document.getElementById("char_invest");
    if (chart != null) {
        var charInvest = chart.getContext("2d");
        var gradient = charInvest.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, "#BD9036");
        gradient.addColorStop(0.368, "#F4CC7C");
        gradient.addColorStop(0.681, "#BD9036");
        gradient.addColorStop(1, "#A6791E");
        var myCharInvest = new Chart(charInvest, {
            type: "bar",
            data: {
                labels: ["2018", "2019", "2020", "2021"],
                datalabels: {
                    display: true,
                },
                datasets: [
                    {
                        backgroundColor: "#4E6281",
                        data: [10000, 20000, 40000, 80000],
                    },
                ],
            },
            layout: {
                padding: 1000,
            },
            legend: {
                display: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                    datalabels: {
                        color: gradient,
                        anchor: "end",
                        align: "end",
                        font: {
                            weight: "bold",
                            family: "Roboto",
                            size: "18px",
                            lineHeight: 1.5,
                        },
                        formatter: function (value) {
                            return formatNumber(value) + " $";
                        },
                    },
                },
                scales: {
                    y: {
                        display: false,
                        grid: {
                            display: false,
                        },
                        max: 85000,
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                },
            },
            plugins: [ChartDataLabels],
        });
    }
});

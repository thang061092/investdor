$(document).ready(function () {
    var chart = document.getElementById("char_invest");
    if (chart != null) {
        var charInvest = chart.getContext("2d");
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
            legend: {
                display: true,
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        display: false,
                        grid: {
                            display: false,
                        },
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                },
            },
        });
    }
});

$(document).ready(function () {
    var chart = document.getElementById("char_user");
    if (chart != null) {
        var charUserCtx = chart.getContext("2d");
        var myCharUser = new Chart(charUserCtx, {
            type: "bar",
            data: {
                labels: [
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7",
                    "T8",
                    "T9",
                    "T10",
                    "T11",
                    "T12",
                ],
                datalabels: {
                    display: true,
                },
                datasets: [
                    {
                        label: "Sá»‘ User",
                        backgroundColor: "#4E6281",
                        data: [0, 100, 300, 400, 500],
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
                        display: true,
                        grid: {
                            display: true,
                        },
                    },
                    x: {
                        grid: {
                            display: true,
                        },
                    },
                },
            },
        });
    }

    var chartPercentProject = document.getElementById("char_percent");
    if (chartPercentProject != null) {
        var charPercentCtx = chartPercentProject.getContext("2d");
        var myCharPercent = new Chart(charPercentCtx, {
            type: "doughnut",
            data: {
                labels: [
                    "Äang má»Ÿ Ä‘áº§u tÆ°",
                    "ÄĂ³ng Ä‘áº§u tÆ°",
                    "Äang pending",
                    "ÄĂ£ hoĂ n thĂ nh",
                ],
                datalabels: {
                    display: true,
                },
                datasets: [
                    {
                        label: "Sá»‘ User",
                        backgroundColor: [
                            "#03204C",
                            "#51003F",
                            "#0D6000",
                            "#740700",
                        ],
                        data: [10, 50, 100, 200],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    title: {
                        display: false,
                    },
                },
            },
        });
    }

    var chartInvest = document.getElementById("char_invest");
    if (chartInvest != null) {
        var charPercentCtx = chartInvest.getContext("2d");
        var myCharPercent = new Chart(charPercentCtx, {
            type: "doughnut",
            data: {
                labels: ["Äang Ä‘áº§u tÆ°", "ÄĂ£ Ä‘áº§u tÆ°", "Äang pending"],
                datalabels: {
                    display: true,
                },
                datasets: [
                    {
                        label: "Sá»‘ tiá»n",
                        backgroundColor: ["#03204C", "#51003F", "#0D6000"],
                        data: [10, 50, 100],
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    title: {
                        display: false,
                    },
                },
            },
        });
    }
});

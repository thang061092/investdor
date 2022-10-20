$(document).ready(function () {
    const getOrCreateLegendList = (chart, id) => {
        const legendContainer = document.getElementById(id);
        let listContainer = legendContainer.querySelector("ul");

        if (!listContainer) {
            listContainer = document.createElement("ul");
            listContainer.style.display = "flex";
            listContainer.style.flexDirection = "row";
            listContainer.style.margin = 0;
            listContainer.style.padding = 0;

            legendContainer.appendChild(listContainer);
        }

        return listContainer;
    };

    const htmlLegendPlugin = {
        id: "htmlLegend",
        afterUpdate(chart, args, options) {
            const ul = getOrCreateLegendList(chart, options.containerID);

            while (ul.firstChild) {
                ul.firstChild.remove();
            }

            const items =
                chart.options.plugins.legend.labels.generateLabels(chart);

            items.forEach((item) => {
                const li = document.createElement("li");
                li.onclick = () => {
                    const { type } = chart.config;
                    if (type === "pie" || type === "doughnut") {
                        chart.toggleDataVisibility(item.index);
                    } else {
                        chart.setDatasetVisibility(
                            item.datasetIndex,
                            !chart.isDatasetVisible(item.datasetIndex)
                        );
                    }
                    chart.update();
                };

                const boxSpan = document.createElement("span");
                boxSpan.style.background = item.fillStyle;
                boxSpan.style.borderColor = item.strokeStyle;
                boxSpan.style.borderWidth = item.lineWidth + "px";

                const textContainer = document.createElement("p");
                textContainer.style.color = item.fontColor;
                textContainer.style.margin = 0;
                textContainer.style.padding = 0;
                textContainer.style.textDecoration = item.hidden
                    ? "line-through"
                    : "";

                const text = document.createTextNode(item.text);
                textContainer.appendChild(text);

                li.appendChild(boxSpan);
                li.appendChild(textContainer);
                ul.appendChild(li);
            });
        },
    };
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
                responsive: true,
                maintainAspectRatio: true,
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
                cutout: 110,
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    id: "doughnutInteriorText",
                    beforeDraw: function (chart) {
                        var width = chart.chartArea.width,
                            height = chart.chartArea.height,
                            ctx = chart.ctx;

                        ctx.restore();
                        var fontSize = (height / 114).toFixed(2);
                        ctx.font = fontSize + "em sans-serif";
                        ctx.textBaseline = "middle";

                        var text = chart.data.datasets[0].data.reduce(
                            (partialSum, a) => partialSum + a,
                            0
                            ),
                            textX = Math.round(
                                (width - ctx.measureText(text).width) / 2
                            ),
                            textY =
                                height / 2 +
                                chart.legend.height +
                                chart.titleBlock.height;

                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    },
                    legend: {
                        position: "bottom",
                    },
                    htmlLegend: {
                        containerID: "legend-container-percent",
                    },
                    legend: {
                        display: false,
                    },
                },
            },
            plugins: [htmlLegendPlugin],
        });
    }

    var chartInvest = document.getElementById("char_invest");
    if (chartInvest != null) {
        var charPercentCtx = chartInvest.getContext("2d");
        var myCharPercent = new Chart(charPercentCtx, {
            type: "doughnut",
            data: {
                labels: ["Äang Ä‘áº§u tÆ°", "ÄĂ£ Ä‘áº§u tÆ°", "Chá» xĂ¡c nháº­n"],
                datalabels: {
                    display: true,
                },
                datasets: [
                    {
                        label: "Sá»‘ tiá»n",
                        backgroundColor: ["#03204C", "#005120", "#005874"],
                        data: [10, 50, 100],
                    },
                ],
            },
            options: {
                cutout: 80,
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: "bottom",
                    },
                    title: {
                        display: false,
                    },
                    htmlLegend: {
                        containerID: "legend-container-invest",
                    },
                    legend: {
                        display: false,
                    },
                },
            },
            plugins: [htmlLegendPlugin],
        });
    }
});

$(document).ready(function () {
    updateConfig();

    function updateConfig() {
        var options = {};
        options.locale = {
            direction: $("#rtl").is(":checked") ? "rtl" : "ltr",
            format: "MM/DD/YYYY",
            separator: " - ",
            applyLabel: "Cháº¥p nháº­n",
            cancelLabel: "ÄĂ³ng",
            fromLabel: "Tá»«",
            toLabel: "Äáº¿n",
            customRangeLabel: "TĂ¹y chá»‰nh",
            daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            monthNames: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ],
            firstDay: 1,
        };
        $(".datetime-picker").daterangepicker(
            options,
            function (start, end, label) {}
        );
    }
});

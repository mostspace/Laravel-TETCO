"use strict";

var modelDetailData = (function () {
    var modelDetailDataController = function () {
        $('#modelDetailTable').on('click', '.model-table-row .td-block .dailyModelBlue', function () {
            $("#modelDetailTable").find(".active_blink").removeClass('active_blink');

            var columnNumber = $(this).parent('.td-block').index() + 1;

            $('#modelDetailTable .model-table-row .td-block.td-light-blue:nth-child(' + columnNumber + '), ' +
                '#modelDetailTable .model-table-row .td-blue:nth-child(' + columnNumber + '), ' +
                '#modelDetailTable .model-table-row .td-dark-blue:nth-child(' + columnNumber + ')').each(function () {
                $(this).addClass('active_blink');
            });
        });

        $('#modelDetailTable').on('click', '.td-block.td-sheet, .dailyModelRed', function () {
            $("#modelDetailTable").find(".active_blink").removeClass('active_blink');
        });

        $('#modelDetailTable').on('click', '.left-cnt-block .dailyModelBlue', function () {
            $("#modelDetailTable").find(".active_blink").removeClass('active_blink');
            $(this).closest('.model-table-row').find(".td-light-blue, .td-blue, .td-dark-blue").addClass('active_blink');
        });

        $('.td-date').each(function () {
            var dateText = $(this).text();
            if (dateText.includes('土')) {
                $(this).addClass('td-date-sat');
            } else if (dateText.includes('日')) {
                $(this).addClass('td-red');
            }
        });
    };

    var modelDetailModal = function () {
        $("#modelDetailTable").on("click", ".td-sheet", function () {
            var model_id = $(this).data('id');
            var model_machine_number = $(this).data('machine_number');
            var selected_model = getSelectedModel(model_id, model_machine_number, modelMonthData);

            getModelData(model_id);
            modelChart(model_id, model_machine_number, selected_model);
        });
    };

    var getSelectedModel = function (model_id, model_machine_number, data) {
        var temp_obj = {};
        var cnt = 0;

        for (var date in data) {
            var items = data[date];
            for (var i = 0; i < items.length; i++) {
                if (items[i].machine_number == model_machine_number) {
                    cnt++;
                    if (items[i].id == model_id) {
                        temp_obj['extra_sheet'] = items[i].extra_sheet;
                        temp_obj['date'] = items[i].date;
                        temp_obj['model_order'] = cnt;

                        return temp_obj;
                    }
                }
            }
        }

        return temp_obj;
    };

    var updateTable = function (modelData) {
        var tbody = $("#modalTableBody");

        console.log(modelData);

        tbody.empty();
        tbody.append("<tr>" +
            "<td>" + modelData.machine_number + "</td>" +
            "<td>" + modelData.g_number + "</td>" +
            "<td>" + modelData.extra_sheet + "</td>" +
            "<td>" + modelData.bb + "</td>" +
            "<td>" + modelData.rb + "</td>" +
            "<td>" + modelData.composite_probability + "</td>" +
            "<td>" + modelData.bb_probability + "</td>" +
            "<td>" + modelData.rb_probability + "</td>" +
            "</tr>");

        $('#dataModal').modal('show');
    };

    var getModelData = function (model_id) {
        $.ajax({
            url: "/model-data",
            type: "POST",
            data: {
                model_id: model_id,
            },
            success: function (response) {
                var modelData = response.model;
                updateTable(modelData);
            },
            error: function (error) {
                console.error('Ajax request failed: ', error);
            }
        });
    };

    var getCurrentModelData = function (model_id, model_machine_number, data) {
        var temp_obj = [];

        for (var date in data) {
            var items = data[date];
            for (var i = 0; i < items.length; i++) {
                if (items[i].machine_number == model_machine_number) {
                    temp_obj.push(items[i]);
                }
            }
        }

        return temp_obj;
    };

    var modelChart = function (model_id, model_machine_number, selected_model) {
        var element = document.getElementById("model-chart");

        if (!element) { return; }

        var options = {
            series: [{
                name: '差枚',
                data: []
            }],
            theme: {
                mode: 'dark',
            },
            chart: {
                type: 'area',
                height: 275,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {},
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [KTApp.getSettings()['colors']['theme']['base']['primary']]
            },
            xaxis: {
                categories: [],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                },
                crosshairs: {
                    show: false,
                    position: 'front',
                    stroke: {
                        color: KTApp.getSettings()['colors']['theme']['base']['primary'],
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: false,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                enabled: true,
                style: {
                    colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                    fontSize: '12px',
                    fontFamily: KTApp.getSettings()['font-family'],
                },
                custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                    var model_data = getCurrentModelData(model_id, model_machine_number, modelMonthData);
                    var date = model_data[dataPointIndex].date;
                    var extraSheet = model_data[dataPointIndex].extra_sheet;

                    if (selected_model.extra_sheet == extraSheet && selected_model.date == date) {
                        $('.apexcharts-tooltip').removeClass('opacity-disable');
                        $('.apexcharts-tooltip').addClass('opacity-active');
                    } else {
                        $('.apexcharts-tooltip').removeClass('opacity-active');
                        $('.apexcharts-tooltip').addClass('opacity-disable');
                    }

                    var title = "<div class='apexcharts-tooltip-title fs-7'>" + date.replace(/\/(\d{1})\//, '/$1/').replace(/\/0(\d{1})/, '/$1') + "</div>";
                    var content = "<div class='apexcharts-tooltip-content fs-7 pl-3 pb-3'>" +
                        "<span>差枚: " + extraSheet + "</span>" +
                        "</div>";

                    return title + content;
                },
            },
            colors: [KTApp.getSettings()['colors']['theme']['light']['primary']],
            grid: {
                borderColor: KTApp.getSettings()['colors']['gray']['gray-200'],
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true,
                    }
                }
            },
            markers: {
                // strokeColor: KTApp.getSettings()['colors']['theme']['base']['primary'],
                size: 0,
                colors: undefined,
                strokeColors: '#fff',
                strokeWidth: 2,
                strokeOpacity: 0.9,
                strokeDashArray: 0,
                fillOpacity: 0,
                discrete: [],
                shape: "circle",
                radius: 0,
                offsetX: 0,
                offsetY: 0,
                onClick: undefined,
                onDblClick: undefined,
                showNullDataPoints: true,
                hover: {
                  size: undefined,
                  sizeOffset: 0
                }
            },
            annotations: {
                points: [
                    {
                        x: selected_model.model_order,
                        y: selected_model.extra_sheet,
                        marker: {
                            size: 9,
                            fillColor: '#ff0000',
                            strokeColor: '#ffffff',
                            radius: 2,
                            cssClass: 'apexcharts-custom-hover',
                        }
                    },
                ],
            },
        };

        var model_data = getCurrentModelData(model_id, model_machine_number, modelMonthData);

        for (var i = 0; i < model_data.length; i++) {
            options.series[0].data.push({
                x: (model_data[i].date).replace(/^.*\/(\d{1,2})\(.*\)$/, '$1').replace(/^0/, ''),
                y: model_data[i].extra_sheet
            });
        }

        options.xaxis.categories = model_data.map(item => item.date);

        var chart = new ApexCharts(element, options);
        chart.render();

        setTimeout(() => {
            var links = document.getElementsByClassName('apexcharts-grid');
            var mouseoverEvent = new Event('mouseover');
            links[0].dispatchEvent(mouseoverEvent);
        }, 1000);
    };

    return {
        init: function () {
            modelDetailDataController();
            modelDetailModal();
        }
    };
})();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = modelDetailData;
}

jQuery(document).ready(function () {
    modelDetailData.init();
});
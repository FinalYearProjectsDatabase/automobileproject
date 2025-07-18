(function($) {
    'use strict';
    $(document).ready(function() {
        var lineChartOptions = {
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            xaxis: {
                fill: '#FFFFFF',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                labels: {
                    format: 'dddd',
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#lineChart"), lineChartOptions);
        chart.render();



        var areaChartOptions = {
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chart: {
                height: 350,
                type: 'area',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 1
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            xaxis: {
                fill: '#FFFFFF',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                labels: {
                    format: 'dddd',
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#areaChart"), areaChartOptions);
        chart.render();



        var columnChartOptions = {
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chart: {
                height: 350,
                type: 'bar',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            xaxis: {
                fill: '#FFFFFF',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                labels: {
                    format: 'dddd',
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#columnChart"), columnChartOptions);
        chart.render();



        var barChartOptions = {
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            chart: {
                height: 350,
                type: 'bar',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            xaxis: {
                fill: '#FFFFFF',
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                labels: {
                    format: 'dddd',
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#barChart"), barChartOptions);
        chart.render();



        var mixedChartOptions = {
            series: [{
                name: 'TEAM A',
                type: 'column',
                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
            }, {
                name: 'TEAM B',
                type: 'area',
                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
            }, {
                name: 'TEAM C',
                type: 'line',
                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
            }],
            chart: {
                height: 350,
                type: 'line',
                stacked: false,
                toolbar: {
                    show: false
                }
            },
            stroke: {
                width: [0, 0, 2],
                curve: 'smooth'
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%'
                }
            },
              
            fill: {
                opacity: [0.85, 0.25, 1],
            },
            labels: ['01/01/2003', '02/01/2003', '03/01/2003', '04/01/2003', '05/01/2003', '06/01/2003', '07/01/2003',
                '08/01/2003', '09/01/2003', '10/01/2003', '11/01/2003'
            ],
            markers: {
                size: 0
            },
            xaxis: {
                type: 'datetime',
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " points";
                        }
                        return y;
                    }
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#mixedChart"), mixedChartOptions);
        chart.render();



        var timelineChartOptions = {
            series: [
                {
                    data: [
                        {
                            x: 'Code',
                            y: [
                                new Date('2019-03-01').getTime(),
                                new Date('2019-03-04').getTime()
                            ]
                        },
                        {
                            x: 'Test',
                            y: [
                                new Date('2019-03-04').getTime(),
                                new Date('2019-03-08').getTime()
                            ]
                        },
                        {
                            x: 'Validation',
                            y: [
                                new Date('2019-03-08').getTime(),
                                new Date('2019-03-12').getTime()
                            ]
                        },
                        {
                            x: 'Deployment',
                            y: [
                                new Date('2019-03-12').getTime(),
                                new Date('2019-03-18').getTime()
                            ]
                        }
                    ]
                },
                {
                    data: [
                        {
                            x: 'Code',
                            y: [
                                new Date('2019-03-02').getTime(),
                                new Date('2019-03-06').getTime()
                            ]
                        },
                        {
                            x: 'Test',
                            y: [
                                new Date('2019-03-05').getTime(),
                                new Date('2019-03-09').getTime()
                            ]
                        },
                        {
                            x: 'Validation',
                            y: [
                                new Date('2019-03-11').getTime(),
                                new Date('2019-03-15').getTime()
                            ]
                        },
                        {
                            x: 'Deployment',
                            y: [
                                new Date('2019-03-16').getTime(),
                                new Date('2019-03-22').getTime()
                            ]
                        }
                    ]
                }
            ],
            chart: {
                height: 350,
                type: 'rangeBar',
                toolbar: {
                    show: false
                }
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true
                }
            },
            xaxis: {
                type: 'datetime',
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#timelineChart"), timelineChartOptions);
        chart.render();



        var candlestickChartoptions = {
            series: [{
                color: '#FFFFFF',
                data: [{
                    x: new Date(1538778600000),
                    y: [6629.81, 6650.5, 6623.04, 6633.33]
                },
                {
                    x: new Date(1538780400000),
                    y: [6632.01, 6643.59, 6620, 6630.11]
                },
                {
                    x: new Date(1538782200000),
                    y: [6630.71, 6648.95, 6623.34, 6635.65]
                },
                {
                    x: new Date(1538784000000),
                    y: [6635.65, 6651, 6629.67, 6638.24]
                },
                {
                    x: new Date(1538785800000),
                    y: [6638.24, 6640, 6620, 6624.47]
                },
                {
                    x: new Date(1538787600000),
                    y: [6624.53, 6636.03, 6621.68, 6624.31]
                },
                {
                    x: new Date(1538789400000),
                    y: [6624.61, 6632.2, 6617, 6626.02]
                },
                {
                    x: new Date(1538791200000),
                    y: [6627, 6627.62, 6584.22, 6603.02]
                },
                {
                    x: new Date(1538793000000),
                    y: [6605, 6608.03, 6598.95, 6604.01]
                },
                {
                    x: new Date(1538794800000),
                    y: [6604.5, 6614.4, 6602.26, 6608.02]
                },
                {
                    x: new Date(1538796600000),
                    y: [6608.02, 6610.68, 6601.99, 6608.91]
                },
                {
                    x: new Date(1538798400000),
                    y: [6608.91, 6618.99, 6608.01, 6612]
                },
                {
                    x: new Date(1538800200000),
                    y: [6612, 6615.13, 6605.09, 6612]
                },
                {
                    x: new Date(1538802000000),
                    y: [6612, 6624.12, 6608.43, 6622.95]
                },
                {
                    x: new Date(1538803800000),
                    y: [6623.91, 6623.91, 6615, 6615.67]
                },
                {
                    x: new Date(1538805600000),
                    y: [6618.69, 6618.74, 6610, 6610.4]
                },
                {
                    x: new Date(1538807400000),
                    y: [6611, 6622.78, 6610.4, 6614.9]
                },
                {
                    x: new Date(1538809200000),
                    y: [6614.9, 6626.2, 6613.33, 6623.45]
                },
                {
                    x: new Date(1538811000000),
                    y: [6623.48, 6627, 6618.38, 6620.35]
                },
                {
                    x: new Date(1538812800000),
                    y: [6619.43, 6620.35, 6610.05, 6615.53]
                },
                {
                    x: new Date(1538814600000),
                    y: [6615.53, 6617.93, 6610, 6615.19]
                },
                {
                    x: new Date(1538816400000),
                    y: [6615.19, 6621.6, 6608.2, 6620]
                },
                {
                    x: new Date(1538818200000),
                    y: [6619.54, 6625.17, 6614.15, 6620]
                },
                {
                    x: new Date(1538820000000),
                    y: [6620.33, 6634.15, 6617.24, 6624.61]
                },
                {
                    x: new Date(1538821800000),
                    y: [6625.95, 6626, 6611.66, 6617.58]
                },
                {
                    x: new Date(1538823600000),
                    y: [6619, 6625.97, 6595.27, 6598.86]
                },
                {
                    x: new Date(1538825400000),
                    y: [6598.86, 6598.88, 6570, 6587.16]
                },
                {
                    x: new Date(1538827200000),
                    y: [6588.86, 6600, 6580, 6593.4]
                },
                {
                    x: new Date(1538829000000),
                    y: [6593.99, 6598.89, 6585, 6587.81]
                },
                {
                    x: new Date(1538830800000),
                    y: [6587.81, 6592.73, 6567.14, 6578]
                },
                {
                    x: new Date(1538832600000),
                    y: [6578.35, 6581.72, 6567.39, 6579]
                },
                {
                    x: new Date(1538834400000),
                    y: [6579.38, 6580.92, 6566.77, 6575.96]
                },
                {
                    x: new Date(1538836200000),
                    y: [6575.96, 6589, 6571.77, 6588.92]
                },
                {
                    x: new Date(1538838000000),
                    y: [6588.92, 6594, 6577.55, 6589.22]
                },
                {
                    x: new Date(1538839800000),
                    y: [6589.3, 6598.89, 6589.1, 6596.08]
                },
                {
                    x: new Date(1538841600000),
                    y: [6597.5, 6600, 6588.39, 6596.25]
                },
                {
                    x: new Date(1538843400000),
                    y: [6598.03, 6600, 6588.73, 6595.97]
                },
                {
                    x: new Date(1538845200000),
                    y: [6595.97, 6602.01, 6588.17, 6602]
                },
                {
                    x: new Date(1538847000000),
                    y: [6602, 6607, 6596.51, 6599.95]
                },
                {
                    x: new Date(1538848800000),
                    y: [6600.63, 6601.21, 6590.39, 6591.02]
                },
                {
                    x: new Date(1538850600000),
                    y: [6591.02, 6603.08, 6591, 6591]
                },
                {
                    x: new Date(1538852400000),
                    y: [6591, 6601.32, 6585, 6592]
                },
                {
                    x: new Date(1538854200000),
                    y: [6593.13, 6596.01, 6590, 6593.34]
                },
                {
                    x: new Date(1538856000000),
                    y: [6593.34, 6604.76, 6582.63, 6593.86]
                },
                {
                    x: new Date(1538857800000),
                    y: [6593.86, 6604.28, 6586.57, 6600.01]
                },
                {
                    x: new Date(1538859600000),
                    y: [6601.81, 6603.21, 6592.78, 6596.25]
                },
                {
                    x: new Date(1538861400000),
                    y: [6596.25, 6604.2, 6590, 6602.99]
                },
                {
                    x: new Date(1538863200000),
                    y: [6602.99, 6606, 6584.99, 6587.81]
                },
                {
                    x: new Date(1538865000000),
                    y: [6587.81, 6595, 6583.27, 6591.96]
                },
                {
                    x: new Date(1538866800000),
                    y: [6591.97, 6596.07, 6585, 6588.39]
                },
                {
                    x: new Date(1538868600000),
                    y: [6587.6, 6598.21, 6587.6, 6594.27]
                },
                {
                    x: new Date(1538870400000),
                    y: [6596.44, 6601, 6590, 6596.55]
                },
                {
                    x: new Date(1538872200000),
                    y: [6598.91, 6605, 6596.61, 6600.02]
                },
                {
                    x: new Date(1538874000000),
                    y: [6600.55, 6605, 6589.14, 6593.01]
                },
                {
                    x: new Date(1538875800000),
                    y: [6593.15, 6605, 6592, 6603.06]
                },
                {
                    x: new Date(1538877600000),
                    y: [6603.07, 6604.5, 6599.09, 6603.89]
                },
                {
                    x: new Date(1538879400000),
                    y: [6604.44, 6604.44, 6600, 6603.5]
                },
                {
                    x: new Date(1538881200000),
                    y: [6603.5, 6603.99, 6597.5, 6603.86]
                },
                {
                    x: new Date(1538883000000),
                    y: [6603.85, 6605, 6600, 6604.07]
                },
                {
                    x: new Date(1538884800000),
                    y: [6604.98, 6606, 6604.07, 6606]
                },
                ]
            }],
            chart: {
                type: 'candlestick',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
            },
            plotOptions: {
                candlestick: {
                    colors: {
                        upward: '#037fe0',
                        downward: '#03c68a'
                    }
                }
            },
            xaxis: {
                type: 'datetime',
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                tooltip: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#candlestickChart"), candlestickChartoptions);
        chart.render();



        var boxplotChartoptions = {
            series: [
                {
                    type: 'boxPlot',
                    data: [
                        {
                            x: 'Jan 2015',
                            y: [54, 66, 69, 75, 88]
                        },
                        {
                            x: 'Jan 2016',
                            y: [43, 65, 69, 76, 81]
                        },
                        {
                            x: 'Jan 2017',
                            y: [31, 39, 45, 51, 59]
                        },
                        {
                            x: 'Jan 2018',
                            y: [39, 46, 55, 65, 71]
                        },
                        {
                            x: 'Jan 2019',
                            y: [29, 31, 35, 39, 44]
                        },
                        {
                            x: 'Jan 2020',
                            y: [41, 49, 58, 61, 67]
                        },
                        {
                            x: 'Jan 2021',
                            y: [54, 59, 66, 71, 88]
                        }
                    ]
                }
            ],
            chart: {
                type: 'boxPlot',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            stroke: {
                colors: ['#334672'],
                width: 1
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
            },
            plotOptions: {
                boxPlot: {
                    colors: {
                        upward: '#037fe0',
                        downward: '#03c68a'
                    }
                }
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#boxplotChart"), boxplotChartoptions);
        chart.render();



        function generateData(e, t, a) {
            for (var r = 0, n = []; r < t;) {
                var o = Math.floor(750 * Math.random()) + 1,
                    l = Math.floor(Math.random() * (a.max - a.min + 1)) + a.min,
                    m = Math.floor(61 * Math.random()) + 15;
                n.push([o, l, m]), r++
            }
            return n
        }
        var bubbleChartoptions = {
            series: [{
                name: 'Product1',
                data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                    min: 10,
                    max: 60
                })
            },
            {
                name: 'Product2',
                data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                    min: 10,
                    max: 60
                })
            },
            {
                name: 'Product3',
                data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                    min: 10,
                    max: 60
                })
            },
            {
                name: 'Product4',
                data: generateData(new Date('11 Feb 2017 GMT').getTime(), 20, {
                    min: 10,
                    max: 60
                })
            }],
            chart: {
                height: 350,
                type: 'bubble',
                toolbar: {
                    show: false
                }
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
            },
            xaxis: {
                tickAmount: 12,
                type: 'category',
                labels: {
                    rotate: 0,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                max: 70
            },
            theme: {
                palette: 'palette10'
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#bubbleChart"), bubbleChartoptions);
        chart.render();



        var scatterChartoptions = {
            series: [{
                name: "SAMPLE A",
                data: [
                [16.4, 5.4], [21.7, 2], [25.4, 3], [19, 2], [10.9, 1], [13.6, 3.2], [10.9, 7.4], [10.9, 0], [10.9, 8.2], [16.4, 0], [16.4, 1.8], [13.6, 0.3], [13.6, 0], [29.9, 0], [27.1, 2.3], [16.4, 0], [13.6, 3.7], [10.9, 5.2], [16.4, 6.5], [10.9, 0], [24.5, 7.1], [10.9, 0], [8.1, 4.7], [19, 0], [21.7, 1.8], [27.1, 0], [24.5, 0], [27.1, 0], [29.9, 1.5], [27.1, 0.8], [22.1, 2]]
            },{
                name: "SAMPLE B",
                data: [
                [36.4, 13.4], [1.7, 11], [5.4, 8], [9, 17], [1.9, 4], [3.6, 12.2], [1.9, 14.4], [1.9, 9], [1.9, 13.2], [1.4, 7], [6.4, 8.8], [3.6, 4.3], [1.6, 10], [9.9, 2], [7.1, 15], [1.4, 0], [3.6, 13.7], [1.9, 15.2], [6.4, 16.5], [0.9, 10], [4.5, 17.1], [10.9, 10], [0.1, 14.7], [9, 10], [12.7, 11.8], [2.1, 10], [2.5, 10], [27.1, 10], [2.9, 11.5], [7.1, 10.8], [2.1, 12]]
            },{
                name: "SAMPLE C",
                data: [
                [21.7, 3], [23.6, 3.5], [24.6, 3], [29.9, 3], [21.7, 20], [23, 2], [10.9, 3], [28, 4], [27.1, 0.3], [16.4, 4], [13.6, 0], [19, 5], [22.4, 3], [24.5, 3], [32.6, 3], [27.1, 4], [29.6, 6], [31.6, 8], [21.6, 5], [20.9, 4], [22.4, 0], [32.6, 10.3], [29.7, 20.8], [24.5, 0.8], [21.4, 0], [21.7, 6.9], [28.6, 7.7], [15.4, 0], [18.1, 0], [33.4, 0], [16.4, 0]]
            }],
                chart: {
                height: 350,
                type: 'scatter',
                toolbar: {
                    show: false
                }
            },
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
                padding: {
                    bottom: 15
                }
            },
            xaxis: {
                tickAmount: 10,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    formatter: function(val) {
                        return parseFloat(val).toFixed(1)
                    }
                }
            },
            yaxis: {
                tickAmount: 7
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#scatterChart"), scatterChartoptions);
        chart.render();


        
        function generateData2(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = (i + 1).toString();
                var y =
                    Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
            
                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }
        var heatmapChartoptions = {
            chart: {
                height: 350,
                type: "heatmap",
                toolbar: {
                    show: false
                }
            },
            stroke: {
                width: 0,
            },
            colors: [
                "#037fe0",
                "#03c68a"
            ],
            grid: {
                borderColor: '#334652',
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: true,
                    }
                },
            },
            plotOptions: {
                heatmap: {
                    shadeIntensity: 1
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            series: [
                {
                    name: "Jan",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Feb",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Mar",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Apr",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "",
                    data: generateData2(20, {
                    min: 0,
                    max: 0
                    })
                },
                {
                    name: "May",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Jun",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Jul",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                },
                {
                    name: "Aug",
                    data: generateData2(20, {
                    min: -30,
                    max: 55
                    })
                }
            ],
            tooltip: {
                custom: function({ series, seriesIndex, dataPointIndex, w }) {
                    if (w.globals.seriesNames[seriesIndex] !== "") {
                        return series[seriesIndex][dataPointIndex];
                    } else {
                        return "";
                    }
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#heatmapChart"), heatmapChartoptions);
        chart.render();



        var treemapChartoptions = {
            series: [
                {
                    data: [
                        {
                            x: 'New Delhi',
                            y: 218
                        },
                        {
                            x: 'Kolkata',
                            y: 149
                        },
                        {
                            x: 'Mumbai',
                            y: 184
                        },
                        {
                            x: 'Ahmedabad',
                            y: 55
                        },
                        {
                            x: 'Bangaluru',
                            y: 84
                        },
                        {
                            x: 'Pune',
                            y: 31
                        },
                        {
                            x: 'Chennai',
                            y: 70
                        },
                        {
                            x: 'Jaipur',
                            y: 30
                        },
                        {
                            x: 'Surat',
                            y: 44
                        },
                        {
                            x: 'Hyderabad',
                            y: 68
                        },
                        {
                            x: 'Lucknow',
                            y: 28
                        },
                        {
                            x: 'Indore',
                            y: 19
                        },
                        {
                            x: 'Kanpur',
                            y: 29
                        }
                    ]
                }
            ],
            legend: {
                show: false
            },
            chart: {
                height: 350,
                type: 'treemap',
                toolbar: {
                    show: false
                }
            },
            responsive: [{
                breakpoint: 575,
                options: {
                    chart: {
                        height: 250,
                    }
                },
            }]
        };
        var chart = new ApexCharts(document.querySelector("#treemapChart"), treemapChartoptions);
        chart.render();



        var pieChartoptions = {
            series: [44, 55, 13, 43],
            chart: {
                height: 350,
                type: 'pie',
            },
            stroke: {
                width: 0,
            },
            labels: ['Team A', 'Team B', 'Team C', 'Team D'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 300
                    },
                }
            }],
            legend: {
                position: 'bottom'
            },
            dataLabels: {
                dropShadow: {
                    enabled: false,
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#pieChart"), pieChartoptions);
        chart.render();



        var radialBarChartoptions = {
            series: [44, 55, 67, 83],
            chart: {
                height: 343,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        };
        var chart = new ApexCharts(document.querySelector("#radialBarChart"), radialBarChartoptions);
        chart.render();



        var radarChartoptions = {
            series: [{
                name: 'Series 1',
                data: [80, 50, 30, 40, 100, 20],
            }, {
                name: 'Series 2',
                data: [20, 30, 40, 80, 20, 80],
            }, {
                name: 'Series 3',
                data: [44, 76, 78, 13, 43, 10],
            }],
            chart: {
                height: 350,
                type: 'radar',
                dropShadow: {
                    enabled: true,
                    blur: 1,
                    left: 1,
                    top: 1
                },
                toolbar: {
                    show: false
                }
            },
            stroke: {
                width: .5
            },
            fill: {
                opacity: 0.2
            },
            markers: {
                size: 0
            },
            xaxis: {
                categories: ['2011', '2012', '2013', '2014', '2015', '2016']
            }
        };
        var chart = new ApexCharts(document.querySelector("#radarChart"), radarChartoptions);
        chart.render();



        var polarAreaChartoptions = {
            series: [23, 21, 17, 15, 10],
            chart: {
                type: 'polarArea',
                height: 373
            },
            stroke: {
                width: 0
            },
            fill: {
                opacity: 0.8
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        height: 200
                    },
                }
            }],
            legend: {
                position: 'bottom'
            }
        };
        var chart = new ApexCharts(document.querySelector("#polarAreaChart"), polarAreaChartoptions);
        chart.render();
    });
})(jQuery);
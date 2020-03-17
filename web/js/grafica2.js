/*==================================================================================
        GRAFICA PEQUEÑA RED
==================================================================================*/
$(function () {


    var datas = $("#grafiRed").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaRed').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            lineColor: '#F5F5F5',
            tickPositions: [0]
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});


/*==================================================================================
        GRAFICA PEQUEÑA RIS
==================================================================================*/
$(function () {


    var datas = $("#grafiRis").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaRis').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});

/*==================================================================================
        GRAFICA PEQUEÑA PACS
==================================================================================*/
$(function () {


    var datas = $("#grafiPacs").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaPacs').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});


/*==================================================================================
        GRAFICA PEQUEÑA EQUIPO
==================================================================================*/
$(function () {


    var datas = $("#grafiEquipo").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaEquipo').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});



/*==================================================================================
        GRAFICA PEQUEÑA RX
==================================================================================*/
$(function () {


    var datas = $("#grafiRx").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaRx').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});


/*==================================================================================
        GRAFICA PEQUEÑA CT
==================================================================================*/
$(function () {


    var datas = $("#grafiCt").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaCt').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});


/*==================================================================================
        GRAFICA PEQUEÑA MR
==================================================================================*/
$(function () {


    var datas = $("#grafiMr").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaMr').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});



/*==================================================================================
        GRAFICA PEQUEÑA US
==================================================================================*/
$(function () {


    var datas = $("#grafiUs").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaUs').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});

/*==================================================================================
        GRAFICA PEQUEÑA MG
==================================================================================*/
$(function () {


    var datas = $("#grafiMg").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaMg').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});



/*==================================================================================
        GRAFICA PEQUEÑA XA
==================================================================================*/
$(function () {


    var datas = $("#grafiXa").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaXa').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0]
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});



/*==================================================================================
        GRAFICA PEQUEÑA RF
==================================================================================*/
$(function () {


    var datas = $("#grafiRf").html();

    if (datas) {
        var array = JSON.parse("[" + datas + "]");
    };


    $('#graficaRf').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height: 20,
            style: {
                overflow: 'visible'
            },
            skipClone: true
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],

            startOnTick: false,
            endOnTick: false,
            tickPositions: [],
            lineColor: '#F5F5F5',
        },
        yAxis: {
            endOnTick: false,
            startOnTick: false,
            labels: {
                enabled: false
            },
            title: {
                text: null
            },
            tickPositions: [0],
            lineColor: '#F5F5F5',
        },
        tooltip: {
            shared: true,
        },
        legend: {
            enabled: false
        },

        series: [{
            lineWidth: 1,
            shadow: false,
            states: {
                hover: {
                    lineWidth: 1
                }
            },
            marker: {
                radius: 1,
                states: {
                    hover: {
                        radius: 2
                    }
                }
            },
            name: 'Datos',
            data: array,
            color: '#000',
        }]
    });


});




/*==================================================================================
        GRAFICA PRINCIPAL
==================================================================================*/
$(function () {

    var indicador = $("#graficasDisps").html();
    var data = [];
    if (indicador) {
         var array = JSON.parse("[" + indicador + "]");
         data = [];
         $.each(array, function(index, value){
             var color;

             if (value > 95){
                 color = '#77B2D9';

             }else{
                 if (value > 85){
                     color = '#FF7D7D';

                 }else{
                     color = 'red';

                 }
             }

             data.push({y:value, color: color});
         });

    };


        $('#grafica2s').highcharts({
            chart:{
                type: 'bar',
                animation: true,
                backgroundColor: '#F5F5F5',
                height: 525,
                //width: 300,
                //margin: [0,0,0,0],
            },
            title: {
                text: ''
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            xAxis: {
                gridLineWidth: 0,
                categories: ['Total','Red','RIS','PACS','Equipo','RX','CT','MR','US','MG','XA','RF'],
                title: {
                    text: null
                },
                startOnTick: false,
                endOnTick: false,
                tickPositions: []
            },
            yAxis: {
                endOnTick: false,
                startOnTick: false,
                gridLineWidth: 0,
                title: {
                    text: null
                },
                min:0,
                max:100,
                labels: {
                    formatter: function () {
                        return this.value + '%';
                    }
                },
            },
            tooltip: {
                shared: true,
            },
            legend: {
                enabled: false
            },

            series: [{
                name: 'Datos',
                data: data,
            }]

        });


});

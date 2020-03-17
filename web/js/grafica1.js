/*==================================================================================
        GRAFICA PEQUEÑA PARA AMBULATORIO
==================================================================================*/
$(function () {


    var datas = $("#valorA").html();

    if(datas){
        var array = JSON.parse("[" + datas + "]");
    }

    $('#ambulatorio').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA HOSPITALIZADO
==================================================================================*/
$(function () {


    var datas = $("#valorH").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#hospitalizado').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA URGENCIAS
==================================================================================*/
$(function () {


    var datas = $("#valorU").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#urgencia').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA REALIZADOS
==================================================================================*/
$(function () {


    var datas = $("#valorR").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#realizados').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA INFORMADOS
==================================================================================*/
$(function () {


    var datas = $("#valorI").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#informados').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [-2, 0, -2, 0],
            width: 80,
            height:20,
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA PENDIENTES
==================================================================================*/
$(function () {


    var datas = $("#valorP").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#pendientes').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA POSTERIOR
==================================================================================*/
$(function () {


    var datas = $("#valorPos").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }


    $('#posterior').highcharts({
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
            tickPositions: [],
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
        GRAFICA PEQUEÑA PARA CANCELADOS
==================================================================================*/
$(function () {


    var datas = $("#valorC").html();
    if(!datas){

    }else{
        var array = JSON.parse("[" + datas + "]");
    }

    $('#cancelados').highcharts({
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
            lineColor: '#F5F5F5',
            title: {
                text: null
            },
            tickPositions: [],
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

    var datas = $("#valorPrincipal").html();

    if(datas){
        var array = JSON.parse("[" + datas + "]");
        var data = [];
        data.push({y:array[0],color:'#77B2D9'});
        data.push({y:array[1],color:'#77B2D9'});
        data.push({y:array[2],color:'#77B2D9'});
        data.push({y:array[3],color:'#77B2D9'});

        if (array[4] <= 2 ){
            data.push({y:array[4],color: '#77B2D9'});
        }else{
            if (array[4] <= 4){
                data.push({y:array[4],color: '#FF7D7D'});
            }else{
                data.push({y:array[4],color: 'red'});
            }
        }
    }


    $('#grafica1').highcharts({
        chart:{
            type: 'bar',
            animation: true,
            height: 220,
            backgroundColor: '#F5F5F5',
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
            categories: [
                'E. Realizados',
                'E. Informados',
                'E. Pendientes',
                'E. Int. Posterior',
                'E. Cancelados',
            ],
            title: {
                text: null
            },
            startOnTick: false,
            endOnTick: false,
            tickPositions: []
        },
        yAxis: {
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
        legend: {
            enabled: false
        },

        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
            shared: true,
            //enabled: false
        },
        plotOptions: {
            scatter:{
                dashStyle: "Solid",
                color: 'red',
                lineWidth: 50,
            }
        },

        series: [{
            name: 'Datos',
            data: data,
        }/*,{
            type:'scatter',
            data: [{
                    x: 1,
                    y: 95,
                    marker: {
                            symbol: 'url(imagenes/lineas2.png)',
                        }
                }],
        }*/,{
            type:'scatter',
            data: [{
                    x: 4,
                    y: 2,
                    marker: {
                            symbol: 'url(imagenes/lineas2.png)',
                        }
                }],
        }]
    });


});

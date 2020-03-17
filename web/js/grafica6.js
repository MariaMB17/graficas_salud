

$(function () {

    var unidadE = $("#unidadE").html();
    var ERealizados = $("#ERealizados").html();
    var EInformado = $("#EInformado").html();
    var EPendientes = $("#EPendientes").html();
    var DiasE = $("#DiasE").html();
    var HorasE = $("#HorasE").html();

    if(unidadE){
        var categoria = unidadE.split(",");
        var realizados = JSON.parse("[" + ERealizados + "]");
        var informado = JSON.parse("[" + EInformado + "]");
        var pendiente = JSON.parse("[" + EPendientes + "]");
        var dias = JSON.parse("[" + DiasE + "]");
        var horas = JSON.parse("[" + HorasE + "]");

    }

    $('#estudioRealizado').highcharts({
        chart: {
            type: 'column',
            inverted: true,
            backgroundColor: null,
            animation: true,
            height: 800,
        },
        title: {
            text:null
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            gridLineWidth: 0,
            categories: categoria,
            title: {
                text: null
            }
        },
        yAxis: [{
            gridLineWidth: 0,
            min: 0,
            //max: 50,
            title: {
                text: 'T. Informe'
            }
        }, {
            title: {
                text: null
            },
            opposite: true
        }],
        legend: {
            align: 'right',
            x: 0,
            verticalAlign: 'top',
            y: 0,
            floating: false,
            //backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#f5f5f5',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
            shared: true,
            //enabled: false
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Realizados',
            color: '#4EA7F0',
            data: realizados,
            pointPadding: 0.0,
            pointPlacement: 0.2
        }, {
            name: 'Pendientes',
            color: '#D0D0D0',
            data: pendiente,
            pointPadding: 0.3,
            pointPlacement: 0.2
        }, {
            name: 'Informados',
            color: '#B2B2B2',
            data: informado,
            pointPadding: 0.3,
            pointPlacement: 0.2,
        },
        {
            type: 'spline',
            name: 'T. Informes',
            color: '#761F02',
            data: dias,
            visible: false,
             marker: {
                lineWidth: 1,
                radius: 2,
            }
        }
        // ,{
        //     type: 'spline',
        //     name: 'T. entre agendamiento y cita',
        //     color: '#F25E2C',
        //     data: horas,
        //     visible: false,
        //      marker: {
        //         lineWidth: 1,
        //         radius: 2,
        //     }
        // }
        ]
    });
});

/*===================================================================================*/

$(function () {

    var modalidad = $("#modalidadCategoria").html();
    var realizados = $("#E_realizados").html();
    var pendientes = $("#E_pendientes").html();
    var informado = $("#E_informados").html();
    var DiasM = $("#DiasM").html();
    var HorasM = $("#HorasM").html();

    if (modalidad) {
        var categoria = modalidad.split(",");
        var Erealizados = JSON.parse("[" + realizados + "]");
        var EPendientes = JSON.parse("[" + pendientes + "]");
        var EInformado = JSON.parse("[" + informado + "]");
        var dias = JSON.parse("[" + DiasM + "]");
        var horas = JSON.parse("[" + HorasM + "]");
    };

    $('#estudioRealizadoModalidad').highcharts({
        chart: {
            type: 'column',
            inverted: true,
            backgroundColor: null,
            animation: true,
            height: 500,
            width: 270,
        },
        title: {
            text:null
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            gridLineWidth: 0,
            categories: categoria,
            title: {
                text: null
            }
        },
        yAxis: [{
            gridLineWidth: 0,
            min: 0,
            title: {
                text: 'T. Informe'
            }
        }, {
            title: {
                text: null
            },
            opposite: true
        }],
        legend: {
            align: 'right',
            x: 0,
            verticalAlign: 'top',
            y: 0,
            floating: false,
            //backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#f5f5f5',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
          shared: true,
          //enabled: false
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Realizados',
            color: '#4EA7F0',
            data: Erealizados,
            pointPadding: 0.0,
            pointPlacement: 0.2
        }, {
            name: 'Pendientes',
            color: '#D0D0D0',
            data: EPendientes,
            pointPadding: 0.3,
            pointPlacement: 0.2
        }, {
            name: 'Informados',
            color: '#B2B2B2',
            data: EInformado,
            pointPadding: 0.3,
            pointPlacement: 0.2,
        },
        {
            type: 'spline',
            name: 'T. Informes',
            color: '#761F02',
            data: dias,
            visible: false,
             marker: {
                lineWidth: 1,
                radius: 2,
            }
        }
        // ,
        // {
        //     type: 'spline',
        //     name: 'T. entre agendamiento y cita',
        //     color: '#F25E2C',
        //     data: horas,
        //     visible: false,
        //      marker: {
        //         lineWidth: 1,
        //         radius: 2,
        //     }
        // }
        ]
    });
});










/*===================================================================================*/

$(function () {

    var modalidad = $("#TipoEstudioCategoria").html();
    var realizados = $("#E_realizadosTP").html();
    var pendientes = $("#E_pendientesTP").html();
    var informado = $("#E_informadosTP").html();
    var DiasTP = $("#DiasTP").html();
    var HorasTP = $("#HorasTP").html();

    if (modalidad) {
        var categoria = modalidad.split(",");
        var Erealizados = JSON.parse("[" + realizados + "]");
        var EPendientes = JSON.parse("[" + pendientes + "]");
        var EInformado = JSON.parse("[" + informado + "]");
        var dias = JSON.parse("[" + DiasTP + "]");
        var horas = JSON.parse("[" + HorasTP + "]");
    };

    $('#estudioRealizadoTipos').highcharts({
        chart: {
            type: 'column',
            inverted: true,
            backgroundColor: null,
            animation: true,
            height: 600,
            width: 270,
        },
        title: {
            text:null
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        xAxis: {
            gridLineWidth: 0,
            categories: categoria,
            title: {
                text: null
            }
        },
        yAxis: [{
            gridLineWidth: 0,
            min: 0,
            title: {
                text: 'T. Informe'
            }
        }, {
            title: {
                text: null
            },
            opposite: true
        }],
        legend: {
            align: 'right',
            x: 0,
            verticalAlign: 'top',
            y: 0,
            floating: false,
            //backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
            borderColor: '#f5f5f5',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
          shared: true,
          //enabled: false
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Realizados',
            color: '#4EA7F0',
            data: Erealizados,
            pointPadding: 0.0,
            pointPlacement: 0.2
        }, {
            name: 'Pendientes',
            color: '#D0D0D0',
            data: EPendientes,
            pointPadding: 0.3,
            pointPlacement: 0.2
        }, {
            name: 'Informados',
            color: '#B2B2B2',
            data: EInformado,
            pointPadding: 0.3,
            pointPlacement: 0.2,
        },
        {
            type: 'spline',
            name: 'T. Informes',
            color: '#761F02',
            data: dias,
            visible: false,
             marker: {
                lineWidth: 1,
                radius: 2,
            }
        }
        // ,
        // {
        //     type: 'spline',
        //     name: 'T. entre agendamiento y cita',
        //     color: '#F25E2C',
        //     data: horas,
        //     visible: false,
        //      marker: {
        //         lineWidth: 1,
        //         radius: 2,
        //     }
        // }
        ]
    });
});

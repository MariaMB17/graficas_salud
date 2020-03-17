$(function () {

    var datas = $("#totalCancelados").html();
    var mes = $("#mesCancelados").html();
    var data = new Array();
    var meses =[];

    if(datas){
        meses = mes.split(",");
        var array = JSON.parse("[" + datas + "]");
        data = [];
        $.each(array, function(index, value){
            var color;

            if (value > 5){
                color = 'red';
            }else{
                if (value > 3){
                    color = '#FF7D7D';
                }else{
                    color = '#77B2D9';
                }
            }

            data.push({y:value, color: color});
        });
    }

    // var arreglo = [];
    //
    // for (var i = 0; i < meses.length; i++) {
    //     arreglo.push({name:meses[i],data:[data[i]],visible: false,color:'#A2A2A2'});
    // };


    $('#EstudioCancelados').highcharts({

        chart: {
            type: 'column',
            animation: true,
            height: 350,
            width: 400,
            backgroundColor: '#F5F5F5',

        },

        title: {
            text: null
        },
         credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },

        xAxis: {
            gridLineWidth: 0,
            categories: meses,
            title: {
                text: null
            },

        },

        yAxis: {
           gridLineWidth: 0,
            title: {
                text: null
            },
            min:0,
            //max:100,
        },

        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
          shared: true,
          //enabled: false
        },
        legend: {
            enabled: false
        },
        series: [{
            data: data,
            name: 'Datos'
        }],
    });
});

/*======================= POR RAZON ================================*/

$(function () {

    var datas = $("#razon").html();
    var mes = $("#mesRazon").html();
    var data = [];
    var meses = [];
    if(datas){
        meses = mes.split(",");
        var array = JSON.parse("[" + datas + "]");

        data = [];
        $.each(array, function(index, value){
            var color;

            if (value > 5){
                color = 'red';
            }else{
                if (value > 3){
                    color = '#FF7D7D';
                }else{
                    color = '#77B2D9';
                }
            }

            data.push({y:value, color: color});
        });
    }

    // var arreglos = [];
    //
    // for (var i = 0; i < meses.length; i++) {
    //     arreglos.push({name:meses[i],data:[data[i]],visible: false,color:'#A2A2A2'});
    // };

    $('#por_razon').highcharts({

        chart: {
            type: 'column',
            animation: true,
            height: 350,
            width: 400,
            backgroundColor: '#F5F5F5',

        },

        title: {
            text: null
        },
         credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },

        xAxis: {
            gridLineWidth: 0,
            categories: meses,
            title: {
                text: null
            },

        },

        yAxis: {
           gridLineWidth: 0,
            title: {
                text: null
            },
            min:0,
            //max:100,
        },

        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
          shared: true,
          //enabled: false
        },legend: {
            enabled: false
        },
        series: [{
            data: data,
            name: 'Datos'
        }],
    });
});


/*======================= GRUPO ESTUDIOS ================================*/

$(function () {

    var datas = $("#totalTipo").html();
    var mes = $("#grupoEstudio").html();
    var data = new Array();
    var categoria = [];
    if(datas){
        categoria = mes.split(",");
        var array = JSON.parse("[" + datas + "]");
        data = [];
        $.each(array, function(index, value){
            var color;

            if (value > 5){
                color = 'red';
            }else{
                if (value > 3){
                    color = '#FF7D7D';
                }else{
                    color = '#77B2D9';
                }
            }

            data.push({y:value, color: color});
        });
    }

    // var arreglos = [];
    //
    // for (var i = 0; i < categoria.length; i++) {
    //     arreglos.push({name:categoria[i],data:[data[i]],visible: false,color:'#A2A2A2'});
    // };

    $('#TipoEstudios').highcharts({

        chart: {
            type: 'column',
            animation: true,
            height: 350,
            width: 500,
            backgroundColor: '#F5F5F5',

        },

        title: {
            text: null
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
            },

        },

        yAxis: {
           gridLineWidth: 0,
            title: {
                text: null
            },
            min:0,
            //max:100,
        },

        tooltip: {
          pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> {point.percentage}%<br/>',
          shared: true,
          //enabled: false
        },legend: {
            enabled: false
        },
        series: [{
            data: data,
            name: 'Datos'
        }],
    });
});

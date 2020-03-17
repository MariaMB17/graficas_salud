$(function () {

    var datas = $("#global").html();
    var datas2 = $("#graficaHosp").html();
    var datas3 = $("#graficaAmb").html();
    var datas4 = $("#graficaInt").html();
    var datas5 = $("#graficaRemota").html();
    var datasU = $("#graficaUrgencia").html();

    if(!datas && !datas2 && !datas3 && !datas4 && !datas5){

    }else{
        var array = JSON.parse("[" + datas + "]");
        var array2 = JSON.parse("[" + datas2 + "]");
        var array3 = JSON.parse("[" + datas3 + "]");
        var array4 = JSON.parse("[" + datas4 + "]");
        var array5 = JSON.parse("[" + datas5 + "]");
        var arrayU = JSON.parse("[" + datasU + "]");
    }

    $('#grafica3').highcharts({

        chart: {
            type: 'boxplot',
            inverted: true,
            height: 250,
            //width: 700,
            backgroundColor: '#F5F5F5',
        },

        title: {
            text: null
        },
        subtitle: {
            text: 'Distribución de tiempos promedio por Unidad Ejecutora',
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },

        legend: {
            enabled: false
        },

        xAxis: {
            categories: ['Global', 'Hospitalizado', 'Ambulatorio', 'Urgencia', 'Local', 'Remoto'],
        },

        yAxis: {
            min: 0,
            gridLineWidth: 0,
            title: {
                text: null,
            },
            // plotLines: [{
            //     value: 5,
            //     color: '#A9D2EE',
            //     width: 10,
            //
            // }]

        },plotOptions:{
            boxplot:{
                fillColor: "#77B2D9",
                color: '#CCCCCC',
            }
        },
        series: [{
            name: 'Observación',
            data: [
              array,
              array2,
              array3,
              arrayU,
              array4,
              array5,

            ],

        }]

    });
});

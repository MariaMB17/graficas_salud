/*==========================================================================================*/

$(function () {

    var contador = $("#contador").html();
    var conunt = new Array();

    if(contador){

        conunt = contador.split(",");
    }

    for (var i = 0; i < conunt.length; i++) {
        var datas = $("#bigotes"+i).html();
        var array = JSON.parse("[" + datas + "]");

        $('#bigote'+i).highcharts({

            chart: {
                type: 'boxplot',
                inverted: true,
                height: 50,
                spacingLeft: 15,
                spacingRight: 15,
                spacingTop: 0,
                spacingBottom: 0,
                //margin: [2,2,2,2],
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

            legend: {
                enabled: false
            },

            xAxis: {
                 gridLineWidth: 0,
                title: {
                    text: null
                },
                startOnTick: false,
                endOnTick: false,
                tickPositions: []
                //categories: ['Global', 'Hospitalizado', 'Ambulatorio', 'Interna', 'Remoto'],
            },

            yAxis: {
                gridLineWidth: 0,
                min: 0,
                //max: 25,
                title: {
                    text: null
                },
            },
            plotOptions:{
                boxplot:{
                    fillColor: "#77B2D9",
                    color: '#CCCCCC',
                }
            },
            tooltip: {
                enabled: false
            },
            series: [{
                name: 'Observación',
                data: [
                    array,
                ],

            }]

        });
    };


});



/*===================================================================================================================
                    HOSPITALIZADO
=====================================================================================================================*/

$(function () {

    var contador = $("#contador").html();
    var conunt = new Array();



    if(contador){
        conunt = contador.split(",");
    }

    for (var i = 0; i < conunt.length; i++) {
        var datas = $("#bigotesH"+i).html();
        var array = JSON.parse("[" + datas + "]");

        $('#bigoteH'+i).highcharts({

            chart: {
                type: 'boxplot',
                inverted: true,
                height: 50,
                spacingLeft: 15,
                spacingRight: 15,
                spacingTop: 0,
                spacingBottom: 0,
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

            legend: {
                enabled: false
            },

            xAxis: {
                 gridLineWidth: 0,
                title: {
                    text: null
                },
                startOnTick: false,
                endOnTick: false,
                tickPositions: []
                //categories: ['Global', 'Hospitalizado', 'Ambulatorio', 'Interna', 'Remoto'],
            },

            yAxis: {
                gridLineWidth: 0,
                min: 0,
                title: {
                    text: null
                },
            },
            plotOptions:{
                boxplot:{
                    fillColor: "#77B2D9",
                    color: '#CCCCCC',
                }
            },
            tooltip: {
                enabled: false
            },
            series: [{
                name: 'Observación',
                data: [
                    array,
                ],

            }]

        });
    };


});

// /*---------------total estudios cancelados-----------------*/

$(function () {


   var totalecancel = $("#data").html();
   var modatagendadosc = $("#data1").html();

    if(totalecancel){
     if(modatagendadosc){
    var magendadosca = modatagendadosc.split(",");
     }
    var tagendadosc = JSON.parse("[" + totalecancel + "]");
    }

    $('#tagendadoscancelados').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:magendadosca,

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
            enabled: true
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
            data: tagendadosc,
            color: '#000',
        }]
    });
});

// /*---------------total estudios cancelados Productividad-----------------*/

$(function () {


   var totalprod = $("#tproductividad").html();
   var modalidadproduc = $("#tmodalidadprod").html();
  //document.writeln(totalprod);

    if(totalprod){
     if(modalidadproduc){
    var mproductividad = modalidadproduc.split(",");
     }
    var tproductividadesAgen = JSON.parse("[" + totalprod + "]");
    }

    $('#tproductividadesAg').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:mproductividad,

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
            enabled: true
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
            data: tproductividadesAgen,
            color: '#000',
        }]
    });
});

// // /*-----------------RX-------------------*/

$(function () {

    var datarx = $("#data").html();
    var mesrx = $("#mesdata").html();

    if(datarx){
     if(mesrx){
    var mesesrx = mesrx.split(",");
     }
    var modalidadrx = JSON.parse("[" + datarx + "]");
    }


    $('#RX').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:mesesrx,

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
            enabled: true
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
            data: modalidadrx,
            color: '#000',
        }]
    });
});


// // /*-------------------CT------------------------*/

$(function () {


    var datasct = $("#data").html();
    var mesct = $("#mesdata").html();

    //document.writeln(datasct);


    if(datasct){
     if(mesct){
    var mesesct = mesct.split(",");
     }
    var mct = JSON.parse("[" + datasct + "]");
    }

    $('#CT').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories: mesesct,

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
            enabled: true
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
            data: mct,
            color: '#000',
        }]
    });
});


// // /*------------------MG----------------------------*/

$(function () {


    var datasmg = $("#data").html();
    var mesmg = $("#mesdata").html();

    if(datasmg){
     if(mesmg){
    var mesesmg = mesmg.split(",");
     }
    var mmg = JSON.parse("[" + datasmg + "]");
    }


    $('#MG').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories: mesesmg,

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
            enabled: true
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
            data: mmg,
            color: '#000',
        }]
    });
});


// // -------------MR--------------------------

$(function () {


    var datasmr = $("#data").html();
    var mesmr = $("#mesdata").html();
    if(datasmr){
     if(mesmr){
    var mesesmr = mesmr.split(",");
     }
    var mmr = JSON.parse("[" + datasmr + "]");
    }


    $('#MR').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:mesesmr,

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
        legend: {
            enabled: false
        },
        tooltip: {
            enabled: true
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
            data: mmr,
            color: '#000',
        }]
    });
});


// // -------------OT--------------------------

$(function () {


    var datasot = $("#data").html();
    var mesot = $("#mesdata").html();
    if(datasot){
     if(mesot){
    var mesesot = mesot.split(",");
     }
    var mot = JSON.parse("[" + datasot + "]");
    }


    $('#OT').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:mesesot,

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
            enabled: true
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
            data: mot,
            color: '#000',
        }]
    });
});

// // /*--------------RF-----------------------*/

$(function () {


    var datasrf = $("#data").html();
    var mesrf = $("#mesdata").html();

    if(datasrf){
     if(mesrf){
    var mesesrf = mesrf.split(",");
     }
    var mrf = JSON.parse("[" + datasrf + "]");
    }

    $('#RF').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories: mesesrf,

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
            enabled: true
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
            data: mrf,
            color: '#000',
        }]
    });
});



// // /*--------------US-----------------------*/

$(function () {


    var datasus = $("#data").html();
    var mesus = $("#mesdata").html();
    //document.writeln(datasus);

    if(datasus){
     if(mesus){
    var mesesus = mesus.split(",");
     }
    var modalidadus = JSON.parse("[" + datasus + "]");
    }

    $('#US').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories: mesesus,

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
            enabled: true
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
            data: modalidadus,
            color: '#000',
        }]
    });
});

// // /*-----------------XA-------------------*/

$(function () {

    var dataxa = $("#data").html();
    var mesxa = $("#mesdata").html();

    if(dataxa){
     if(mesxa){
    var mesesxa = mesxa.split(",");
     }
    var modalidadxa = JSON.parse("[" + dataxa + "]");
    }


    $('#XA').highcharts({
        chart:{
            backgroundColor: null,
            borderWidth: 0,
            type: 'spline',
            animation: true,
            margin: [0, 0, 0, 0],
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
            categories:mesesxa,

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
            enabled: true
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
            data: modalidadxa,
            color: '#000',
        }]
    });
});


/*----------------------------------------------GRAFICA ESTUDIOS AGENDADOS POR MODALIDAD---------------*/

$(function () {
    var prod;
    var tm = $("#totalmodalidadp").html();
    var mod = $("#modalidadp").html();
//document.writeln(mod);
    if(mod){
      var array1 =mod.split(",");
      var array = JSON.parse("[" +tm+ "]");

      prod = [];
        $.each(array, function(index, value){
            var color;

            if ((value >= 90)){
                color = '#77B2D9';
            }else{
                if ((value >= 71) && (value <= 89)){
                    color = '#FF7D7D';
                }else{
                    color = 'red';
                }
            }

            prod.push({y:value, color: color});
        });

       }

    $('#modalidadprod').highcharts({

        chart: {
            type: 'bar',
            animation: true,
            backgroundColor: '#F5F5F5',
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            gridLineWidth: 0,
            categories: array1,
            type: 'linear',
            title: {
                text: null
            },
            startOnTick: false,
            endOnTick: false,
            tickPositions: []

        },
        yAxis: [{
             gridLineWidth: 0,
            title: {
                text: null
            },
            min:0,
            max:100,
            labels:{
                formatter: function(){
                    return this.value+'%';
                }
            },

            plotLines: [{
                value: 90,
                color: '#080808',
                dashStyle: 'line',
                width: 4,
                zIndex: 10,
                lineWidth: 20,
                label: {
                    text:null
                }
            }],
        }],
        tooltip: {
            enabled: true
        },
        legend: {
            enabled: false
        },

         series: [{
         data:prod
        }]
    });
});

/*--------------------------------------------------- GRAFICA T. ESPERA*/

$(function () {

     var datos = $("#porcentaje").html();
    var datos1 = $("#modalidadt").html();
//document.writeln(mod);
    if(datos){
      var modalidadestesp =datos1.split(",");
      var porcentajetesp = JSON.parse("[" +datos+ "]");
       }

    $('#t_espera').highcharts({

        chart: {
            type: 'bar',
            animation: true,
            backgroundColor: '#F5F5F5',
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            gridLineWidth: 0,
            categories: modalidadestesp,
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
            max:3000,
            labels:{
                formatter: function(){
                    return this.value+'';
                }
            },
        },
        tooltip: {
            enabled: true
        },
        legend: {
            enabled: false
        },

         series: [{
         name:'DATOS',
         data:porcentajetesp,
        }]
    });
});

/*----------------------------------- GRAFICA AMBULATORIOS PRODUCTIVIDAD*/

 $(function () {
    var ambprod;
    var color;
    var value1;
    var totaltacp = $("#totalmodalidadtacp").html();
    var modtacp = $("#modalidadtacp").html();
   // document.writeln(modtacp);
    if(modtacp){
      var modalitacp =modtacp.split(",");
      var ttacp = JSON.parse("[" +totaltacp+ "]");
       ambprod = [];
      $.each(modalitacp, function(index, value){
       if (index==0) {
            $.each(ttacp, function(i, valor){
               if(i==0){
                if(valor<=50){
                 color = '#689DF8';
                }else if(valor > 50 && valor <= 115){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(ttacp, function(i, valor){
               if(i==1){
                if(valor<=10){
                 color = '#689DF8';
                }else if(valor > 10 && valor <= 20){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(ttacp, function(i, valor){
               if(i==2){
                if(valor<=5){
                 color = '#689DF8';
                }else if(valor > 5 && valor <= 15){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(ttacp, function(i, valor){
               if(i==3){
                if(valor<=15){
                 color = '#689DF8';
                }else if(valor > 15 && valor <= 29){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(ttacp, function(i, valor){
               if(i==4){
                color = '#689DF8';
                ambprod.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(ttacp, function(i, valor){
               if(i==5){
                color = '#689DF8';
                ambprod.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(ttacp, function(i, valor){
               if(i==6){
                if(valor<=1){
                 color = '#689DF8';
                }else if(valor > 1 && valor <= 3){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(ttacp, function(i, valor){
               if(i==7){
                if(valor<=5){
                 color = '#689DF8';
                }else if(valor > 5 && valor <= 20){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(ttacp, function(i, valor){
               if(i==8){
                if(valor<=15){
                 color = '#689DF8';
                }else if(valor > 15 && valor <= 29){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                ambprod.push({y:valor, color: color});
               }
            });
        }
       });
   }

    $('#ambulatorios').highcharts({

        chart: {
            type: 'bar',
            animation: true,
            backgroundColor: '#F5F5F5',
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modalitacp,
             gridLineWidth: 0,
             type: 'linear',
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
            min:0,max: 100,
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data:ambprod
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 50,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 10,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 2,
            y: 5,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 15,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 5,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 15,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});

/*-----------------------------------GRAFICA HOSPITALIZADOS PRODUCTIVIDAD*/

$(function () {
    var hospprod;
     var promehosp = $("#totalhosp").html();
    var modhosp = $("#modalidadhosp").html();
//document.writeln(modhosp);
    if(modhosp){
      var modalidadhosp =modhosp.split(",");
      var promediohosp = JSON.parse("[" +promehosp+ "]");

      hospprod = [];

      $.each(modalidadhosp, function(index, value){
         if (index==0) {
            $.each(promediohosp, function(i, valor){
               if(i==0){
                if(valor<=128){
                 color = '#689DF8';
                }else if(valor > 128 && valor <= 256){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(promediohosp, function(i, valor){
               if(i==1){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 36){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(promediohosp, function(i, valor){
               if(i==2){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 48){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(promediohosp, function(i, valor){
               if(i==3){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 48){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(promediohosp, function(i, valor){
               if(i==4){
                color = '#689DF8';
                hospprod.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(promediohosp, function(i, valor){
               if(i==5){
                color = '#689DF8';
                hospprod.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(promediohosp, function(i, valor){
               if(i==6){
                if(valor<=8){
                 color = '#689DF8';
                }else if(valor > 8 && valor <= 16){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(promediohosp, function(i, valor){
               if(i==7){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 36){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(promediohosp, function(i, valor){
               if(i==8){
                if(valor<=48){
                 color = '#689DF8';
                }else if(valor > 48 && valor <= 72){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospprod.push({y:valor, color: color});
               }
            });
        }
       });

       }

    $('#hospitalizados').highcharts({

        chart: {
            type: 'bar',
            animation: true,
            backgroundColor: '#F5F5F5',
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modalidadhosp,
             gridLineWidth: 0,
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
            min:0,max: 300,
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data: hospprod
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 28,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 2,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 6,
            y: 8,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});


/*-----------------------------------GRAFICA URGENCIAS PRODUCTIVIDAD*/

$(function () {
    var urgprod;
     var promeurg = $("#totalurgen").html();
    var modurg = $("#modalidadurgen").html();
//document.writeln(modhosp);
    if(modurg){
      var modalidadurg =modurg.split(",");
      var promediourg = JSON.parse("[" +promeurg+ "]");

      urgprod = [];

       $.each(modalidadurg, function(index, value){
         if (index==0) {
            $.each(promediourg, function(i, valor){
               if(i==0){
                if(valor<=18){
                 color = '#689DF8';
                }else if(valor > 18 && valor <= 46){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(promediourg, function(i, valor){
               if(i==1){
                if(valor<=2){
                 color = '#689DF8';
                }else if(valor > 2 && valor <= 6){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(promediourg, function(i, valor){
               if(i==2){
                 color = '#689DF8';
                urgprod.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(promediourg, function(i, valor){
               if(i==3){
                if(valor<=6){
                 color = '#689DF8';
                }else if(valor > 6 && valor <= 12){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(promediourg, function(i, valor){
               if(i==4){
                color = '#689DF8';
                urgprod.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(promediourg, function(i, valor){
               if(i==5){
                color = '#689DF8';
                urgprod.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(promediourg, function(i, valor){
               if(i==6){
                if(valor<=1){
                 color = '#689DF8';
                }else if(valor > 1 && valor <= 2){
                   color = '#FF7D7D';
                  }else{
                     color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(promediourg, function(i, valor){
               if(i==7){
                if(valor<=1){
                 color = '#689DF8';
                }else if(valor > 1 && valor <= 2){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(promediourg, function(i, valor){
               if(i==8){
                if(valor<=8){
                 color = '#689DF8';
                }else if(valor > 8 && valor <= 24){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgprod.push({y:valor, color: color});
               }
            });
        }
       });
       }

    $('#urgencias').highcharts({

        chart: {
            type: 'bar',
            animation: true,
            backgroundColor: '#F5F5F5',
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modalidadurg,
             gridLineWidth: 0,
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
            min:0,max:100,
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data: urgprod
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 18,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 2,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 6,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 6,
            y: 1,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 1,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 8,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});


/*----------------------------------------------GRAFICA ESTUDIOS AGENDADOS --------------------------------------*/

   $(function () {
           var mesesAG= $("#mesagen").html();
           var dCT = $("#agct").html();
           var dRX = $("#agrx").html();
           var dMG = $("#agmg").html();
           var dMR = $("#agmr").html();
           var dOT = $("#agot").html();
           var dRF = $("#agrf").html();
           var dUS = $("#agus").html();
           var dXA = $("#agxa").html();
// // //document.writeln(data2a);
           if(dMG){
       var mesesAGEN=mesesAG.split(",");
       var daCT = JSON.parse("[" +dCT+ "]");
       var daRX = JSON.parse("[" +dRX+ "]");
       var daMG = JSON.parse("[" +dMG+ "]");
       var daMR = JSON.parse("[" +dMR+ "]");
       var daOT = JSON.parse("[" +dOT+ "]");
       var daRF = JSON.parse("[" +dRF+ "]");
       var daUS = JSON.parse("[" +dUS+ "]");
       var daXA = JSON.parse("[" +dXA+ "]");
       }

    $('#E_AGENDADOS').highcharts({
        chart: {
            type: 'column',
            animation: true,
            backgroundColor: '#F5F5F5',
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: mesesAGEN,
            gridLineWidth: 0,
            title: {
                text: null
            },
        },
        yAxis: {
            min: 0,
            gridLineWidth: 0,
            title: {
                text: null
            },labels:{
                formatter: function(){
                    return this.value+'';
                }
            },

        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [
        {
            name: 'CT',
            color: '#B3BDDF',
            data: daCT
        },{
            name: 'MG',
            color:'#4D6AC9',
            data: daMG
        },{
            name: 'MR',
            color: '#023DFF',
            data:  daMR
        },{
            name: 'OT',
            color: '#002291',
            data: daOT
        },{
            name: 'RF',
            color:'#000A2B',
            data: daRF
        },{
            name: 'RX',
            color:'#7182B9',
            data: daRX
        },{
            name: 'US',
            color:'#000A2B',
            data: daUS
        },{
            name: 'XA',
            color:'#000A2B',
            data: daXA
        }]
    });

});


/*----------------------------------------------GRAFICA ESTUDIOS AGENDADOS CANCELADOS POR MODALIDAD---------------*/

$(function () {
    var canc;
    var pcance = $("#porcentajemcanc").html();
    var modcancelado = $("#modcance").html();


    if(modcancelado){
      var modalidadagcanc =modcancelado.split(",");
      var porcentajecance = JSON.parse("[" +pcance+ "]");
       canc = [];
        $.each(porcentajecance, function(index, value){
            var color;

            if ((value < 2)) {
                 color = '#689DF8';
            }else{
                if ((value >= 2) && (value <= 4)){
                   color = '#FF7D7D';
                }else{
                    color = 'red';
                }
            }

            canc.push({y:value, color: color});
        });


       }



    $('#E_CANCELADOSM').highcharts({

        chart: {
            type: 'bar',
            backgroundColor: null,
            animation: true,
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modalidadagcanc,
            gridLineWidth: 0,
            type: 'linear',
            startOnTick: false,
            endOnTick: false,
            tickPositions: []

        },
        yAxis:[{
            min:0,max: 10,
            gridLineWidth: 0,
            labels:{
                formatter: function(){
                    return this.value+'%';
                }
            },
            title: {
                text: null
            },
            plotLines: [{
                value: 5,
                color: '#080808',
                dashStyle: 'line',
                width: 4,
                zIndex: 10,
                lineWidth: 20,
                label: {
                    text:null
                }
            }],
        }],
        tooltip: {
            shared: true,
        },
         legend: {
            enabled: false
        },
         series: [{
         name:'DATOS',
         data:canc
        }]
    });
});

/*----------------------------------- GRAFICA AMBULATORIOS CANCELADOS*/

$(function () {
    var ambc;
    var totalambc = $("#promedioambc").html();
    var modambc = $("#modalidadambc").html();
   // document.writeln(modtacp);
    if(modambc){
      var modaliambc =modambc.split(",");
      var ttambcanc = JSON.parse("[" +totalambc+ "]");

      ambc = [];

        $.each(modaliambc, function(index, value){
         if (index==0) {
            $.each(ttambcanc, function(i, valor){
               if(i==0){
                if(valor<=50){
                 color = '#689DF8';
                }else{
                    if(valor > 50 && valor <= 115){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(ttambcanc, function(i, valor){
               if(i==1){
                if(valor<=10){
                 color = '#689DF8';
                }else{
                    if(valor > 10 && valor <= 20){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(ttambcanc, function(i, valor){
               if(i==2){
                if(valor<=5){
                 color = '#689DF8';
                }else{
                    if(valor > 5 && valor <= 15){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(ttambcanc, function(i, valor){
               if(i==3){
                if(valor<=15){
                 color = '#689DF8';
                }else{
                    if(valor > 15 && valor <= 29){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(ttambcanc, function(i, valor){
               if(i==4){
                color = '#689DF8';
                ambc.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(ttambcanc, function(i, valor){
               if(i==5){
                color = '#689DF8';
                ambc.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(ttambcanc, function(i, valor){
               if(i==6){
                if(valor<=1){
                 color = '#689DF8';
                }else{
                    if(valor > 1 && valor <= 3){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(ttambcanc, function(i, valor){
               if(i==7){
                if(valor<=5){
                 color = '#689DF8';
                }else{
                    if(valor > 5 && valor <= 20){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(ttambcanc, function(i, valor){
               if(i==8){
                if(valor<=15){
                 color = '#689DF8';
                }else{
                    if(valor > 15 && valor <= 29){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                }
                ambc.push({y:valor, color: color});
               }
            });
        }
       });
       }

    $('#ambulatorioscancelados').highcharts({

        chart: {
            type: 'bar',
            backgroundColor: null,
            animation: true,
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modaliambc,
             gridLineWidth: 0,
             title: {
                text: null
            },
             type: 'linear',
             startOnTick: false,
            endOnTick: false,
            tickPositions: []

        },
        yAxis: {
            min:0,max: 100,
            gridLineWidth: 0,
            title: {
                text: null
            },
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data:ambc
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 25,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 10,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 2,
            y: 5,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 15,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 5,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 15,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});

/*-----------------------------------GRAFICA HOSPITALIZADOS CANCELADOS*/

$(function () {

    var hospc;
    var promehospcanc = $("#totalhospcanc").html();
    var hospcancela = $("#hospitalcancelados").html();
    var color=$("#1d6ded");
    //document.writeln(hospcancela);
    if(hospcancela){
      var modalidadhoscancela =hospcancela.split(",");
      var promediohospcanc = JSON.parse("[" +promehospcanc+ "]");

       hospc = [];

          $.each(modalidadhoscancela, function(index, value){
         if (index==0) {
            $.each(promediohospcanc, function(i, valor){
               if(i==0){
                if(valor<=128){
                 color = '#689DF8';
                }else if(valor > 128 && valor <= 256){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(promediohospcanc, function(i, valor){
               if(i==1){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 36){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(promediohospcanc, function(i, valor){
               if(i==2){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 48){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(promediohospcanc, function(i, valor){
               if(i==3){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 48){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }

                hospc.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(promediohospcanc, function(i, valor){
               if(i==4){
                color = '#689DF8';
                hospc.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(promediohospcanc, function(i, valor){
               if(i==5){
                color = '#689DF8';
                hospc.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(promediohospcanc, function(i, valor){
               if(i==6){
                if(valor<=8){
                 color = '#689DF8';
                }else if(valor > 8 && valor <= 16){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(promediohospcanc, function(i, valor){
               if(i==7){
                if(valor<=24){
                 color = '#689DF8';
                }else if(valor > 24 && valor <= 36){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(promediohospcanc, function(i, valor){
               if(i==8){
                if(valor<=48){
                 color = '#689DF8';
                }else if(valor > 48 && valor <= 72){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                hospc.push({y:valor, color: color});
               }
            });
        }
       });
       }

    $('#hospitalizadoscancelados').highcharts({

        chart: {
            type: 'bar',
            backgroundColor: null,
            animation: true,
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            gridLineWidth: 0,
            categories:modalidadhoscancela,
            title: {
                text: null
            },
            startOnTick: false,
            endOnTick: false,
            tickPositions: []

        },
        yAxis: {
            min:0,max: 450,
            gridLineWidth: 0,
            title: {
                text: null
            },
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data: hospc
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 30,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 2,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 6,
            y: 8,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 24,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});

/*-----------------------------------GRAFICA URGENCIAS CANCELADOS*/

$(function () {
    var urgen;
    var totalurgenc = $("#Pucancelados").html();
    var modaurgenc = $("#Mucancelados").html();
   // document.writeln(modtacp);
    if(modaurgenc){
      var modalidadurgencias =modaurgenc.split(",");
      var promediourgencias = JSON.parse("[" +totalurgenc+ "]");

      urgen = [];

        $.each(modalidadurgencias, function(index, value){
         if (index==0) {
            $.each(promediourgencias, function(i, valor){
               if(i==0){
                if(valor<=18){
                 color = '#689DF8';
                }else
                    if(valor > 18 && valor <= 46){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        } if (index==1) {
            $.each(promediourgencias, function(i, valor){
               if(i==1){
                if(valor<=2){
                 color = '#689DF8';
                }else
                    if(valor > 2 && valor <= 6){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        }if (index==2) {
          $.each(promediourgencias, function(i, valor){
               if(i==2){
                 color = '#689DF8';
                urgen.push({y:valor, color: color});
               }
            });
        }if (index==3) {
          $.each(promediourgencias, function(i, valor){
               if(i==3){
                if(valor<=6){
                 color = '#689DF8';
                }else
                    if(valor > 6 && valor <= 12){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        } if(index==4){
          $.each(promediourgencias, function(i, valor){
               if(i==4){
                color = '#689DF8';
                urgen.push({y:valor, color: color});
               }
            });
        } if(index==5){
          $.each(promediourgencias, function(i, valor){
               if(i==5){
                color = '#689DF8';
                urgen.push({y:valor, color: color});
               }
            });
        } if(index==6){
           $.each(promediourgencias, function(i, valor){
               if(i==6){
                if(valor<=1){
                 color = '#689DF8';
                }else
                    if(valor > 1 && valor <= 2){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        } if(index==7){
           $.each(promediourgencias, function(i, valor){
               if(i==7){
                if(valor<=1){
                 color = '#689DF8';
                }else
                    if(valor > 1 && valor <= 2){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        } if(index==8){
            $.each(promediourgencias, function(i, valor){
               if(i==8){
                if(valor<=8){
                 color = '#689DF8';
                }else
                    if(valor > 8 && valor <= 24){
                      color = '#FF7D7D';
                    }else{
                      color = 'red';
                    }
                urgen.push({y:valor, color: color});
               }
            });
        }
       });


       }

    $('#Gurgenciascancelados').highcharts({

        chart: {
            type: 'bar',
            backgroundColor: null,
            animation: true,
            height: 360,
        },
        title: {
            text: null
        },
        credits: {
           enabled:false,
        },
        xAxis: {
            categories: modalidadurgencias,
             gridLineWidth: 0,
             title: {
                text: null
            },
             type: 'linear',
             startOnTick: false,
            endOnTick: false,
            tickPositions: []

        },
        yAxis: {
            min:0,max: 100,
            gridLineWidth: 0,
            title: {
                text: null
            },
            labels:{
                formatter: function(){
                    return this.value+'';
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
         name:'DATOS',
         data:urgen
        },{
        type:'scatter',
        data: [{
            x: 0,
            y: 8,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 1,
            y: 2,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 3,
            y: 6,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 6,
            y: 1,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 7,
            y: 1,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    },{
        type:'scatter',
        data: [{
            x: 8,
            y: 8,
            marker: {
                symbol: 'url(imagenes/lineas2.png)',
            }
        }]
    }]
    });
});

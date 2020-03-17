$(document).ready(function(){
	$('.dropdown-submenu > a').submenupicker();


	/*======================= FILTROS MESES ====================================*/

		$('.filtroMes').change(function(){
			$( ".formulario" ).submit();
		});


	/*===========================================================================*/

	
	$('#modalidad').change(function(){
		var x = $('#modalidad').val();
		if (x==1) {

			$('#estudioRealizadoModalidad').removeClass('check');
			$('#estudioRealizado').addClass('check1');

			$('#tablaModalidad').removeClass('tablaVer');
			$('#tablaUNidadE').addClass('tablaVer1');

		}else{

			$('#estudioRealizadoModalidad').addClass('check');
			$('#estudioRealizado').removeClass('check1');

			$('#tablaModalidad').addClass('tablaVer');
			$('#tablaUNidadE').removeClass('tablaVer1');

		}
	});


	$('#tipo_estudios').change(function(){
		var e = $('#tipo_estudios').val();
		if (e==1) {

			$('#estudioRealizadoTipos').removeClass('check');
			$('#estudioRealizado').addClass('check1');

			$('#tablaTipoEstudios').removeClass('tablaVer');
			$('#tablaUNidadE').addClass('tablaVer1');

		}else{

			$('#estudioRealizadoTipos').addClass('check');
			$('#estudioRealizado').removeClass('check1');

			$('#tablaTipoEstudios').addClass('tablaVer');
			$('#tablaUNidadE').removeClass('tablaVer1');

		}
	});



	$('#razons').change(function(){
		var r = $('#razons').val();
		if (r==1) {

			$('#por_razon').removeClass('check');
			$('#EstudioCancelados').addClass('check1');
		}else{

			$('#por_razon').addClass('check');
			$('#EstudioCancelados').removeClass('check1');

		}
	});

	$('#tipoEstudio').change(function(){
		var r = $('#tipoEstudio').val();
		if (r==1) {

			$('#TipoEstudios').removeClass('check');
			$('#EstudioCancelados').addClass('check1');
		}else{

			$('#TipoEstudios').addClass('check');
			$('#EstudioCancelados').removeClass('check1');

		}
	});


	$('#btn-imports').click(function(){
		alert('si');
		
		var archivo = $('.archivo').val().length;
		var valeur = 0;

		if (archivo !== "") {
			$('#barra').fadeIn();
		}
		
	});

});
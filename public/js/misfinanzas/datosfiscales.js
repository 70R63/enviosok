$(document).ready(function() {

	console.log("datos fiscales")

    completarConCP()

});


$("#cp").keyup(function() {
    completarConCP()
});

function completarConCP(){
    var cp = document.getElementById('cp');
    var coloniaOculto = $("#colonia_oculto").val();

    if(cp && cp.length==5){
        console.log("CP con 5 valores")
        $.ajax({
            url: route('api.colonias.sepomex', cp ) ,
            type: 'GET',
            /* send the csrf-token and the input to the controller */
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        }).done(function( response) {
            console.log(response.data   )

            $('#colonia').empty();
            $("#colonia").append('<option selector="0" value="0"> Seleccionar</option>');

            $.each(response.data,function(key, desc) {
                console.log(desc)
                var colonia = desc.d_asenta
                var municipio = desc.d_mnpio
                var estado = desc.d_estado
                console.info(coloniaOculto+" - "+colonia )
                var selected = (coloniaOculto === colonia) ? "selected": "";
                $("#colonia").append('<option selector='+key+' value="'+colonia+'" selected>'+colonia+'</option>');
                $("#municipio").val(municipio)
                $("#estado").val(estado)

            });


        }).fail( function( data,jqXHR, textStatus, errorThrown ) {
            console.error( "fail" );
            console.log(data);
            swal(
                "Error!",
                textStatus,
                "error"
              )

        }).always(function() {
                console.log( "complete" );
        });

    }

}

$("#catalogo_persona_fiscal").change(function() {
    var catalogPersonaFiscalId = $('#catalogo_persona_fiscal').val();
    console.log("catalogPersonaFiscalId "+catalogPersonaFiscalId)
    //Peticion de Regimen Fiscal
    $.ajax({
        url: route('api.misfinanzas.regimenFiscalPorTipoPersona', catalogPersonaFiscalId ) ,
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

    }).done(function( response) {
        console.log(response.data   )

        $('#regimen_fiscal').empty();
        $("#regimen_fiscal").append('<option selector="0" value="0"> TODOS</option>');

        $.each(response.data,function(key, desc) {

            leyenda = key+' - '+desc;
            $("#regimen_fiscal").append('<option selector='+key+' value="'+key+'" >'+leyenda+'</option>');
        });


    }).fail( function( data,jqXHR, textStatus, errorThrown ) {
        console.error( "fail" );
        console.log(data);
        swal(
            "Error!",
            textStatus,
            "error"
          )


    }).always(function() {
            console.log( "complete" );
    });


    //Peticion de Uso de CFDI
    $.ajax({
        url: route('api.misfinanzas.usoCdiPorTipoPersona', catalogPersonaFiscalId ) ,
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

    }).done(function( response) {
        console.log(response.data   )

        $('#uso_cfdi').empty();
        $("#uso_cfdi").append('<option selector="0" value="0"> TODOS</option>');

        $.each(response.data,function(key, desc) {

            var leyenda = key+"-"+desc;

            $("#uso_cfdi").append('<option selector='+key+' value="'+key+'" >'+leyenda+'</option>');
        });


    }).fail( function( data,jqXHR, textStatus, errorThrown ) {
        console.error( "fail" );
        console.log(data);
        swal(
            "Error!",
            textStatus,
            "error"
          )


    }).always(function() {
            console.log( "complete" );
    });

});



var table;
var peso;
var piezas = 0;
var costoSeguro = 0;
var valorEnvio = 0;
var costoPesoExtra = 0;
var dimensional = 0;
var bascula = 0;
var sobrePesoKg = 0;
var costoCoberturaExtendida = 0;
var costoKgExtra = 0;
var saldoNegativo = false;
var saldoMinimo = 90;
var esSobre = false;

$(document).ready(function() {

    var radio = $('input[name="radio3"]:checked').val()
    
    checkCotizacion(radio)

    var tipoEnvio = $('input[name="tipoEnvio"]:checked').val()
   
    checkTipoEnvio(tipoEnvio)


})


function checkTipoEnvio(tipoEnvio){
    console.log("function checkTipoEnvio")
    
    switch (tipoEnvio){
        case 'paquete':
             console.log("paquete")
             $(".tipoEnvio").show()
             $(".paquete").attr("required","true");
            esSobre = false
            break;
        case 'sobre':
            console.log("sobre")
            $(".tipoEnvio").hide()
            $(".paquete").removeAttr("required");
            esSobre = true
            
            break;
        }


}

$('input[name="tipoEnvio"]').on('click', function(e) {
    //console.log(e.target);
    var tipoCotizacion = e.target.value;

   checkTipoEnvio(tipoCotizacion);
   $("#pesoFacturado").val(1);
   peso = 1;
   
});

function checkCotizacion(radio){
    console.log("function tipoCotizacion")

    var sucursalIdOculto =  $("#sucursal_id_oculto").val()
    var clienteIdOculto = $("#cliente_id_oculto").val()

    console.log("sucursal=" + sucursalIdOculto + " cliente="+clienteIdOculto)
     switch (radio){
        case 'libreta':
            console.log("libreta")
            $(".checkManualHtml").show()
            $(".clienteCombo").hide()
            $(".checkSemiHtml").show()
            $("#clienteIdCombo").removeAttr("required");
            $(".cotizacionManual").attr("readonly","true");

            direccionesPorEmpresa("remitente","#sucursal",sucursalIdOculto );
            $("#sucursal").attr("required","true");

            direccionesPorEmpresa("destinatario", "#cliente", clienteIdOculto);
            $("#cliente").attr("required","true");

            $("cp").attr("required","true");
            $("#esManual").val("NO");
            break;
        case 'semi':
            console.log("semi")
            $(".checkManualHtml").show()

            $(".cotizacionManual").attr("readonly","true");
            $("#sucursal").attr("required","true");

            direccionesPorEmpresa("remitente","#sucursal", sucursalIdOculto);
            $(".cotizacionSemi").removeAttr("readonly");

            $("#esManual").val("SEMI");
            $(".checkSemiHtml").hide()
            break;
        case 'manual':
            console.log("manual")
            $(".checkManualHtml").hide()

            $(".cotizacionManual").removeAttr("readonly");
            $("#sucursal").removeAttr("required");
            $("#cliente").removeAttr("required");

            $("#esManual").val("SI");
            break;

    }

}

function pesoDimensionalyBascula(){

    var piezas = $("#piezas").val()
    var iteracionClone = 0
    $('.registroMultipieza').each(function(){
        console.log("--------------"+iteracionClone)
        var control = +iteracionClone *4
        var indexPeso = 0 +control
        var indexLargo = 1 +control
        var indexAncho = 2 +control
        var indexAlto = 3 +control


        var peso = $('.registroMultipieza .multi').get()[indexPeso].value
        var largo = $('.registroMultipieza .multi').get()[indexLargo].value
        var ancho = $('.registroMultipieza .multi').get()[indexAncho].value
        var alto = $('.registroMultipieza .multi').get()[indexAlto].value

        if ($('.registroMultipieza').length == 1){
            pesoBascula = peso*piezas
            pesoDimensional = (((alto*ancho*largo)/5000)*piezas)

        }else{
            pesoBascula = peso
            pesoDimensional = ((alto*ancho*largo)/5000)
        }

        console.log("bascula "+pesoBascula+ ">"+ pesoDimensional+" dimensional")
        iteracionClone++

    })

    pesoFacturado = pesoFacturado + ((bascula > dimensional) ? Math.ceil(bascula) : Math.ceil(dimensional));
    return pesoFacturado;
}

function pesofacturado(){

    var peso = 0
    var piezas = $("#piezas").val();
    var iteracionClone = 0
    var pesoFacturado =+0

    bascula = +0
    dimensional =+0

    $('.registroMultipieza').each(function(){
        console.log("--------------"+iteracionClone)
        var control = +iteracionClone *4
        var indexPeso = 0 +control
        var indexLargo = 1 +control
        var indexAncho = 2 +control
        var indexAlto = 3 +control


        var peso = $('.registroMultipieza .multi').get()[indexPeso].value


        var largo = $('.registroMultipieza .multi').get()[indexLargo].value
        var ancho = $('.registroMultipieza .multi').get()[indexAncho].value
        var alto = $('.registroMultipieza .multi').get()[indexAlto].value

        if ($('.registroMultipieza').length == 1){
            
            bascula = peso*piezas
            dimensional = (((alto*ancho*largo)/5000)*piezas)

        }else{
            bascula = peso
            dimensional = ((alto*ancho*largo)/5000)
        }

        pesoFacturado = pesoFacturado + ((bascula > dimensional) ? Math.ceil(bascula) : Math.ceil(dimensional));
        console.log("bascula "+bascula+ ">"+ dimensional+" dimensional")
        iteracionClone++

    })
    console.log("peso facturado = "+pesoFacturado)
    $("#pesoFacturado").val(pesoFacturado);
}

function costoSeguroValidar(seguro){
    costoSeguro = 0;
    valorEnvio = 0;
    console.log("costoSeguroValidar "+seguro)

    if ($('#checkSeguro').is(":checked")) {
        valorEnvio = $("#valor_envio").val();
        costoSeguro = (valorEnvio * seguro)/100;
    }
    return costoSeguro;
}

function preciofinal(dataRow){
    //Variable Global;
    piezas = $('#piezas').val();
    peso = $('#pesoFacturado').val();
    costoCoberturaExtendida = 0;
    costoPesoExtra = 0;

    costoSeguroValidar(dataRow.seguro);

    if (peso > dataRow.kg_fin) {
        sobrePesoKg = peso - dataRow.kg_fin ;
        costoPesoExtra = sobrePesoKg * dataRow.kg_extra ;
        costoKgExtra = dataRow.kg_extra;
    }

    console.log(dataRow.extendida_cobertura);
    var textAreaExtendida = dataRow.extendida_cobertura.toUpperCase()
    if ( textAreaExtendida == "SI"){
        costoCoberturaExtendida = dataRow.extendida
        console.log(costoCoberturaExtendida);
    }

    return dataRow.costo+ costoPesoExtra + costoSeguro + costoCoberturaExtendida;
}

function fechaTentativa(row){

    var ahora = new Date();
    var diaLaboral = 0

    ahora.setDate(ahora.getDate()+row.tiempo_entrega)

    if (ahora.getDay() === 0 || ahora.getDay() === 6 )
        diaLaboral = 2

    ahora.setDate(ahora.getDate()+diaLaboral)
    return ahora.toLocaleDateString('es-MX');
}


function obtenerCP(id, modelo) {
    console.log("cargadnp obtenerCP");
    $.ajax({
        /* Usar el route  */
        url: "api/cp",
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: "id="+id+"&modelo="+modelo

        /* remind that 'data' is the response of the AjaxController */
        }).done(function( response) {
            console.log("done");
            var contador = response.data.length

            if ("Sucursal" == modelo) {
                if (contador == 1) {
                    $("#cp").val(response.data[0].cp);
                } else {
                    $("#cp").val("00000");
                }

            } else {
                if (contador == 1) {
                    $("#cp_d").val(response.data[0].cp);
                } else {
                    $("#cp_d").val("00000");
                }
            }


        }).fail( function( data,jqXHR, textStatus, errorThrown ) {
            console.log( "fail" );
            console.log(textStatus);

            alert( data.responseJSON.message);

        }).always(function() {
            console.log( "complete" );
        });

}

function validaSaldo(response){
    console.log("validaSaldo")

    if (response.data.tipoPagoId == 2) {
         if (response.data.saldo <saldoMinimo) {
            saldoNegativo = true;
            swal(
                "El Saldo: "+response.data.saldo +" es menor al limite permitido",
                "Revisar con tu Administrador!",
                "error"
              )
        }

        if (response.data.saldo <0) {
            saldoNegativo = true;
            swal(
                "Saldo Negativo: $"+response.data.saldo ,
                "Revisar con tu Administrador!",
                "error"
              )
        }


    } else {

    }

    //tipo_pago_id
}


//actividades al vuelo

$("#limpiar").click(function() {
    $('#cotizacionesForm').trigger('reset');
    table.clear().draw();
    $('#cotizacionesForm').parsley().reset();
    //validar se se puede reutilizar
    $(".checkManualHtml").show()
    $(".clienteCombo").hide()
    $("#clienteIdCombo").removeAttr("required");
    $(".cotizacionManual").attr("readonly","true");
    $("#sucursal").attr("required","true");
    $("#cliente").attr("required","true");
    $("#cliente_id").removeAttr("required");

    $(".checkSemiHtml").show()
    $(".cotizacionSemi").attr("readonly","true");
    $("#esManual").val("NO");
    //FIN validar se se puede reutilizar

});


$("#cotizar").click(function(e) {
    console.log("cotizar")
    e.preventDefault();

    var form = $('#cotizacionesForm').parsley().refresh();
    var action = $('#cotizacionesForm').attr("action");
    console.log(action)
    saldoNegativo = false;
    if ( form.validate() ){
        $.ajax({
            /* Usar el route  */
            url: action,
            type: 'GET',
            /* send the csrf-token and the input to the controller */
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: $('#cotizacionesForm').serialize()

            /* remind that 'data' is the response of the AjaxController */
            }).done(function( response) {
                console.log("done");
                console.log(response.data.data);


                table = $('#cotizacionAjax').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "No exiten tarifas con los datos para cotizar"
                    },
                    dom: '<"title"<"filter"f>>rtip',
                    
                    "processing": true,
                    "bDestroy": true,
                    order: [[1, 'desc']]

                    ,"data": response.data.data,
                    columnDefs: [
                        {
                            targets: 10
                            ,"createdCell": function(td, cellData, rowData, row, col) {
                                switch(cellData) {
                                    case "SI":
                                        $(td).addClass('text-danger si si-info');
                                        break;
                                    case "NO":
                                        $(td).addClass('text-success');

                                }
                            }
                        }
                    ]
                    ,"columns": [
                        { "data": "id" },
                        { "data": "nombre" },
                        { "data": "servicios_nombre" },
                        { "data": "fecha_tentativa"
                            ,render: function (data, type, row) {
                                return fechaTentativa(row);
                            }
                        },
                        { "data": "zona" },
                        { "data": "costo"
                            ,render: function (data,row) {
                                return '$ '+data;
                            }
                        },
                        { "data": "kg_ini" },
                        { "data": "kg_fin" },
                        { "data": "kg_extra" },
                        { "data": "ocurre" },
                        { "data": "extendida_cobertura" },
                        { "data": "extendida" },
                        { "data": "seguro"
                            ,render: function (data, type, row, meta) {
                                return '$ '+costoSeguroValidar(row.seguro);
                            }
                        },
                        { "data": "costo_total"
                            ,render: function (data, type, row, meta) {
                                return '$ '+preciofinal(row);
                            }
                        }
                    ],
                    "autoWidth": false,
                });

            }).fail( function( data,jqXHR, textStatus, errorThrown ) {
                console.log( "fail" );
                console.log(textStatus);

                swal(
                    "Error!",
                    data.responseJSON.message,
                    "error"
                  )


            }).always(function() {
                console.log( "complete" );
            });

    } else {
        console.log( "enviosForm con errores" );
        return false;
    }
});

table = $('#cotizacionAjax').DataTable({
    "oLanguage": {
        "sEmptyTable": "Ingresa los datos para cotizar"
    }
});

$('#cotizacionAjax tbody').on('click', 'tr', function () {
   /*
    var dataRow = table.row(this).data();
    console.log(dataRow);
    //Valores de la cotizacion de la Forma Cotizacion
    var sucursal_id = $('#sucursal').val();
    var cliente_id = $('#cliente').val();
    var cp = $('#cp').val();
    var cp_d = $('#cp_d').val();
    var largo = $('#largo').val();
    var ancho = $('#ancho').val();
    var alto = $('#alto').val();
    var bSeguro = ( $('#checkSeguro').is(":checked") ? true : false);
    var valorEnvio = $('#valor_envio').val();
    var contenido = $('#contenido').val();
    var esManual = $("#esManual").val();
    var empresaId = $("#clienteIdCombo").val();

    //Inicializacion de variables del renglon de la cotizacion
    var tarifa_id = table.row(this).data()['id'];
    var ltd_nombre = table.row(this).data()['nombre'];
    var ltd_id = table.row(this).data()['ltds_id'];
    var servicioNombre = dataRow['servicios_nombre'];
    var servicioId  = dataRow['servicio_id'];
    var precio =  preciofinal(dataRow);
    var iva = precio*0.16;
    var precioIva = (precio+iva).toFixed(2);
    var ocurre  = dataRow['ocurre'];
    var areaExtendida  = dataRow['extendida_cobertura'];
    var zona  = dataRow['zona'];
    var costoBase  = dataRow['costo'];


    //valores para el modal resumen_cotizacion.blade
    $(".spanPrecio").text( precioIva );
    $("#spanMensajeria").text(ltd_nombre);
    $("#spanservicioId").text(servicioNombre);
    $("#spanRemitente").text(cp);
    $("#spanDestinatario").text(cp_d);
    $("#spanPieza").text(piezas);
    $("#spanSeguro").text(costoSeguro);
    $("#spanValorEnvio").text(valorEnvio);
    $("#spanPeso").text(peso);
    $("#spanCotizacionManual").text(esManual);
    $("#spanOcurre").text(ocurre);
    $("#spanAreaExtendida").text(areaExtendida);
    $("#spanZona").text(zona);

    //valores para request, campos ocultos guiastore_ocultos -> card_preciofinal
    
    $("#precio").val(precioIva);
    $("#tarifa_id").val(tarifa_id);
    $("#sucursal_id").val(sucursal_id);
    $("#cliente_id").val(cliente_id);
    $("#ltd_nombre").val(ltd_nombre);
    $("#ltd_id").val(ltd_id);
    $("#piezas_guia").val(piezas);
    $("#servicio_id").val(servicioId);
    $("#peso_facturado").val(peso);
    $("#bSeguro").val(bSeguro);
    $("#costo_seguro").val(costoSeguro);
    $("#contenido_r").val(contenido);
    $("#extendida_r").val(areaExtendida);
    $("#valor_envio_r").val(valorEnvio);
    $("#esManual").val(esManual);
    $("#cp_manual").val(cp);
    $("#cp_d_manual").val(cp_d);
    $("#empresa_id").val(empresaId);
    $("#ocurre").val(ocurre);
    $("#zona").val(zona);
    $("#costo_base").val(costoBase);
    $("#costo_kg_extra").val(costoPesoExtra); //costoKgExtra
    $("#peso_dimensional").val(dimensional);
    $("#peso_bascula").val(bascula);
    $("#sobre_peso_kg").val(sobrePesoKg);
    $("#costo_extendida").val(costoCoberturaExtendida);



    var iteracionClone = 0
    var pesos = []
    var largos = []
    var anchos = []
    var altos = []

    $('.registroMultipieza').each(function(){
        console.log("--------------"+iteracionClone)
        var control = +iteracionClone *4
        var indexPeso = 0 +control
        var indexLargo = 1 +control
        var indexAncho = 2 +control
        var indexAlto = 3 +control


        var peso = $('.registroMultipieza .multi').get()[indexPeso].value
        var largo = $('.registroMultipieza .multi').get()[indexLargo].value
        var ancho = $('.registroMultipieza .multi').get()[indexAncho].value
        var alto = $('.registroMultipieza .multi').get()[indexAlto].value

        pesos.push(peso)
        largos.push(largo)
        anchos.push(ancho)
        altos.push(alto)
        iteracionClone++
    })

    $("#pesos").val(pesos);
    $("#largos").val(largos);
    $("#anchos").val(anchos);
    $("#altos").val(altos);

*/
    var dataRow = table.row(this).data();

    console.log(dataRow);
    //Valores de la cotizacion de la Forma Cotizacion
    var sucursal_id = $('#sucursal').val();
    var cliente_id = $('#cliente').val();
    var cp = $('#cp').val();
    var cp_d = $('#cp_d').val();
    var largo = $('#largo').val();
    var ancho = $('#ancho').val();
    var alto = $('#alto').val();
    var bSeguro = ( $('#checkSeguro').is(":checked") ? true : false);
    var valorEnvio = $('#valor_envio').val();
    var contenido = $('#contenido').val();
    var esManual = $("#esManual").val();
    var empresaId = $("#clienteIdCombo").val();

    //Inicializacion de variables del renglon de la cotizacion
    var tarifa_id = table.row(this).data()['id'];
    var ltd_nombre = table.row(this).data()['nombre'];
    var ltd_id = table.row(this).data()['ltds_id'];
    var servicioNombre = dataRow['servicios_nombre'];
    var servicioId  = dataRow['servicio_id'];
    var precio =  preciofinal(dataRow);
    var iva = precio*0.16;
    var precioIva = (precio+iva).toFixed(2);
    var ocurre  = dataRow['ocurre'];
    var areaExtendida  = dataRow['extendida_cobertura'];
    var zona  = dataRow['zona'];
    var costoBase  = dataRow['costo'];

    //valores para el modal resumen_cotizacion.blade
    $(".spanPrecio").text( precioIva );
    $("#spanMensajeria").text(ltd_nombre);
    $("#spanservicioId").text(servicioNombre);
    $("#spanRemitente").text(cp);
    $("#spanDestinatario").text(cp_d);
    $("#spanPieza").text(piezas);
    $("#spanSeguro").text(costoSeguro);
    $("#spanValorEnvio").text(valorEnvio);
    $("#spanPeso").text(peso);
    $("#spanCotizacionManual").text(esManual);
    $("#spanOcurre").text(ocurre);
    $("#spanAreaExtendida").text(areaExtendida);
    $("#spanZona").text(zona);

        //valores para request, campos ocultos guiastore_ocultos -> card_preciofinal
    pesofacturado()
    $("#precio").val(precioIva);
    $("#tarifa_id").val(tarifa_id);
    $("#sucursal_id").val(sucursal_id);
    $("#cliente_id").val(cliente_id);
    $("#ltd_nombre").val(ltd_nombre);
    $("#ltd_id").val(ltd_id);
    $("#piezas_guia").val(piezas);
    $("#servicio_id").val(servicioId);
    $("#peso_facturado").val(peso);
    $("#bSeguro").val(bSeguro);
    $("#costo_seguro").val(costoSeguro);
    $("#contenido_r").val(contenido);
    $("#extendida_r").val(areaExtendida);
    $("#valor_envio_r").val(valorEnvio);
    $("#esManual").val(esManual);
    $("#cp_manual").val(cp);
    $("#cp_d_manual").val(cp_d);
    $("#empresa_id").val(empresaId);
    $("#ocurre").val(ocurre);
    $("#zona").val(zona);
    $("#costo_base").val(costoBase);
    $("#costo_kg_extra").val(costoPesoExtra); //costoKgExtra
    $("#peso_dimensional").val(dimensional);
    $("#peso_bascula").val(bascula);
    $("#sobre_peso_kg").val(sobrePesoKg);
    $("#costo_extendida").val(costoCoberturaExtendida);



    var iteracionClone = 0
    var pesos = []
    var largos = []
    var anchos = []
    var altos = []

    if (esSobre) {
        pesos.push(1)
        largos.push(0)
        anchos.push(0)
        altos.push(0)

    } else {

        $('.registroMultipieza').each(function(){
            console.log("--------------"+iteracionClone)
            var control = +iteracionClone *4
            var indexPeso = 0 +control
            var indexLargo = 1 +control
            var indexAncho = 2 +control
            var indexAlto = 3 +control


            var peso = $('.registroMultipieza .multi').get()[indexPeso].value
            var largo = $('.registroMultipieza .multi').get()[indexLargo].value
            var ancho = $('.registroMultipieza .multi').get()[indexAncho].value
            var alto = $('.registroMultipieza .multi').get()[indexAlto].value

            pesos.push(peso)
            largos.push(largo)
            anchos.push(ancho)
            altos.push(alto)
            iteracionClone++
        })

    }
    

    $("#pesos").val(pesos);
    $("#largos").val(largos);
    $("#anchos").val(anchos);
    $("#altos").val(altos);

    var saldoPorEmpresa = document.getElementById("spanSaldoPorEmpresa").innerText;
    console.error(saldoPorEmpresa)

    
    saldoPorEmpresa = parseFloat(saldoPorEmpresa);
    precioIva = parseFloat(precioIva);

    console.log(saldoPorEmpresa +">"+ precioIva)
    console.log(saldoPorEmpresa > precioIva)

    let total_envios = parseInt($("#total_guias").val());
    let tiene_ine_anverso = parseInt($("#tiene_ine_anverso").val());
    let tiene_ine_reverso = parseInt($("#tiene_ine_reverso").val());
    let tiene_ine_selfie = parseInt($("#tiene_ine_selfie").val());

    if(total_envios>=2 && (!tiene_ine_anverso || !tiene_ine_reverso || !tiene_ine_selfie)){
        console.log("modal_completar_documentacion")
        $("#modal_completar_documentacion").modal("show");
    }
    else if ( saldoPorEmpresa > precioIva   ) {
        console.log("myModal")
        $("#myModal").modal("show");
    } else {
        console.log("myModalMercadoPago")
        $("#myModalMercadoPago").modal("show");
    }


});


$("#sucursal").change(function() {
    var idSucursal = $('#sucursal').val();
    console.log("sucursal "+idSucursal)
    obtenerCP(idSucursal, "Sucursal");

});


$("#cliente").change(function() {
    var idCliente = $('#cliente').val();
    console.log("cliente "+idCliente)
    obtenerCP(idCliente, "Cliente");
});

$(function(){
    $(".multi").on("change keyup paste", function (){
        pesofacturado();
    });


    $("#handleCounterMax28").click( function (){
        pesofacturado();
    });

});

function obtenerClientes() {

    $.ajax({
        /* Usar el route  */
        url: route('api.clientes'),
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //data: "clienid="+id

        /* remind that 'data' is the response of the AjaxController */
        }).done(function( response) {
            console.log("done");
            //console.log(response.data);

            $('#clienteIdCombo').empty();
            $("#clienteIdCombo").append('<option selector="0" value="0"> TODOS</option>');

            $.each(response.data,function(key, empresa) {
                $("#clienteIdCombo").append('<option selector='+key+' value="'+empresa.id+'" >'+empresa.nombre+'</option>');
              });


        }).fail( function( data,jqXHR, textStatus, errorThrown ) {
            console.log( "fail" );
            console.log(textStatus);

            swal(
                "Error!",
                data.responseJSON.message,
                "error"
              );


        }).always(function() {
            console.log( "complete" );
        });

}


function direccionesPorEmpresa(direccionTipo, tipoTag, idCombo=0){
    console.log( "direccionesPorEmpresa" );

    $.ajax({
        /* Usar el route  */

        url: route('api.direcciones.tipo', [direccionTipo]),

        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


        /* remind that 'data' is the response of the AjaxController */
        }).done(function( response) {
            console.log("done");
            console.log(response.data);

            $(tipoTag).empty();
            $(tipoTag).append('<option selector="0" value=""> Selecciona</option>');
            $.each(response.data,function(key, empresa) {
                var selectedOp = (parseInt(empresa.id) === parseInt(idCombo) ) ? 'selected' : '' ;
                console.log(selectedOp)
                $(tipoTag).append('<option value="'+empresa.id+'" '+ selectedOp +' >'+empresa.nombre+'</option>');
            });

        }).fail( function( data,jqXHR, textStatus, errorThrown ) {
            console.log( "fail" );
            console.log(textStatus);

            swal(
                "Error!",
                data.responseJSON.message,
                "error"
              );


        }).always(function() {
            console.log( "complete" );
    });

}

function crearPreferencia(precioIva,ltd_nombre, servicioNombre){

    const mp = new MercadoPago('TEST-ee7e0c16-35b1-4cd2-b742-56da4a3eccce',
            {locale: "es-MX"}
        );
    const bricksBuilder = mp.bricks();


    element = document.getElementById("wallet_container");
    element.remove(); // Elimina el div con el id 'div-02'

    $('#mercadopago').append('<div id="wallet_container"></div>');

    var settings = {
        "url": "https://api.mercadopago.com/checkout/preferences",
        "method": "POST",
        "timeout": 0,
          "headers": {
            "Content-Type": "application/json",
            "Authorization": "Bearer TEST-4198938082880779-032602-a9f12f338449b61fac78b09778fef4c7-150057237"
          },
        "data": JSON.stringify({
            "items": [
              {
                "title": ltd_nombre +" - "+servicioNombre,
                "description": ltd_nombre +" - "+servicioNombre,
                "picture_url": "http://www.myapp.com/myimage.jpg",
                "category_id": "car_electronics",
                "quantity": 1,
                "currency_id": "MXP",
                "unit_price": parseFloat(precioIva)
              }
            ],
            "payment_methods": {
                "excluded_payment_methods": [
                    {
                        id: "amex"
                    },
                    {
                        id: "debmaster"
                    }
                ],
                "excluded_payment_types": [
                    {
                        id: "ticket"
                    }
                ]
            },
            installments: 1,
            auto_return: "approved",
            back_urls: {
                success: "http://local.enviosok.com/dashboard",
                failure: "http://local.enviosok.com/dashboard",
                pending: "https://www.tu-sitio/pendings"
            },
        }),
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: response.id,
                redirectMode: "self"
            },
            customization: {
                texts: {
                    valueProp: 'smart_option',
                },
                visual:{
                    borderRadius: '6px',
                    verticalPadding : '8px',

                }
            },
            callbacks: {
                onError: (error) => console.error(error),
                onReady: () => console.error("onReady")
            }
        });
    }).fail( function( data,jqXHR, textStatus, errorThrown ) {
        console.log( "fail" );
        console.log(textStatus);

        swal(
            "Error!",
            data.responseJSON.message,
            "error"
          )


    }).always(function() {
        console.log( "complete" );
    });

}

$("#addRow").click(function () {
    console.log('AddRow')
    var piezas = $("#piezas").val()
    var multipiezas = $(".registroMultipieza").length;


    var html = $("#clone").clone(true,true)

    $('.registroMultipieza').each(function( index ) {
        $(this).remove();

    });

    console.log("piezas -> "+piezas)
    for (let i = 0; i < piezas ; i++) {
        console.log("iteracion piezas")
        html.clone(true,true).appendTo( "#multiPieza" ).show()
    }

    pesofacturado();

});


$('input[name="radio3"]').on('click change', function(e) {
    //console.log(e.target);
    var tipoCotizacion = e.target.value;

   checkCotizacion(tipoCotizacion);

});



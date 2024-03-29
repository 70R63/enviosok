var table;
var peso;
var piezas = 0;
var costoSeguro = 0;
var valorEnvio = 0;

function pesofacturado(){

    var pieza = $("#piezas").val()
    var peso = $("#peso").val()
    var alto = $("#alto").val()
    var ancho = $("#ancho").val()
    var largo = $("#largo").val()

    var bascula = peso*pieza
    var dimensional = ((alto*ancho*largo)/5000)*pieza
    pesoFacturado = (bascula > dimensional) ? bascula : Math.ceil(dimensional);


    $("#pesoFacturado").val(pesoFacturado);

}

function costoSeguroValidar(seguro){

    costoSeguro = 0;
    valorEnvio = 0;

    if ($('#checkSeguro').is(":checked")) {
        valorEnvio = $("#valor_envio").val();
        costoSeguro = (valorEnvio * seguro)/100;  
    }
}

function preciofinal(dataRow){
    //Variable Global;
    piezas = $('#piezas').val();
    peso = $('#pesoFacturado').val();
    var costoPesoExtra = 0;

    costoSeguroValidar(dataRow.seguro);

    if (peso > dataRow.kg_fin) {
        sobrepeso = peso - dataRow.kg_fin ;
        costoPesoExtra = sobrepeso * dataRow.kg_extra * piezas;
    }

    return (piezas*dataRow.costo)+ costoPesoExtra + costoSeguro;
}

function obtenerCP(id, modelo) {

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

$("#limpiar").click(function() {
    $('#cotizacionesForm').trigger('reset');
});


$("#cotizar").click(function(e) {
    console.log("cotizar")
    e.preventDefault();

    var form = $('#cotizacionesForm').parsley().refresh();
    var action = $('#cotizacionesForm').attr("action"); 

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
                
                table = $('#cotizacionAjax').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "No exiten tarifas con los datos para cotizar"
                    }
                    ,"processing": true,
                    "bDestroy": true,
                    "data": response.data.data,
                    "columns": [
                        { "data": "id" },
                        { "data": "nombre" },
                        { "data": "costo" 
                            ,render: function (data) {
                                return '$ '+data;
                            } 
                        },
                        { "data": "kg_ini" },
                        { "data": "kg_fin" },
                        { "data": "kg_extra" },
                        { "data": "extendida" },
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
                
                alert( data.responseJSON.message);

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
   
    var dataRow = table.row(this).data(); 
    var sucursal_id = $('#sucursal').val();
    var cliente_id = $('#cliente').val();
    var cp = $('#cp').val();
    var cp_d = $('#cp_d').val();
    var costoPesoExtra = 0;

    var tarifa_id = table.row(this).data()['id'];
    var ltd_nombre = table.row(this).data()['nombre'];
    var ltd_id = table.row(this).data()['ltds_id'];

    var precio =  preciofinal(dataRow);
    var iva = precio*0.16;
    
    $("#spanPrecio").text(precio+iva);
    $("#spanMensajeria").text(ltd_nombre);
    $("#spanRemitente").text(cp);
    $("#spanDestinatario").text(cp_d);
    $("#spanPieza").text(piezas);
    $("#spanSeguro").text(costoSeguro);
    $("#spanValorEnvio").text(valorEnvio);
    $("#spanPeso").text(peso);
      
    //valores para request, campos ocultos guiastore_ocultos
    $("#precio").val(precio);
    $("#tarifa_id").val(tarifa_id);
    $("#sucursal_id").val(sucursal_id);
    $("#cliente_id").val(cliente_id);
    $("#ltd_nombre").val(ltd_nombre);
    $("#ltd_id").val(ltd_id);
    $("#piezas_guia").val(piezas);
    

    $("#myModal").modal("show");
});


$("#sucursal").change(function() {
    var idSucursal = $('#sucursal').val();
    obtenerCP(idSucursal, "Sucursal");
}); 

$("#cliente").change(function() {
    var idCliente = $('#cliente').val();
    obtenerCP(idCliente, "Cliente");
});

$(function(){
    $("#peso").on("change keyup paste", function (){
        pesofacturado();
    });

    $("#alto").on("change keyup paste", function (){
        pesofacturado();
    });

    $("#ancho").on("change keyup paste ", function (){
        pesofacturado();
    });

    $("#largo").on("change keyup paste", function (){
        pesofacturado();
    });
});

// La fucnion habilita el modo edicion de los CP, esto ayuda a realizar una cotizacion manual basda en tarifias de un cliente
$(function() {
    $('#checkCotizacionManual').change(function() {

        console.log("checkCotizacionManual");
        var checkSeguro = $(this).is( ":checked" )
        if ( checkSeguro ) {
            $(".cotizacionManual").removeAttr("readonly");
        } else {
            $(".cotizacionManual").attr("readonly","true");
        }
      });
});
// fin Seguro de envio


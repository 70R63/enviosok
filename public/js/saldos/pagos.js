$(document).ready(function() {
    console.log("document ready tablaSaldosPagosResumenAjax")
    if ($('#tablaSaldosPagosResumenAjax').length) {
        console.log("Inicializar tablaSaldosPagosResumenAjax")
        var table = null;  
        tablaSaldosPagosResumen()
        
    }

    if ($('#tablaSaldosPagosAjax').length) {
        console.log("Inicializar tablaSaldosPagosAjax")
        var table = null;   
        tablaSaldosPagos()
        
    }

});

function linkPagos(row){

    //var htmlRetorno = '<span> '+ row.nombre+'  </span>';
    if (row.monto >= 0){
        html='<a href="pagos/'+row.empresa_id+'" rel="noopener noreferrer" class="text-dark"> \
            <span class="badge badge-info badge-pill tx-14">'+ row.nombre +'</span></a>';
    } else {
        html='<a href="pagos/'+row.empresa_id+'" rel="noopener noreferrer" class="text-dark"> \
            <span class="badge badge-danger badge-pill tx-14">'+ row.nombre +'</span></a>';
    }
    

    return html;
}


function tablaSaldosPagosResumen(){
 $.ajax({
        url: '../api/saldos/pagos/resumen',
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //data: $('#reporteRepesajesForm').serialize()
        
        /* remind that 'data' is the response of the AjaxController */
    }).done(function( response) {
        
        table = $('#tablaSaldosPagosResumenAjax').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No se puede mostrar los registros"
                }
                //,searching: false
                ,bSortCellsTop: true
                ,responsive: true
                ,processing: true
                ,pagingType: "full_numbers"
                ,deferRender: true
                ,bDestroy: true
                ,data: response.data
                ,autoWidth: false
                ,order: [[0, 'asc']]
                ,lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todo' ]
                ]
                ,dom: 'Brtip'
                ,buttons: [ 
                    'pageLength'
                  ,{ 
                     extend: 'excelHtml5'
                     , footer: true
                     , charset: 'utf-8' 
                     , fieldSeparator: ','
                     ,fieldBoundary: ''
                     ,exportOptions: {
                        columns: ':not(.notexport)'
                     }
                     
                  }
                  ,{ 
                     extend: 'pdf'
                     ,orientation: 'landscape'
                     , footer: true 
                     ,exportOptions: {
                        columns: ':not(.notexport)'
                     } 
                  }
                  
               ]

                ,columns: [
                    { "data": "nombre" 
                        ,render: function(data, type, row){   
                                return linkPagos(row); 
                            }
                    }
                    ,{ "data": "monto" }
                    ,{ "data": "importe" }
                    ,{ "data": "importe7" }
                    ,{ "data": "importe15" }
                    ,{ "data": "importe30" }
                    
                ],
            });
        //table.columns( [12] ).visible( false );

            
    }).fail( function( data,jqXHR, textStatus, errorThrown ) {
        console.log( "fail" );
        console.log(data);
        swal(
            "Error!",
            textStatus,
            "error"
          )


    }).always(function() {
        console.log( "complete tablaSaldosPagosResumenAjax" );
    });

   
$('input.search').on('keyup change', function () {
    var rel = $(this).attr("rel");
    table.columns(rel).search(this.value).draw();
});

};


function tablaSaldosPagos(){

    console.log("tablaSaldosPagos")
    
    $.ajax({
        //url: uri,
        url: route('api.saldos.pagos'),
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        
        /* remind that 'data' is the response of the AjaxController */
    }).done(function( response) {
        
        table = $('#tablaSaldosPagosAjax').DataTable({
                "oLanguage": {
                    "sEmptyTable": "No se puede mostrar los registros"
                }
                //,searching: false
                ,bSortCellsTop: true
                ,responsive: false
                ,processing: true
                ,pagingType: "full_numbers"
                ,deferRender: true
                ,bDestroy: true
                ,data: response.data
                ,autoWidth: false
                ,order: [[2, 'desc']]
                ,lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10', '25', '50', 'Todo' ]
                ]

                ,dom: 'Brtip'
                ,buttons: [ 
                    'pageLength'
                  ,{ 
                     extend: 'excelHtml5'
                     , footer: true
                     , charset: 'utf-8' 
                     , fieldSeparator: ','
                     ,fieldBoundary: ''
                     ,exportOptions: {
                        columns: ':not(.notexport)'
                     }
                     
                  }
                  ,{ 
                     extend: 'pdf'
                     ,orientation: 'landscape'
                     , footer: true 
                     ,exportOptions: {
                        columns: ':not(.notexport)'
                     } 
                  }
                  
               ]

                ,columns: [
                    { "data": "estatus" 
                        ,render: function(data, type, row){   
                            return linkEstatusPago(row); 
                        }
                    }
                    ,{ "data": "csf_completo"
                        ,render: function(data, type, row){   
                            return linkFacturacion(row); 
                        }
                    }
                    ,{ "data": "fecha_pago"}
                    ,{ "data": "users_nombre" }
                    ,{ "data": "empresa_nombre" }
                    ,{ "data": "banco_nombre" }
                    ,{ "data": "importe" }
                    ,{ "data": "referencia" }
                    ,{ "data": "descripcion" }
                    
                ],
            });
        //table.columns( [12] ).visible( false );
            
    }).fail( function( data,jqXHR, textStatus, errorThrown ) {
        console.log( "fail" );
        console.log(data);
        swal(
            "Error!",
            textStatus,
            "error"
          )


    }).always(function() {
        console.log( "complete tablaSaldosPagosResumenAjax" );
    });
};
   
$('input.search').on('keyup change', function () {
    var rel = $(this).attr("rel");
    table.columns(rel).search(this.value).draw();
});

function linkFacturacion(row){

    
    if (row.csf_completo === 'SI' && row.esFacturable === 'SI'){

        var html=""
        switch (row.facturado) { 
            case 1: 
                html='<a href="#"  rel="noopener noreferrer" class="text-dark " > \
                    <span class="badge badge-info badge-pill tx-14 facturarBoton">\
                    FACTURAR</span></a>';    
                break;
            case 2:
                html='<a href="../storage/'+row.ruta_pdf+'" target="_blank" rel="noopener noreferrer"> \
                    <i class="text-info tx-22 fa fa-archive" data-toggle="tooltip"\
                     title="" data-original-title="fa fa-archive"></i></a>'
                html=html+'<a href="../storage/'+row.ruta_xml+'" target="_blank" rel="noopener noreferrer">\
                    <i class="text-warning tx-22 si si-notebook" data-toggle="tooltip"\
                     title="" data-original-title="si si-notebook"></i></a>'
                
                break;
        default:
            break;
        }

        
    } else {
        html='<a href="#" rel="noopener noreferrer" class="text-dark"> \
            <span class="badge badge-danger badge-pill tx-14">NO FACTURABLE</span></a>';
    }
    

    return html;
};

function linkEstatusPago(row){

    if (row.esFacturable === 'SI'){
        html='<a href="#" rel="noopener noreferrer" class="text-dark"> \
            <span class="badge badge-info badge-pill tx-14"> ACREDITADO</span></a>';
    } else {
        html='<a href="#" rel="noopener noreferrer" class="text-dark"> \
            <span class="badge badge-danger badge-pill tx-14">NO ACREDITADO</span></a>';
    }
    

    return html;
};


$( "#tablaSaldosPagosAjax" ).on( "click", "span", function() {

    var row = table.row( $(this).parent().parent().parent() ).data(); 
    console.log(row);

    if (row.csf_completo === 'SI' && row.esFacturable === 'SI'){
        $("#spanReferencia").text( row.referencia );
        $("#spanImporte").text( row.importe );
        $("#spanFechaPago").text( row.fecha_pago );
        $("#spanEmail").text( row.email );

        //valores para el request
        $("#referencia").val( row.referencia );
        $("#importe").val( row.importe );
        $("#fecha_pago").val( row.fecha_pago );
        $("#id_preference").val( row.id_preference );
        $("#pago_id").val( row.pago_id );
        $("#email").val( row.email );
       
        $("#modalFacturar").modal("show");        
    } else {
        swal(
            "El registro no es factuable",
            "Error!!! En caso ayuda consulte con su administrador",
            "error"
          )    
    }


    

});




    




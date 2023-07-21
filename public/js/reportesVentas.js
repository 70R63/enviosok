$(document).ready(function() {
    console.log("document ready reportes ventas")
    if ($('#tablaReporteVentasAjax').length) {
        tablaReporteVentas()     
    }

    $( ".datepicker" ).datepicker();
    
    // cotizar.js
    obtenerClientes();

});


function documento(row){
    
    html = '<a href="../'+row.ruta_csv+'" target="_blank"> \
                <i class="text-info tx-24 fa fa-archive" data-toggle="tooltip" \
                title="'+row.registros_cantidad+'" \
                data-original-title="fa fa-archive"> \
                    <span class="badge badge-danger nav-link-badge">'+ row.registros_cantidad +'</span>\
                </i>\
            </a>\
                ';
                
                            
                        
    return html;
}


function obtenerProveedor(row){
    
    var proveedor = "Todos";
    console.log(row.ltd_id)
    switch (row.ltd_id) {
        case 1:
            proveedor = "FEDEX"
            break;
        case 2:
            proveedor = "ESTAFETA_MEXICANA"
            break;
        case 3:
            proveedor = "REDPACK"
            break;
        case 4:
            proveedor = "DHL"
            break;
        default:
            proveedor = "Todos"
        }
    return proveedor ;
}

function obtenerServicio(row){
    
    var proveedor = "Todos";
    switch (row.servicio_id) {
        case 1:
            proveedor = "TERRESTRE"
            break;
        case 2:
            proveedor = "2 DIAS"
            break;
        case 3:
            proveedor = "DIA SIG."
            break;
        case 4:
            proveedor = "09:30"
            break;
        default:
            proveedor = "Todos"
        }
    return proveedor;    
}


$("#generarReporte").click(function(e) {
    console.log("generarReporte")
    e.preventDefault();

    var form = $('#reporteVentasForm').parsley().refresh();
    var action = $('#reporteVentasForm').attr("action"); 
    console.log(action);

    swal(
        "Generando!",
        "Preparando el reporte",
        "success"
      )
    if ( form.validate() ){
        $.ajax({
            /* Usar el route  */
            url: action,
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: $('#reporteVentasForm').serialize()
            
            /* remind that 'data' is the response of the AjaxController */
            }).done(function( response) {
                console.log("done");

                tablaReporteVentas();
            }).fail( function( data,jqXHR, textStatus, errorThrown ) {
                console.log( "fail" );
                swal(
                    "Error!",
                    textStatus,
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

function tablaReporteVentas(){

    $.ajax({
        url: '../api/reportes/ventas',
        type: 'GET',
        /* send the csrf-token and the input to the controller */
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: $('#reporteVentasForm').serialize()
        
        /* remind that 'data' is the response of the AjaxController */
    }).done(function( response) {
        console.log(response.data)
        table = $('#tablaReporteVentasAjax').DataTable({
                    "oLanguage": {
                        "sEmptyTable": "No se puede mostrar los registros"
                    }
                    ,processing: true
                    ,pagingType: "full_numbers"
                    ,deferRender: true
                    ,bDestroy: true
                    ,data: response.data
                    ,autoWidth: false
                    ,order: [[0, 'desc']]
                    ,lengthMenu: [
                        [ 10, 25, 50, -1 ],
                        [ '10', '25', '50', 'Todo' ]
                    ]
                    ,dom: 'Bfrtip'
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
                        { "data": "id" } //0
                        ,{ "data": "ruta_csv"
                            ,render: function(data, type, row){   
                                return documento(row); 
                            }
                        }
                        ,{ "data": "created_at" 
                            ,render: function(data){
                                var ahora = new Date(data);   
                                return ahora.toLocaleDateString('es-MX')+" "+ ahora.toLocaleTimeString('es-MX'); 
                            }
                        }
                        ,{ "data": "nombre" }
                        ,{ "data": "ltd_id" 
                            ,render: function(data, type, row){   
                                return obtenerProveedor(row); 
                            }
                        }//4
                        ,{ "data": "servicio_id" 
                            ,render: function(data, type, row){   
                                return obtenerServicio(row); 
                            }
                        }
                        ,{ "data": "fecha_ini" }
                        ,{ "data": "fecha_fin" }
                        

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
            console.log( "complete guiasTablaAjax" );
    });
} 
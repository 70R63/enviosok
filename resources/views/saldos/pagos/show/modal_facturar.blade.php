<div class="modal fade" id="modalFacturar" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
{!! Form::open([ 'route' => 'finanzas.facturaexterna.store', 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'generalForm' ]) !!}
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Facturaci&oacute;n</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	            </button>
	         </div>

	    	<div class="modal-body">
	    		 <div class="pricing-plans  bg-primary-transparent">
                    ¿Seguro que desea realiza la factura? 
                </div>
	        	<p class="bigger-50 bolder center ">
					Los datos son:
				</p>
				<p class="bigger-50 bolder center ">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Monto a facturar: $<span id="spanImporte" class="spanImporte"></span>
					
				</p>
				<p class="bigger-50 bolder center ">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Referencia : <span id="spanReferencia" class="spanReferencia"></span>
					
				</p>
				<p class="bigger-50 bolder center ">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Fecha del pago : <span id="spanFechaPago" class="spanFechaPago"></span>
					
				</p>
				<div class="pricing-plans bg-primary-transparent">
                    Para continuar con la creación, presionar el boton Facturar
                </div>
			</div>

		     <div class="modal-footer">
		      	 <button type="submit" class="btn btn-primary ml-3" >Facturar</button>
                    <a class="btn badge-dark" data-dismiss="modal" type="button">Cerrar</a>

		    </div> <!-- modal-footer -->
	    </div> <!-- modal-content -->
  	</div> <!-- modal-dialog -->

{!! Form::hidden('importe'
    , null
    ,['class'       => 'form-control'
        ,'id'       => 'importe'
        
    ])
!!}

{!! Form::hidden('referencia'
    , null
    ,['class'       => 'form-control'
        ,'id'       => 'referencia'
        
    ])
!!}


{!! Form::hidden('fecha_pago'
    , null
    ,['class'       => 'form-control'
        ,'id'       => 'fecha_pago'
        
    ])
!!}

{!! Form::hidden('id_preference'
    , null
    ,['class'       => 'form-control'
        ,'id'       => 'id_preference'
        
    ])
!!}

{!! Form::hidden('pago_id'
    , null
    ,['class'       => 'form-control'
        ,'id'       => 'pago_id'
        
    ])
!!}

{!! Form::close() !!}   
</div> <!--modal fad -->


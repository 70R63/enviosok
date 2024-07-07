<span class="tx-18 mb-3 ">ORIGEN</span>
<div class="checkManualHtml" style="display:none;">
	<div class="input-group mb-3 ">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"> Nombre <span class="tx-danger">*</span></span>
		</div>
		{!! Form::select('sucursal'
			, []
			,''
			,['class' 		=> 'form-control select2'
				,'placeholder'	=> 'Seleccionar'

				,'name'		=> 'sucursal'
				,'id'		=> 'sucursal'

			]);
		!!}
	</div>
</div>
<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1"> CP <span class="tx-danger">*</span></span>
	</div>
	{!! Form::text('cp', isset($objeto['cp']) ? $objeto['cp'] : null ,
		['class' 		=> 'form-control cotizacionManual'
			,'id'		=> 'cp'
			,'placeholder'	=> 'Codigo Postal'
			,'required'	=> ''
			,'pattern'	=> '\d{5}'
		])
	!!}

</div>

{!! Form::hidden('sucursal_id_oculto'
    , isset($objeto['sucursal']) ? $objeto['sucursal'] : null
    ,['class'       => 'form-control'
        ,'id'       => 'sucursal_id_oculto'

    ])
!!}

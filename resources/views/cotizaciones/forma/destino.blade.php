<span class="tx-18 mb-5">DESTINO</span>
<div class="checkManualHtml " style="display:none;" >
	<div class="input-group mb-3 checkSemiHtml">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"> Nombre<span class="tx-danger">*</span></span>
		</div>
		{!! Form::select('cliente'
			, []
			,'MEX'
			,['class' 		=> 'form-control select2 cotizacionSemi'
				,'placeholder'	=> 'Seleccionar'

				,'name'		=> 'cliente'
				,'id'		=> 'cliente'
			]);
		!!}
	</div>
</div>

<div class="input-group mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1"> CP <span class="tx-danger">*</span></span>
	</div>
	{!! Form::text('cp_d', isset($objeto['cp_d']) ? $objeto['cp_d'] : null ,
		['class' 		=> 'form-control cotizacionManual cotizacionSemi'
			,'id'		=> 'cp_d'
			,'placeholder'	=> 'Codigo Postal'
			,'required'	=> ''
			,'pattern'	=> '\d{5}'
		])
	!!}

</div>


{!! Form::hidden('cliente_id_oculto'
    , isset($objeto['cliente']) ? $objeto['cliente'] : null
    ,['class'       => 'form-control'
        ,'id'       => 'cliente_id_oculto'

    ])
!!}

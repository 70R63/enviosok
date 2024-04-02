
<div class="input-group mb-3" style="display:none;" >
	<div class="input-group-prepend">
		<span class="input-group-text" id="basic-addon1">CLIENTE 
			<span class="tx-danger">*</span>
		</span>
	</div>
	{!! Form::select('clienteIdCombo'
		, array()
		,null
		,['class' 		=> 'form-control select2'
			,'placeholder'	=> 'Seleccionar'
			,'id'		=> 'clienteIdCombo'
			
		]);
	!!}
</div>
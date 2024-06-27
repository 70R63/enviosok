<div class="" >
	<span class="tx-18 text-header">Hola {{ (Auth::user()->name) }}, bienvenido al portal de <strong>EnvíosOk</strong>.</span>
	{!! Form::hidden('empresaIdHeader'
	    , Auth::user()->empresa_id
	    ,['class'       => 'form-control'
	        ,'id'       => 'empresaIdHeader'

	    ])
	!!}
</div>

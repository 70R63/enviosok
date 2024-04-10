<!-- Campos para el sucursal con valor readonly -->
<div class="card custom-card">
    <div class="card-body">

        <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
            <label class="main-content-label mb-4">DETALLES DEL REMITENTE</label>
        </div>
    	<div class="row">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">NOMBRE
					</span>
				</div>

				{!! Form::text('nombre'
					, $sucursal->nombre
					,['class' 		=> 'form-control'
						,'id'		=> 'nombre'
						,'required'	=>	'true'
						,'readonly' =>  'true'
					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">CONTACTO
					</span>
				</div>

				{!! Form::text('contacto'
					, $sucursal->contacto
					,['class' 		=> 'form-control'
						,'id'		=> 'contacto'
						,'required'	=>	'true'
						,'readonly' =>  'true'
					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">DIRECCIÓN
					</span>
				</div>

				{!! Form::text('direccion'
					, $sucursal->direccion
					,['class' 		=> 'form-control'
						,'id'		=> 'direccion'
						,'required'	=>	'true'
						,'readonly' =>  'true'
					])
				!!}


			</div>

            <div class="input-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">C.P.
						</span>
                    </div>
                    {!! Form::text('cp'
                        , @$sucursal ? @$sucursal->domicilio->cp : null
                        ,['class' 		=> 'form-control cp'
                            ,'required'	=>	'true'
						,'readonly' =>  'true'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">ENTIDAD FEDERATIVA
						</span>
                    </div>
                    {!! Form::text('estado'
                        , @$sucursal ? @$sucursal->domicilio->estado : null
                        ,['class' 		=> 'form-control estado'
                            ,'required'	=>	'true'
						,'readonly' =>  'true'

                        ])
                    !!}

                </div>
            </div>
            <div class="input-group mb-3">
                <input type="hidden" class="codigo_estado" name="codigo_estado">
                <input type="hidden" class="tipo_asentamiento" name="tipo_asentamiento" value="{{@$sucursal ? @$sucursal->domicilio->tipo_asentamiento : ''}}">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">MUNICIPIO / ALCALDÍA
						</span>
                </div>
                {!! Form::text('municipio_alcaldia'
                    , @$sucursal ? @$sucursal->domicilio->municipio_alcaldia : null
                    ,['class' 		=> 'form-control municipio_alcaldia'
                        ,'required'	=>	'true'
                    ,'readonly' =>  'true'

                    ])
                !!}
            </div>

            <div class="input-group mb-3 div-colonia-cp col-md-6 p-0">
                <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                            </span>
                </div>

                {!! Form::text('colonia'
                    , @$sucursal ? @$sucursal->domicilio->colonia : null
                    ,['class' 		=> 'form-control colonia'
                        ,'required'	=>	'true'
                    ,'readonly' =>  'true'

                    ])
                !!}
            </div>
            <div class="input-group mb-3 col-md-6 p-0">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CALLE
						</span>
                </div>
                {!! Form::text('calle'
                    , @$sucursal ? $sucursal->domicilio->calle : null
                    ,['class' 		=> 'form-control calle'
                        ,'required'	=>	'true'
                    ,'readonly' =>  'true'

                    ])
                !!}
            </div>

            <div class="input-group mb-3 p-0">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CIUDAD
						</span>
                </div>
                {!! Form::text('ciudad'
                    , @$sucursal ? $sucursal->domicilio->ciudad : null
                    ,['class' 		=> 'form-control ciudad'
                        ,'required'	=>	'true'
                    ,'readonly' =>  'true'
                    ])
                !!}
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO EXTERIOR
						</span>
                </div>

                {!! Form::text('no_exterior'
                    , @$sucursal ? $sucursal->domicilio->no_exterior : null
                    ,['class' 		=> 'form-control no_exterior'
                        ,'required'	=>	'true'
                    ,'readonly' =>  'true'
                    ])
                !!}
            </div>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO INTERIOR
						</span>
                </div>
                {!! Form::text('no_interior'
                    , @$sucursal ? $sucursal->domicilio->no_interior : null
                    ,['class' 		=> 'form-control no_interior'
                    ,'readonly' =>  'true'
                    ])
                !!}

                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">TIPO DE VIALIDAD
						</span>
                </div>

                {!! Form::text('tipo_vialidad_id'
                    , @$sucursal ? $sucursal->domicilio->tipoVialidad->nombre : null
                    ,['class' 		=> 'form-control tipo_vialidad_id'
                    ,'readonly' =>  'true'
                    ])
                !!}

            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">REFERENCIAS
						</span>
                </div>

                {!! Form::text('referencias'
                    , @$sucursal ? $sucursal->domicilio->referencias : null
                    ,['class' 		=> 'form-control'
                    ,'readonly' =>  'true'
                    ])
                !!}
            </div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">CELULAR
					</span>
				</div>

				{!! Form::text('celular'
					, $sucursal->celular
					,['class' 		=> 'form-control'
						,'id'		=> 'celular'
						,'required'	=>	'true'
						,'readonly' =>  'true'
					])
				!!}
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">TELEFONO
					</span>
				</div>

				{!! Form::text('telefono'
					, $sucursal->telefono
					,['class' 		=> 'form-control'
						,'id'		=> 'telefono'
						,'readonly' =>  'true'
					])
				!!}
			</div>
		</div>
		<!-- fin class="card-item" -->
	</div>
	<!-- fin class="card-body" -->
</div>
<!-- fin class="card custom-card" -->
{!! Form::hidden('sucursal_id'
    , $sucursal->id
    ,['class'       => 'form-control'
        ,'id'       => 'sucursal_id'
    ])
!!}

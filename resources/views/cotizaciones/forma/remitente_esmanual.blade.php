<!-- Campos para el cliente con valor readonly -->
<div class="card custom-card">
    <div class="card-body">
    	<div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
            <label class="main-content-label mb-4">DETALLES DEL REMITENTE</label>
        </div>
    	<div class="row">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">NOMBRE<span class="tx-danger">*</span>
					</span>
				</div>

				{!! Form::text('nombre'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'nombre'
						,'required'	=>	'true'

					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">CONTACTO<span class="tx-danger">*</span>
					</span>
				</div>

				{!! Form::text('contacto'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'contacto'
						,'required'	=>	'true'

					])
				!!}
			</div>

			
            <div class="input-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">C.P.<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('cp'
                        , $_GET['cp_manual']
                        ,['class' 		=> 'form-control cp'
                            ,'required'	=>	'true'
                            , 'id' => 'cp'
                            ,'readonly' =>'true'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">ENTIDAD FEDERATIVA<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('estado'
                        , ''
                        ,['class' 		=> 'form-control estado'
                            ,'required'	=>	'true'
                        ])
                    !!}

                </div>
            </div>
            <div class="input-group mb-3">
                <input type="hidden" class="codigo_estado" name="codigo_estado">
                <input type="hidden" class="tipo_asentamiento" name="tipo_asentamiento" value="">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">MUNICIPIO / ALCALDÍA<span class="tx-danger">*</span>
						</span>
                </div>
                {!! Form::text('municipio_alcaldia'
                    , @$sucursal ? @$sucursal->domicilio->municipio_alcaldia : null
                    ,['class' 		=> 'form-control municipio_alcaldia'
                        ,'required'	=>	'true'
                    ])
                !!}
            </div>

            <div class="input-group mb-3 div-colonia-cp col-md-6 p-0">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">COLONIA<span class="tx-danger">*</span>
                    </span>
                </div>

                {!! Form::text('colonia'
                    , ''
                    ,['class' 		=> 'form-control colonia'
                        ,'required'	=>	'true'
                    ])
                !!}
            </div>
            <div class="input-group mb-3 col-md-6 p-0">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CALLE<span class="tx-danger">*</span>
						</span>
                </div>
                {!! Form::text('calle'
                    , ''
                    ,['class' 		=> 'form-control calle'
                        ,'required'	=>	'true'

                    ])
                !!}
            </div>

            <div class="input-group mb-3 p-0">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CIUDAD<span class="tx-danger">*</span>
						</span>
                </div>
                {!! Form::text('ciudad'
                    , ''
                    ,['class' 		=> 'form-control ciudad'
                        ,'required'	=>	'true'
                    ])
                !!}
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO EXTERIOR<span class="tx-danger">*</span>
						</span>
                </div>

                {!! Form::text('no_exterior'
                    , ''
                    ,['class' 		=> 'form-control no_exterior'
                        ,'required'	=>	'true'
                    ])
                !!}
            </div>
            <div class="input-group mb-3">

                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO INTERIOR
						</span>
                </div>
                {!! Form::text('no_interior'
                    , ''
                    ,['class' 		=> 'form-control no_interior'
                    ])
                !!}

                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">TIPO DE VIALIDAD
						</span>
                </div>

                <select name="tipo_vialidad_id" class="form-control tipo_vialidad_id" required>
                    <option value="">Selecciona una opción</option>
                    @foreach($tiposVialidad as $i)
                        <option value="{{$i->id}}">{{$i->nombre}}</option>
                    @endforeach
                </select>

            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">REFERENCIAS
						</span>
                </div>

                {!! Form::text('referencias'
                    , ''
                    ,['class' 		=> 'form-control'
                    ])
                !!}
            </div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">CELULAR<span class="tx-danger">*</span>
					</span>
				</div>

				{!! Form::text('celular'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'celular'
						,'required'	=>	'true'

					])
				!!}

			<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">TELEFONO
					</span>
				</div>

				{!! Form::text('telefono'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'telefono'

					])
				!!}
			</div>
		</div>
		<!-- fin class="card-item" -->
	</div>
	<!-- fin class="card-body" -->
</div>
{!! Form::hidden('esManual'
    , $objeto['esManual']
    ,['class'       => 'form-control'
        ,'id'       => 'esManual'
    ])
!!}
<!-- fin class="card custom-card" -->

<!-- Campos para el cliente con valor readonly -->
<div class="card custom-card">
    <div class="card-body">
    	<div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
            <label class="main-content-label mb-4">DETALLES DEL DESTINATARIO</label>
        </div>
    	<div class="row">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">NOMBRE<span class="tx-danger">*</span>
					</span>

				</div>

				{!! Form::text('nombre_d'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'nombre_d'
						,'required'	=>	'true'

					])
				!!}
			</div>

			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">CONTACTO<span class="tx-danger">*</span>
					</span>
				</div>

				{!! Form::text('contacto_d'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'contacto_d'
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
                    {!! Form::text('cp_d'
                        , $_GET['cp_d_manual']
                        ,['class' 		=> 'form-control cp'
                            ,'required'	=>	'true'
                            , 'id' => 'cp_d'
                            ,'readonly' =>'true'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">ENTIDAD FEDERATIVA<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('estado_d'
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
                {!! Form::text('municipio_alcaldia_d'
                    , @$sucursal ? @$sucursal->domicilio->municipio_alcaldia : null
                    ,['class' 		=> 'form-control municipio_alcaldia'
                        ,'required'	=>	'true'
                    ])
                !!}
            </div>
            
            <div class="input-group mb-3 div-colonia-cp col-md-6 p-0">
            </div>
            
            <div class="input-group mb-3 col-md-6 p-0">
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CALLE <span class="tx-danger">*</span>
						</span>
                </div>
                {!! Form::text('calle_d'
                    , ''
                    ,['class' 		=> 'form-control calle'
                        ,'required'	=>	'true'

                    ])
                !!}
            </div>

            <div class="input-group mb-3 p-0"_d>
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CIUDAD<span class="tx-danger">*</span>
						</span>
                </div>
                {!! Form::text('ciudad_d'
                    , ''
                    ,['class' 		=> 'form-control ciudad'
                        ,'required'	=>	'true'
                    ])
                !!}
                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO EXTERIOR<span class="tx-danger">*</span>
						</span>
                </div>

                {!! Form::text('no_exterior_d'
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
                {!! Form::text('no_interior_d'
                    , ''
                    ,['class' 		=> 'form-control no_interior'
                    ])
                !!}

                <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">TIPO DE VIALIDAD<span class="tx-danger">*</span>
						</span>
                </div>
                <select name="tipo_vialidad_id_d" class="form-control tipo_vialidad_id" required>
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

                {!! Form::text('referencias_d'
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

				{!! Form::text('celular_d'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'celular_d'
						,'required'	=>	'true'

					])
				!!}

			<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">TELEFONO
					</span>
				</div>

				{!! Form::text('telefono_d'
					, ''
					,['class' 		=> 'form-control'
						,'id'		=> 'telefono_d'

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

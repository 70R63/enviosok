@php
    $cat = App\Models\Catalogo::whereCodigo('tiposVialidad')->first();
    $tiposVialidad = App\Models\CatalogoElemento::whereCatalogoId($cat->id)->orderBy('nombre')->get();
@endphp
<div class="col-sm-12 ">
    <div class="card custom-card">
        <div class="card-body">
        	<div class="row">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NOMBRE REMITENTE
							<span class="tx-danger">*</span>
						</span>
					</div>

					{!! Form::text('nombre'
						, null
						,['class' 		=> 'form-control'
							,'id'		=> 'nombre'
							,'required'	=>	'true'
						])
					!!}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CONTACTO
							<span class="tx-danger">*</span>
						</span>
					</div>

					{!! Form::text('contacto'
						, null
						,['class' 		=> 'form-control'
							,'id'		=> 'contacto'
							,'required'	=>	'true'
						])
					!!}
				</div>

				

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">C.P.
							<span class="tx-danger">*</span>
						</span>
                    </div>

                    {!! Form::text('cp'
                        , @$objeto ? @$objeto->domicilio->cp : null
                        ,['class' 		=> 'form-control cp'
                            ,'id'		=> 'cp'
                            ,'required'	=>	'true'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">ENTIDAD FEDERATIVA
							<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('estado'
                        , @$objeto ? @$objeto->domicilio->estado : null
                        ,['class' 		=> 'form-control estado'
                            ,'required'	=>	'true'

                        ])
                    !!}
                    <input type="hidden" class="codigo_estado" name="codigo_estado">
                    <input type="hidden" class="tipo_asentamiento" name="tipo_asentamiento" value="{{@$objeto ? @$objeto->domicilio->tipo_asentamiento : ''}}">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">MUNICIPIO / ALCALDÍA
							<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('municipio_alcaldia'
                        , @$objeto ? @$objeto->domicilio->municipio_alcaldia : null
                        ,['class' 		=> 'form-control municipio_alcaldia'
                            ,'required'	=>	'true'

                        ])
                    !!}

                </div>

                <div class="input-group mb-3 div-colonia-cp col-md-4 p-0">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                    </div>

                    {!! Form::select('colonia'
                        , ( isset($objeto->domicilio)) ? [$objeto->domicilio->colonia=>$objeto->domicilio->colonia] : array()
                        ,   isset($objeto->domicilio) ? @$objeto->domicilio->colonia : ''
                        ,['class' 		=> 'form-control colonia'
                            ,'placeholder'	=> 'Seleccionar'
                            ,'required'	=> 'true'
                            ,'name'		=> 'colonia'

                        ]);
                    !!}
                </div>
                <div class="input-group mb-3 col-md-4 p-0">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CALLE
							<span class="tx-danger">*</span>
						</span>
                    </div>
                    {!! Form::text('calle'
                        , @$objeto ? $objeto->domicilio->calle : null
                        ,['class' 		=> 'form-control calle'
                            ,'required'	=>	'true'

                        ])
                    !!}
                </div>
                <div class="input-group mb-3 col-md-4 p-0">

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CIUDAD
							<span class="tx-danger">*</span>
						</span>
                    </div>

                    {!! Form::text('ciudad'
                        , @$objeto ? $objeto->domicilio->ciudad : null
                        ,['class' 		=> 'form-control ciudad'
                            ,'required'	=>	'true'
                        ])
                    !!}

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO EXTERIOR
							<span class="tx-danger">*</span>
						</span>
                    </div>

                    {!! Form::text('no_exterior'
                        , @$objeto ? $objeto->domicilio->no_exterior : null
                        ,['class' 		=> 'form-control no_exterior'
                            ,'required'	=>	'true'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">NÚMERO INTERIOR
						</span>
                    </div>
                    {!! Form::text('no_interior'
                        , @$objeto ? $objeto->domicilio->no_interior : null
                        ,['class' 		=> 'form-control no_interior'
                        ])
                    !!}

                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">TIPO DE VIALIDAD
							<span class="tx-danger">*</span>
						</span>
                    </div>
                    <select name="tipo_vialidad_id" class="form-control tipo_vialidad_id" required>
                        <option value="">Selecciona una opción</option>
                        @foreach($tiposVialidad as $i)
                            <option value="{{$i->id}}" {{@$objeto && $objeto->domicilio->tipo_vialidad_id==$i->id ? 'selected' :''}}>{{$i->nombre}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">REFERENCIAS
						</span>
                    </div>

                    {!! Form::text('referencias'
                        , @$objeto ? $objeto->domicilio->referencias : null
                        ,['class' 		=> 'form-control'
                        ])
                    !!}
                </div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CLIENTE
							<span class="tx-danger">*</span>
						</span>
					</div>
					{!! Form::select('empresa_id'
						, $pluckEmpresa
						,null
						,['class' 		=> 'form-control select2'
							,'placeholder'	=> 'Seleccionar'
							,'required'	=> 'true'
							,'id'		=> 'empresa_id_nojs'
						]);
					!!}
				</div>

				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">CELULAR
							<span class="tx-danger">*</span>
						</span>
					</div>

					{!! Form::text('celular'
						, null
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
						, null
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
	<!-- fin class="card custom-card" -->
</div>

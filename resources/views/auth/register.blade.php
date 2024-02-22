@extends('layouts.app')
@section('content')
    <div class="container h-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-2 pt-4 p-2 pos-absolute">
                                <img  src="{{ url('spruha/img/brand/xpertaLogoTrans-138x142.png') }}" class="header-brand-img mb-1" alt="logo">
                                <div class="clearfix"></div>
                                <img src="{{ url('spruha/img/svgs/user.svg') }}" class="ht-90 mb-0" alt="user">
                                <h5 class="mt-4 text-white">Create Your Account</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <img src="{{ url('spruha/img/brand/xpertaLogoHor.png') }}" class=" d-lg-none header-brand-img text-center float-center mb-4" alt="logo">
                                        <div class="clearfix"></div>
                                        <form method="POST" action="{{ route('register') }}" class="row">
                                            @csrf
                                            <div class="col-12">
                                                <h5>Crea tu cuenta</h5>
                                                <p class="text-muted tx-13">Introduce tus datos personales</p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nombre">Nombre(s): <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="apellido_paterno">Apellido Paterno: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                                                @error('apellido_paterno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="apellido_materno">Apellido Materno:</label>
                                                <input type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="rfc">RFC: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('rfc') is-invalid @enderror" name="rfc" value="{{ old('rfc') }}" maxlength="13" required>
                                                @error('rfc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email: <span class="text-danger">*</span></label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                                       required autocomplete="email" autofocus placeholder="Ingresa tu email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Contraseña: <span class="text-danger">*</span></label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresa tu password" value="{{old('password')}}">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <p class="text-muted tx-13">Introduce tu Domicilio</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="cp">Código postal: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('cp') is-invalid @enderror" placeholder="00000" name="cp" id="cp" maxlength="5" required
                                                       value="{{@$modelo->domicilio->cp??old('cp')}}">
                                                @error('cp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="estado">Estado: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('estado') is-invalid @enderror" placeholder="Escribe el estado" name="estado" id="estado" required readonly
                                                       value="{{@$modelo->domicilio->estado??old('estado')}}">
                                                @error('estado')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="hidden" name="codigo_estado" id="codigo_estado">
                                            </div>
                                                <div class="form-group col-md-4">
                                                    <label for="municipio_alcaldia">Municipio/Alcaldía: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('municipio_alcaldia') is-invalid @enderror" placeholder="Escribe el municipio o alcaldía" name="municipio_alcaldia" id="municipio_alcaldia" required
                                                           value="{{@$modelo->domicilio->municipio_alcaldia??old('municipio_alcaldia')}}">
                                                    @error('municipio_alcaldia')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="colonia">Colonia: <span class="text-danger">*</span></label>
                                                    <div class="div-colonia-cp">
                                                        <input type="text" class="form-control @error('colonia') is-invalid @enderror" placeholder="Escribe el nombre de la colonia" name="colonia" id="colonia" required
                                                               value="{{@$modelo->domicilio->colonia??old('colonia')}}">
                                                        @error('colonia')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 d-none">
                                                    <label for="otra_colonia">Otra colonia:</label>
                                                    <input type="text" class="form-control" placeholder="Escribe el nombre de la colonia" name="otra_colonia" id="otra_colonia"
                                                           value="{{@$modelo->domicilio->otra_colonia??old('otra_colonia')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="calle">Calle: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('calle') is-invalid @enderror" placeholder="Escribe el nombre de la calle" name="calle" id="calle" required
                                                           value="{{@$modelo->domicilio->calle??old('calle')}}">
                                                    @error('calle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="numero_exterior">Número exterior: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('no_exterior') is-invalid @enderror" placeholder="Escribe el número exterior" name="no_exterior" id="no_exterior" required
                                                           value="{{@$modelo->domicilio->no_exterior??old('no_exterior')}}">
                                                    @error('no_exterior')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="numero_interior">Número interior:</label>
                                                    <input type="text" class="form-control" placeholder="Escribe el número interior" name="no_interior" id="no_interior"
                                                           value="{{@$modelo->domicilio->no_interior??old('no_interior')}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="numero_exterior">Tipo vialidad: <span class="text-danger">*</span></label>
                                                    {{ Form::select('tipo_vialidad_id', getCatalogo('tiposVialidad')->elementos()->pluck('nombre','id')->toArray(), old('tipo_vialidad_id', isset($modelo->domicilio->id)?@$modelo->domicilio->tipo_vialidad_id:null), ['placeholder' => 'Seleccione', 'class' => 'form-control ', 'required' => 'required', 'data-live-search'=>'true']) }}
                                                    @error('tipo_vialidad_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="referencias">Referencias:</label>
                                                    <input type="text" class="form-control" placeholder="Ej. Entre las calles Benito Juárez y Miguel Hidalgo" name="referencias" id="referencias"
                                                           value="{{@$modelo->domicilio->referencias??old('referencias')}}">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn ripple btn-main-primary btn-block">Enviar formulario</button>

                                                </div>

                                        </form>
                                        <div class="text-center mt-5 ml-0">
                                            @if (Route::has('password.request'))
                                                <div class="mb-1"><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></div>
                                            @endif
                                            <div>¿Ya tienes cuenta? <a href="{{route('login')}}">Inicia sesión aquí</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

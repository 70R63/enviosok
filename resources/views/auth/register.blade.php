@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 bg-primary rounded-left d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 100%;">
                    <img  src="{{ url('spruha/img/brand/xpertaLogoTrans-138x142.png') }}" class="header-brand-img mb-1" alt="logo">
                    <div class="clearfix"></div>
                    <img src="{{ url('spruha/img/svgs/user.svg') }}" class="ht-90 mb-0" alt="user">
                    <h5 class="mt-4 text-white">Create Your Account</h5>
                    <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signup to create, discover and connect with the global community</span>
            </div>
            <div class="col-md-8 bg-white rounded-right p-4">
                <form method="POST" action="{{ route('register') }}" class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                        <h5>Crea tu cuenta</h5>
                        <p class="text-muted tx-13">Introduce tus datos personales</p>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre(s): <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                        <div class="invalid-feedback">
                            Campo obligatorio
                        </div>
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido_paterno">Apellido Paterno: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                        <div class="invalid-feedback">
                            Campo obligatorio
                        </div>
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
                        <input type="text" class="form-control text-uppercase @error('rfc') is-invalid @enderror" name="rfc" value="{{ old('rfc') }}" minlength="13" maxlength="13" required>
                        <div class="invalid-feedback">
                            Campo obligatorio
                        </div>
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
                        <div class="invalid-feedback">
                            Introduce un email válido 
                        </div>
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
                        <select name="tipo_vialidad_id" class="form-control" id="tipo_vialidad_id" required>
                            <option value="">Selecciona una opción</option>
                            @foreach($tiposVialidad as $i)
                                <option value="{{$i->id}}">{{$i->nombre}}</option>
                            @endforeach
                        </select>
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
@endsection

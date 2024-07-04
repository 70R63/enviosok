
<div class="{{$class}} archivo" id="contenedor-archivo-{{$codigo}}"
     data-multiple="{{$multiple}}" data-codigo="{{$codigo}}" data-maxmb="{{$maxmb}}" data-tipo="{{$tipo}}" data-required="{{$required}}"
     data-total="{{count($archivos)}}"
>
    <div class="row">
        <input type="hidden" name="{{$codigo}}_entidad_type" value="{{$entidad ? $entidad->getMorphClass() : null}}">
        <input type="hidden" name="{{$codigo}}_entidad_id" value="{{$entidad ? $entidad->id : null}}">
        <input type="hidden" name="{{$codigo}}_id">
        <input type="hidden" name="{{$codigo}}_ids"
               value="{{count($archivos)?json_encode($archivos->pluck('id')->toArray()):'[]'}}">
        @if($multiple && $editable)
            <div class="col-md-6">
                <label class="form-label fw-semibold" for="descripcion-archivo-{{$codigo}}">{{$labelDescripcion}} @if($required) <span class="text-danger">*</span> @endif</label>
                <input type="text" id="descripcion-archivo-{{$codigo}}" class="form-control" placeholder="Escriba una breve descripción" maxlength="250">
                <div class="invalid-feedback" data-default="La descripción del archivo es obligatoria">La descripción del archivo es obligatoria</div>
            </div>
        @endif
        <div class="{{$multiple?'col-md-6':'col-12'}} {{$multiple&&!$editable?'d-none':''}}">
            @if($label)
                <label for="" class="form-label {{$labelClass}}">
                    {{$label}} @if($required && $requiredAsterisk)<span class="text-danger">*</span>@endif
                    @if($codigo=="miniatura")
                        <i class="fa fa-lg fa-question-circle text-blue" data-bs-toggle="tooltip"
                           title="La imagen debe ser un archivo JPG o PNG de 155 pixeles de ancho por 155 pixeles de alto y resolución de 72 dpi."></i>
                    @endif
                </label>
            @endif

            <label for="input-archivo-{{$codigo}}" class="btn btn-light text-dark text-start w-100 btn-carga-archivo justify-content-between" style="display: {{!$multiple && $archivo?'none':''}}">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>CARGAR ARCHIVO</strong>
                        <small>(Máximo {{$maxmb}} MB)</small>
                    </div>
                    <div>
                        @switch($tipo)
                            @case('imagen')
                                <i class="fa fa-lg fa-file-image text-primary"></i>
                                @break
                            @case('documento')
                                <i class="fa fa-lg fa-file-pdf text-primary"></i>
                                <i class="fa fa-lg fa-file-word text-primary"></i>
                                @break
                            @case('video')
                                <i class="fa fa-lg fa-file-video text-primary"></i>
                                @break
                            @case('pdf-imagen')
                                <i class="fa fa-lg fa-file-pdf text-primary"></i>
                                <i class="fa fa-lg fa-file-image text-primary"></i>
                                @break
                            @default
                                <i class="fa fa-lg fa-file-archive text-primary"></i>
                                @break
                        @endswitch
                    </div>
                </div>
                <input type="file" id="input-archivo-{{$codigo}}" name="file" {{ !$archivo && $required ? 'required' :''}} hidden />
                <div class="invalid-feedback w-100" data-default="{{$invalidLabel}}"></div>
            </label>
            <div class="bg-light rounded justify-content-between informacion-archivo p-2" style="display: {{!$multiple && $archivo?'flex':'none'}}">
                <a href="@if($archivo) {{route('descarga-archivo',\Illuminate\Support\Facades\Crypt::encryptString($archivo->ruta))}} @endif"
                   class="btn btn-sm btn-link text-dark fw-semibold enlace-archivo p-0">
                    @if($archivo) {{$archivo->nombre}} @endif
                </a>
                <div>
                    <a data-bs-toggle="tooltip" title="Descargar"
                       href="@if($archivo) {{route('descarga-archivo',[\Illuminate\Support\Facades\Crypt::encryptString($archivo->ruta),'descarga'])}} @endif"
                       class="btn btn-sm btn-link float-end enlace-descargar-archivo py-0">
                        <i class="fa fa-download"></i>
                    </a>
                    @if($editable)
                        <button type="button" data-bs-toggle="tooltip" class="btn btn-sm btn-link float-end btn-eliminar-archivo py-0" title="Eliminar" @if($archivo) data-archivo-id="{{$archivo->id}}" @endif>
                            <i class="fa fa-trash text-danger"></i>
                        </button>
                    @endif
                    <button type="button"
                            data-bs-toggle="tooltip"
                            class="btn btn-sm btn-link float-end btn-preview-archivo py-0"
                            title="Vista previa"
                            data-tipo="{{$tipo}}"
                            @if($archivo)
                                data-url="{{route('descarga-archivo',\Illuminate\Support\Facades\Crypt::encryptString($archivo->ruta))}}"
                            data-extension="{{$archivo->extension}}"
                        @endif
                    >
                        <i class="fa fa-eye text-gray"></i>
                    </button>
                </div>
            </div>

            <p class="f-12 m-0 seleccion-archivo" @if($archivo) style="display: none" @endif>
                Sin archivo seleccionado
            </p>
            <div class="progress mt-1 barra-progreso-archivo" style="height: 15px; display:none;">
                <div class="progress-bar" role="progressbar"
                     style="width: 0%;"
                     aria-valuenow="0"
                     aria-valuemin="0"
                     aria-valuemax="100"></div>
            </div>
            <div class="mt-1 mensaje-carga-archivo" style="display: none;"></div>
            <div class="mt-1 mensaje-error-archivo" style="display: none;"></div>
        </div>
        @if($multiple)
            <div class="col-12">
                <div>
                    @if($labelDetalle)
                        <div class="col-sm-12 col-xs-12">
                            <p class="{{$labelClass}}">{{$labelDetalle}}</p>
                        </div>
                    @else
                        <label for="tabla-archivos-{{$codigo}}" class="form-label text-dark fw-semibold m-0">{{$label}}</label>
                    @endif

                    <table class="table table-striped m-0" id="tabla-archivos-{{$codigo}}">
                        <tbody class="bg-none">
                        @forelse($archivos as $archivo)
                            <tr>
                                <td class="">
                                    <p class="p-0 m-0 fw-semibold">
                                        {{ $archivo->nombre }}
                                    </p>
                                    <p class="p-0 m-0">
                                        {{ $archivo->descripcion }} ({{$archivo->peso}})
                                    </p>
                                </td>
                                <td class="">
                                    <a data-bs-toggle="tooltip" title="Descargar" href="{{route('descarga-archivo',[\Illuminate\Support\Facades\Crypt::encryptString($archivo->ruta),'descarga'])}}" class="btn btn-sm btn-link float-end enlace-descargar-archivo py-0 text-primary">
                                        <i class="fa fa-download"></i>
                                    </a>
                                    @if($editable)
                                        <button type="button" data-bs-toggle="tooltip" class="btn btn-sm btn-link float-end btn-eliminar py-0"
                                                title="Eliminar" data-archivo-id="{{$archivo->id}}">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    @endif
                                    <button type="button"
                                            data-bs-toggle="tooltip"
                                            class="btn btn-sm btn-link float-end btn-preview py-0"
                                            title="Vista previa"
                                            data-tipo="{{$tipo}}"
                                            data-url="{{route('descarga-archivo',\Illuminate\Support\Facades\Crypt::encryptString($archivo->ruta))}}"
                                            data-extension="{{$archivo->extension}}"
                                    >
                                        <i class="fa fa-eye text-gray"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-3">Sin archivos agregados</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <input type="number" class="d-none" @if($minimo>0) min="{{$minimo}}" @endif id="input-total-{{$codigo}}" required value="{{@count($archivos)}}">
                <div class="invalid-feedback w-100 fw-semibold" data-default="Debe cargar por lo menos {{$minimo}} archivo(s) a la lista"></div>
            </div>
        @endif
    </div>
</div>

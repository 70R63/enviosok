@extends('dashboard')
@section('content')

@include('cotizaciones.dashboard.header')
<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">Cotizacion</label>
                        <span class="d-block tx-12 mb-3 text-muted">
                            Esta sección te permitirá cotizar tus envíos, conocerás el costo de la guía antes de realizarla. Si ya tienes remitentes y destinatarios guardados en tu agenda podrás elegirlos de la lista desplegable y generar la guía de forma automática.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
 {!! Form::open([ 'route' => 'api.cotizaciones.index', 'method' => 'GET' , 'class'=>'parsley-style-1', 'id'=>'cotizacionesForm' ]) !!}
<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12 col-xl-5  col-md-12">
        <div class="card custom-card ">
            <div class="card-body">
                <div class="col-sm-5 ">
                    <div>
                        <span class="tx-18 mb-3">PAQUETE</span>
                    </div>
                </div>
                 @include('cotizaciones.forma.paquete')

            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-7">
        <div class="card custom-card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 card-radio">
                        <input type="radio" name="radio3" id="credit" value="manual"
                        {{@$objeto['radio3'] ? ($objeto['radio3']=='manual'?'checked':'') :'checked'}}
                        >
                        <label for="credit" >
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="text-primary"><i class="fa fa-hand-pointer"></i> Manual</h5>
                                    <p class="m-0">Ingresa el código postal de origen y código postal de destino</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="col-md-6 card-radio">
                        <input type="radio" name="radio3" id="paypal" value="libreta"
                            {{@$objeto['radio3'] ? ($objeto['radio3']=='libreta'?'checked':'') :''}}
                        >
                        <label for="paypal" >
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="text-primary"><i class="fa fa-book"></i> Libreta de direcciones</h5>
                                    <p class="m-0">Elige de la lista desplegable el ORIGEN y el DESTINO</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="row mt-2">
                   <div class="col-6 my-auto text-sm-center">
                        @include('cotizaciones.forma.origen')
                    </div>
                    <div class="col-6 my-auto text-sm-center">
                        @include('cotizaciones.forma.destino')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Row end -->

<div class="col-lg-12">
    <div class="form-group row justify-content-around">
        <div>
            <a id="cotizar" class="btn btn-primary" >Cotizar</a>
            <a id="limpiar" class="btn badge-dark" >Limpiar</a>

        </div>
    </div>
</div>
{!! Form::close() !!}
<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12 col-xl-12  col-md-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">

                </div>
                @include('cotizaciones.dashboard.tabla')
            </div>
        </div>
    </div>
</div>
@include('cotizaciones.modals.resumen_cotizacion')
@include('cotizaciones.modals.resumen_cotizacion_mercadoPago')
@endsection

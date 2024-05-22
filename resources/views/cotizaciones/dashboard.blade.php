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
                            Seccion para la creacion de una guia con diferentes metodos automatica, semi manual y manual 
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


                @if( isset($objeto['radio3']) )   
                <div class="payment-type d-flex">
                    <input type="radio" name="radio3" id="credit" value="manual" 
                    {{ ($objeto['radio3']==="manual") ? 'checked' : '' }}>
                    <label class="credit-label payment-cards four ml-0 col" for="credit"><span class="d-none d-md-block">Manual</span>
                        <img  alt="Ingresa ambos CPs">
                    </label>
                    <input type="radio" name="radio3" id="debit" value="semi"
                    {{ ($objeto['radio3']==="semi") ? 'checked' : '' }}>
                    <label class="debit-label payment-cards four col" for="debit"><span class="d-none d-md-block">Semi manual </span>
                        <img alt="El CP destino se debe ingresar"></label>
                    <input type="radio" name="radio3" id="paypal" value="libreta"
                    {{ ($objeto['radio3']==="libreta") ? 'checked' : '' }}>
                    <label class="paypal-label payment-cards four col" for="paypal"><span class="d-none d-md-block">Libreta de Direcciones</span>
                        <img alt="Busca el contacto">
                    </label>

                </div>      
                      
                @else
                
                <div class="payment-type d-flex">
                    <input type="radio" name="radio3" id="credit" value="manual" checked>
                    <label class="credit-label payment-cards four ml-0 col" for="credit"><span class="d-none d-md-block">Manual</span>
                        <img  alt="Ingresa ambos CPs">
                    </label>
                    <input type="radio" name="radio3" id="debit" value="semi">
                    <label class="debit-label payment-cards four col" for="debit"><span class="d-none d-md-block">Semi manual </span>
                        <img alt="El CP destino se debe ingresar"></label>
                    <input type="radio" name="radio3" id="paypal" value="libreta">
                    <label class="paypal-label payment-cards four col" for="paypal"><span class="d-none d-md-block">Libreta de Direcciones</span>
                        <img alt="Busca el contacto">
                    </label>

                </div>

                @endif
                
                <div class="row mt-2">
                   <div class="col-sm-5 my-auto text-sm-center">
                        @include('cotizaciones.forma.origen')
                        
                    </div>
                    <div class="col-sm-5 my-auto text-sm-center">
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

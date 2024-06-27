@extends('dashboard')
@section('content')
<div class="page-header">
    @include('finanzas.datosfiscales.crear.header')
</div>

<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">Datos Fiscales - Crear</label> <span class="d-block tx-12 mb-3 text-muted">A task is accomplished by a set deadline, and must contribute toward work-related objectives.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->


<!-- Row -->

<div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-12">

        {!! Form::open([ 'route' => 'tarifas.store', 'method' => 'POST' , 'class'=>'parsley-style-1', 'id'=>'generalForm' ]) !!}

        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Ingrese los datos Fiscales</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Copiar los datos de Constancia de Situacion Fiscal. </span>
            </div>
            <div class="card-body">
               
                <div class="row row-sm">
                    @include('finanzas.datosfiscales.forma.principal')
                </div>
            </div>      
        </div>
        
        <div class="col-lg-12 col-md-8">
            <div class="form-group row justify-content-center"> 
                <a href="{{ route('tarifas.index') }}" class="btn badge-dark" >Cancelar</a>
                <button type="submit" class="btn btn-primary ml-3" >Enviar</button>
            </div>
        </div>  
        {!! Form::close() !!} 
        
    </div>
    
</div>
<!-- Row end -->
@endsection

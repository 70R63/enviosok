@extends('dashboard')
@section('content')
<div class="page-header">
    @include('finanzas.datosfiscales.index.header')
</div>

<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">Datos Fiscales</label> <span class="d-block tx-12 mb-3 text-muted">A task is accomplished by a set deadline, and must contribute toward work-related objectives.</span>
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
        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Tabla de Datos Fiscales</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Esta secci&oacute;n es la parte de complemente de datos ficales relaciona al registro incial. al completar los datos faltantes usted prodra solcitar facturas de forma manual o auto amtica segun sea el caso</span>
            </div>

            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    @include('finanzas.datosfiscales.index.tabla')  
                </div>
            </div>

            

            
        </div>
    </div>
    
</div>
<!-- Row end -->
@endsection

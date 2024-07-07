@extends('dashboard')
@section('content')

@include('finanzas.recargas.header')
<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">Recargas</label>
                        <span class="d-block tx-12 mb-3 text-muted">
                            Realiza una recarga para poder disfrutar de los beneficios que ofrece la plataforma.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->


<!-- Row -->

<div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Recarga de Saldo</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">En esta seccion se encuentras las cantidades para poder recargar saldo al portal</span>
            </div>
            @include('dashboard.dashboard.pagos_mp')
        </div>
    </div>
</div>
<!-- Row end -->
@endsection

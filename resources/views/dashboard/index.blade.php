@extends('dashboard')
@section('content')


<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">
                            Dashboard</label>
                        <span class="d-block tx-12 mb-3 text-muted">
                            En este dashboard de EnvíosOK, podrás ver un detalle completo de tus envíos. Incluye información sobre el rastreo en tiempo real, el estatus actual del paquete, número de tracking, origen y destino de cada envío, así como la tarifa aplicada. Este panel te proporciona una vista clara y precisa de todos tus envíos en un solo lugar.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Burbujas Resumen Guias -->
<div class="row row-sm">
     @include('dashboard.dashboard.burbujas_resumen')
</div>

<div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Total de Guías</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Conoce la cantidad de envíos que llevas procesados hasta el momento.</span>
            </div>
            <div class="card-body crypto-wallet">
                <div class="">

                    @include('dashboard.graficas.totalguias')
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Uso de paqueterías</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Aquí podrás observar la participación de cada paquetería dentro de tu operacion.</span>
            </div>
            <div class="card-body crypto-wallet">
                <div class="">
                    @include('dashboard.graficas.defaults')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

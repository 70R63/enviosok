@extends('dashboard')
@section('content')

@include('saldos.pagos.show.header')

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header bg-transparent border-bottom-0">
                <div>
                    <label class="main-content-label mb-2">Facturación</label>
                    <span class="d-block tx-12 mb-2 text-muted">En esta sección podrás observar el historial de tus pagos y cuales han sido Aprobados o Rechazados. Podrás también solicitar la factura de cada deposito aprobado realizado.</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Row -->
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-header bg-transparent border-bottom-0">
            @include("saldos.pagos.show.tabla")
            </div>
        </div>
    </div>

</div>
<!-- End Row -->

@include("saldos.pagos.show.modal_facturar")
@endsection

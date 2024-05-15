@extends('dashboard')
@section('content')


<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                    <div>
                        <label class="main-content-label mb-2">Tasks q</label> <span class="d-block tx-12 mb-3 text-muted">A task is accomplished by a set deadline, and must contribute toward work-related objectives.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-2">
        <div class="card custom-card">
            <div class="card-body text-center">
                <div class="d-flex mt-4">
                    <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                        <i class="si si-plus"></i>
                    </div>
                    <div class="">
                        <span class="main-content-label text-uppercase tx-14 mt-4 ">Creadas</span>
                        <div class="d-flex my-auto"><h4 class="mt-1 mb-0">10</h4></div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-12 col-lg-12 col-xxl-2">
        <div class="card custom-card">
            <div class="card-body text-center">
               <div class="d-flex mt-4">
                    <div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
                        <i class="ti ti-truck"></i>
                    </div>
                    <div class="">
                        <span class="main-content-label text-uppercase tx-14 mt-4 ">En Transíto</span>
                        <div class="d-flex my-auto"><h4 class="mt-1 mb-0">3</h4></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-2">
        <div class="card custom-card">
            <div class="card-body text-center">
               <div class="d-flex mt-4">
                    <div class="icon-service bg-success-transparent rounded-circle text-success">
                        <i class="ti ti-envelope"></i>
                    </div>
                    <div class="">
                        <span class="main-content-label text-uppercase tx-14 mt-4 ">ENTREGADAS</span>
                        <div class="d-flex my-auto"><h4 class="mt-1 mb-0">7</h4></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-12 col-lg-12 col-xxl-2">
        <div class="card custom-card">
            <div class="card-body text-center">
               <div class="d-flex mt-4">
                    <div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
                        <i class="si si-close"></i>
                    </div>
                    <div class="">
                        <span class="main-content-label text-uppercase tx-14 mt-4 ">canceladas</span>
                        <div class="d-flex my-auto"><h4 class="mt-1 mb-0">5</h4></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-12 col-lg-12 col-xxl-2">
        <div class="card custom-card">
            <div class="card-body text-center">
                <div class="d-flex mt-4">
                    <div class="icon-service bg-info-transparent rounded-circle text-info">
                        <i class="fe fe-dollar-sign"></i>
                    </div>
                    <div class="">
                        <span class="main-content-label text-uppercase tx-14 mt-4 ">precio promedio</span>
                        <div class="d-flex my-auto"><h4 class="mt-1 mb-0">100.257134</h4></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

</div>

<div class="row row-sm">
    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
        <div class="card custom-card">
            <div class="card-header border-bottom-0">
                <label class="main-content-label my-auto pt-2 mb-1">Total de Guías</label>
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Asset allocation involves dividing an investment portfolio among different asset categories</span>
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
                <span class="d-block tx-12 mb-0 mt-1 text-muted">Asset allocation involves dividing an investment portfolio among different asset categories</span>
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
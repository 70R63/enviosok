<!-- Modal -->
<div class="modal" id="myModalMercadoPago">

    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">
                    <span id="spanTitulo"> </span>
                </h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card custom-card pricingTable2">
                    <div class="pricingTable2-header">
                        <h2>PRECIO </h2> <h6>CON IVA </h6>
                    </div>
                    <div class="pricing-plans  bg-primary">
                        <span class="price-value1">
                            $<span id="spanPrecio" class="spanPrecio"></span> MXP
                        </span>
                    </div>
                    <div class="pricingContent2">
                        @include('dashboard.dashboard.pagos_mp')
                    </div>
                    
                    <div class="pricing-plans  bg-primary">
                        Para continuar con la creación, realice su recarga
                    </div>
                </div>
                
            </div>
            <!-- FIN class="modal-body" -->
        </div>
    </div>


@include('cotizaciones.forma.guiastore_ocultos')


</div>
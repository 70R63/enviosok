<div class="card-item">
    <input type="hidden" id="total_guias" value="{{auth()->user()->empresa->guias->count()}}">
    <input type="hidden" id="tiene_ine_anverso" value="{{auth()->user()->ineAnverso->count()}}">
    <input type="hidden" id="tiene_ine_reverso" value="{{auth()->user()->ineReverso->count()}}">
    <input type="hidden" id="tiene_ine_selfie" value="{{auth()->user()->ineSelfie->count()}}">
    <div class="table-responsive">
    	<table id="cotizacionAjax" class="table table-striped table-bordered text-nowrap" >
    		<thead>
                <tr>
                    <th>ID TARIFA</th>
                    <th>PROVEEDOR</th>
                    <th>SERVICIO</th>
                    <th>FECHA APROX<p> ENTREGA</th>
                    <th>ZONA</th>
                    <th>COSTO</th>
                    <th>kg Inicial</th>
                    <th>kg Final</th>
                    <th>$ kg Extra.</th>
                    <th>OCURRE</th>
                    <th>APLICA A.E</th>
                    <th>$ Extendida</th>
                    <th>$ SEGURO</th>
                    <th>COSTO TOTAL (sin IVA)</th>

                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>ID TARIFA</th>
                    <th>PROVEEDOR</th>
                    <th>SERVICIO</th>
                    <th>FECHA APROX<p> ENTREGA</th>
                    <th>ZONA</th>
                    <th>COSTO</th>
                    <th>kg Inicial</th>
                    <th>kg Final</th>
                    <th>$ kg Extra.</th>
                    <th>OCURRE</th>
                    <th>APLICA A.E</th>
                    <th>$ Extendida</th>
                    <th>$ SEGURO</th>
                    <th>COSTO TOTAL (sin IVA)</th>

                </tr>
            </tfoot>
    	</table>
    </div>
</div>

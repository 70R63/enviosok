<div class="card-body">
	<div class="form-group">
		<label class="main-content-label mt-4 mb-4">Selecciona tu tipo de cotizacion</label>
		
		{{ Form::open( ['route' =>['cotizaciones.show', 'cotizacione'=>'/'], 'method' => 'GET' , 'class'=>'payment-form form'] )
		}}
			<div class="payment-type d-flex">
				<input type="radio" name="radio3" id="credit" value="manual" checked>
				<label class="credit-label payment-cards four ml-0 col" for="credit"><span class="d-none d-md-block">Manual </span>
					<img  alt="Ingresa ambos CPs">
				</label>
				
				<input type="radio" name="radio3" id="paypal" value="libreta">
				<label class="paypal-label payment-cards four col" for="paypal"><span class="d-none d-md-block">Libreta de Direcciones</span>
					<img alt="Busca el contacto">
				</label>

			</div>

			<div class="card-body">
                <div class="row mt-2">
                    
                    <div class="col-sm-5 my-auto text-sm-center">
                        @include('cotizaciones.forma.origen')
                        
                    </div>
                    <div class="col-sm-5 my-auto text-sm-center">
                        @include('cotizaciones.forma.destino')
                        
                    </div>

                </div>
            </div>
			<button type="submit" name="submit" value="true" class="btn btn-primary btn-lg btn-block">Cotizar</button>
            </div>
		{{ Form::close() }}
	</div>
</div>
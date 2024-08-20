<div class="row">
    <div class="col-md-6 card-radio">
        <input type="radio" name="radio3" id="credit" value="manual"
        {{@$objeto['radio3'] ? ($objeto['radio3']=='manual'?'checked':'') :'checked'}}
        >
        <label for="credit" >
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="text-primary"><i class="fa fa-hand-pointer"></i> Manual</h5>
                    <p class="m-0">Ingresa el código postal de origen y código postal de destino</p>
                </div>
            </div>
        </label>
    </div>
    <div class="col-md-6 card-radio">
        <input type="radio" name="radio3" id="paypal" value="libreta"
            {{@$objeto['radio3'] ? ($objeto['radio3']=='libreta'?'checked':'') :''}}
        >
        <label for="paypal" >
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="text-primary"><i class="fa fa-book"></i> Libreta de direcciones</h5>
                    <p class="m-0">Elige de la lista desplegable el ORIGEN y el DESTINO</p>
                </div>
            </div>
        </label>
    </div>
</div>
document.addEventListener('DOMContentLoaded', function () {
    //$('.selects').selectpicker();
    var cp = document.getElementById("cp");
    var cpDestino = document.getElementById("cp_d");
    if (cp) cp.addEventListener("keyup", function () {
        if (this.value.length == 5) {
            setDomicilioAjax(this.value,null,this);
        }
    }, false);
    if (cpDestino) cpDestino.addEventListener("keyup", function () {
        if (this.value.length == 5) {
            setDomicilioAjax(this.value,null,this);
        }
    }, false);

    /*Ajax buscar domicilio*/
    window.setDomicilioAjax = function (cp, colonia = null,elemento) {
        var token = document.head.querySelector('meta[name="csrf-token"]');
        var url = url_base;
        var padre = elemento.closest('.card-body');
        if(!padre) padre = elemento.closest('form');
        $.post(url + '/api/domicilio', {
            cp: cp,
            _token: token.content
        })
            .done(function (response) {
                var domicilio = response.domicilio;
                var select = response.colonias;
                if ((response.mensaje) && (response.mensaje == "resultados")) {
                    padre.querySelector('.estado').value = domicilio.d_estado;
                    padre.querySelector('.codigo_estado').value = domicilio.codigo_estado;
                    padre.querySelector('.tipo_asentamiento').value = domicilio.d_tipo_asenta;
                    padre.querySelector('.municipio_alcaldia').value = domicilio.d_mnpio;
                    padre.querySelector('.ciudad').value = domicilio.d_CP;
                    padre.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`;
                    padre.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`+select;
                    padre.querySelector('.select-colonia').addEventListener('change', function (e) {
                        if ($(this).val() == 'otra') {
                            padre.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`;
                            padre.querySelector('.div-colonia-cp')
                                .innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`+'<input type="text" class="padre-control colonia" placeholder="Escribe el nombre de otra colonia" name="colonia" id="colonia">';
                            padre.querySelector(".tipo_asentamiento").value='Colonia';
                            padre.querySelector('.colonia').focus();
                        } else {
                            let value = $(this).val();
                            let selected = padre.querySelector(`option[value='${value}']`)
                            if (selected)
                                padre.querySelector(".tipo_asentamiento").value = selected.dataset.tipoasenta;
                        }
                    });
                    if (colonia) padre.querySelector('.colonia').value = colonia;
                } else {
                    padre.querySelector('.estado').value = '';
                    padre.querySelector('.codigo_estado').value = '';
                    padre.querySelector('.municipio_alcaldia').value = '';
                    padre.querySelector('.div-colonia-cp').innerHTML = '';
                    padre.querySelector('.div-colonia-cp')
                        .innerHTML = '<input type="text" class="padre-control colonia" placeholder="Escribe el nombre de la colonia" name="colonia" id="colonia">';
                }
            })
            .fail(function (e) {
                console.log(e);
            });
    }

    if(cp && cp.value.length===5)
        cp.dispatchEvent(new Event('keyup'))
    if(cpDestino && cpDestino.value.length===5)
        cpDestino.dispatchEvent(new Event('keyup'))
});

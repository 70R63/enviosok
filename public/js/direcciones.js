document.addEventListener('DOMContentLoaded', function () {
    //$('.selects').selectpicker();
    var cp = document.getElementById("cp");
    if (cp) cp.addEventListener("keyup", function () {
        if (this.value.length == 5) {
            setDomicilioAjax(this.value);
        }
    }, false);
    /*Ajax buscar domicilio*/
    window.setDomicilioAjax = function (cp, colonia = null) {
        var token = document.head.querySelector('meta[name="csrf-token"]');
        var url = url_base;
        $.post(url + '/api/domicilio', {
            cp: cp,
            _token: token.content
        })
            .done(function (response) {
                var domicilio = response.domicilio;
                var select = response.colonias;
                if ((response.mensaje) && (response.mensaje == "resultados")) {
                    document.getElementById('estado').value = domicilio.d_estado;
                    document.getElementById('codigo_estado').value = domicilio.codigo_estado;
                    document.getElementById('tipo_asentamiento').value = domicilio.d_tipo_asenta;
                    document.getElementById('municipio_alcaldia').value = domicilio.d_mnpio;
                    document.getElementById('ciudad').value = domicilio.d_CP;
                    document.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`;
                    document.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`+select;
                    $('.select-colonia').on('change', function (e) {
                        if ($(this).val() == 'otra') {
                            document.querySelector('.div-colonia-cp').innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`;
                            document.querySelector('.div-colonia-cp')
                                .innerHTML = `<div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">COLONIA
                                <span class="tx-danger">*</span>
                            </span>
                        </div>`+'<input type="text" class="form-control" placeholder="Escribe el nombre de otra colonia" name="colonia" id="colonia">';
                            $("#tipo_asentamiento").val('Colonia');
                            $('#colonia').focus();
                        } else {
                            let value = $(this).val();
                            let selected = document.querySelector(`option[value='${value}']`)
                            if (selected)
                                $("#tipo_asentamiento").val(selected.dataset.tipoasenta);
                        }
                    });
                    if (colonia) document.querySelector('#colonia').value = colonia;
                } else {
                    document.getElementById('estado').value = '';
                    document.getElementById('codigo_estado').value = '';
                    document.getElementById('municipio_alcaldia').value = '';
                    document.querySelector('.div-colonia-cp').innerHTML = '';
                    document.querySelector('.div-colonia-cp')
                        .innerHTML = '<input type="text" class="form-control" placeholder="Escribe el nombre de la colonia" name="colonia" id="colonia">';
                }
            })
            .fail(function (e) {
                console.log(e);
            });
    }
});

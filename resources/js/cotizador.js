$(document).ready(function() {
    const autoCompleteOrigen = new Autocomplete({
        selector: "#origen",
        placeHolder: "Origen",
        threshold: 2,
        data: {
            src: async (query) => {
                try {
                    const source = await fetch(`api/getCP/?cp=${query}`);
                    return  await source.json();
                } catch (error) {
                    return error;
                }
            },
            keys: ["colonia"],
        },
        resultsList: {
            maxResults:10,
            element: (list, data) => {
                if (!data.results.length) {
                    const message = document.createElement("div");
                    message.setAttribute("class", "no_result");
                    message.innerHTML = `<span class="text-dark">Sin resultados de "${data.query}"</span>`;
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: true,
        },
        events: {
            input: {
                selection: (event) => {
                    autoCompleteOrigen.input.value = event.detail.selection.value.colonia;
                }
            }
        }
    });
    const autoCompleteDestino = new Autocomplete({
        selector: "#destino",
        placeHolder: "Destino",
        threshold: 2,
        data: {
            src: async (query) => {
                try {
                    const source = await fetch(`api/getCP/?cp=${query}`);
                    return  await source.json();
                } catch (error) {
                    return error;
                }
            },
            keys: ["colonia"],
        },
        resultsList: {
            maxResults:10,
            element: (list, data) => {
                if (!data.results.length) {
                    const message = document.createElement("div");
                    message.setAttribute("class", "no_result");
                    message.innerHTML = `<span class="text-dark">Sin resultados de "${data.query}"</span>`;
                    list.prepend(message);
                }
            },
            noResults: true,
        },
        resultItem: {
            highlight: true,
        },
        events: {
            input: {
                selection: (event) => {
                    autoCompleteDestino.input.value = event.detail.selection.value.colonia;
                }
            }
        }
    });
    var slideLeft = {
        distance: '150%',
        origin: 'left',
        opacity: 0,
        rotate: {
            x: 20,
            z: 20
        }
    };
    var appearScale = {
        distance: '150%',
        origin: 'top',
        opacity: 0,
        rotate: {
            x: 20,
            z: 20
        },
        scale: 0
    };
    var appearScaleBottom = {
        distance: '150%',
        origin: 'bottom',
        opacity: 0,
        rotate: {
            x: 20,
            z: 20
        },
        scale: 0
    };
    ScrollReveal().reveal('.appear-left',slideLeft);
    ScrollReveal().reveal('.appear-scale',appearScale);
    ScrollReveal().reveal('.appear-scale-bottom',appearScaleBottom);


    var textos = ["Cotizando...", "Buscando las mejores ofertas...", "Encontrando resultados..."]; // Array de textos a mostrar
    var contador = -1;
    function cambiarTexto() {
        $('#tituloCotizador').fadeOut(function() {
            $(this).text(textos[contador % textos.length])
                .fadeIn();
        });
        contador++;
        setTimeout(cambiarTexto, 3000);
    }

    var formCotizador = document.getElementById('formCotizador');
    if(formCotizador){
        formCotizador.addEventListener('submit',function(e){
            e.preventDefault();
            $("#divBusquedaCotizador").addClass('d-none');
            $("#divResultadosCotizador").addClass('d-none');
            validarFormulario(e);
            if(formCotizador.checkValidity()){
                contador = -1;
                cambiarTexto();
                $("#divBusquedaCotizador").removeClass('d-none');

                setTimeout(function(){
                    $("#divBusquedaCotizador").addClass('d-none');
                    $("#divResultadosCotizador").removeClass('d-none');
                    $("#divResultadosCotizador").html(`
                                <div class="row border rounded-4 py-2 my-2 align-items-center">
                                    <div class="col-md-3 text-center">
                                        <img style="max-width: 100px" src="${url_base+'/img/estafeta.png'}" alt="Estafeta">
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Tipo de envío</h6>
                                        <span class="badge bg-primary">Económica</span><br>
                                        <span class="badge bg-warning">Express</span><br>
                                        <small>Según sea el caso</small>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Estimado de entrega</h6>
                                        <p class="text-primary fw-semibold m-0">De 2 a 7 días hábiles</p>
                                        <p class="text-warning fw-semibold m-0">De 1 a 2 días hábiles</p>
                                        <p class="small m-0">Según sea el caso</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h4 class="fw-bold mb-0">$150.00</h4>
                                        <p class="small m-0">Último precio</p>
                                        <p class="m-0">
                                            <a href="${url_base+'/login'}" class="btn btn-sm btn-primary fw-bold text-warning">Crear guía</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row border rounded-4 py-2 my-2 align-items-center">
                                    <div class="col-md-3 text-center">
                                        <img style="max-width: 100px" src="${url_base+'/img/fedex.png'}" alt="FedEx">
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Tipo de envío</h6>
                                        <span class="badge bg-primary">Económica</span><br>
                                        <span class="badge bg-warning">Express</span>
                                        <p class="small m-0">Según sea el caso</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Estimado de entrega</h6>
                                        <p class="text-primary fw-semibold m-0">De 2 a 7 días hábiles</p>
                                        <p class="text-warning fw-semibold m-0">De 1 a 2 días hábiles</p>
                                        <p class="small m-0">Según sea el caso</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h4 class="fw-bold mb-0">$220.00</h4>
                                        <p class="small m-0">Último precio</p>
                                        <p class="m-0">
                                            <a href="${url_base+'/login'}" class="btn btn-sm btn-primary fw-bold text-warning">Crear guía</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row border rounded-4 py-2 my-2 align-items-center">
                                    <div class="col-md-3 text-center">
                                        <img style="max-width: 100px" src="${url_base+'/img/dhl.png'}" alt="DHL">
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Tipo de envío</h6>
                                        <span class="badge bg-warning">Express</span>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h6 class="fw-bold">Estimado de entrega</h6>
                                        <p class="text-warning fw-semibold m-0">De 1 a 2 días hábiles</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h4 class="fw-bold mb-0">$250.00</h4>
                                        <p class="small m-0">Último precio</p>
                                        <p class="m-0">
                                            <a href="${url_base+'/login'}" class="btn btn-sm btn-primary fw-bold text-warning">Crear guía</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row border rounded-4 py-3 my-2 align-items-center">
                                    <div class="col-md-3 text-center">
                                        <img style="max-height: 50px" src="${url_base+'/img/ups.png'}" alt="UPS">
                                    </div>
                                    <div class="col-md-8 text-center">
                                        <h6 class="fw-bold text-danger">No disponible</h6>
                                    </div>
                                </div>`);

                },7000)



            }
        },false);
    }

});


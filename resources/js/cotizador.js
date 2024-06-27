$(document).ready(function() {
    const autoCompleteOrigen = new Autocomplete({
        selector: "#origen",
        placeHolder: "Código postal origen",
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
        placeHolder: "Código postal destino",
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
            $("#cotizador").addClass('sticky');
            $("#divBusquedaCotizador").addClass('d-none');
            $("#divResultadosCotizador").addClass('d-none');
            validarFormulario(e);
            if(formCotizador.checkValidity()){
                contador = -1;
                cambiarTexto();
                $("#divBusquedaCotizador").removeClass('d-none');
                let data = new FormData(formCotizador);
                data.append('_token',token.content);
                /*Consulta al backend*/
                setTimeout(function(){
                    axios.post(url_base+'/api/cotizar',data)
                        .then(function (response) {
                            if(response && response.data.html){
                                $("#divResultadosCotizador").html(response.data.html);
                            }
                        })
                        .catch(function (response) {
                            $("#divResultadosCotizador").html(`<div class="row border rounded-4 py-2 my-2 align-items-center justify-content-center">
                                <div class="col-md-8">
                                    <div class="alert alert-danger my-3 text-center">Lo sentimos, intenta más tarde :(</div>
                                </div>
                            </div>`);
                        });
                    $("#divBusquedaCotizador").addClass('d-none');
                    $("#cotizador").removeClass('sticky');
                    $("#divResultadosCotizador").removeClass('d-none');
                },4000)
            }
        },false);
    }
});


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
});


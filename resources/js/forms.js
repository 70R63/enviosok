// Example starter JavaScript for disabling form submissions if there are invalid fields
window.tipoValidacion = function(inputInvalido,msgDefault) {
    if (inputInvalido.validity.valueMissing){
        return msgDefault ?? 'Dato obligatorio';
    }
    if (inputInvalido.validity.tooLong){
        return "El límite de caracteres debe ser menor o igual a "+inputInvalido.maxlength;
    }
    if (inputInvalido.validity.tooShort){
        return "El mínimo de caracteres es de "+inputInvalido.minLength;
    }
    if (inputInvalido.validity.rangeOverflow){
        if (inputInvalido.type === 'date')
            return "La fecha debe ser igual o anterior a la actual";
        if (inputInvalido.type === 'number'){
            return msgDefault??"Este debe ser menor a "+inputInvalido.max;
        }
    }
    if (inputInvalido.validity.rangeUnderflow){
        if (inputInvalido.type === 'date'){
            if(inputInvalido.min == '1970-01-01'){
                return "La fecha debe ser posterior a 01/01/1970";
            }else{
                return "La fecha debe ser posterior a la actual";
            }

        }
    }
    if (inputInvalido.validity.typeMismatch) {
        if (inputInvalido.type === 'email')
            return 'Correo electrónico inválido';
        if (inputInvalido.type === 'date')
            return 'Fecha inválida';
        if (inputInvalido.type === 'time')
            return 'Hora inválida';
        return 'Tipo de dato incorrecto';
    }
    if(inputInvalido.validity.pattern){
        if (inputInvalido.type === 'text')
            return 'Campo inválido';

    }
    return 'Campo inválido';



}

window.validarFormulario = function (event){
    let form = event.target;

    if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        var inputsInvalidos = form.querySelectorAll(':invalid');
        inputsInvalidos.forEach(function (inputInvalido) {
            inputInvalido.closest('.form-group').classList.add('invalid');
            var invalidFeedbacks = inputInvalido.closest('.form-group').querySelectorAll('.invalid-feedback');
            invalidFeedbacks.forEach(function(el){
                el.textContent = tipoValidacion(inputInvalido,el.dataset.default);
                el.style.removeProperty('display');
            });
        });
    }
    form.classList.add('was-validated');
}
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation');
Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            validarFormulario(event);
        }, false);
    });

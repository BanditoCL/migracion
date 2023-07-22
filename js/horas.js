function mostrarInput(checkboxId) {
    var checkbox = document.getElementById(checkboxId);
    var label = checkbox.parentElement.querySelector('label');

    if (checkbox.checked) {
        var inputName = checkboxId ;
        var existingInput = document.querySelector('input[name="' + inputName + '"]');
        
        if (!existingInput) {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = inputName;
            input.className = 'form-control'; // Puedes agregar clases para estilizar el input si lo deseas
            label.insertAdjacentElement('afterend', input);
        } else {
            existingInput.style.display = 'block'; // Mostrar el input existente si ya existe
        }
    } else {
        var inputName = checkboxId ;
        var existingInput = document.querySelector('input[name="' + inputName + '"]');
        
        if (existingInput) {
            existingInput.style.display = 'none'; // Ocultar el input existente si se desmarca el checkbox
        }
    }
}

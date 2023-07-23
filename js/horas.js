function mostrarInput(checkboxId) {
    var checkbox = document.getElementById(checkboxId);
    var label = checkbox.parentElement.querySelector('label');

    var inputName = checkboxId + '_input';
    var inputDescName = checkboxId + '_desc';
    var existingInput = document.getElementById(inputName);
    var existingInputDesc = document.getElementById(inputDescName);

    if (checkbox.checked) {
        if (!existingInput && !existingInputDesc) {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = inputName;
            input.id = inputName;
            input.className = 'form-control';

            var labelDesc = document.createElement('label');
            labelDesc.textContent = 'Descripción:';
            labelDesc.setAttribute('for', inputName);

            var inputDesc = document.createElement('input');
            inputDesc.type = 'text';
            inputDesc.name = inputDescName;
            inputDesc.id = inputDescName;
            inputDesc.className = 'form-control';

            var divContainer = document.createElement('div');
            divContainer.appendChild(labelDesc);
            divContainer.appendChild(inputDesc);

            label.insertAdjacentElement('afterend', divContainer);
            label.insertAdjacentElement('afterend', input);
        } else {
            existingInput.style.display = 'block';
            existingInputDesc.style.display = 'block';
        }
    } else {
        if (existingInput && existingInputDesc) {
            existingInput.remove();
            existingInputDesc.remove();
        }
    }
}
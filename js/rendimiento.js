function displayFileName() {
  const fileInput = document.getElementById('customFile');
  const fileName = document.getElementById('fileName');
  fileName.textContent = fileInput.files[0].name;
}
function obtenerFechaActual() {
  const fechaActual = new Date();
  const dia = fechaActual.getDate();
  const mes = fechaActual.getMonth() + 1; // Los meses van de 0 a 11, por eso se suma 1
  const año = fechaActual.getFullYear();
  
  // Formatear la fecha como "dd/mm/yyyy"
  const fechaFormateada = dia.toString().padStart(2, '0') + '/' + mes.toString().padStart(2, '0') + '/' + año;
  
  return fechaFormateada;
}




function agregarCampoEntrega() {
  const container = document.getElementById('campos-generados1');
  const numCampos = container.querySelectorAll('.persona').length;

  if (numCampos < 4) {
    const persona = document.createElement('div');
    persona.classList.add('form-group', 'persona');

    const fechaLabel = document.createElement('label');
    fechaLabel.setAttribute('for', 'simpleDataInput');
    fechaLabel.textContent = 'Fecha:';
    persona.appendChild(fechaLabel);

    const fechaDiv = document.createElement('div');
    fechaDiv.classList.add('input-group', 'date');
    persona.appendChild(fechaDiv);

    const fechaPrepend = document.createElement('div');
    fechaPrepend.classList.add('input-group-prepend');
    fechaDiv.appendChild(fechaPrepend);

    const fechaPrependSpan = document.createElement('span');
    fechaPrependSpan.classList.add('input-group-text');
    fechaPrependSpan.innerHTML = '<i class="fas fa-calendar"></i>';
    fechaPrepend.appendChild(fechaPrependSpan);

    const fechaInput = document.createElement('input');
    fechaInput.type = 'text';
    fechaInput.classList.add('form-control');
    fechaInput.value = obtenerFechaActual();
    fechaInput.id = 'simpleDataInput';
    fechaInput.name = 'fechas[]';
    fechaDiv.appendChild(fechaInput);

    const espacio = document.createElement('div');
    espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
    persona.appendChild(espacio);

    const entregaLabel = document.createElement('label');
    entregaLabel.setAttribute('for', 'entregaInput');
    entregaLabel.textContent = 'Persona que Entregó:';
    persona.appendChild(entregaLabel);

    const entregaInput = document.createElement('input');
    entregaInput.type = 'text';
    entregaInput.classList.add('form-control', 'mb-3');
    entregaInput.id = 'entregaInput';
    entregaInput.name = 'entregas[]';
    entregaInput.placeholder = 'Nombres';
    persona.appendChild(entregaInput);

    const montoLabel = document.createElement('label');
    montoLabel.setAttribute('for', 'montoInput');
    montoLabel.textContent = 'Monto:';
    persona.appendChild(montoLabel);

    const montoInput = document.createElement('input');
    montoInput.type = 'number';
    montoInput.classList.add('form-control', 'mb-3');
    montoInput.id = 'montoInput';
    montoInput.name = 'montos[]';
    montoInput.placeholder = 's/. 0-1000';
    persona.appendChild(montoInput);

    const eliminarBtn = document.createElement('button');
    eliminarBtn.textContent = 'Eliminar';
    eliminarBtn.type = 'button';
    eliminarBtn.classList.add('btn', 'btn-danger');
    eliminarBtn.addEventListener('click', () => {
      container.removeChild(persona);
    });
    persona.appendChild(eliminarBtn);

    container.appendChild(persona);

    // Aquí puedes agregar las funciones adicionales para el calendario
    $(fechaInput).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    });
  }
}



function agregarCampoFactura() {
  const container = document.getElementById('campos-generados2');
  const numCampos = container.querySelectorAll('.facturas').length;

  if (numCampos < 8) {
    const factura = document.createElement('div');
    factura.classList.add('form-group', 'facturas');

    const br = document.createElement('br');
    factura.appendChild(br);
    
    const fechaLabel = document.createElement('label');
    fechaLabel.setAttribute('for', 'simpleDataInput');
    fechaLabel.textContent = 'Fecha:';
    factura.appendChild(fechaLabel);

    const fechaInput = document.createElement('div');
    fechaInput.classList.add('input-group', 'date');
    factura.appendChild(fechaInput);

    const fechaInputGroupPrepend = document.createElement('div');
    fechaInputGroupPrepend.classList.add('input-group-prepend');
    fechaInput.appendChild(fechaInputGroupPrepend);

    const fechaInputGroupText = document.createElement('span');
    fechaInputGroupText.classList.add('input-group-text');
    fechaInputGroupText.innerHTML = '<i class="fas fa-calendar"></i>';
    fechaInputGroupPrepend.appendChild(fechaInputGroupText);

    const fechaInputField = document.createElement('input');
    fechaInputField.setAttribute('type', 'text');
    fechaInputField.classList.add('form-control');
    fechaInputField.setAttribute('id', 'simpleDataInput');
    fechaInputField.setAttribute('name', 'fechasfac[]');
    fechaInputField.value = obtenerFechaActual(); // Establecer el valor utilizando la función obtenerFechaActual()
    fechaInput.appendChild(fechaInputField);
    
    const espacio = document.createElement('div');
    espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
    factura.appendChild(espacio);

    const otLabel = document.createElement('label');
    otLabel.setAttribute('for', 'exampleInputPassword1');
    otLabel.textContent = 'OT:';
    factura.appendChild(otLabel);

    const otInput = document.createElement('input');
    otInput.setAttribute('type', 'text');
    otInput.classList.add('form-control', 'mb-3');
    otInput.setAttribute('placeholder', 'OT');
    otInput.setAttribute('name', 'otsfac[]');
    factura.appendChild(otInput);

    const empresaLabel = document.createElement('label');
    empresaLabel.setAttribute('for', 'exampleInputPassword1');
    empresaLabel.textContent = 'Empresa:';
    factura.appendChild(empresaLabel);

    const empresaInput = document.createElement('input');
    empresaInput.setAttribute('type', 'text');
    empresaInput.classList.add('form-control', 'mb-3');
    empresaInput.setAttribute('placeholder', 'Descripcion');
    empresaInput.setAttribute('name', 'empresasfac[]');
    factura.appendChild(empresaInput);

    const comprobanteLabel = document.createElement('label');
    comprobanteLabel.setAttribute('for', 'exampleInputPassword1');
    comprobanteLabel.textContent = 'Comprobante:';
    factura.appendChild(comprobanteLabel);

    const comprobanteInput = document.createElement('input');
    comprobanteInput.setAttribute('type', 'text');
    comprobanteInput.classList.add('form-control', 'mb-3');
    comprobanteInput.setAttribute('placeholder', 'Numero');
    comprobanteInput.setAttribute('name', 'comprobantesfac[]');
    factura.appendChild(comprobanteInput);

    const montoLabel = document.createElement('label');
    montoLabel.setAttribute('for', 'exampleInputPassword1');
    montoLabel.textContent = 'Monto:';
    factura.appendChild(montoLabel);

    const montoInput = document.createElement('input');
    montoInput.setAttribute('type', 'number');
    montoInput.classList.add('form-control', 'mb-3');
    montoInput.setAttribute('placeholder', 's/. 0-1000');
    montoInput.setAttribute('name', 'montosfac[]');
    factura.appendChild(montoInput);

    const imagenLabel = document.createElement('label');
    imagenLabel.textContent = 'Imagen:';
    factura.appendChild(imagenLabel);

    const imagenDiv = document.createElement('div');
    imagenDiv.classList.add('custom-file');
    factura.appendChild(imagenDiv);

    const imagenInput = document.createElement('input');
    imagenInput.setAttribute('type', 'file');
    imagenInput.classList.add('custom-file-input');
    imagenInput.setAttribute('id', 'customFile');
    imagenInput.setAttribute('name', 'imagensfac[]');
    imagenInput.setAttribute('onchange', 'displayFileName()');
    imagenDiv.appendChild(imagenInput);

    const imagenInputLabel = document.createElement('label');
    imagenInputLabel.classList.add('custom-file-label');
    imagenInputLabel.setAttribute('for', 'customFile');
    imagenInputLabel.textContent = 'Imagen';
    imagenDiv.appendChild(imagenInputLabel);

    const fileNameParagraph = document.createElement('p');
    fileNameParagraph.setAttribute('id', 'fileName');
    factura.appendChild(fileNameParagraph);

    const eliminarBtn = document.createElement('button');
    eliminarBtn.textContent = 'Eliminar';
    eliminarBtn.setAttribute('type', 'button');
    eliminarBtn.classList.add('btn', 'btn-danger');
    eliminarBtn.addEventListener('click', () => container.removeChild(factura));
    factura.appendChild(eliminarBtn);

    container.appendChild(factura);

    // Aquí puedes agregar las funciones adicionales para el calendario
    $(fechaInput).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    });
  }
}




function agregarCampoBoleta() {
  const container = document.getElementById('campos-generados3');
  const numCampos = container.querySelectorAll('.boletas').length;

  if (numCampos < 4) {
    const boleta = document.createElement('div');
    boleta.classList.add('form-group', 'boletas');

    const br = document.createElement('br');
    boleta.appendChild(br);

    const fechaLabel = document.createElement('label');
    fechaLabel.setAttribute('for', 'simpleDataInput');
    fechaLabel.textContent = 'Fecha:';
    boleta.appendChild(fechaLabel);
    
    const fechaInput = document.createElement('div');
    fechaInput.classList.add('input-group', 'date');
    boleta.appendChild(fechaInput);
    
    const fechaInputGroupPrepend = document.createElement('div');
    fechaInputGroupPrepend.classList.add('input-group-prepend');
    fechaInput.appendChild(fechaInputGroupPrepend);
    
    const fechaInputGroupText = document.createElement('span');
    fechaInputGroupText.classList.add('input-group-text');
    const icon = document.createElement('i');
    icon.classList.add('fas', 'fa-calendar');
    fechaInputGroupText.appendChild(icon);
    fechaInputGroupPrepend.appendChild(fechaInputGroupText);
    
    const fechaInputField = document.createElement('input');
    fechaInputField.setAttribute('type', 'text');
    fechaInputField.classList.add('form-control');
    fechaInputField.setAttribute('id', 'simpleDataInput');
    fechaInputField.setAttribute('name', 'fechasbo[]');
    fechaInputField.value = obtenerFechaActual(); // Establecer el valor utilizando la función obtenerFechaActual()
    fechaInput.appendChild(fechaInputField);
    
    const espacio = document.createElement('div');
    espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
    boleta.appendChild(espacio);

    const otLabel = document.createElement('label');
    otLabel.htmlFor = 'exampleInputPassword1';
    otLabel.textContent = 'OT:';
    boleta.appendChild(otLabel);

    const otInput = document.createElement('input');
    otInput.type = 'text';
    otInput.classList.add('form-control', 'mb-3');
    otInput.placeholder = 'OT';
    otInput.name = 'otsbo[]';
    boleta.appendChild(otInput);

    const empresaLabel = document.createElement('label');
    empresaLabel.htmlFor = 'exampleInputPassword1';
    empresaLabel.textContent = 'Empresa:';
    boleta.appendChild(empresaLabel);

    const empresaInput = document.createElement('input');
    empresaInput.type = 'text';
    empresaInput.classList.add('form-control', 'mb-3');
    empresaInput.placeholder = 'Descripción';
    empresaInput.name = 'empresasbo[]';
    boleta.appendChild(empresaInput);

    const comprobanteLabel = document.createElement('label');
    comprobanteLabel.htmlFor = 'exampleInputPassword1';
    comprobanteLabel.textContent = 'Comprobante:';
    boleta.appendChild(comprobanteLabel);

    const comprobanteInput = document.createElement('input');
    comprobanteInput.type = 'text';
    comprobanteInput.classList.add('form-control', 'mb-3');
    comprobanteInput.placeholder = 'Número';
    comprobanteInput.name = 'comprobantesbo[]';
    boleta.appendChild(comprobanteInput);

    const montoLabel = document.createElement('label');
    montoLabel.htmlFor = 'exampleInputPassword1';
    montoLabel.textContent = 'Monto:';
    boleta.appendChild(montoLabel);

    const montoInput = document.createElement('input');
    montoInput.type = 'number';
    montoInput.classList.add('form-control', 'mb-3');
    montoInput.placeholder = 's/. 0-1000';
    montoInput.name = 'montosbo[]';
    boleta.appendChild(montoInput);

    const eliminarBtn = document.createElement('button');
    eliminarBtn.type = 'button';
    eliminarBtn.classList.add('btn', 'btn-danger');
    eliminarBtn.textContent = 'Eliminar';
    eliminarBtn.addEventListener('click', () => container.removeChild(boleta));
    boleta.appendChild(eliminarBtn);

    container.appendChild(boleta);

    $(fechaInput).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    });
  }
}



function agregarCampoPasaje() {
  const container = document.getElementById('campos-generados4');
  const numCampos = container.querySelectorAll('.pasajes').length;
  
  if (numCampos < 4) {
      const pasajes = document.createElement('div');
      pasajes.classList.add('form-group', 'pasajes');
  
      const br = document.createElement('br');
      pasajes.appendChild(br);
  
      const fechaLabel = document.createElement('label');
      fechaLabel.setAttribute('for', 'simpleDataInput');
      fechaLabel.textContent = 'Fecha:';
      pasajes.appendChild(fechaLabel);
      
      const fechaInput = document.createElement('div');
      fechaInput.classList.add('input-group', 'date');
      pasajes.appendChild(fechaInput);
      
      const fechaInputGroupPrepend = document.createElement('div');
      fechaInputGroupPrepend.classList.add('input-group-prepend');
      fechaInput.appendChild(fechaInputGroupPrepend);
      
      const fechaInputGroupText = document.createElement('span');
      fechaInputGroupText.classList.add('input-group-text');
      const icon = document.createElement('i');
      icon.classList.add('fas', 'fa-calendar');
      fechaInputGroupText.appendChild(icon);
      fechaInputGroupPrepend.appendChild(fechaInputGroupText);
      
      const fechaInputField = document.createElement('input');
      fechaInputField.setAttribute('type', 'text');
      fechaInputField.classList.add('form-control');
      fechaInputField.setAttribute('id', 'simpleDataInput');
      fechaInputField.setAttribute('name', 'fechaspa[]');
      fechaInputField.value = obtenerFechaActual(); // Establecer el valor utilizando la función obtenerFechaActual()
      fechaInput.appendChild(fechaInputField);
      
      const espacio = document.createElement('div');
      espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
      pasajes.appendChild(espacio);
  
      const otLabel = document.createElement('label');
      otLabel.htmlFor = 'exampleInputPassword1';
      otLabel.textContent = 'OT:';
      pasajes.appendChild(otLabel);
  
      const otInput = document.createElement('input');
      otInput.type = 'text';
      otInput.classList.add('form-control', 'mb-3');
      otInput.placeholder = 'OT';
      otInput.name = 'otspa[]';
      pasajes.appendChild(otInput);
  
      const clienteLabel = document.createElement('label');
      clienteLabel.htmlFor = 'exampleInputPassword1';
      clienteLabel.textContent = 'Cliente:';
      pasajes.appendChild(clienteLabel);
  
      const clienteInput = document.createElement('input');
      clienteInput.type = 'text';
      clienteInput.classList.add('form-control', 'mb-3');
      clienteInput.placeholder = 'Descripción';
      clienteInput.name = 'clientespa[]';
      pasajes.appendChild(clienteInput);
  
      const PartidateLabel = document.createElement('label');
      PartidateLabel.htmlFor = 'exampleInputPassword1';
      PartidateLabel.textContent = 'Partida:';
      pasajes.appendChild(PartidateLabel);
  
      const partidaInput = document.createElement('input');
      partidaInput.type = 'text';
      partidaInput.classList.add('form-control', 'mb-3');
      partidaInput.placeholder = 'Partida';
      partidaInput.name = 'partidaspa[]';
      pasajes.appendChild(partidaInput);
  
      const llegadateLabel = document.createElement('label');
      llegadateLabel.htmlFor = 'exampleInputPassword1';
      llegadateLabel.textContent = 'Partida:';
      pasajes.appendChild(llegadateLabel);
  
      const llegadaInput = document.createElement('input');
      llegadaInput.type = 'text';
      llegadaInput.classList.add('form-control', 'mb-3');
      llegadaInput.placeholder = 'LLegada';
      llegadaInput.name = 'llegadaspa[]';
      pasajes.appendChild(llegadaInput);
  
      const montoLabel = document.createElement('label');
      montoLabel.htmlFor = 'exampleInputPassword1';
      montoLabel.textContent = 'Monto:';
      pasajes.appendChild(montoLabel);
  
      const montoInput = document.createElement('input');
      montoInput.type = 'number';
      montoInput.classList.add('form-control', 'mb-3');
      montoInput.placeholder = 's/. 0-1000';
      montoInput.name = 'montospa[]';
      pasajes.appendChild(montoInput);
  
      const eliminarBtn = document.createElement('button');
      eliminarBtn.type = 'button';
      eliminarBtn.classList.add('btn', 'btn-danger');
      eliminarBtn.textContent = 'Eliminar';
      eliminarBtn.addEventListener('click', () => container.removeChild(pasajes));
      pasajes.appendChild(eliminarBtn);
  
      container.appendChild(pasajes);
  
      $(fechaInput).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
      });
  }
  }
  



function agregarCampoGastos_sin_co() {
  const container = document.getElementById('campos-generados5');
  const numCampos = container.querySelectorAll('.gastos_sin_co').length;

  if (numCampos < 3) {
    const gastosSinCo = document.createElement('div');
    gastosSinCo.classList.add('form-group', 'gastos_sin_co');

    const fechaLabel = document.createElement('label');
    fechaLabel.setAttribute('for', 'simpleDataInput');
    fechaLabel.textContent = 'Fecha:';
    gastosSinCo.appendChild(fechaLabel);    
    
    const fechaInput = document.createElement('div');
    fechaInput.classList.add('input-group', 'date');
    gastosSinCo.appendChild(fechaInput);
    
    const fechaInputGroupPrepend = document.createElement('div');
    fechaInputGroupPrepend.classList.add('input-group-prepend');
    fechaInput.appendChild(fechaInputGroupPrepend);
    
    const fechaInputGroupText = document.createElement('span');
    fechaInputGroupText.classList.add('input-group-text');
    fechaInputGroupText.innerHTML = '<i class="fas fa-calendar"></i>';
    fechaInputGroupPrepend.appendChild(fechaInputGroupText);
    
    const fechaInputField = document.createElement('input');
    fechaInputField.setAttribute('type', 'text');
    fechaInputField.classList.add('form-control');
    fechaInputField.setAttribute('id', 'simpleDataInput');
    fechaInputField.setAttribute('name', 'fechasga[]');
    fechaInputField.value = obtenerFechaActual(); // Establecer el valor utilizando la función obtenerFechaActual()
    fechaInput.appendChild(fechaInputField);
    
    const espacio = document.createElement('div');
    espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
    gastosSinCo.appendChild(espacio);

    const otLabel = document.createElement('label');
    otLabel.setAttribute('for', 'otsga');
    otLabel.textContent = 'OT:';
    gastosSinCo.appendChild(otLabel);

    const otInput = document.createElement('input');
    otInput.type = 'text';
    otInput.classList.add('form-control', 'mb-3');
    otInput.placeholder = 'OT';
    otInput.name = 'otsga[]';
    gastosSinCo.appendChild(otInput);

    const descripcionLabel = document.createElement('label');
    descripcionLabel.setAttribute('for', 'descripcionsga');
    descripcionLabel.textContent = 'Descripción:';
    gastosSinCo.appendChild(descripcionLabel);

    const descripcionInput = document.createElement('input');
    descripcionInput.type = 'text';
    descripcionInput.classList.add('form-control', 'mb-3');
    descripcionInput.placeholder = 'Descripción';
    descripcionInput.name = 'descripcionsga[]';
    gastosSinCo.appendChild(descripcionInput);

    const personaAutorizoLabel = document.createElement('label');
    personaAutorizoLabel.setAttribute('for', 'persona_que_autorizosga');
    personaAutorizoLabel.textContent = 'Persona Que Autorizó:';
    gastosSinCo.appendChild(personaAutorizoLabel);

    const personaAutorizoInput = document.createElement('input');
    personaAutorizoInput.type = 'text';
    personaAutorizoInput.classList.add('form-control', 'mb-3');
    personaAutorizoInput.placeholder = 'Persona que autorizó';
    personaAutorizoInput.name = 'persona_que_autorizosga[]';
    gastosSinCo.appendChild(personaAutorizoInput);

    const montoLabel = document.createElement('label');
    montoLabel.setAttribute('for', 'montospa');
    montoLabel.textContent = 'Monto:';
    gastosSinCo.appendChild(montoLabel);

    const montoInput = document.createElement('input');
    montoInput.type = 'number';
    montoInput.classList.add('form-control', 'mb-3');
    montoInput.placeholder = 's/. 0-1000';
    montoInput.name = 'montospa[]';
    gastosSinCo.appendChild(montoInput);

    const eliminarBtn = document.createElement('button');
    eliminarBtn.textContent = 'Eliminar';
    eliminarBtn.type = 'button';
    eliminarBtn.classList.add('btn', 'btn-danger');
    eliminarBtn.addEventListener('click', () => container.removeChild(gastosSinCo));
    gastosSinCo.appendChild(eliminarBtn);

    container.appendChild(gastosSinCo);

    $(fechaInput).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    });
  }
}



function agregarCampoPor_rendir() {
  const container = document.getElementById('campos-generados6');
  const numCampos = container.querySelectorAll('.campo-por-rendir').length;

  if (numCampos < 3) {
    const campoPorRendir = document.createElement('div');
    campoPorRendir.classList.add('form-group', 'campo-por-rendir');

    const fechaLabel = document.createElement('label');
    fechaLabel.setAttribute('for', 'simpleDataInput');
    fechaLabel.textContent = 'Fecha';
    campoPorRendir.appendChild(fechaLabel);

    const fechaInputGroup = document.createElement('div');
    fechaInputGroup.classList.add('input-group', 'date');
    campoPorRendir.appendChild(fechaInputGroup);

    const fechaInputGroupPrepend = document.createElement('div');
    fechaInputGroupPrepend.classList.add('input-group-prepend');
    fechaInputGroup.appendChild(fechaInputGroupPrepend);

    const fechaInputGroupText = document.createElement('span');
    fechaInputGroupText.classList.add('input-group-text');
    fechaInputGroupText.innerHTML = '<i class="fas fa-calendar"></i>';
    fechaInputGroupPrepend.appendChild(fechaInputGroupText);

    const fechaInput = document.createElement('input');
    fechaInput.type = 'text';
    fechaInput.classList.add('form-control');
    fechaInput.value = obtenerFechaActual();
    fechaInput.id = 'simpleDataInput';
    fechaInput.name = 'fechasre[]';
    fechaInputGroup.appendChild(fechaInput);

    const espacio = document.createElement('div');
    espacio.style.marginTop = '10px'; // Ajusta el valor según el margen deseado en píxeles
    campoPorRendir.appendChild(espacio);

    const otLabel = document.createElement('label');
    otLabel.setAttribute('for', 'exampleInputPassword1');
    otLabel.textContent = 'OT:';
    campoPorRendir.appendChild(otLabel);

    const otInput = document.createElement('input');
    otInput.classList.add('form-control', 'mb-3');
    otInput.type = 'text';
    otInput.placeholder = 'OT';
    otInput.name = 'otsre[]';
    campoPorRendir.appendChild(otInput);

    const personaLabel = document.createElement('label');
    personaLabel.setAttribute('for', 'exampleInputPassword1');
    personaLabel.textContent = 'Persona';
    campoPorRendir.appendChild(personaLabel);

    const personaInput = document.createElement('input');
    personaInput.classList.add('form-control', 'mb-3');
    personaInput.type = 'text';
    personaInput.placeholder = 'Descripcion';
    personaInput.name = 'personasre[]';
    campoPorRendir.appendChild(personaInput);

    const montoLabel = document.createElement('label');
    montoLabel.setAttribute('for', 'exampleInputPassword1');
    montoLabel.textContent = 'Monto';
    campoPorRendir.appendChild(montoLabel);

    const montoInput = document.createElement('input');
    montoInput.classList.add('form-control', 'mb-3');
    montoInput.type = 'number';
    montoInput.placeholder = 's/. 0-1000';
    montoInput.name = 'montosre[]';
    campoPorRendir.appendChild(montoInput);

    const eliminarBtn = document.createElement('button');
    eliminarBtn.textContent = 'Eliminar';
    eliminarBtn.type = 'button';
    eliminarBtn.classList.add('btn', 'btn-danger');
    eliminarBtn.addEventListener('click', () => container.removeChild(campoPorRendir));
    campoPorRendir.appendChild(eliminarBtn);

    container.appendChild(campoPorRendir);

    $(fechaInputGroup).datepicker({
      format: 'dd/mm/yyyy',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    });
  }
}

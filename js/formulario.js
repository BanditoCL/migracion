// FORMATO - FORMULARIO
function generarInput() {
  var select = document.getElementById("prioridad");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
  var contenedor = document.getElementById("contenedor");
  
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "prioridad";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput2() {
  var checkbox = document.getElementById("accesibilidad-otros");
  var opcionSeleccionada = checkbox.checked;
  var contenedor = document.getElementById("contenedor2");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
    input.classList.add('form-control');
    input.type = "text";
    input.name = "accesibilidad[]";
    input.placeholder = "Especificar";
    contenedor.appendChild(input);
  } else {
    contenedor.innerHTML = '';
  }
}
 
function generarInput3() {
  var select = document.getElementById("disponibilidad");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
  var contenedor = document.getElementById("contenedor3");
  if (opcionSeleccionada) {
    var input = document.createElement("input"); 
      input.classList.add('form-control');
      input.type = "text";
      input.name = "disponibilidad";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput4() {
  var select = document.getElementById("horario");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
  var contenedor = document.getElementById("contenedor4");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "horario";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput5() {
  var select = document.getElementById("anticorrupcion");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros indicios de hostigamiento a proveedor";
  var contenedor = document.getElementById("contenedor5");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "anticorrupcion";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput6() {
  var select = document.getElementById("valorizacion");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
  var contenedor = document.getElementById("contenedor6");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "valorizacion";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput7() {
  var select = document.getElementById("negocio");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Otros";
  var contenedor = document.getElementById("contenedor7");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "negocio";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput8() {
  var checkbox = document.getElementById("alcance-otros");
  var opcionSeleccionada = checkbox.checked;
  var contenedor = document.getElementById("contenedor8");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
    input.classList.add('form-control');
    input.type = "text";
    input.name = "alcance[]";
    input.placeholder = "Especificar";
    contenedor.appendChild(input);
  } else {
    contenedor.innerHTML = '';
  }
}

function generarInputCertificacion() {
  var checkboxCertificacion = document.getElementById("mano-certificacion");
  var contenedorCertificacion = document.getElementById("contenedorCertificacion");

  if (checkboxCertificacion.checked) {
    var inputCertificacion = document.createElement("input");
    inputCertificacion.classList.add("form-control");
    inputCertificacion.type = "text";
    inputCertificacion.name = "mano_certificacion";
    inputCertificacion.placeholder = "Especificar";
    contenedorCertificacion.appendChild(inputCertificacion);
  } else {
    contenedorCertificacion.innerHTML = '';
  }
}
function generarInputEmpresa() {
  var checkboxEmpresa = document.getElementById("mano-empresa");
  var contenedorEmpresa = document.getElementById("contenedorEmpresa");

  if (checkboxEmpresa.checked) {
    var inputEmpresa = document.createElement("input");
    inputEmpresa.classList.add("form-control");
    inputEmpresa.type = "text";
    inputEmpresa.name = "mano_empresa";
    inputEmpresa.placeholder = "Especificar";
    contenedorEmpresa.appendChild(inputEmpresa);
  } else {
    contenedorEmpresa.innerHTML = '';
  }
}

function generarInput10() {
  var select = document.getElementById("materiales");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Materiales especiales";
  var contenedor = document.getElementById("contenedor10");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "materiales";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInput11() {
  var select = document.getElementById("servicios");
  var opcionSeleccionada = select.options[select.selectedIndex].value == "Servicios externos especiales";
  var contenedor = document.getElementById("contenedor11");
  if (opcionSeleccionada) {
    var input = document.createElement("input");
      input.classList.add('form-control');
      input.type = "text";
      input.name = "servicios";
      input.placeholder = "Especificar";
      contenedor.appendChild(input);
  }else {
      contenedor.innerHTML = '';
  }
}

function generarInputEstacionamiento() {
  var checkboxEstacionamiento = document.getElementById("cliente-estacionamiento");
  var contenedorEstacionamiento = document.getElementById("contenedorEstacionamiento");

  if (checkboxEstacionamiento.checked) {
    var inputEstacionamiento = document.createElement("input");
    inputEstacionamiento.classList.add("form-control");
    inputEstacionamiento.type = "text";
    inputEstacionamiento.name = "cliente_estacionamiento";
    inputEstacionamiento.placeholder = "Especificar";
    contenedorEstacionamiento.appendChild(inputEstacionamiento);
  } else {
    contenedorEstacionamiento.innerHTML = '';
  }
}

function generarInputElectrica() {
  var checkboxElectrica = document.getElementById("cliente-electrica");
  var contenedorElectrica = document.getElementById("contenedorElectrica");

  if (checkboxElectrica.checked) {
    var inputElectrica = document.createElement("input");
    inputElectrica.classList.add("form-control");
    inputElectrica.type = "text";
    inputElectrica.name = "cliente_electrica";
    inputElectrica.placeholder = "Especificar voltaje y distancia de punto de energía";
    contenedorElectrica.appendChild(inputElectrica);
  } else {
    contenedorElectrica.innerHTML = '';
  }
}
function generarInputAire() {
  var checkboxAire = document.getElementById("cliente-aire");
  var contenedorAire = document.getElementById("contenedorAire");

  if (checkboxAire.checked) {
    var inputAire = document.createElement("input");
    inputAire.classList.add("form-control");
    inputAire.type = "text";
    inputAire.name = "cliente_aire";
    inputAire.placeholder = "Especificar presión y distancia a punto de energía";
    contenedorAire.appendChild(inputAire);
  } else {
    contenedorAire.innerHTML = '';
  }
}
function generarInputOtros() {
  var checkboxOtros = document.getElementById("cliente-otros");
  var contenedorOtros = document.getElementById("contenedorOtros");

  if (checkboxOtros.checked) {
    var inputOtros = document.createElement("input");
    inputOtros.classList.add("form-control");
    inputOtros.type = "text";
    inputOtros.name = "cliente_otros";
    inputOtros.placeholder = "Especificar";
    contenedorOtros.appendChild(inputOtros);
  } else {
    contenedorOtros.innerHTML = '';
  }
}

function generarInputEppEquipos() {
  var checkboxes = document.querySelectorAll('input[name="tipotrabajo[]"]:checked');
  var eppValues = [];
  var equiposValues = [];
  var otrosInputContainer = document.getElementById("otros-input-container");

  checkboxes.forEach(function(checkbox) {
    var valor = checkbox.value;
    if (valor === "Trabajo en Caliente") {
      eppValues.push("Soldador, extintor, manta ignífuga");
    } else if (valor === "Trabajo Eléctrico") {
      eppValues.push("Equipo dielectrico");
      equiposValues.push("Caja de bloqueo, LOTO");
    } else if (valor === "Trabajo en Altura") {
      eppValues.push("Arnes, linea de vida");
      equiposValues.push("Andamio, manlift");
    } else if (valor === "Trabajo de Maniobras de Izaje") {
      eppValues.push("Aparejos de izaje");
      equiposValues.push("Walkie-talkie, camión grúa");
    }
  });

  document.getElementById("epp").value = eppValues.join(" - ");
  document.getElementById("equipos").value = equiposValues.join(" - ");

  if (document.getElementById("trabajo-otros").checked) {
    var otrosInput = document.createElement("input");
    otrosInput.setAttribute("type", "text");
    otrosInput.setAttribute("name", "tipotrabajo[]");
    otrosInput.setAttribute("class", "form-control");
    otrosInput.setAttribute("placeholder", "Especificar");
    otrosInputContainer.innerHTML = ""; 
    otrosInputContainer.appendChild(otrosInput);
  } else {
    otrosInputContainer.innerHTML = ""; 
  }
}

// FORMATO - LISTA 
function confirmarDescarga(id) {
    if (confirm("¿Estás seguro que deseas descargar el reporte #" + id + "?")) {
        window.location.href = "reporte.php?id=" + id;  reporte
        return true;
    } else {
        return false;
    }
}

function confirmarEdicion(id) {
    if (confirm("¿Estás seguro que deseas Editar el reporte #" + id + "?")) {
        window.location.href = "editar.php?id=" + id;  reporte
        return true;
    } else {
        return false;
    }
}

function confirmarEliminacion(id) {
  if (confirm("¿Estás seguro que deseas eliminar el reporte #" + id + "?")) {
      window.location.href = "eliminar.php?id=" + id;  eliminar
      return true;
  } else {
      return false;
  }
}
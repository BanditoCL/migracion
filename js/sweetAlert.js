// BOTON ENVIAR FORMATO
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.btn-visita').addEventListener('click', function(event) {
    event.preventDefault();
    
    Swal.fire({
      title: '¡Alerta!',
      text: '¿Estás seguro de que deseas enviar la visita?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, enviar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      allowOutsideClick: false, // Evitar clics fuera de la alerta
      showCloseButton: true,
      closeButtonAriaLabel: 'Cerrar',
      showCloseButton: false
    }).then((result) => {
      if (result.isConfirmed) {
        // Realizar la solicitud AJAX al archivo PHP
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'proceso.php', true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            // Aquí puedes manejar la respuesta del servidor si es necesario
            Swal.fire({
              title: '¡Visita enviada!',
              text: 'La visita ha sido enviada exitosamente.',
              icon: 'success',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6',
              showCancelButton: true,
              cancelButtonText: 'Ver lista',
              cancelButtonColor: '#4CAF50', // Color verde
              cancelButtonClass: 'verde-btn', // Clase CSS para el color verde
              allowOutsideClick: false // Evitar clics fuera de la alerta
            }).then((result) => {
              if (result.isConfirmed) {
                // Cerrar la alerta
              } else {
                // Redirigir a lista.php
                window.location.href = 'datatables.php';
              }
            });
          } else {
            // Manejar errores en caso de que la solicitud no se complete correctamente
            Swal.fire({
              title: 'Error',
              text: 'Hubo un error al enviar la visita.',
              icon: 'error',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6',
              allowOutsideClick: false // Evitar clics fuera de la alerta
            });
          }
        };
        xhr.send(new FormData(document.querySelector('form')));
      }
    });
  });
});


// BOTON ENVIAR RENDIMIENTO
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.btn-rendimiento').addEventListener('click', function(event) {
    event.preventDefault();
    
    Swal.fire({
      title: '¡Alerta!',
      text: '¿Estás seguro de que deseas enviar rendimiento?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sí, enviar',
      cancelButtonText: 'Cancelar',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      allowOutsideClick: false, // Evitar clics fuera de la alerta
      showCloseButton: true,
      closeButtonAriaLabel: 'Cerrar',
      showCloseButton: false
    }).then((result) => {
      if (result.isConfirmed) {
        // Realizar la solicitud AJAX al archivo PHP
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'proceso.php', true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            // Aquí puedes manejar la respuesta del servidor si es necesario
            Swal.fire({
              title: 'Rendimiento enviado!',
              text: 'El rendimiento ha sido enviada exitosamente.',
              icon: 'success',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6',
              showCancelButton: true,
              cancelButtonText: 'Ver lista',
              cancelButtonColor: '#4CAF50', // Color verde
              cancelButtonClass: 'verde-btn', // Clase CSS para el color verde
              allowOutsideClick: false // Evitar clics fuera de la alerta
            }).then((result) => {
              if (result.isConfirmed) {
                // Cerrar la alerta
              } else {
                // Redirigir a lista.php
                window.location.href = 'lista.php';
              }
            });
          } else {
            // Manejar errores en caso de que la solicitud no se complete correctamente
            Swal.fire({
              title: 'Error',
              text: 'Hubo un error al enviar rendimiento.',
              icon: 'error',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6',
              allowOutsideClick: false // Evitar clics fuera de la alerta
            });
          }
        };
        xhr.send(new FormData(document.querySelector('form')));
      }
    });
  });
});
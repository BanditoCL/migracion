function handleFileChange(event) {
    previewImage(event);
    displayFileName(event);
}

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
    var output = document.getElementById('imagen-preview');
    output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function displayFileName(event) {
    const fileInput = document.getElementById('customFile');
    const fileName = document.getElementById('fileName');
    fileName.textContent = fileInput.files[0].name;
}
function validatePasswordMatch() {
    var password = document.getElementById('contrasena').value;
    var confirmPassword = document.getElementById('confirmar_contrasena').value;
    var passwordMatchMessage = document.getElementById('password-match');
    if (password !== confirmPassword) {
            passwordMatchMessage.style.display = 'block';
      event.preventDefault(); // Evita el envío del formulario si las contraseñas no coinciden
    } else {
            passwordMatchMessage.style.display = 'none';
    }
}

    function togglePasswordVisibility() {
    var passwordInput = document.getElementById('contrasena');
    var eyeIcon = document.getElementById('eye-icon');
    if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    eyeIcon.classList.remove('fa-eye');
    eyeIcon.classList.add('fa-eye-slash');
    } else {
    passwordInput.type = 'password';
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');
    }
    }
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
    var output = document.getElementById('imagen-preview');
    output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

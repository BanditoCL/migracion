<?php session_start();
include "conexion.php";
$conn = conexion();
$sql = "SELECT * FROM usuarios WHERE id_usuario = '".$_SESSION['id_usuario']."'";

// Ejecutar la consulta
$result = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="img/logo/Logotipo.png" rel="icon">
<title>Metal Raid Peru</title>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/ruang-admin.min.css" rel="stylesheet">
<style>
/* Estilos personalizados */
.profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}
</style>
</head>

<body id="page-top">

<div id="wrapper">
<?php include ("sidebar.php"); ?>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include ("header.php"); ?>
<body>
<div class="container">
<h1 class="text-center">Datos Del Usuario</h1>
<div class="row justify-content-center">
    <div class="col-md-6">
    <form action="upprofile.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']  ?>">
        <div class="form-group text-center">
        <img id="imagen-preview" src="<?php echo $row['foto'];?>" alt="Foto actual" class="profile-picture">
        <br>
        </div>
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" onchange="handleFileChange(event)" name="foto">
            <label class="custom-file-label" for="customFile">Imagen</label>
        </div>
        <p id="fileName"></p>
        
        <div class="form-group">
        <label for="nombre"><h6 class="m-0 font-weight-bold text-primary">Nombre:</h6></label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $row['nombre'];?>" required>
        </div>
        
        <div class="form-group">
        <label for="apellido"><h6 class="m-0 font-weight-bold text-primary">Apellido:</h6></label>
        <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $row['apellido'];?>" required>
        </div>
    
        <div class="form-group">
        <label for="usuario"><h6 class="m-0 font-weight-bold text-primary">Usuario:</h6></label>
        <input type="text" id="usuario" name="usuario" class="form-control" value="<?php echo $row['usuario'];?>" required>
        </div>
        
        <div class="form-group">
        <label for="contrasena"><h6 class="m-0 font-weight-bold text-primary">Contraseña:</h6></label>
        <div class="input-group">
            <input type="password" id="contrasena" name="contrasena" class="form-control" value="<?php echo $row['contrasena'];?>" required>
            <div class="input-group-append">
            <span class="input-group-text" id="toggle-password" onclick="togglePasswordVisibility()">
                <i id="eye-icon" class="fa fa-eye"></i>
            </span>
            </div>
        </div>
        </div>

        <div class="form-group">
        <label for="confirmar_contrasena"><h6 class="m-0 font-weight-bold text-primary">Confirmar Contraseña</h6></label>
        <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" class="form-control" value="<?php echo $row['contrasena'];?>" required>
        <small id="password-match" class="form-text text-danger" style="display: none;">Las contraseñas no coinciden.</small>
        </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary" onclick="validatePasswordMatch()">Guardar cambios</button>
        </div>


    </form>
    </div>
</div>
</div>
<script>

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
</script>
</body>

</div>
        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres cerrar sesión?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                <a href="login/salir.php" class="btn btn-primary">Salir</a>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</body>

</html>
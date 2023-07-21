<?php
session_start();
date_default_timezone_set("America/Lima");

$fecha = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="../img/logo/Logotipo.png" rel="icon">
<title>Visita Tecnica - METAL RAID PERU</title>
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="../vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
<link href="../vendor/clock-picker/clockpicker.css" rel="stylesheet">
<link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>


<body id="page-top">
<div id="wrapper">
<?php include ("sidebar.php"); ?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
    <?php include ("header.php"); ?>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Formulario De Horas Hombre</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Horas Hombre</li>
            <li class="breadcrumb-item active" aria-current="page">Formulario</li>
        </ol>
        </div>
        <style>
#myForm {
    column-count: 2;
    column-gap: 20px; /* Espacio entre columnas, ajusta según tus preferencias */
}

.form-column {
    break-inside: avoid; /* Evita que los campos se rompan entre columnas */
}

.form-group {
    margin-bottom: 15px; /* Espacio entre campos, ajusta según tus preferencias */
}
</style>
        
            <!-- Form Basic -->
            <form id="myForm" action="proceso.php" method="post" enctype="multipart/form-data">
            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (LUNES)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
        </div>

            <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (MARTES)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
        </div>
        <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (MIERCOLES)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
            </div>
            <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (JUEVES)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
            </div>
            <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (VIERNES)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
            </div>
            <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (SABADO)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
            </div>
            <br>

            <div>
                <h6 class="m-0 font-weight-bold text-warning">Horas Hombre (DOMINGO)</h6>
                <br>
            <div class="form-group" id="simple-date1">
                <label for="simpleDataInput">Fecha</label>
                <div class="input-group date">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechas[]">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de entrada</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Hora de Salida</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Orden De Trabajo (OT)</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion de Tareas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Horas Trabajadas</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Horas de Trabajo</option>
                <option value="HS">Horas Simples</option>
                <option value="HD">Horas Dobles</option>
            </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Horas</label>
                <input class="form-control mb-3" type="text" placeholder="" name="">
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Otros Gastos</label>
            <select class="form-control" id="tipoHoras" name="tipoHoras">
                <option value="HT">Refrigerio</option>
                <option value="HS">Pasajes</option>
                <option value="HD">Otros</option>
            </select>
            </div>
            </div>  
                    
            </form>
    
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger mb-1">Enviar Informe</button>
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
                <p>¿Seguro que quieres cerrar sesión?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                <a href="../login/salir.php" class="btn btn-primary">Salir</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <!---Container Fluid-->
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
            <b><a href="#" target="_blank">Sebitas &hearts;	</a></b>
            <b><a href="#" target="_blank">Willian &hearts;	</a></b>
        </span>
        </div>
    </div>
    </footer>
    <!-- Footer -->
</div>
</div>
<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
    <!-- Page level plugins -->
    <script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Select2 -->
<script src="../vendor/select2/dist/js/select2.min.js"></script>
<!-- Bootstrap Datepicker -->
<script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap Touchspin -->
<script src="../vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
<!-- ClockPicker -->
<script src="../vendor/clock-picker/clockpicker.js"></script>
<!-- RuangAdmin Javascript -->
<script src="../js/ruang-admin.min.js"></script>
<!-- DataTables -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Otros scripts -->
<script src="../js/rendimiento.js"></script>
<script src="../js/picker.js"></script>

</body>

</html>
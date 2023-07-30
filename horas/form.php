<?php
session_start();
date_default_timezone_set("America/Lima");
$fecha = date('d/m/Y');
include "../conexion.php";
$conectar = conexion();
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        <div class="row">
            <div class="col-lg-6">
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_lunes" onclick="mostrarInput('ht_lunes')">
                <label class="custom-control-label" for="ht_lunes">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_lunes" onclick="mostrarInput('hs_lunes')">
                <label class="custom-control-label" for="hs_lunes">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_lunes" onclick="mostrarInput('hd_lunes')">
                <label class="custom-control-label" for="hd_lunes">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_lunes" onclick="mostrarInput('refrigerio_lunes')">
                <label class="custom-control-label" for="refrigerio_lunes">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_lunes" onclick="mostrarInput('pasajes_lunes')">
                <label class="custom-control-label" for="pasajes_lunes">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_lunes" onclick="mostrarInput('otros_lunes')">
                <label class="custom-control-label" for="otros_lunes">Otros</label>
            </div>
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_martes" onclick="mostrarInput('ht_martes')">
                <label class="custom-control-label" for="ht_martes">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_martes" onclick="mostrarInput('hs_martes')">
                <label class="custom-control-label" for="hs_martes">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_martes" onclick="mostrarInput('hd_martes')">
                <label class="custom-control-label" for="hd_martes">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_martes" onclick="mostrarInput('refrigerio_martes')">
                <label class="custom-control-label" for="refrigerio_martes">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_martes" onclick="mostrarInput('pasajes_martes')">
                <label class="custom-control-label" for="pasajes_martes">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_martes" onclick="mostrarInput('otros_martes')">
                <label class="custom-control-label" for="otros_martes">Otros</label>
            </div>
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_miercoles" onclick="mostrarInput('ht_miercoles')">
                <label class="custom-control-label" for="ht_miercoles">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_miercoles" onclick="mostrarInput('hs_miercoles')">
                <label class="custom-control-label" for="hs_miercoles">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_miercoles" onclick="mostrarInput('hd_miercoles')">
                <label class="custom-control-label" for="hd_miercoles">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_miercoles" onclick="mostrarInput('refrigerio_miercoles')">
                <label class="custom-control-label" for="refrigerio_miercoles">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_miercoles" onclick="mostrarInput('pasajes_miercoles')">
                <label class="custom-control-label" for="pasajes_miercoles">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_miercoles" onclick="mostrarInput('otros_miercoles')">
                <label class="custom-control-label" for="otros_miercoles">Otros</label>
            </div>
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_jueves" onclick="mostrarInput('ht_jueves')">
                <label class="custom-control-label" for="ht_jueves">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_jueves" onclick="mostrarInput('hs_jueves')">
                <label class="custom-control-label" for="hs_jueves">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_jueves" onclick="mostrarInput('hd_jueves')">
                <label class="custom-control-label" for="hd_jueves">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_jueves" onclick="mostrarInput('refrigerio_jueves')">
                <label class="custom-control-label" for="refrigerio_jueves">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_jueves" onclick="mostrarInput('pasajes_jueves')">
                <label class="custom-control-label" for="pasajes_jueves">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_jueves" onclick="mostrarInput('otros_jueves')">
                <label class="custom-control-label" for="otros_jueves">Otros</label>
            </div>
        </div>
        </div>

                </div>
            <div class="col-lg-6">
                


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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_viernes" onclick="mostrarInput('ht_viernes')">
                <label class="custom-control-label" for="ht_viernes">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_viernes" onclick="mostrarInput('hs_viernes')">
                <label class="custom-control-label" for="hs_viernes">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_viernes" onclick="mostrarInput('hd_viernes')">
                <label class="custom-control-label" for="hd_viernes">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_viernes" onclick="mostrarInput('refrigerio_viernes')">
                <label class="custom-control-label" for="refrigerio_viernes">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_viernes" onclick="mostrarInput('pasajes_viernes')">
                <label class="custom-control-label" for="pasajes_viernes">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_viernes" onclick="mostrarInput('otros_viernes')">
                <label class="custom-control-label" for="otros_viernes">Otros</label>
            </div>
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_sabado" onclick="mostrarInput('ht_sabado')">
                <label class="custom-control-label" for="ht_sabado">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_sabado" onclick="mostrarInput('hs_sabado')">
                <label class="custom-control-label" for="hs_sabado">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_sabado" onclick="mostrarInput('hd_sabado')">
                <label class="custom-control-label" for="hd_sabado">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_sabado" onclick="mostrarInput('refrigerio_sabado')">
                <label class="custom-control-label" for="refrigerio_sabado">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_sabado" onclick="mostrarInput('pasajes_sabado')">
                <label class="custom-control-label" for="pasajes_sabado">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_sabado" onclick="mostrarInput('otros_sabado')">
                <label class="custom-control-label" for="otros_sabado">Otros</label>
            </div>
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
                <label>Tipo de Horas Trabajadas</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="ht_domingo" onclick="mostrarInput('ht_domingo')">
                <label class="custom-control-label" for="ht_domingo">Horas de Trabajo (H.T.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hs_domingo" onclick="mostrarInput('hs_domingo')">
                <label class="custom-control-label" for="hs_domingo">Horas Simples (H.S.)</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="hd_domingo" onclick="mostrarInput('hd_domingo')">
                <label class="custom-control-label" for="hd_domingo">Horas Dobles (H.D.)</label>
            </div>
        </div>

            <div class="form-group">
                <label>Otros Gastos</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="refrigerio_domingo" onclick="mostrarInput('refrigerio_domingo')">
                <label class="custom-control-label" for="refrigerio_domingo">Refrigerio</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="pasajes_domingo" onclick="mostrarInput('pasajes_domingo')">
                <label class="custom-control-label" for="pasajes_domingo">Pasajes</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="otros_domingo" onclick="mostrarInput('otros_domingo')">
                <label class="custom-control-label" for="otros_domingo">Otros</label>
            </div>
        </div>
        </div>
            </form>
    
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-danger mb-1">Enviar Informe</button>
            </div>


            </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
<script src="../js/horas.js"></script>
<script src="../js/picker.js"></script>

</body>

</html>
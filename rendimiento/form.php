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
  <title>RENDIMIENTO - METAL RAID PERU</title>
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
            <h1 class="h3 mb-0 text-gray-800">Formulario De Rendimiento</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Entrega de Dinero (Ingresos)</h6>
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
                  <label for="exampleInputPassword1">Persona que Entregó:</label>
                  <input class="form-control mb-3" type="text" placeholder="Nombres" name="entregas[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montos[]">
                </div> 

                <div class="form-group" id="campos-generados1"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoEntrega()">Agregar Persona</button>
                </div>

                <br>

                <div>
                  <h6 class="m-0 font-weight-bold text-primary">Rendimiento de compras y gastos (Facturas)</h6>
                  <br>
              <div class="form-group" id="simple-date1">
                  <label for="simpleDataInput">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechasfac[]">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">OT:</label>
                  <input class="form-control mb-3" type="text" placeholder="OT" name="otsfac[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Empresa</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="empresasfac[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Comprobante</label>
                  <input class="form-control mb-3" type="text" placeholder="Numero" name="comprobantesfac[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montosfac[]">
                </div> 

                <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" onchange="displayFileName()" name="imagensfac[]">
                    <label class="custom-file-label" for="customFile">Imagen</label>
                </div>
                <p id="fileName"></p>
                </div>
                <div class="form-group" id="campos-generados2"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoFactura()">Agregar Persona</button>
                </div>

                <br>

                <div>
                  <h6 class="m-0 font-weight-bold text-primary">Rendimiento de compras y gastos (Boletas)</h6>
                  <br>
              <div class="form-group" id="simple-date1">
                  <label for="simpleDataInput">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechasbo[]">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">OT:</label>
                  <input class="form-control mb-3" type="text" placeholder="OT" name="otsbo[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Empresa</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="empresasbo[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Comprobante</label>
                  <input class="form-control mb-3" type="text" placeholder="Numero" name="comprobantesbo[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montosbo[]">
                </div> 

              
                <div class="form-group" id="campos-generados3"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoBoleta()">Agregar Persona</button>

                <br><br>

                <div class="form-group">
                <h6 class="m-0 font-weight-bold text-primary">Notas y Observaciones</h6><br>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="observaciones"></textarea>
                </div>
            </div>
          

    <br><!-- Row =============================================================================================== -->
          

                <div>
                  
                  <h6 class="m-0 font-weight-bold text-primary">Rendimiento de compras y gastos (Pasajes)</h6>
                  <br>
              <div class="form-group" id="simple-date1">
                  <label for="simpleDataInput">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechaspa[]">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">OT:</label>
                  <input class="form-control mb-3" type="text" placeholder="OT" name="otspa[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Cliente</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="clientespa[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Partida</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="partidaspa[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Llegada</label>
                  <input class="form-control mb-3" type="text" placeholder="Llegada" name="llegadaspa[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montospa[]">
                </div> 

                <div class="form-group" id="campos-generados4"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoPasaje()">Agregar Persona</button>
                </div>

            <br>
            
                <div>
                  
                  <h6 class="m-0 font-weight-bold text-primary">Rendimiento de compras y gastos (Gastos Sin Comprobantes)</h6>
                  <br>
              <div class="form-group" id="simple-date1">
                  <label for="simpleDataInput">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechasga[]">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">OT:</label>
                  <input class="form-control mb-3" type="text" placeholder="OT" name="otsga[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Descripción</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="descripcionsga[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Persona que Autorizó</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="persona_que_autorizosga[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montosga[]">
                </div> 

                <div class="form-group" id="campos-generados5"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoGastos_sin_co()">Agregar Persona</button>
                </div>

            <br>

                <div>
                  <h6 class="m-0 font-weight-bold text-primary">Rendimiento de compras y gastos (Por Rendir)</h6>
                  <br>
              <div class="form-group" id="simple-date1">
                  <label for="simpleDataInput">Fecha</label>
                  <div class="input-group date">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo "$fecha"; ?>" id="simpleDataInput" name="fechasre[]">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">OT:</label>
                  <input class="form-control mb-3" type="text" placeholder="OT" name="otsre[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Persona</label>
                  <input class="form-control mb-3" type="text" placeholder="Descripcion" name="personasre[]">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Monto</label>
                  <input class="form-control mb-3" type="number" placeholder="s/. 0-1000" name="montosre[]">
                </div> 

                <div class="form-group" id="campos-generados6"></div>
                <button type="button" class="btn btn-success" onclick="agregarCampoPor_rendir()">Agregar Persona</button>
                </div>
      
   
                <br>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-danger mb-1">Enviar Rendimento</button>
                </div>
    </form>
    
  
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
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="../login/salir.php" class="btn btn-primary">Logout</a>
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

  <!-- Javascript for this page -->

</body>

</html>
<?php
session_start();
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
  <link href="../vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>
<style>
  .form-control {
    box-shadow: 3px 3px 3px 3px rgba(0, 0, 0, 0.2); /* Agrega una sombra alrededor del input */

  }
</style>

<body id="page-top">
<div id="wrapper">
  <?php include ("sidebar.php"); ?>
  
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      <?php include ("header.php"); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Formulario De Visitas Tecnicas</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Inicio</a></li>
              <li class="breadcrumb-item">Visitas</li>
              <li class="breadcrumb-item active" aria-current="page">Formulario</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
            <form id="myForm" action="proceso.php" method="post" enctype="multipart/form-data">
            <h6 class="m-0 font-weight-bold text-primary">INFORMACIÓN GENERAL DEL TRABAJO</h6>

          <hr>

          <div class="form-group my-3">
              <label for="descripcion">Descripción de Trabajo<span>:</span></label>
              <input type="text" name="descripcion" id="descripcion"class="form-control" >
          </div>

          <div class="form-group my-3">
              <label for="objetivo">Objetivo de Trabajo<span>:</span></label>
              <input type="text" name="objetivo" id="objetivo"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="area">Área de trabajo de Cliente<span>:</span></label>
              <input type="text" name="area" id="area"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="persona">Persona de Contacto Usuario Final<span>:</span></label>
              <input type="text" name="persona" id="persona"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="logistico">Persona de Contacto Logístico<span>:</span></label>
              <input type="text" name="logistico" id="logistico"class="form-control">
          </div>
      
          <div class="form-group my-3">
              <label for="ubicacion">Ubicación / Localización<span>:</span></label>
              <input type="text" name="ubicacion" id="ubicacion"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="tiempo">Tiempo de Entrega de Valorización<span>:</span></label>
              <input type="text" name="tiempo" id="tiempo"class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="trabajo">Tiempo de Entrega de Trabajo<span>:</span></label>
              <input type="text" name="trabajo" id="trabajo"class="form-control">
          </div>
          
          <div class="form-group my-3">
            <label for="prioridad">Prioridad de Ejecución<span>:</span></label>
            <select id="prioridad" onchange="generarInput()" name="prioridad" class="form-control">
              <option value="-">-</option>
              <option value="Emergencia">Emergencia</option>
              <option value="Programado">Programado</option>
              <option value="Otros">Otros</option>
            </select>   
            <div class="my-1" id="contenedor"></div>
          </div>

          <div class="form-group my-3">
            <label for="accesibilidad">Accesibilidad a área de Trabajo<span>:</span></label>
            <div id="accesibilidad">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-peatonal" value="Peatonal" name="accesibilidad[]">
                <label class="form-check-label" for="accesibilidad-peatonal">Peatonal</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-coche" value="Coche de trabajo" name="accesibilidad[]">
                <label class="form-check-label" for="accesibilidad-coche">Coche de trabajo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-camioneta" value="Vehicular con camioneta" name="accesibilidad[]">
                <label class="form-check-label" for="accesibilidad-camioneta">Vehicular con camioneta</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-grua" value="Vehicular con Grúa" name="accesibilidad[]">
                <label class="form-check-label" for="accesibilidad-grua">Vehicular con Grúa</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="accesibilidad-otros" onchange="generarInput2()">
                <label class="form-check-label" for="accesibilidad-otros">Otros</label>
                <div class="my-1" id="contenedor2"></div>
              </div>
            </div>
          </div>

          <div class="form-group my-3">
              <label for="disponibilidad">Disponibilidad de área, equipo, unidad de trabajo<span>:</span></label>
              <select id="disponibilidad" onchange="generarInput3()" name="disponibilidad" class="form-control">
                <option value="-">-</option>
                <option value="Trabaja las 24 horas">Trabaja las 24 horas</option>
                <option value="Tiene paradas de mantenimiento semanal">Tiene paradas de mantenimiento semanal</option>
                <option value="Tiene paradas de mantenimiento quincenal">Tiene paradas de mantenimiento quincenal</option>
                <option value="Tiene paradas de mantenimiento anual">Tiene paradas de mantenimiento anual</option>
                <option value="Otros">Otros</option>
              </select>
          <div class="my-1" id="contenedor3"></div>
          </div>

          <div class="form-group my-3">
              <label for="horario">Horario de trabajo para trabajo del cliente<span>:</span></label>
              <select id="horario" onchange="generarInput4()" name="horario" class="form-control">
                <option value="-">-</option>
                <option value="Lunes a sábado diurno">Lunes a sábado diurno</option>
                <option value="Lunes a sábado nocturno">Lunes a sábado nocturno</option>
                <option value="Domingo">Domingo</option>
                <option value="Feriados">Feriados</option>
                <option value="Otros">Otros</option>
              </select>
          <div class="my-1" id="contenedor4"></div>
          </div>    

          <div class="form-group my-3">
              <label for="anticorrupcion">Anticorrupción<span>:</span></label>
              <select id="anticorrupcion"onchange="generarInput5()" name="anticorrupcion" class="form-control">
                <option value="-">-</option>
                <option value="Logístico es transparente con la información">Logístico es transparente con la información</option>
                <option value="Jefe de área producción  es transparente con la información">Jefe de área producción  es transparente con la información</option>
                <option value="Jefe de mantenimiento  es transparente con la información">Jefe de mantenimiento  es transparente con la información</option>
                <option value="Otros indicios de hostigamiento a proveedor">Otros indicios de hostigamiento a proveedor</option>
              </select>
          <div class="my-1" id="contenedor5"></div>
            <script>

            </script>
          </div> 

          <div class="form-group my-3">
              <label for="valorizacion">Tipo de Valorización<span>:</span></label>
              <select id="valorizacion" onchange="generarInput6()" name="valorizacion" class="form-control">
                <option value="-">-</option>
                <option value="Concursable">Concursable</option>
                <option value="Exploración de precios">Exploración de precios</option>
                <option value="Otros">Otros</option>
              </select>
          <div class="my-1" id="contenedor6"></div>
          </div>
                    
          <div class="form-group my-3">
              <label for="observaciones">Observaciones del trabajo<span>:</span></label>
              <textarea name="observaciones" rows="3" id="observaciones" class="form-control"></textarea>
          </div>

          <div class="form-group my-3">
              <label for="imagen">Apuntes, Medidas, Gráficas de campo<span>:</span></label>
              <input type="file" name="imagen[]" multiple id="imagen" accept="image/*" class="form-control">
          </div>
        </div>



<!-- Row =============================================================================================== -->


          <div class="col-lg-6">
          <h6 class="m-0 font-weight-bold text-primary">INFORMACIÓN ESPECIFICA DEL TRABAJO</h6>
          <hr>

          <div class="form-group my-3">
              <label for="negocio">Línea de Negocio<span>:</span></label>
              <select id="negocio" onchange="generarInput7()" name="negocio" class="form-control">
                <option value="-">-</option>
                <option value="Proyecto">Proyecto</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Fabricación">Fabricación</option>
                <option value="Servicios Genenerales">Servicios Genenerales</option> 
                <option value="Otros">Otros</option>           
              </select>
          <div class="my-1" id="contenedor7"></div>
          </div>

          <div class="form-group my-3">
            <label for="alcance">Tipo de Documentación de alcance de servicio<span>:</span></label>
            <div id="alcance">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-bosquejo" value="Bosquejo" name="alcance[]">
                <label class="form-check-label" for="alcance-bosquejo">Bosquejo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-memoria" value="Memoria de Cálculo" name="alcance[]">
                <label class="form-check-label" for="alcance-memoria">Memoria de Cálculo</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-planos" value="Planos de Detalle" name="alcance[]">
                <label class="form-check-label" for="alcance-planos">Planos de Detalle</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-informacion" value="Información Verbal" name="alcance[]">
                <label class="form-check-label" for="alcance-informacion">Información Verbal</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alcance-otros" onchange="generarInput8()">
                <label class="form-check-label" for="alcance-otros">Otros</label>
                <div class="my-1" id="contenedor8"></div>
              </div>
            </div>
          </div>

          <div class="form-group my-3">
            <label for="mano">Mano de Obra<span>:</span></label>
            <div id="mano">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-tecnicos" value="Técnicos" name="mano[]">
                <label class="form-check-label" for="mano-tecnicos">Técnicos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-ingenieria" value="Ingeniería" name="mano[]">
                <label class="form-check-label" for="mano-ingenieria">Ingeniería</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-certificacion" onchange="generarInputCertificacion()">
                <label class="form-check-label" for="mano-certificacion">Mano de obra con certificación especial</label>
                <div class="my-1" id="contenedorCertificacion"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mano-empresa" onchange="generarInputEmpresa()">
                <label class="form-check-label" for="mano-empresa">Certificaciones de empresa específicos</label>
                <div class="my-1" id="contenedorEmpresa"></div>
              </div>
            </div>
          </div>

          <div class="form-group my-3">
              <label for="materiales">Materiales<span>:</span></label>
              <select id="materiales" onchange="generarInput10()" name="materiales" class="form-control">
                <option value="-">-</option>
                <option value="Materiales especiales">Materiales especiales</option>          
              </select>
          <div class="my-1" id="contenedor10"></div>
          </div>

          <div class="form-group my-3">
              <label for="servicios">Servicios<span>:</span></label>
              <select id="servicios" onchange="generarInput11()" name="servicios" class="form-control">
                <option value="-">-</option>
                <option value="Servicios externos especiales">Servicios externos especiales</option>          
              </select>
          <div class="my-1" id="contenedor11"></div>
          </div>
                
          <div class="form-group my-3">
            <label>Servicios compartidos con Cliente:</label>
            <div id="cliente">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-agua" value="Agua" name="cliente[]">
                <label class="form-check-label" for="cliente-agua">Agua</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-comedor" value="Comedor" name="cliente[]">
                <label class="form-check-label" for="cliente-comedor">Comedor</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-higienicos" value="Servicios Higiénicos" name="cliente[]">
                <label class="form-check-label" for="cliente-higienicos">Servicios Higiénicos</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-estacionamiento" onchange="generarInputEstacionamiento()">
                <label class="form-check-label" for="cliente-estacionamiento">Estacionamiento Interno y Externo</label>
                <div class="my-1" id="contenedorEstacionamiento"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-electrica" onchange="generarInputElectrica()">
                <label class="form-check-label" for="cliente-electrica">Energía Eléctrica</label>
                <div class="my-1" id="contenedorElectrica"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-aire" onchange="generarInputAire()">
                <label class="form-check-label" for="cliente-aire">Aire Comprimido</label>
                <div class="my-1" id="contenedorAire"></div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cliente-otros" onchange="generarInputOtros()">
                <label class="form-check-label" for="cliente-otros">Otros</label>
                <div class="my-1" id="contenedorOtros"></div>
              </div>
            </div>
          </div>

          <hr>
          <h6 class="m-0 font-weight-bold text-primary">SEGURIDAD INDUSTRIAL</h6>
          <hr>

          <div class="form-group my-3">
            <label for="tipotrabajo">Tipo de Trabajo<span>:</span></label>
            <div id="tipotrabajo">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-caliente" value="Trabajo en Caliente" name="tipotrabajo[]" onchange="generarInputEppEquipos()">
                <label class="form-check-label" for="trabajo-caliente">Trabajo en Caliente</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-electrico" value="Trabajo Eléctrico" name="tipotrabajo[]" onchange="generarInputEppEquipos()">
                <label class="form-check-label" for="trabajo-electrico">Trabajo Eléctrico</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-altura" value="Trabajo en Altura" name="tipotrabajo[]" onchange="generarInputEppEquipos()">
                <label class="form-check-label" for="trabajo-altura">Trabajo en Altura</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-izaje" value="Trabajo de Maniobras de Izaje" name="tipotrabajo[]" onchange="generarInputEppEquipos()">
                <label class="form-check-label" for="trabajo-izaje">Trabajo de Maniobras de Izaje</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo-otros" onchange="generarInputEppEquipos()">
                <label class="form-check-label" for="trabajo-otros">Otros</label>
                <div id="otros-input-container"></div>
              </div>
            </div>
          </div>

          <div class="form-group my-3">
            <label for="epp">EPP<span>:</span></label>
            <input type="text" name="epp" id="epp" class="form-control">
          </div>

          <div class="form-group my-3">
            <label for="equipos">Equipos<span>:</span></label>
            <input type="text" name="equipos" id="equipos" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="procedimientos">Procedimientos Específicos<span>:</span></label>
              <input type="text" name="procedimientos" id="procedimientos" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="jefe">Jefe de Seguridad de área y teléfono de contacto<span>:</span></label>
              <input type="text" name="jefe" id="jefe" class="form-control">
          </div>

          <div class="form-group my-3">
              <label for="riesgos">Riesgos de trabajo específicos<span>:</span></label>
              <input type="text" name="riesgos" id="riesgos" class="form-control">
          </div>

  </div>
</div>

                <br>
                <div class="container-fluid h-100">
            <div class="row w-100 align-items-center">
              <div class="col text-center mt-3 mb-3">
                <button type="submit" class="btn btn-primary">Enviar Visita</button>
              </div>
            </div>
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
<!-- Bootstrap Touchspin -->
<script src="../vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
<!-- RuangAdmin Javascript -->
<script src="../js/ruang-admin.min.js"></script>
<!-- DataTables -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
<!-- Otros scripts -->
<script src="../js/formulario.js"></script>

<script src="../js/sweetAlert.js"></script>

  <!-- Javascript for this page -->

</body>

</html>
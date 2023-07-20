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
</head>
<style>
    body {
      body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.welcome-container {
  text-align: center;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 36px;
  font-weight: bold;
  color: #333;
}

#worker-name {
  color: #007bff;
}
  </style>
<body id="page-top">

  <div id="wrapper">
  <?php include ("sidebar.php"); ?>
  
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      <?php include ("header.php"); ?>

      <div class="welcome-container">
    <h1 class="text-center mt-5" id="job-title"></h1>
    <h1 class="text-center mt-2" id="worker-name"></h1>
  </div>

    <script>
// Supongamos que tenemos una variable llamada 'cargo' con el valor del cargo del trabajador
const cargo = "<?php echo $row['cargo'];?>";

// Supongamos que tenemos una variable llamada 'nombre' con el valor del nombre del trabajador
const nombre = "<?php echo $row['nombre'];?>";

// Obtener las referencias a los elementos del DOM
const jobTitleElement = document.getElementById("job-title");
const workerNameElement = document.getElementById("worker-name");

// Actualizar el contenido de los elementos con los datos del trabajador
jobTitleElement.textContent = `Bienvenido ${cargo}`;
workerNameElement.textContent = nombre;

</script>
                <!-- Row -->
                <div class="row">
            <!-- Area Charts -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-danger">Record de Gastos</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  Styling for the area chart can be found in the
                  <code>/js/demo/chart-area-demo.js</code> file.
                </div>
              </div>
            </div>
            <!-- Bar Chart -->
            <div class="col-lg-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Horas Hombre - Record</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                  Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
              </div>
            </div>
            <!-- Donut Chart -->
            <div class="col-lg-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Trabajos mas Realizados</h6>
                </div>
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme. The
                charts below have been customized - for further customization options, please visit the <a
                  target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js documentation</a>.</p>
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
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login/salir.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>


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
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
</body>

</html>
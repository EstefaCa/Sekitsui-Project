<?php
session_start();
include_once '../../../Persistencia/Login/Seguridad.php';

if(isset($_SESSION['Users_Id'])){
    include '../../../Persistencia/Connection/Connection.php';
	$Users_Id = $_SESSION['Users_Id'];

    $Sentencia = $Rizer->prepare("SELECT Users_Active FROM users WHERE Users_Id = ?;");
    $Sentencia->execute([$Users_Id]);

    if ($Sentencia->rowCount()>=1) {
        $fila = $Sentencia->fetch();
        $Users_Active = $fila['Users_Active'];
    }
    
    if ($Users_Active == 1 ) {
        header('Location: ../../index.php');
    }
}   
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RIZER | Registro</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="../../../Persistencia/js/Validation.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <a href="../../../index.php"><img src="../../images/PNG/logo.png" alt="logo"></a>
              </div>
              <h4></h4>
              <h6 class="font-weight-light">Por favor completa los campos para continuar</h6>
              <form class="pt-3" method="POST" action="">

                <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <select name="Weight_System" class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu">
                        <option class="bg-light text-dark" href="#">Seleccionar</option>
                          <option class="bg-light text-dark" value="2">Kilos</option>
                          <option class="bg-light text-dark" value="1">Libras</option>
                      </div>
                      </div>
                    </select>
                      <input type="text" name="Details_Weight" class="form-control" aria-label="Text input with dropdown button" placeholder="Ingrese su peso" maxlength="3" required onkeypress="return soloNumeros(event)">
                    </div>
                  </div>
              </div>

                 <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <select name="Size_System" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medida</button>
                        <div class="dropdown-menu">
                        <option class="bg-light text-dark" href="#">Seleccionar</option>
                          <option class="bg-light text-dark" value="3">Metros</option>
                          <option class="bg-light text-dark" value="1">Centimetros</option>
                          <option class="bg-light text-dark" value="2">Pies</option>
                        </div>
                      </div>
                    </select>
                      <input type="text" name="Details_Size" class="form-control" aria-label="Text input with dropdown button" placeholder="Ingrese su estatura" onkeypress="return soloNumeros(event)">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <select name="Gender" class="btn-lg w-100 rounded btn-outline-primary dropdown-toogle" required>
                    <option value="AL" class="bg-light text-dark">Seleccionar sexo</option>
                      <option value="AL" class="bg-light text-dark">Femenino</option>
                      <option value="" class="bg-light text-dark">Masculino</option>
                    </select>
                  </div>

                  <div class="form-group">
                  <input type="text" name="Details_Physical_activity" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Horas de ejercicio semanal" maxlenght="20" required>
                </div>

                  <div class="form-group">
                  <input type="date" name="Details_Date_of_birth" class="form-control btn-lg rounded btn-outline-primary text-dark" id="exampleInputPassword1" required>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Acepto los terminos y condiciones
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Enviar"></input>
                </div>
                <?php
                  if (isset($_POST['Weight_System'],$_POST['Details_Weight'],$_POST['Size_System'],$_POST['Details_Size'],$_POST['Gender'],$_POST['Details_Physical_activity'],$_POST['Details_Date_of_birth'])) {
                          require_once '../../../Persistencia/Connection/Connection.php';
                          require_once '../../../Persistencia/Crud/InsertDetails.php';
                          echo "holi";
                      } 
                  ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

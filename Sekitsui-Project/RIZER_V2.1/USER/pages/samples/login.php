<?php
session_start();
if (isset($_SESSION['Users_Email'],$_SESSION['Users_Password'])){
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RIZER | Login</title>
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
              <h4>Bienvenido!</h4>
              <h6 class="font-weight-light">completa los campos para coninuar.</h6>
              <form class="pt-3" method="POST" action="">
                <div class="form-group">
                  <input type="text" name="Users_Nickname" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Usuario/Correo"  maxlength="20" required>
                </div>
                <div class="form-group">
                  <input type="password" name="Users_Password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contraseña" maxlenght="20" required>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Iniciar Sesion"></input>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Recuerdame
                    </label>
                  </div>
                  <a href="recov_password.php" class="auth-link text-black">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  ¿No tienes cuenta? <a href="register.php" class="text-primary">Crea una cuenta</a>
                </div>
                <?php
                  if (isset($_POST['Users_Nickname'],$_POST['Users_Password'])) {
                    require_once "../../../Persistencia/Connection/Connection.php";
                    require_once "../../../Persistencia/Login/Login_code.php";
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
<style>
    *{User-select: none !important;}
</style>
</html>
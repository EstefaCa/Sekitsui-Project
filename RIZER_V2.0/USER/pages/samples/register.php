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
              <h4>¿Eres nuevo?</h4>
              <h6 class="font-weight-light">Crea una cuenta fácilmente siguiendo estos pasos</h6>
              <form class="pt-3" method="POST" action="" class="password-strength form p-4">
                <div class="form-group">
                  <input type="text" name="Users_Name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nombre"  title="Porfavor ingrese solo letras en este campo" maxlength="45"  required onkeypress="return soloLetras(event)">
                </div>
                <div class="form-group">
                  <input type="email" name="Users_Email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Correo" maxlength="115" required>
                </div>
                <div class="form-group">
                  <input type="text" name="Users_Nickname"  class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Usuario" maxlength="20" required>
                </div>
                <div class="form-group">
                  <input type="password" name="Users_Password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Contraseña" maxlenght="20" required>
                      <!-- <input class="password-strength__input form-control" name="Users_Password" type="password" id="password-input" aria-describedby="passwordHelp" placeholder="Contraseña" class="form-control form-control-lg" id="exampleInputPassword1"/>
						          <button class="password-strength__visibility btn btn-outline-secondary" type="button"><span class="password-strength__visibility-icon" data-visible="hidden"><i class="fas fa-eye-slash"></i></span><span class="password-strength__visibility-icon js-hidden" data-visible="visible"><i class="fas fa-eye"></i></span></button><br>
                    	<small class="password-strength__error text-danger js-hidden"></small><small class="form-text text-muted mt-2" id="passwordHelp">Añade 9 caracteres o más, letras minúsculas, mayúsculas, números y símbolos para que la contraseña sea realmente fuerte.</small> -->
						          <!-- <div class="password-strength__bar progress-bar bg-danger"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div> -->
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
                <!-- <button class="password-strength__submit btn btn-success d-flex m-auto " type="submit" disabled="disabled" value="Crear cuenta">Crear cuenta</button> -->
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Crear cuenta"></input>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  ¿Ya tienes cuenta? <a href="login.php" class="text-primary">Iniciar sesión</a>
                </div>
                <?php
                    if (isset($_POST['Users_Name'],$_POST['Users_Email'],$_POST['Users_Nickname'],$_POST['Users_Password'])) {
                        require_once "../../../Persistencia/Connection/Connection.php";
                        require_once "../../../Persistencia/Crud/Insert.php";
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
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
  <script  src="../../../Persistencia/js/Password.js"></script> -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

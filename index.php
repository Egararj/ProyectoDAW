<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon32x32.png">
</head>
<body class="fondo">
  <?php
    session_start();
    setcookie(session_name(), '', time() - 3600, '/');
  ?>
  <div class="d-flex flex-column justify-content-center align-items-center vh-100 gap-4">
    
    <!-- Contenedor de Registro e Inicio de sesión -->
    <div class="d-flex gap-3 flex-wrap justify-content-center">
      
      <!--Registro-->
      <div class="text-center p-4 border border-light border-2 bg-dark bg-opacity-85 text-white rounded-3 shadow-lg" style="min-width: 380px; max-width: 380px;">
        <h3 class="mb-4">Registrarse</h3>
        <form action="" method="post" class="mt-5">
            <input type="text" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" name="nombre" placeholder="Nombre" required>
            <input type="text" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" pattern="[^\s@]+@[^\s@]+\.[^\s@]{1,3}" name="email" placeholder="Email" required>
            <input type="password" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="contraseña1" placeholder="Contraseña" required>
            <small class="text-secondary d-block mb-3">Mínimo 8 caracteres, una mayúscula, una minúscula y un número</small>
            <input type="password" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="contraseña2" placeholder="Confirme contraseña" required>
            <input type="submit" class="btn btn-outline-light btn-lg w-100 mt-2" value="Registrar">
        </form>
        <div class="mt-3">
        <?php
        $contra1 = isset($_POST["contraseña1"]) ? $_POST["contraseña1"] : "";
        $contra2 = isset($_POST["contraseña2"]) ? $_POST["contraseña2"] : "";
        $emailUsuario = isset($_POST["email"]) ? $_POST["email"] : "1";

        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["contraseña1"]) && isset($_POST["contraseña2"])){
          if($contra1 === $contra2){
            $conexion = mysqli_connect("localhost", "root", "", "MH") or
            die("Problemas de conexion");

            $resultado = mysqli_query($conexion, "SELECT userEmail FROM usuarios WHERE userEmail = '$emailUsuario'");

            if($fila = mysqli_fetch_assoc($resultado) == null){

                $nombre = $_POST["nombre"];
                $email = $_POST["email"];
                $hash = password_hash($contra1,PASSWORD_DEFAULT);

                mysqli_query($conexion, "insert into usuarios(userName,userEmail,userPass) values
                ('$nombre','$email','$hash')")
                or die("Problemas en el insert" . mysqli_error($conexion));

                mysqli_close($conexion);
                echo "<p class='text-success mb-0'>Usuario dado de alta</p>";
            }
            else{
                echo "<p class='text-danger mb-0'>Ya existe un usuario con el correo " . $emailUsuario . "</p>";
            }
          }else{
            echo "<p class='text-danger mb-0'>Las contraseñas no coinciden</p>";
          }
                   
        }        
        ?>
        </div>
      </div>

      <!--Inicio sesión-->
      <div class="text-center p-4 border border-light border-2 bg-dark bg-opacity-85 text-white rounded-3 shadow-lg" style="min-width: 380px; max-width: 380px;">
        <h3 class="mb-4">Iniciar sesión</h3>
        <form id="logFormulario" action="LogIn.php" method="post" class="mt-5">
            <input type="text" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" id="email" name="email" placeholder="Email" required>
            <input type="password" class="form-control form-control-lg mb-3 bg-dark text-white border-secondary" id="logPass" name="contraseñaUsuario" placeholder="Contraseña" required>
            <input type="submit" class="btn btn-outline-light btn-lg w-100 mt-2" value="Iniciar sesión">
        </form>
        <div class="mt-3">
        <?php
        $error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
        if($error != ""){
            echo "<p class='text-danger mb-0'>$error</p>";          
            unset($_SESSION["error"]);
        }
        ?>
        </div>
      </div>

    </div>

    <!--Continuar sin sesión - Fuera y debajo-->
    <div class="d-flex align-items-center gap-3 px-4 py-3 border border-light border-2 bg-dark bg-opacity-85 text-white rounded-3 shadow-lg">
        <h5 class="mb-0">Continuar sin iniciar sesión</h5>
        <a href="seleccionPagina.php" class="text-decoration-none">
          <button type="button" class="btn btn-outline-light px-4">Acceder</button>
        </a>
    </div>

  </div>
  <?php session_destroy()?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondo">
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div>
      <!--Registro-->
      <div class="d-inline-block text-center p-3 border bg-dark text-white" style="min-width: 400px; vertical-align: top; min-height: 300px;">
        <h3>Registrarse</h3>
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <input type="text" name="email" placeholder="Email" required><br>
            <!-- La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número-->
            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="contraseña1" placeholder="Contraseña" required><br>
            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="contraseña2" placeholder="Confirme contraseña" required><br><br>
            <input type="submit" class="btn btn-light btn-lg" value="Registrar">
        </form><br>
        <?php

        $contra1 = isset($_POST["contraseña1"]) ? $_POST["contraseña1"] : "";
        $contra2 = isset($_POST["contraseña2"]) ? $_POST["contraseña2"] : "";
        $emailUsuario = isset($_POST["email"]) ? $_POST["email"] : "1";

        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["contraseña1"]) && isset($_POST["contraseña2"]) 
            && $contra1 === $contra2){

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
                echo "Usuario dado de alta";
            }
            else{
                echo "Ya existe un usuario con el correo " . $emailUsuario;
            }        
        }        
        ?>
      </div>

      <!--Inicio sesión-->
      <div class="d-inline-block text-center p-3 border bg-dark text-white" style="min-width: 400px; vertical-align: top; min-height: 300px;">
        <h3>Iniciar sesión</h3>
        <br><br>
        <form id="logFormulario" action="LogIn.php" method="post">
            <input type="text" id="email" name="email" placeholder="Email" required><br>
            <input type="password" id="logPass" name="contraseñaUsuario" placeholder="Contraseña Usuario"required><br><br>
            <input type="submit" class="btn btn-light btn-lg" value="Iniciar sesión">
        </form><br>
        <?php
        session_start();
        $error = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
        if($error != ""){
            echo "<p style='color:red;'>$error</p>";          
            unset($_SESSION["error"]);
        }
        ?>
      </div>

      <!--Continuar sin sesión-->
      <div class="d-inline-block text-center p-3 border bg-dark text-white" style="min-width: 400px; vertical-align: top;min-height: 300px;">
        <h3>Continuar sin iniciar sesión</h3><br><br><br>
        <a href="seleccionPagina.php"><button type="button" class="btn btn-light btn-lg">Acceder</button></a>
      </div>
    </div>
  </div>
</body>
</html>
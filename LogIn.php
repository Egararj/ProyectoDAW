<?php
    
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $contraseñaUsuario = isset($_POST["contraseñaUsuario"]) ? $_POST["contraseñaUsuario"] : "";


    if(isset($_POST["email"]) && isset($_POST["contraseñaUsuario"])){
        
        $conexion = mysqli_connect("localhost","root","","MH") or
        die("Problemas de conexion");

        $resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE userEmail = '$email'");

        if($fila = mysqli_fetch_assoc($resultado)){
            $hashBBDD = $fila["userPass"];
            $perfil = $fila["userEmail"];
            $nombreUsuario = $fila["userName"];
        }else{
            $hashBBDD = "1";
        }

        if($perfil != null){
            if(password_verify($contraseñaUsuario,$hashBBDD)){
                session_start();
                $_SESSION["userName"] = $nombreUsuario;
                $_SESSION["email"] = $email;  
                unset($_SESSION["error"]);       
                header("Location: seleccionPagina.php");
                exit();
            }else{
                session_start();
                $_SESSION["error"] = "Contraseña incorrecta";
                header("Location: index.php");
                exit();
            }
        }else{
            session_start();
            $_SESSION["error"] = "No existe un usuario con el correo:<br>". $email; 
            header("Location: index.php");
            exit();   
        }
    }   
    ?>
</body>
</html>
<?php
    
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $contraseñaUsuario = isset($_POST["contraseñaUsuario"]) ? $_POST["contraseñaUsuario"] : "";
    

    if(isset($_POST["email"]) && isset($_POST["contraseñaUsuario"])){
        $host = "sql100.infinityfree.com";
        $user = "if0_41649473";    
        $pass = "7EVjcACHzYcXFTR";
        $db   = "if0_41649473_mh";  
        $port = 3306;

        $conexion = new mysqli($host,$user,$pass,$db,$port);
            if($conexion->connect_error){
                session_start();
                header("Location: index.php");
                exit(); 
            }

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
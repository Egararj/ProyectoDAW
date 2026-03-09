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
      <div class="d-inline-block text-center p-3 border bg-dark text-white">
        <h3>Seleccione una página</h3>
        <a href="armor.php"><button type="button" class="btn btn-light btn-lg">Armaduras</button></a>
        <button type="button" class="btn btn-light btn-lg">Ejemplo</button>
        <?php
          session_start();
            if(isset($_SESSION["userName"])){           
            ?>
            <a href="cerrarSesion.php"><button type="button" class="btn btn-primary btn-lg">Cerrar sesión</button></a>
            <?php
          }else{
            ?>
            <a href="index.php"><button type="button" class="btn btn-primary btn-lg">Inicio</button></a>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
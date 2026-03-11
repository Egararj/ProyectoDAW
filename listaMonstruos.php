<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Monstruos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon32x32.png">
</head>
<body class="fondo">
    <div class="container-fluid text-center p-1 border bg-dark text-white" style="max-height: 100px;">
      <a href="armor.php"><button type="button" class="btn btn-light btn-sm">Armaduras</button></a>
      <a href="listaMonstruos.php"><button type="button" class="btn btn-light btn-sm">Lista Monstruos</button></a>
      <?php
          session_start();
            if(isset($_SESSION["userName"])){           
            ?>
            <a href="cerrarSesion.php"><button type="button" class="btn btn-primary btn-sm">Cerrar sesión</button></a>
            <?php
          }else{
            ?>
            <a href="index.php"><button type="button" class="btn btn-primary btn-sm">Inicio</button></a>
            <?php
          }
        ?>
    </div>
    
    <div id="contenedor-flex" class="contenedor-flex">
    </div>
  <script src="scriptListaMonstruos.js"></script>
</body>
</html>
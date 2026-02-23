<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armaduras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="fondo">
    <div class="container-fluid text-center p-1 border bg-dark text-white" style="max-height: 100px;">
      <a href="armor.php"><button type="button" class="btn btn-light btn-sm">Armaduras</button></a>
      <button type="button" class="btn btn-light btn-sm">Ejemplo</button>
    </div>
    <div class="contenedor-panel">
        <div class="panel-izquierdo">
                <div class="caja">
                    <div class ="caja-interior" id="head">
                        <img src="img/armor/head-icon.png" style="width: 30px;height: 30px;">
                        <p>Casco</p>
                        <br>
                        <p id="head-title"></p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="chest">
                        <img src="img/armor/chest-icon.png" style="width: 30px;height: 30px;">
                        <p>Pecho</p>
                        <br>
                        <p id="chest-title"></p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="arms">
                        <img src="img/armor/arms-icon.png" style="width: 30px;height: 30px;">
                        <p>Brazos</p>
                        <br>
                        <p id="arms-title"></p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="waist">
                        <img src="img/armor/waist-icon.png" style="width: 30px;height: 30px;">
                        <p>Cintura</p>
                        <br>
                        <p id="waist-title"></p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="legs">
                        <img src="img/armor/legs-icon.png" style="width: 30px;height: 30px;">
                        <p>Piernas</p>
                        <br>
                        <p id="legs-title"></p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="charm">
                        <img src="img/armor/charm-icon.png" style="width: 30px;height: 30px;">
                        <p>Amuleto</p>
                    </div>
                </div>
        </div>
        <div class="panel-derecho">
                <div class="caja">1</div>

        </div>
    </div>
<dialog id="modal">
    <p>Seleccione una parte de armadura</p>
    <ul id="ul-modal">
    </ul>
</dialog>
<script src="scriptArmor.js"></script>
</body>
</html>
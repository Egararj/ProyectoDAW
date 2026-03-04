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
                        <p>Cabeza</p>
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
                    <div class ="caja-interior" id="gloves">
                        <img src="img/armor/arms-icon.png" style="width: 30px;height: 30px;">
                        <p>Brazos</p>
                        <br>
                        <p id="gloves-title"></p>
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
                        <br>
                        <p id="charm-title"></p>
                    </div>
                </div>
        </div>
        <div class="panel-derecho">
                <div class="cajaInfo">
                    <div class="container-fluid">
                        <div style="display: flex;">
                            <div style="width: 80%;">
                                <button type="button" class="btn btn-light btn-sm">Set 1</button>
                                <button type="button" class="btn btn-light btn-sm">Set 2</button>
                                <button type="button" class="btn btn-light btn-sm">Set 3</button>
                            </div>
                            <div style ="width: 20%;" class="text-end">
                                <button type="button" class="btn btn-danger btn-sm" id="borrarTodo">Borrar</button>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <hr>
                        <h3>Defensa</h3>
                        <hr>
                        <ul id="ul-defensa">
                            <li>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/defense-icon.png" class="img-icono"> 
                                        <span>Defensa</span>
                                    </div>
                                    <div id="defense">0</div>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; justify-content: space-between; background-color: rgba(120, 120, 120, 0.3)">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/fire-icon.png" class="img-icono"> 
                                        <span>Fuego</span>
                                    </div>
                                    <div id="fire">0</div>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/water-icon.png" class="img-icono"> 
                                        <span>Agua</span>
                                    </div>
                                    <div id="water">0</div>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; justify-content: space-between; background-color: rgba(120, 120, 120, 0.3)">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/thunder-icon.png" class="img-icono"> 
                                        <span>Trueno</span>
                                    </div>
                                    <div id="thunder">0</div>
                                </div> 
                            </li>
                            <li>
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/ice-icon.png" class="img-icono"> 
                                        <span>Hielo</span>
                                    </div>
                                    <div id="ice">0</div>
                                </div>
                            </li>
                            <li>
                                <div style="display: flex; justify-content: space-between; background-color: rgba(120, 120, 120, 0.3)">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <img src="img/def/dragon-icon.png" class="img-icono"> 
                                        <span>Dragón</span>
                                    </div>
                                    <div id="dragon">0</div>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <h3>Habilidades</h3>
                        <hr>
                        <ul id="ul-habilidades"></ul>
                        </ul>
                    </div>
                </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armaduras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon32x32.png">
</head>
<body class="fondo">
    <div id="cargando">
        <img src="img/felyne.gif" style="width: 100px; height: 100px; margin: 20px;;">
        <p> Cargando datos... </p>
        <img src="img/felyne.gif" style="width: 100px; height: 100px; margin: 20px;;">
    </div>
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
    <div class="contenedor-panel">
        <div class="panel-izquierdo">
                <div class="caja">
                    <div class ="caja-interior" id="head">
                        <img src="img/armor/head-icon.png" style="width: 30px;height: 30px;">
                        <p>Casco</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarHead">X</button></div>
                        <br>
                        <p id="head-title">Click aquí para seleccionar un casco</p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="chest">
                        <img src="img/armor/chest-icon.png" style="width: 30px;height: 30px;">
                        <p>Pechera</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarChest">X</button></div>
                        <br>
                        <p id="chest-title">Click aquí para seleccionar una pechera</p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="gloves">
                        <img src="img/armor/arms-icon.png" style="width: 30px;height: 30px;">
                        <p>Guantes</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarGloves">X</button></div>
                        <br>
                        <p id="gloves-title">Click aquí para seleccionar unos guantes</p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="waist">
                        <img src="img/armor/waist-icon.png" style="width: 30px;height: 30px;">
                        <p>Muslera</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarWaist">X</button></div>
                        <br>
                        <p id="waist-title">Click aquí para seleccionar una muslera</p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="legs">
                        <img src="img/armor/legs-icon.png" style="width: 30px;height: 30px;">
                        <p>Perneras</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarLegs">X</button></div>
                        <br>
                        <p id="legs-title">Click aquí para seleccionar unas perneras</p>
                    </div>
                </div>
                <div class="caja">
                    <div class ="caja-interior" id="charm">
                        <img src="img/armor/charm-icon.png" style="width: 30px;height: 30px;">
                        <p>Amuleto</p>
                        <div class="text-end" style="flex:1"><button type="button" class="btn btn-danger btn-sm fw-bold text-white" id="borrarCharm">X</button></div>
                        <br>
                        <p id="charm-title">Click aquí para seleccionar un amuleto</p>
                    </div>
                </div>
        </div>
        <div class="panel-derecho">
                <div class="cajaInfo">
                    <div class="container-fluid">
                        <div style="display: flex;">
                            <div style="width: 85%;">
                                <?php
                                    if(isset($_SESSION["userName"])){           
                                    ?>
                                    <label>Cargar set:</label>
                                    <button id="btnSet1" type="button" class="btn btn-light btn-sm">Set 1</button>
                                    <button id="btnSet2" type="button" class="btn btn-light btn-sm">Set 2</button>
                                    <button id="btnSet3" type="button" class="btn btn-light btn-sm">Set 3</button>
                                    <br><br>
                                    <label>Guardar set:</label>
                                    <select id="selectSet" class="form-select d-inline-block" aria-label="Small select example" style="width: 85px;">
                                        <option selected value="1">Set 1</option>
                                        <option value="2">Set 2</option>
                                        <option value="3">Set 3</option>
                                    </select>
                                    <button type="button" class="btn btn-light" id="guardarSet">Guardar</button>
                                    <?php
                                    }
                                    ?>
                            </div>
                            <div style ="width: 15%;" class="text-end">
                                <button type="button" class="btn btn-danger btn-sm" id="borrarTodo" title="Limpia los campos de armadura y amuleto">Borrar</button>
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
    <p id="tituloModal">Seleccione una parte de armadura</p>
    <ul id="ul-modal">
    </ul>
</dialog>
<script src="scriptArmor.js"></script>
</body>
</html>
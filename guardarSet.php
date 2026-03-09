<?php
session_start();

if(!isset($_SESSION["userName"])) {
    echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
    exit;
}

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

$setCompleto = $datos['setCompleto'];
$numeroSet = $datos['numeroSet'];

$conexion = mysqli_connect("localhost", "root", "", "MH") or die("Error de conexión");

$email = $_SESSION["email"];
$setJson = json_encode($setCompleto);
$setJson = mysqli_real_escape_string($conexion, $setJson);

$columna = "set" . $numeroSet;

$query = "UPDATE usuarios SET $columna = '$setJson' WHERE userEmail = '$email'";

if(mysqli_query($conexion, $query)) {
    echo json_encode(['success' => true, 'message' => 'Set ' . $numeroSet . ' guardado correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conexion)]);
}

mysqli_close($conexion);
?>
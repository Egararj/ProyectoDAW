<?php
session_start();

$numeroSet = $_GET['set'];
$email = $_SESSION["email"];

$conexion = mysqli_connect("localhost", "root", "", "MH");
$columna = "set" . $numeroSet;

$query = "SELECT $columna FROM usuarios WHERE userEmail = '$email'";
$resultado = mysqli_query($conexion, $query);
$fila = mysqli_fetch_assoc($resultado);

if($fila && $fila[$columna]) {
    $setCompleto = json_decode($fila[$columna], true);
    echo json_encode(['success' => true, 'setCompleto' => $setCompleto]);
} else {
    echo json_encode(['success' => false, 'message' => 'Set vacío']);
}

mysqli_close($conexion);
?>
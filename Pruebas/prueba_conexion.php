<?php
require_once __DIR__ . '/../conexionBaseDatos.php';

try {
    $conexion = Conectarse();
    echo "Conexion exitosa con la base de datos centromedico.";
    $conexion->close();
} catch (Throwable $error) {
    echo "Error de conexion: " . $error->getMessage();
}

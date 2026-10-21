
<?php
require_once __DIR__ . '/../conexionBaseDatos.php';

try {
    $conexion = Conectarse();
    $resultado = $conexion->query("SHOW TABLES");

    echo "TABLAS DE LA BASE DE DATOS CENTROMEDICO:\n";

    while ($fila = $resultado->fetch_row()) {
        echo "- " . $fila[0] . "\n";
    }

    $conexion->close();
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage();
}


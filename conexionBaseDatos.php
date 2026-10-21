<?php
// Conexión compatible con el nombre Conectarse() del modelo docente.
function Conectarse(): mysqli {
    $conexion = new mysqli(
    'localhost',
    'root',
    getenv('SOFTCLINIC_DB_PASSWORD') ?: '',
    'centromedico'
);
    if ($conexion->connect_error) {
        throw new RuntimeException('No fue posible conectar a la base de datos: ' . $conexion->connect_error);
    }
    $conexion->set_charset('utf8mb4');
    return $conexion;
}

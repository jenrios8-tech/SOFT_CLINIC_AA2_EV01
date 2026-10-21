
<?php
require_once __DIR__ . '/../consultorio.php';

try {
    $consultorio = new Consultorio();

    $datos = $consultorio->consultarConsultorio(1);

    if ($datos !== null) {
        echo "CONSULTORIO ENCONTRADO:\n";
        echo "ID: " . $datos['idConsultorio'] . "\n";
        echo "Codigo: " . $datos['conCodigo'] . "\n";
        echo "Nombre: " . $datos['conNombre'] . "\n";
        echo "Ubicacion: " . $datos['conUbicacion'] . "\n";
        echo "Capacidad: " . $datos['conCapacidad'] . "\n";
        echo "Estado: " . $datos['conEstado'] . "\n";
    } else {
        echo "No se encontro el consultorio.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

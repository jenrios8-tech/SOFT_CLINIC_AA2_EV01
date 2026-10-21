
<?php
require_once __DIR__ . '/../medico.php';

try {
    $medico = new Medico();
    $datos = $medico->consultarMedico(1);

    if ($datos !== null) {
        echo "MEDICO ENCONTRADO:\n";
        echo "ID: " . $datos['idMedico'] . "\n";
        echo "Nombre: " . $datos['medNombres'] . "\n";
        echo "Apellido: " . $datos['medApellidos'] . "\n";
        echo "Especialidad: " . $datos['medEspecialidad'] . "\n";
    } else {
        echo "No se encontro el medico.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

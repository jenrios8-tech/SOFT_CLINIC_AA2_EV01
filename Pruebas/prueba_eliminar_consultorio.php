
<?php
require_once __DIR__ . '/../consultorio.php';

try {
    $consultorio = new Consultorio();

    if ($consultorio->eliminarConsultorio(1)) {
        echo "Operacion de eliminacion ejecutada correctamente.\n";
    } else {
        echo "No fue posible eliminar el consultorio.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

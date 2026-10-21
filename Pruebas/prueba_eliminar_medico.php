
<?php
require_once __DIR__ . '/../medico.php';

try {
    $medico = new Medico();

    if ($medico->eliminarMedico(1)) {
        echo "Operacion de eliminacion ejecutada correctamente.\n";
    } else {
        echo "No fue posible eliminar el medico.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

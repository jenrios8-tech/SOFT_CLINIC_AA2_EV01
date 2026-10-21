
<?php
require_once __DIR__ . '/../medico.php';

try {
    $medico = new Medico(
        'TEST1001',
        'Carlos',
        'Ramirez',
        'Pediatria',
        '3001234567',
        'carlos.prueba@example.com'
    );

    if ($medico->actualizarMedico(1)) {
        echo "Medico actualizado correctamente.\n";
    } else {
        echo "No fue posible actualizar el medico.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

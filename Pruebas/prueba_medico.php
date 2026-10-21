
<?php
require_once __DIR__ . '/../medico.php';

try {
    $medico = new Medico(
        'TEST1001',
        'Carlos',
        'Ramirez',
        'Medicina General',
        '3001234567',
        'carlos.prueba@example.com'
    );

    if ($medico->agregarMedico()) {
        echo "Medico registrado correctamente.\n";
    } else {
        echo "No fue posible registrar el medico.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

<?php
require_once __DIR__ . '/../consultorio.php';

try {
    $consultorio = new Consultorio(
        'CONS001',
        'Consultorio General 1',
        'Primer piso',
        '3',
        'Disponible'
    );

    if ($consultorio->agregarConsultorio()) {
        echo "Consultorio registrado correctamente.\n";
    } else {
        echo "No fue posible registrar el consultorio.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

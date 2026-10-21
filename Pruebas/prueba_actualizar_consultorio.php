
<?php
require_once __DIR__ . '/../consultorio.php';

try {
    $consultorio = new Consultorio(
        'CONS001',
        'Consultorio General 1',
        'Segundo piso',
        '4',
        'Disponible'
    );

    if ($consultorio->actualizarConsultorio(1)) {
        echo "Consultorio actualizado correctamente.\n";
    } else {
        echo "No fue posible actualizar el consultorio.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

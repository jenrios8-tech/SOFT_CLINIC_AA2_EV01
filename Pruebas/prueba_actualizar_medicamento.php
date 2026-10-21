
<?php
require_once __DIR__ . '/../medicamento.php';

try {
    $medicamento = new Medicamento(
        'MED001',
        'Acetaminofen',
        'Tabletas',
        '500 mg',
        '150',
        '2028-12-31'
    );

    if ($medicamento->actualizarMedicamento(1)) {
        echo "Medicamento actualizado correctamente.\n";
    } else {
        echo "No fue posible actualizar el medicamento.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}


<?php
require_once __DIR__ . '/../medicamento.php';

try {
    $medicamento = new Medicamento(
        'MED001',
        'Acetaminofen',
        'Tabletas',
        '500 mg',
        '100',
        '2028-12-31'
    );

    if ($medicamento->agregarMedicamento()) {
        echo "Medicamento registrado correctamente.\n";
    } else {
        echo "No fue posible registrar el medicamento.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

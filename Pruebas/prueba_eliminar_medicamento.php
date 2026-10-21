
<?php
require_once __DIR__ . '/../medicamento.php';

try {
    $medicamento = new Medicamento();

    if ($medicamento->eliminarMedicamento(1)) {
        echo "Operacion de eliminacion ejecutada correctamente.\n";
    } else {
        echo "No fue posible eliminar el medicamento.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

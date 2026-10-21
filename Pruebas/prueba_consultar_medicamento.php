
<?php
require_once __DIR__ . '/../medicamento.php';

try {
    $medicamento = new Medicamento();

    $datos = $medicamento->consultarMedicamento(1);

    if ($datos !== null) {
        echo "MEDICAMENTO ENCONTRADO:\n";
        echo "ID: " . $datos['idMedicamento'] . "\n";
        echo "Codigo: " . $datos['farCodigo'] . "\n";
        echo "Nombre: " . $datos['farNombre'] . "\n";
        echo "Presentacion: " . $datos['farPresentacion'] . "\n";
        echo "Concentracion: " . $datos['farConcentracion'] . "\n";
        echo "Cantidad: " . $datos['farCantidad'] . "\n";
        echo "Vencimiento: " . $datos['farFechaVencimiento'] . "\n";
    } else {
        echo "No se encontro el medicamento.\n";
    }
} catch (Throwable $error) {
    echo "Error: " . $error->getMessage() . "\n";
}


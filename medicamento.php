<?php
require_once __DIR__ . '/conexionBaseDatos.php';
class Medicamento
{
    // Atributos privados y métodos de acceso (encapsulamiento).
    private $codigo;
    private $nombre;
    private $presentacion;
    private $concentracion;
    private $cantidad;
    private $fechaVencimiento;

    public function __construct($codigo = null, $nombre = null, $presentacion = null, $concentracion = null, $cantidad = null, $fechaVencimiento = null)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->presentacion = $presentacion;
        $this->concentracion = $concentracion;
        $this->cantidad = $cantidad;
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setCodigo($valor): void { $this->codigo = $valor; }
    public function getCodigo() { return $this->codigo; }
    public function setNombre($valor): void { $this->nombre = $valor; }
    public function getNombre() { return $this->nombre; }
    public function setPresentacion($valor): void { $this->presentacion = $valor; }
    public function getPresentacion() { return $this->presentacion; }
    public function setConcentracion($valor): void { $this->concentracion = $valor; }
    public function getConcentracion() { return $this->concentracion; }
    public function setCantidad($valor): void { $this->cantidad = $valor; }
    public function getCantidad() { return $this->cantidad; }
    public function setFechaVencimiento($valor): void { $this->fechaVencimiento = $valor; }
    public function getFechaVencimiento() { return $this->fechaVencimiento; }

    public function agregarMedicamento(): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("INSERT INTO medicamentos (farCodigo,farNombre,farPresentacion,farConcentracion,farCantidad,farFechaVencimiento) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssis", $this->codigo, $this->nombre, $this->presentacion, $this->concentracion, $this->cantidad, $this->fechaVencimiento);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function consultarMedicamento(int $id): ?array
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("SELECT * FROM medicamentos WHERE idMedicamento = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $fila = $stmt->get_result()->fetch_assoc();
            return $fila ?: null;
        } finally { $db->close(); }
    }

    public function actualizarMedicamento(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("UPDATE medicamentos SET farCodigo=?, farNombre=?, farPresentacion=?, farConcentracion=?, farCantidad=?, farFechaVencimiento=? WHERE idMedicamento=?");
            $stmt->bind_param("ssssisi", $this->codigo, $this->nombre, $this->presentacion, $this->concentracion, $this->cantidad, $this->fechaVencimiento, $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function eliminarMedicamento(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("DELETE FROM medicamentos WHERE idMedicamento=?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function listarMedicamento(): array
    {
        $db = Conectarse();
        try {
            $resultado = $db->query("SELECT * FROM medicamentos ORDER BY idMedicamento DESC");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } finally { $db->close(); }
    }
}

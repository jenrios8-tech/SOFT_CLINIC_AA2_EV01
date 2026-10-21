<?php
require_once __DIR__ . '/conexionBaseDatos.php';
class Consultorio
{
    // Atributos privados y métodos de acceso (encapsulamiento).
    private $codigo;
    private $nombre;
    private $ubicacion;
    private $capacidad;
    private $estado;

    public function __construct($codigo = null, $nombre = null, $ubicacion = null, $capacidad = null, $estado = null)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->capacidad = $capacidad;
        $this->estado = $estado;
    }

    public function setCodigo($valor): void { $this->codigo = $valor; }
    public function getCodigo() { return $this->codigo; }
    public function setNombre($valor): void { $this->nombre = $valor; }
    public function getNombre() { return $this->nombre; }
    public function setUbicacion($valor): void { $this->ubicacion = $valor; }
    public function getUbicacion() { return $this->ubicacion; }
    public function setCapacidad($valor): void { $this->capacidad = $valor; }
    public function getCapacidad() { return $this->capacidad; }
    public function setEstado($valor): void { $this->estado = $valor; }
    public function getEstado() { return $this->estado; }

    public function agregarConsultorio(): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("INSERT INTO consultorios (conCodigo,conNombre,conUbicacion,conCapacidad,conEstado) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssis", $this->codigo, $this->nombre, $this->ubicacion, $this->capacidad, $this->estado);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function consultarConsultorio(int $id): ?array
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("SELECT * FROM consultorios WHERE idConsultorio = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $fila = $stmt->get_result()->fetch_assoc();
            return $fila ?: null;
        } finally { $db->close(); }
    }

    public function actualizarConsultorio(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("UPDATE consultorios SET conCodigo=?, conNombre=?, conUbicacion=?, conCapacidad=?, conEstado=? WHERE idConsultorio=?");
            $stmt->bind_param("sssisi", $this->codigo, $this->nombre, $this->ubicacion, $this->capacidad, $this->estado, $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function eliminarConsultorio(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("DELETE FROM consultorios WHERE idConsultorio=?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function listarConsultorio(): array
    {
        $db = Conectarse();
        try {
            $resultado = $db->query("SELECT * FROM consultorios ORDER BY idConsultorio DESC");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } finally { $db->close(); }
    }
}

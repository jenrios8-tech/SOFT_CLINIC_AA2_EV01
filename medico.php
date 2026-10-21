<?php
require_once __DIR__ . '/conexionBaseDatos.php';
class Medico
{
    // Atributos privados y métodos de acceso (encapsulamiento).
    private $identificacion;
    private $nombres;
    private $apellidos;
    private $especialidad;
    private $telefono;
    private $correo;

    public function __construct($identificacion = null, $nombres = null, $apellidos = null, $especialidad = null, $telefono = null, $correo = null)
    {
        $this->identificacion = $identificacion;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->especialidad = $especialidad;
        $this->telefono = $telefono;
        $this->correo = $correo;
    }

    public function setIdentificacion($valor): void { $this->identificacion = $valor; }
    public function getIdentificacion() { return $this->identificacion; }
    public function setNombres($valor): void { $this->nombres = $valor; }
    public function getNombres() { return $this->nombres; }
    public function setApellidos($valor): void { $this->apellidos = $valor; }
    public function getApellidos() { return $this->apellidos; }
    public function setEspecialidad($valor): void { $this->especialidad = $valor; }
    public function getEspecialidad() { return $this->especialidad; }
    public function setTelefono($valor): void { $this->telefono = $valor; }
    public function getTelefono() { return $this->telefono; }
    public function setCorreo($valor): void { $this->correo = $valor; }
    public function getCorreo() { return $this->correo; }

    public function agregarMedico(): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("INSERT INTO medicos (medIdentificacion,medNombres,medApellidos,medEspecialidad,medTelefono,medCorreo) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss", $this->identificacion, $this->nombres, $this->apellidos, $this->especialidad, $this->telefono, $this->correo);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function consultarMedico(int $id): ?array
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("SELECT * FROM medicos WHERE idMedico = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $fila = $stmt->get_result()->fetch_assoc();
            return $fila ?: null;
        } finally { $db->close(); }
    }

    public function actualizarMedico(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("UPDATE medicos SET medIdentificacion=?, medNombres=?, medApellidos=?, medEspecialidad=?, medTelefono=?, medCorreo=? WHERE idMedico=?");
            $stmt->bind_param("ssssssi", $this->identificacion, $this->nombres, $this->apellidos, $this->especialidad, $this->telefono, $this->correo, $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function eliminarMedico(int $id): bool
    {
        $db = Conectarse();
        try {
            $stmt = $db->prepare("DELETE FROM medicos WHERE idMedico=?");
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        } finally { $db->close(); }
    }

    public function listarMedico(): array
    {
        $db = Conectarse();
        try {
            $resultado = $db->query("SELECT * FROM medicos ORDER BY idMedico DESC");
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } finally { $db->close(); }
    }
}

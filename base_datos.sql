CREATE DATABASE IF NOT EXISTS centromedico CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE centromedico;
-- Tablas de las tres clases nuevas. No se alteran las tablas del modelo docente.
CREATE TABLE IF NOT EXISTS medicos (
  idMedico INT AUTO_INCREMENT PRIMARY KEY,
  medIdentificacion VARCHAR(150) NOT NULL,
  medNombres VARCHAR(150) NOT NULL,
  medApellidos VARCHAR(150) NOT NULL,
  medEspecialidad VARCHAR(150) NOT NULL,
  medTelefono VARCHAR(150) NOT NULL,
  medCorreo VARCHAR(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS consultorios (
  idConsultorio INT AUTO_INCREMENT PRIMARY KEY,
  conCodigo VARCHAR(150) NOT NULL,
  conNombre VARCHAR(150) NOT NULL,
  conUbicacion VARCHAR(150) NOT NULL,
  conCapacidad INT NOT NULL DEFAULT 0,
  conEstado VARCHAR(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS medicamentos (
  idMedicamento INT AUTO_INCREMENT PRIMARY KEY,
  farCodigo VARCHAR(150) NOT NULL,
  farNombre VARCHAR(150) NOT NULL,
  farPresentacion VARCHAR(150) NOT NULL,
  farConcentracion VARCHAR(150) NOT NULL,
  farCantidad INT NOT NULL DEFAULT 0,
  farFechaVencimiento DATE NULL
);

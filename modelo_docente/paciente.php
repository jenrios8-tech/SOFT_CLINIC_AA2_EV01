<?php
class Paciente
{
	//Definición de Atributos
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $fechaNacimiento;
	private $sexo;
	private $Conexion;
	

	//Método Constructor
	public function crearPaciente($identificacion,$nombres,$apellidos,$fechaNacimiento,$sexo)
	{
		$this->identificacion=$identificacion;
		$this->nombres=$nombres;
		$this->apellidos=$apellidos;
		$this->fechaNacimiento=$fechaNacimiento;
		$this->sexo=$sexo;
	}

	//Definición de Métodos 
	//Accesores-Consultores o Modificadores-Fijadores
	public function setIdentificacion($identificacion)
	{
		$this->identificacion=$identificacion;
	}
	
	public function getIdentificacion()
	{
		return ($this->identificacion);
	}
	
	public function setNombres($nombres)
	{
		$this->nombres=$nombres;
	}
	
	public function getNombres()
	{
		return ($this->nombres);
	}
	
	public function setApellidos($apellidos)
	{
		$this->apellidos=$apellidos;
	}
	
	public function getApellidos()
	{
		return ($this->apellidos);
	}	
	
	public function setFechaNacimiento($fechaNacimiento)
	{
		$this->fechaNacimiento=$fechaNacimiento;
	}
	
	public function getFechaNacimiento()
	{
		return ($this->fechaNacimiento);
	}	
	
	public function setSexo($sexo)
	{
		$this->sexo=$sexo;
	}
	
	public function getSexo()
	{
		return ($this->sexo);
	}

	//Métodos Asociados al CRUD y Otros
	public function agregarPaciente()
	{	
		$this->Conexion=Conectarse();
		$sql="insert into pacientes(pacIdentificacion,pacNombres,pacApellidos,pacFechaNacimiento,pacSexo)
			values ('$this->identificacion','$this->nombres','$this->apellidos','$this->fechaNacimiento','$this->sexo')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function consultarPaciente($identificacion)
	{
		$this->Conexion=Conectarse();
		$sql="select * from pacientes where pacIdentificacion='$identificacion'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function actualizarPaciente()
	{	
		$this->Conexion=Conectarse();
		$sql="update pacientes set pacIdentificacion='$this->identificacion',pacNombres='$this->nombres',pacApellidos='$this->apellidos',pacFechaNacimiento='$this->fechaNacimiento',pacSexo='$this->sexo' where idPaciente = '$_POST[idPaciente]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function listarPacientes()
	{
		$this->Conexion=Conectarse();
		$sql="select * from pacientes";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}	
}

?>


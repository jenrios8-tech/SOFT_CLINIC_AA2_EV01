<?php
class Usuario
{
	//Definición de Atributos
	private $usuario;
	private $password;
	private $estado;
	private $rol;
	private $Conexion;
	

	//Método Constructor
	public function crearUsuario($usuario, $password, $estado, $rol)
	{
		$this->usuario=$usuario;
		$this->password=$password;
		$this->estado=$estado;
		$this->rol=$rol;
		
	}

	//Definición de Métodos 
	//Accesores-Consultores o Modificadores-Fijadores
	public function setUsuario($usuario)
	{
		$this->usuario=$usuario;
	}
	
	public function getUsuario()
	{
		return ($this->usuario);
	}
	
	public function setPassword($password)
	{
		$this->password=$password;
	}
	
	public function getPassword()
	{
		return ($this->password);
	}
	
	public function setEstado($estado)
	{
		$this->estado=$estado;
	}
	
	public function getEstado()
	{
		return ($this->estado);
	}
	
	public function setRol($rol)
	{
		$this->rol=$rol;
	}
	
	public function getRol()
	{
		return ($this->rol);
	}
	
	//Métodos Asociados al CRUD y Otros
	public function agregarUsuario()
	{	
		$this->Conexion=Conectarse();
		$sql="insert into usuarios(usuLogin, usuPassword, usuEstado, usuRol)
			values ('$this->usuario',md5('$this->password'),'$this->estado','$this->rol')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function consultarUsuario($usuario)
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios where usuLogin='$usuario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
		
	public function actualizarUsuario()
	{	
		$this->Conexion=Conectarse();
		$sql="update usuarios set usuLogin='$this->usuario',usuPassword='$this->password',usuEstado='$this->estado',usuRol='$this->rol' where idUsuario = '$_POST[idUsuario]'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

	public function listarUsuario()
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}	
	
}

?>
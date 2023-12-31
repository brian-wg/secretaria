<?php 

class Persona{

	protected $id_persona;
    protected $nombre_usuario;
	protected $nombre;
	protected $apellido;
    protected $dni;
	protected $email;
    protected $telefono;
    protected $domicilio;
    protected $situacion_revista;
    protected $fecha_toma_posicion;
    protected $rol;

	public function __construct ($nombre_usuario, $nombre, $apellido, $dni,
    $email, $telefono, $domicilio, $situacion_revista, $fecha_toma_posicion,
     $rol, $id_persona = null){

		$this->id_persona = $id_persona;
        $this->nombre_usuario = $nombre_usuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
        $this->dni = $dni;
		$this->email = $email;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->situacion_revista = $situacion_revista;
        $this->fecha_toma_posicion = $fecha_toma_posicion;
        $this->rol = $rol;
	}

	public function getIdUsuario() {
		return $this->id_persona;
	}
    public function setIdUsuario($id_persona) {
    	 $this->id_persona = $id_persona;
    }
    public function getUsuario() {
        return $this->nombre_usuario;
    }
    public function getNombre() {
    	return $this->nombre;
    }
    public function getApellido() {
    	return $this->apellido;
    }
    public function getDni() {
        return $this->dni;
    }
    public function getEmail() {
    	return $this->email;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getDomicilio() {
        return $this->domicilio;
    }
    public function getSituacionRevista() {
        return $this->situacion_revista;
    }
    public function getFechaTomaPosicion() {
        return $this->fecha_toma_posicion;
    }
    public function getRol() {
        return $this->rol;
    }
    public function getNombreApellido(){
    	return $this->nombre." ".$this->apellido;
    }

   
}


 ?>
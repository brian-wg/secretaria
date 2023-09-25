<?php 
require_once 'RepositorioPersona.php';
require_once 'RepositorioLicencia.php';
require_once 'Persona.php';
require_once 'Licencia.php';

class ControladorSesion{

	protected $email = null;

	public function login($email, $clave){

		$r = new RepositorioPersona();
		$persona = $r->login($email, $clave);

		if ($persona === false){
			return [false, "email o clave incorrecta"];
		}
		else {
			session_start();
			$_SESSION['email'] = serialize($email);
			return [true, "Ingreso correcto"];
		}
	}

	public function create($nombre, $apellido, $dni, $email, $telefono,
	$domicilio, $situacion_revista, $fecha_toma_posicion, $clave, $rol){

		$r = new RepositorioPersona();
		$persona = new Persona($nombre, $apellido, $dni, $email, $telefono, $domicilio, $situacion_revista, $fecha_toma_posicion, $rol);
		$id = $r->save($persona, $clave);
		if ($id ===false) {
			return [false, "No se pudo crear el usuario"];
		} 
		else {
			$persona->setIdPersona($id);
			session_start();
			$_SESSION['email'] = serialize($persona);
			return [true, "Usuario creado con exito!"];
		}
	}
}
 ?>
<?php 
require_once 'RepositorioPersona.php';
require_once 'RepositorioLicencias.php';
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
}


 ?>
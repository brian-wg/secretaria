<?php 
require_once '.env.php';
require_once 'Persona.php';
require_once 'Licencia.php';

class RepositorioPersona{

	private static $conexion = null;

	public function __construct(){

		if (is_null(self::$conexion)) {
			$credenciales = credenciales();	
			self::$conexion = new mysqli(
				$credenciales['servidor'],
				$credenciales['usuario'],
				$credenciales['clave'],
				$credenciales['base_de_datos']
			);
			if (self::$conexion->connect_error){
				$error = 'Error al conectar:' . self::$conexion->connect_error;
				self::$connexion = null;
				die($error);
			}
			self::$conexion->set_charset('utf8mb4');
		}
	}

	public function login($email, $clave){
		$q = "SELECT * FROM persona WHERE email = ?";
		$query = self::$conexion->prepare($q);
		$query->bind_param('s', $email);

		if ($query->execute()){
			$query->bind_result($id_persona, $nombre, $apellido, $dni, $email, $telefono
			$domicilio, $situacion_revista, $fecha_toma_posicion, $clave_encriptada, $rol   
			);
			if ($query->fetch()) {
				if (password_verify($clave, $clave_encriptada)){

					return new Persona($nombre, $apellido, $dni, $email, $telefono,
					$domicilio, $situacion_revista, $fecha_toma_posicion, $rol);
				}
			}
		}
		return false;
	} 
}
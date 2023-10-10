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

	public function login($nombre_usuario, $clave){
		$q = "SELECT * FROM persona WHERE usuario = ?";
		$query = self::$conexion->prepare($q);
		$query->bind_param('s', $nombre_usuario);

		if ($query->execute()){
			$query->bind_result($id_persona, $nombre_usuario, $nombre, $apellido, $dni, $email, $telefono,
			$domicilio, $situacion_revista, $fecha_toma_posicion, $clave_encriptada, $rol   
			);
			if ($query->fetch()) {
				if (password_verify($clave, $clave_encriptada)){

					return new Persona($nombre_usuario, $nombre, $apellido, $dni, $email, $telefono,
					$domicilio, $situacion_revista, $fecha_toma_posicion, $rol, $id_persona);
				}
			}
		}
		return false;
	} 

	public function save(Persona $usuario, $clave){

		$q = "INSERT INTO persona (usuario, nombre, apellido, dni, email, telefono, domicilio, 
		situacion_revista, fecha_toma_posicion, clave, rol)";
		$q.= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query = self::$conexion->prepare($q);
		$nombre_usuario = $usuario->getUsuario();
		$nombre = $usuario->getNombre();
		$apellido = $usuario->getApellido();
		$dni = $usuario->getDni();
		$email = $usuario->getEmail();
		$telefono = $usuario->getTelefono();
		$domicilio = $usuario->getDomicilio();
		$situacion_revista = $usuario->getSituacionRevista();
		$fecha_toma_posicion = $usuario->getFechaTomaPosicion();
		$clave_encriptada = password_hash($clave, PASSWORD_DEFAULT);
		$rol = $usuario->getRol();	
			$query->bind_param("sssdsdsssss",
			$nombre_usuario,	
			$nombre,
			$apellido,
			$dni,
			$email,
			$telefono,
			$domicilio,
			$situacion_revista,
			$fecha_toma_posicion,
			$clave_encriptada,
			$rol
		);

		if ($query->execute()){
		return self::$conexion->insert_id;
		} else{

			die("Error en la ejecución de la consulta: " . $query->error);
		}
	}

	public function listaDocentes($rol){
		$q = "SELECT id_persona, nombre, apellido FROM persona WHERE rol = ?";
		$query = self::$conexion->prepare($q);
		$query->bind_param('s', $rol);

		if ($query->execute()){
			$query->bind_result($id_persona, $nombre, $apellido);
			$docentes = [];
			while ($query->fetch()) {
				$docentes[] = ["id_persona" => $id_persona, "nombre" => $nombre, "apellido" => $apellido];
			}
		return $docentes;
		}
		return false;
	} 
}
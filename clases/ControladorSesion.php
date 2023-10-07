<?php 
require_once 'RepositorioPersona.php';
require_once 'RepositorioLicencia.php';
require_once 'Persona.php';
require_once 'Licencia.php';

class ControladorSesion{

	protected $usuario = null;

	public function login($nombre_usuario, $clave){

		$r = new RepositorioPersona();
		$usuario = $r->login($nombre_usuario, $clave);

		if ($usuario === false){
			return [false, "usuario o clave incorrecta"];
		}
		else {
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Ingreso correcto"];
		}
	}

	public function create($nombre_usuario, $nombre, $apellido, $dni, $email, $telefono,
	$domicilio, $situacion_revista, $fecha_toma_posicion, $clave, $rol){

		$r = new RepositorioPersona();
		$usuario = new Persona($nombre_usuario, $nombre, $apellido, $dni, $email, $telefono, $domicilio, $situacion_revista, $fecha_toma_posicion, $rol);
		$id = $r->save($usuario, $clave);
		if ($id ===false) {
			return [false, "No se pudo crear el usuario"];
		} 
		else {
			$usuario->setIdUsuario($id);
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Usuario creado con exito!"];
		}
	}

	public function modificarFechaInicio($fecha_inicio, licencia $licencia)
    {
        $repo = new RepositorioLicencia();
        $licencia->setFechaInicio($fecha_inicio);

        if ($repo->updateFechaInicio($fecha_inicio, $licencia)) {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Datos actualizados correctamente"];
        } else {
            return [false, "Error al actualizar datos"];
        }
    }

	public function modificarFechaFin($fecha_fin, Licencia $licencia)
    {
        $repo = new RepositorioLicencia();
        $licencia->setFechaFin($fecha_fin);

        if ($repo->updateFechaFin($fecha_fin, $licencia)) {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Datos actualizados correctamente"];
        } else {
            return [false, "Error al actualizar datos"];
        }
    }

	public function modificarEstado($estado, Licencia $licencia)
    {
        $repo = new RepositorioLicencia();
        $licencia->setEstado($estado);

        if ($repo->updateEstado($estado, $licencia)) {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Datos actualizados correctamente"];
        } else {
            return [false, "Error al actualizar datos"];
        }
    }

	public function modificarTipoLicencia($id_tipo_licencia, Licencia $licencia)
    {
        $repo = new RepositorioLicencia();
        $licencia->setTipoLicencia($id_tipo_licencia);

        if ($repo->update($id_tipo_licencia, $licencia)) {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Datos actualizados correctamente"];
        } else {
            return [false, "Error al actualizar datos"];
        }
    }
}
 ?>
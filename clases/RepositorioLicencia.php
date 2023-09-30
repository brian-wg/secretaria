<?php 

require_once 'Persona.php';
require_once '.env.php';

class RepositorioLicencia{

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



    public function getLicencias(Persona $usuario)
    {
        $q = "SELECT l.id_licencia, l.fecha_inicio, l.fecha_fin, p.nombre, estado FROM licencias l
INNER JOIN persona p ON l.id_persona = p.id_persona
 WHERE p.id_persona = ?";
        $query = self::$conexion->prepare($q);
        $id = $usuario->getId();
        $query->bind_param('d', $id);

        if ($query->execute()){
            $query->bind_result($id_licencia, $fecha_inicio, $fecha_fin, $nombre_persona, $estado);
            $lista_de_licencias = [];
            while ($query->fetch()) {
                $lista_de_licencias[] = new Licencia($id_licencia, $fecha_inicio, $fecha_fin, $nombre_persona, $estado);                
            }
            return $lista_de_licencias;
        }
        return false;
        

    }


 public function agregar(Licencia $l, $usuario){
    
        $q = "INSERT INTO licencias (fecha_inicio, fecha_fin, id_persona, estado, id_tipo_licencia) VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $fecha_inicio = $l->getFechaInicio();
        $fecha_fin = $l->getFechaFin();
        $usuario_id = $usuario->getId(); 
        $estado = $l->getEstado();
        $id_tipo_licencia = $l->getId();
        
        if(!$query->bind_param("ssdsd", $fecha_inicio, $fecha_fin, $usuario_id, $estado, $id_tipo_licencia
        )){
            echo "fallo la consulta";
        }

        if ($query->execute()) {
            return true;
        } else {
            die("Error en la ejecución de la consulta: " . $query->error);
        }
    }

    public function getCantidadAnterior($id){
        $q = "SELECT licencias FROM licencias WHERE id_producto = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($cantidad);
        if ($query->execute()){
            if($query->fetch()){
            return $cantidad;    
            }
        }
            return false;
    }

    public function updateFechaInicio($id_licencia, $fecha_inicio){

        $q = "UPDATE licencias SET fecha_inicio = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('dd', $fecha_inicio, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function updateFechaFin($id_licencia, $fecha_fin){

        $q = "UPDATE licencias SET fecha_fin = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('dd', $fecha_fin, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function updateEstado($id_licencia, $estado){

        $q = "UPDATE licencias SET estado = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('dd', $estado, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function updateTipoLicencia($id_licencia, $id_tipo_licencia){

        $q = "UPDATE licencias SET id_tipo_licencia = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('dd', $id_tipo_licencia, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }
}
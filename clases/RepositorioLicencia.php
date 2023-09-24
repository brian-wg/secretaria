<?php 

require_once 'Persona.php';
require_once '.env.php';

class RepositorioLicenci{

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



    public function getLicencias(Persona $persona)
    {
        $q = "SELECT p.nombre, p.apellido, l.fecha_inicio, l.fecha_fin, l.anyo,
      l.comision, uc.nombre, c.nombre 
      FROM carreras c 
      INNER JOIN docente_uc_carrera duc ON c.id_carrera = duc.id_carrera 
      INNER JOIN uc uc ON duc.id_uc = uc.id_uc 
      INNER JOIN persona p ON duc.id_persona = p.id_persona 
      INNER JOIN licencias l ON p.id_persona = l.id_persona 
      INNER JOIN tipo_licencia_has_licencias tll ON l.id_licencia = tll.id_licencia 
      INNER JOIN tipo_licencia tl ON tll.id_tipo_licencia = tl.id_tipo_licencia 
      WHERE p.id_persona = ?";
        $query = self::$conexion->prepare($q);
        $id = $persona->getId();
        $query->bind_param('d', $id);

        if ($query->execute()){
            $query->bind_result($nombre, $apellido, $fecha_fin, $fecha_fin, $anyo, $comision,
            $uc, $carrera);
            $lista_de_licencias = [];
            while ($query->fetch()) {
                $lista_de_licencias[] = new Licencia($fecha_inicio, $fecha_fin, $id_persona, $anyo, $comision);                
            }
            return $lista_de_licencias;
        }
        return false;
        

    }


 public function agregar(Licencia $l, $persona){
    
        $q = "INSERT INTO licencias (fecha_inicio, fecha_fin, id_persona, anyo, comision) VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $persona = $persona->getIdPersona();
        $fecha_inicio = $l->getFechaInicio();
        $fecha_fin = $l->getFechaFin();    
        $anyo = $l->getAnyo();
        $comision = $l->getComision();
        
        if(!$query->bind_param("ssiiss", $fecha_inicio, $fecha_fin, $persona,
        $anyo, $comision)){
            echo "fallo la consulta";
        }

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
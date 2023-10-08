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


 public function agregarSecretario(Licencia $l){ //Funcion para agregar licencia como secretario
    
        $q = "INSERT INTO licencias (fecha_inicio, fecha_fin, id_persona, estado, id_tipo_licencia) VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $fecha_inicio = $l->getFechaInicio();
        $fecha_fin = $l->getFechaFin();
        $usuario_id = $l->getIdPersona(); 
        $estado = $l->getEstado();
        $id_tipo_licencia = $l->getTipoLicencia();
        
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

 public function agregarDocente(Licencia $l, $usuario){ //Funcion para agregar licencia como Docente
    
        $q = "INSERT INTO licencias (fecha_inicio, fecha_fin, id_persona, estado, id_tipo_licencia) VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $fecha_inicio = $l->getFechaInicio();
        $fecha_fin = $l->getFechaFin();
        $usuario_id = $usuario->getIdUsuario(); 
        $estado = $l->getEstado();
        $id_tipo_licencia = $l->getTipoLicencia();
        
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

    public function getLicenciasDocente(Persona $usuario)
    {
        $q = "SELECT l.fecha_inicio, l.fecha_fin, p.apellido, l.estado, tl.descripcion, l.ultima_modificacion_por, l.id_licencia FROM persona p
            INNER JOIN licencias l ON p.id_persona = l.id_persona
            INNER JOIN tipo_licencia tl ON l.id_tipo_licencia = tl.id_tipo_licencia
            WHERE p.id_persona= ?";
        $query = self::$conexion->prepare($q);
        $id = $usuario->getIdUsuario();
        $ultima_modificacion_por = $usuario->getNombreApellido();
        $query->bind_param('d', $id);

        if ($query->execute()){
            $query->bind_result($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion, $ultima_modificacion_por, $id_licencia);
            $lista_de_licencias = [];
            while ($query->fetch()) {
                $lista_de_licencias[] = new Licencia($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion, $ultima_modificacion_por, $id_licencia);                
            }
            return $lista_de_licencias;
        }
        return false;
        

    }
    public function getLicenciasSecretario(Persona $usuario)
    {
        $q = "SELECT l.fecha_inicio, l.fecha_fin, p.apellido, l.estado, tl.descripcion FROM persona p
            INNER JOIN licencias l ON p.id_persona = l.id_persona
            INNER JOIN tipo_licencia tl ON l.id_tipo_licencia = tl.id_tipo_licencia
            WHERE l.estado = ?";
        $query = self::$conexion->prepare($q);
        $id = $usuario->getIdUsuario();
        $query->bind_param('d', $id);

        if ($query->execute()){
            $query->bind_result($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion);
            $lista_de_licencias = [];
            while ($query->fetch()) {
                $lista_de_licencias[] = new Licencia($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion);                
            }
            return $lista_de_licencias;
        }
        return false;
        

    }

public function getLicenciasSecretarioPendiente($estado, Persona $usuario)
    {
        $q = "SELECT l.fecha_inicio, l.fecha_fin, p.apellido, l.estado, tl.descripcion, l.ultima_modificacion_por, l.id_licencia FROM persona p
            INNER JOIN licencias l ON p.id_persona = l.id_persona
            INNER JOIN tipo_licencia tl ON l.id_tipo_licencia = tl.id_tipo_licencia
            WHERE l.estado = ?";
        $query = self::$conexion->prepare($q);
        $estado = "pendiente";
        $ultima_modificacion_por = $usuario->getNombreApellido();
        $query->bind_param('s', $estado);

        if ($query->execute()){
            $query->bind_result($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion, $ultima_modificacion_por, $id_licencia);
            $lista_de_licencias = [];
            while ($query->fetch()) {
                $lista_de_licencias[] = new Licencia($fecha_inicio, $fecha_fin, $apellido, $estado, $descripcion, $ultima_modificacion_por, $id_licencia);                
            }
            return $lista_de_licencias;
        }
        return false;
        

    }

    public function getFechaInicioAnterior($id){
        $q = "SELECT fecha_inicio FROM licencias WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($fecha_inicio);
        if ($query->execute()){
            if($query->fetch()){
            return $fecha_inicio;    
            }
        }
            return false;
    }

    public function updateFechaInicio($fecha_inicio, $ultima_modificacion_por, $id_licencia){

        $q = "UPDATE licencias SET fecha_inicio = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $a = $query->bind_param('ssd', $fecha_inicio, $ultima_modificacion_por, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function getFechaFinAnterior($id){
        $q = "SELECT fecha_fin FROM licencias WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($fecha_fin);
        if ($query->execute()){
            if($query->fetch()){
            return $fecha_fin;    
            }
        }
            return false;
    }

    public function updateFechaFin($fecha_fin, $ultima_modificacion_por, $id_licencia){

        $q = "UPDATE licencias SET fecha_fin = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('ssd', $fecha_fin, $ultima_modificacion_por, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function getEstadoAnterior($id){
        $q = "SELECT estado FROM licencias WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($estado);
        if ($query->execute()){
            if($query->fetch()){
            return $estado;
            }
        }
            return false;
    }

    public function updateEstado($estado, $ultima_modificacion_por, $id_licencia){

        $q = "UPDATE licencias SET estado = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('ssd', $estado, $ultima_modificacion_por, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function getTipoLicenciaAnterior($id){
        $q = "SELECT descripcion FROM tipo_licencia tl
        INNER JOIN licencias l ON l.id_tipo_licencia = tl.id_tipo_licencia
        WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($descripcion);
        if ($query->execute()){
            if($query->fetch()){
            return $descripcion;
            }
        }
            return false;
    }

    public function updateTipoLicencia($id_tipo_licencia, $ultima_modificacion_por, $id_licencia){

        $q = "UPDATE licencias SET id_tipo_licencia = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('dsd', $id_tipo_licencia, $ultima_modificacion_por, $id_licencia);

        if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
    
    }

    public function getUltimaModificacionPorAnterior($id){
        $q = "SELECT ultima_modificacion_por FROM licencias WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);

        $query->bind_param('d', $id);
        $query->bind_result($ultima_modificacion_por);
        if ($query->execute()){
            if($query->fetch()){
            return $ultima_modificacion_por;
            }
        }
            return false;
    }

    public function listaTipoLicencias(){
        $q = "SELECT id_tipo_licencia, descripcion FROM tipo_licencia";
        $query = self::$conexion->prepare($q);

        if ($query->execute()){
            $query->bind_result($id_tipo_licencia, $descripcion);
            $licencias = [];
            while ($query->fetch()) {
                $licencias[] = ["id_tipo_licencia" => $id_tipo_licencia, "descripcion" => $descripcion];
            }
        return $licencias;
        }
        return false;
    } 

    public function AprobarLicencia($estado, $ultima_modificacion_por, $id_licencia){
        $q = "UPDATE licencias SET estado = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);
        $estado = "Aceptada";

         $query->bind_param('ssd', $estado, $ultima_modificacion_por, $id_licencia);
         if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
         
    }

    public function RechazarLicencia($estado, $ultima_modificacion_por, $id_licencia){
        $q = "UPDATE licencias SET estado = ?, ultima_modificacion_por = ? WHERE id_licencia = ?";
        $query = self::$conexion->prepare($q);
        $estado = "Rechazada";

         $query->bind_param('ssd', $estado, $ultima_modificacion_por, $id_licencia);
         if ($query->execute()){
          return true;
        }
        else {
            return false;
        }
         
    }


    } 


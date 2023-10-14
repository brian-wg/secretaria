<?php 

class Licencia{

	protected $fecha_inicio;
	protected $fecha_fin;
    protected $estado;
    protected $id_persona;
    protected $archivo;

	

	public function __construct ($fecha_inicio, $fecha_fin, $id_persona, $estado, $tipo_licencia, $archivo=null, $ultima_modificacion_por=null, $id=null ){

        $this->fecha_inicio = $fecha_inicio;
		$this->fecha_fin = $fecha_fin;
        $this->id_persona = $id_persona;
        $this->estado = $estado;
        $this->id_tipo_licencia = $tipo_licencia;
        $this->ultima_modificacion_por = $ultima_modificacion_por;
        $this->archivo = $archivo;
        $this->id= $id;

		
	}

	public function getFechaInicio() {
		return $this->fecha_inicio;
	}
    public function getFechaFin() {
    	return $this->fecha_fin;
    }
    public function getIdPersona() {
        return $this->id_persona;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getUltimaModificacionPor(){
        return $this->ultima_modificacion_por;
    }   
    public function getTipoLicencia(){
        return $this->id_tipo_licencia;
    }
 
    public function getId(){
        return $this->id;
    }
    public function getArchivo(){
        return $this->archivo;
    }
    public function setFechaInicio($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }
    public function setFechaFin($fecha_fin){
        $this->fecha_fin = $fecha_fin;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function setUltimaModificacionPor($ultima_modificacion_por){
        $this->ultima_modificacion_por = $ultima_modificacion_por;
    }
    public function setTipoLicencia($id_tipo_licencia){
        $this->id_tipo_licencia = $id_tipo_licencia;
    }
    public function setId($id){
        $this->id = $id;
    }    
    
}


 ?>
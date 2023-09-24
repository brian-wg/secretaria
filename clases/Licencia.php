<?php 

class Licencia{

	protected $fecha_inicio;
	protected $fecha_fin;
	protected $id_persona;
    protected $anyo;
    protected $comision;
	

	public function __construct ($fecha_inicio, $fecha_fin, $id_persona, $anyo,
     $comision, $id=null){

		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_fin = $fecha_fin;
		$this->id_persona = $id_persona;
        $this->anyo = $anyo;
        $this->comision = $comision;
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
    public function getAnyo(){
        return $this->anyo;
    }
    public function getComision(){
        return $this->comision;
    }

    
}


 ?>
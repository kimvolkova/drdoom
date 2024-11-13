<?php    
require_once ('conn.php');
class secretaria extends conectarDB{		

	public function secretaria(){				
		parent::__construct();
	}

	public function crear_cita($nombre_doctor, $nombre, $apellidos, $fecha, $hora, $documento, $motivo){
		$sql="insert into citas (nombre_doctor, nombre_paciente, apellidos_paciente, fecha, hora, documento_paciente, motivo) values (:nombre_doctor, :nombre, :apellidos, :fecha, :hora, :documento, :motivo)";	
        $crear = $this->conn_db->prepare($sql);
		$crear->bindParam(':nombre_doctor',$nombre_doctor);
        $crear->bindParam(':nombre',$nombre);		
        $crear->bindParam(':apellidos',$apellidos);	
		$crear->bindParam(':fecha',$fecha);		
		$crear->bindParam(':hora',$hora);				
        $crear->bindParam(':documento',$documento);		
        $crear->bindParam(':motivo',$motivo);								
		$crear->execute();					
		$crear->closeCursor();
		$this->conn_db=null;
		return true;
	}	

	public function ver_cita(){
		$query_buscar="SELECT id_citas,nombre_paciente, apellidos_paciente, documento_paciente, nombre_doctor, hora, motivo, estado, DATE_FORMAT(fecha, '%Y-%m-%dT%H:%i:%s') AS fecha FROM citas;";
		$buscar=$this->conn_db->prepare($query_buscar);	
		$buscar->execute();	
		$resultados = $buscar->fetchAll(PDO::FETCH_ASSOC);				
		$buscar->closeCursor();
		return $resultados;
		$this->conn_db=null;				
	}	

	public function citas_vista($documento_paciente){
		$sql="select * from citas_v where documento_paciente = :documento_paciente";
		$sentencia=$this->conn_db->prepare($sql);
		$sentencia->bindParam(':documento_paciente', $documento_paciente);
		$sentencia->execute();			
		$resultado = $sentencia->fetch(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultado;
		$this->conn_db=null;				
	  }


	  public function estado_cita($documento_paciente, $horaCita, $estado) {
		$query_modify = "UPDATE citas SET estado = :estado  WHERE documento_paciente = :documento_paciente AND hora = :hora";
		$modificar = $this->conn_db->prepare($query_modify);
		$modificar->bindParam(':documento_paciente', $documento_paciente);
		$modificar->bindParam(':hora', $horaCita);
		$modificar->bindParam(':estado', $estado);
		$modificar->execute();
		$result = true;
		$modificar->closeCursor();
		$this->conn_db=null;
		return $result;
	  }

	
	public function agregar_cliente($nombres,$apellidos,$celular,$tipo){
		$query_save="Insert into tClientes(cNombre,cApellido,cCel,CTipo) value(:nombres,:apellidos,:celular,:tipo)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombres', $nombres);    			 	
		$guardar->bindParam(':apellidos', $apellidos);    			 			
		$guardar->bindParam(':celular', $celular);    			 			
		$guardar->bindParam(':tipo', $tipo);    			 			
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}




}
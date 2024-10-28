<?php    
require_once ('conn.php');
class secretaria extends conectarDB{		

	public function secretaria(){				
		parent::__construct();
	}

	public function listar_clientes(){
		$sql="select * from vclientes";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
		$this->conn_db=null;			
	}	

	public function modificar_cliente($id,$nombres,$apellidos,$celular,$tipo){
		$query_modify="update tClientes set cNombre = :nombres, cApellido = :apellidos, cCel = :celular, cTipo = :tipo where nClienteID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombres', $nombres);		
		$modificar->bindParam(':apellidos', $apellidos);		
		$modificar->bindParam(':celular', $celular);
		$modificar->bindParam(':tipo', $tipo);	
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
		$this->conn_db=null;				
	}	

	public function estado_cliente($id,$estado){
		$query_modify="update tClientes set estado = :estado where nClienteID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':estado', $estado);			
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
		$this->conn_db=null;				
	}


	public function detalle_cliente($id){
		$sql="select * from TClientes where nClienteID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
		//$this->conn_db = null;
	}

	
	public function agregar_cita(){
		print_r($_POST)			
	}




}
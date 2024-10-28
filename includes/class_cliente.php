<?php    
require_once ('conn.php');
class cliente extends conectarDB{		

	public function cliente(){				
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
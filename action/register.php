<?php

require_once '../includes/conexionbd.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $correo = $_POST['Correo'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];
    $fechan = $_POST['FechaN'];
    $contraseña = $_POST['Contraseña'];

    
    if(empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($direccion) || empty($fechan) || empty($contraseña)){
        echo "Por favor rellene todos los campos";

    } else{
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";
        $stm = $pdo->prepare($sql);
        $stm->execute(['correo' => $correo]);
        $correov = $stm->fetch();

        if($correov){
            echo "Este correo ya esta en uso, por favor utiliza otro";
        } else{
            try{
                $pdo->beginTransaction();
    
                $sql = "INSERT INTO pacientes (nombre, apellido, correo, telefono, fecha_nacimiento, direccion) VALUES (:nombre, :apellido, :correo, :telefono, :fechan, :direccion)";
                $stm = $pdo->prepare($sql);
                $stm->execute([
                    'nombre' => $nombre, 
                    'apellido' => $apellido, 
                    'correo' => $correo, 
                    'telefono' => $telefono, 
                    'fechan' => $fechan, 
                    'direccion' => $direccion
                ]);
            
                $paciente_id = $pdo->lastInsertId();
                $hashed_password = password_hash($contraseña, PASSWORD_BCRYPT);
    
                $sql = "INSERT INTO usuarios (paciente_id, correo, password, rol) VALUES (:paciente_id, :correo, :password, 'paciente')";
                $stm = $pdo->prepare($sql);
                $stm->execute([
                    'paciente_id' => $paciente_id,
                    'correo' => $correo,
                    'password' => $hashed_password
                ]);
    
                $pdo->commit();
    
                echo "Registro completado con exito";
                
            }
    
            catch(PDOException $e){
    
                $pdo->rollback();
                echo "Error al registrar el usuario: " . $e->getMessage();
            }
        }
    }
}
?>
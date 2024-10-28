<?php

require_once '../includes/conexionbd.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    $sql= "SELECT * FROM usuarios  WHERE correo = :correo";
    $stm= $pdo->prepare($sql);
    $stm->execute(['correo' => $correo]);
    $email= $stm->fetch();

    if($email && password_verify($contraseña, $email['password'])){
    
        session_start();
        $_SESSION['correo'] = $correo;
        //echo "Login exitoso. Bienvenido " . htmlspecialchars($correo) . "!";
        if($email['rol'] === "admin"){
            header("Location: ../views/adminview.html");
        } elseif($email['rol'] === "odontologo"){
            header("Location: ../views/odontologoview.html");
        } else {
            header("Location: ../views/pacienteview.html");
        }


    } else {
        echo "Usuario o contraseña incorrectos";
    }
    
}

<?php

require_once 'includes/conexionbd.php'; // Conexión a la base de datos

// Selecciona todas las contraseñas en texto plano
$sql = "SELECT id, password FROM usuarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll();

// Recorre cada usuario y cifra su contraseña
foreach ($usuarios as $usuario) {
    $id = $usuario['id'];
    $contraseña_plana = $usuario['password'];

    // Cifra la contraseña
    $contraseña_cifrada = password_hash($contraseña_plana, PASSWORD_DEFAULT);

    // Actualiza la contraseña cifrada en la base de datos
    $update_sql = "UPDATE usuarios SET password = :password WHERE id = :id";
    $update_stmt = $pdo->prepare($update_sql);
    
    // Asegúrate de que las claves del array coincidan con los marcadores de posición en la consulta
    $update_stmt->execute(['password' => $contraseña_cifrada, 'id' => $id]);

    echo "Contraseña del usuario con ID $id cifrada correctamente.<br>";
}

echo "Proceso completado.";


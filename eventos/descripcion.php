<?php
    require_once '../includes/class_secretaria.php'; // incluye la clase
        $obj = new $secretaria(); 
        $documento_paciente = $_POST['documento_paciente']; 
        $citas = $obj->citas_vista($documento_paciente);

        // Devuelve los detalles del evento en formato JSON
        $json = array(
            'nombre_paciente' => $citas['nombre_paciente'],
            'fecha' => $citas['fecha'],
            'hora' => $citas['hora'],
            'nombre_doctor' => $citas['nombre_doctor'],
            'motivo' => $citas['motivo']
        );
  
header('Content-Type: application/json'); // Agrega esta línea
echo json_encode($json);
exit;

<?php     
    require_once '../includes/class_secretaria.php';   
        $secre = new secretaria();
        $citas = $secre->ver_cita();
        $eventos = [];

        foreach ($citas as $cita) {
            $evento = [
                'title' => trim($cita['nombre_paciente'] . ' ' . $cita['apellidos_paciente']),
                'start'=> $cita['fecha'],
                'allDay' => false,
                'documento_paciente' => $cita['documento_paciente'],
                'hora' => $cita['hora'],
                'motivo' => $cita['motivo'],
                'nombre_doctor' => $cita['nombre_doctor'],
                'estado' => $cita['estado'],
            ];
        
            $eventos[] = $evento;
        }
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($eventos);

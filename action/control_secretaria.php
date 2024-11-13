<?php
    require_once '../includes/class_secretaria.php';    
    $secre = new secretaria();

    if(!empty($_POST['caso'])){
        $caso = $_POST['caso'];
            switch($caso){
                case 1:
                        // Inicializa un array de errores
                        $errores = [];
                        // Verifica cada campo y agrega a la lista de errores si no está presente o está vacío
                        if (!isset($_POST['nombre_doctor']) || empty($_POST['nombre_doctor'])) {
                            $errores[] = 'nombre_doctor';
                        }
                        if (!isset($_POST['nombre_paciente']) || empty($_POST['nombre_paciente'])) {
                            $errores[] = 'nombre_paciente';
                        }
                        if (!isset($_POST['apellidos_paciente']) || empty($_POST['apellidos_paciente'])) {
                            $errores[] = 'apellidos_paciente';
                        }
                        if (!isset($_POST['fecha']) || empty($_POST['fecha'])) {
                            $errores[] = 'fecha';
                        }
                        if (!isset($_POST['hora']) || empty($_POST['hora'])) {
                            $errores[] = 'hora';
                        }
                        if (!isset($_POST['documento_paciente']) || empty($_POST['documento_paciente'])) {
                            $errores[] = 'documento_paciente';
                        }
                        if (!isset($_POST['motivo']) || empty($_POST['motivo'])) {
                            $errores[] = 'motivo';
                        }
            
                        // Si hay errores, envía una respuesta con los campos faltantes
                        if (!empty($errores)) {
                            $respuesta = array('error' => true, 'mensaje' => 'Faltan los siguientes campos:', 'campos_faltantes' => $errores);
                        } else {
                            // Asigna los valores si están presentes
                            $nombre_doctor = $_POST['nombre_doctor'];
                            $nombre_paciente = $_POST['nombre_paciente'];
                            $apellidos_paciente = $_POST['apellidos_paciente'];
                            $fecha = $_POST['fecha'];
                            $hora = $_POST['hora'];
                            $documento = $_POST['documento_paciente'];
                            $motivo = $_POST['motivo'];
            
                            // Llama a la función crear_cita y verifica el resultado
                            $agregar = $secre->crear_cita($nombre_doctor, $nombre_paciente, $apellidos_paciente, $fecha, $hora, $documento, $motivo);
            
                            if ($agregar) {
                                $respuesta = array('error' => false, 'mensaje' => 'Cita registrada con éxito');
                            } else {
                                $respuesta = array('error' => true, 'mensaje' => 'Error al registrar cita');
                            }
                        }
            
                        header('Content-Type: application/json');
                        echo json_encode($respuesta);
                        break;
                        
                case 2:
                    $documentoPaciente = $_POST['documento_paciente'];
                    $horaCita = $_POST['hora'];
                    $estado = $_POST['estado'];
  
                    $cambiar = $secre->estado_cita($documentoPaciente, $horaCita, $estado);
                    if ($cambiar) {
                        echo "proceso exitoso!!!";
                    } else {
                        echo "proceso fallido!!!";
                    }
                    break;
                }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../cliente_lista.php";
        </script>';    
        exit;
    }
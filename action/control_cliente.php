<?php
    require_once '../includes/class_cliente.php';    
    $consultar = new cliente();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                    (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) &&
                    (isset($_POST['celular']) && !empty($_POST['celular'])) &&
                    (isset($_POST['tipo']) && !empty($_POST['tipo']))){	
                //nuevo
                //validacion 
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $celular = $_POST['celular'];
                    $tipo = $_POST['tipo'];


                    $maren = $consultar->agregar_cliente($nombres,$apellidos,$celular,$tipo);
                    if($maren){
                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../cliente_lista.php";
                        </script>';    
                    }else{
                        echo'<script type="text/javascript">
                        alert("Proceso Fallo");
                        window.location.href="../cliente_lista.php";
                        </script>';    
                    }                    
                }else{
                    echo'<script type="text/javascript">
                    alert("Todos los campos son requeridos");
                    window.location.href="../cliente_lista.php";
                    </script>';    
                }
                break;
                case '2':
                    if(
                        (isset($_POST['id']) && !empty($_POST['id'])) &&
                        (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                        (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) &&
                        (isset($_POST['celular']) && !empty($_POST['celular'])) &&
                        (isset($_POST['tipo']) && !empty($_POST['tipo']))){	

                        $id = $_POST['id'];
                        $nombres = $_POST['nombres'];
                        $apellidos = $_POST['apellidos'];
                        $celular = $_POST['celular'];
                        $tipo = $_POST['tipo'];

                        $modificar_cliente = $consultar->modificar_cliente($id,$nombres,$apellidos,$celular,$tipo);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../cliente_lista.php?ID='.$id.'"; 
                        </script>'; 


                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../cliente_lista.php";
                        </script>';                          
                    }	                    

                    break;
                case '3':
                    //estado
                    $ID = $_POST['id'];
                    $estado = $_POST['estado'];
                    $mayra = $consultar->estado_cliente($ID,$estado);
                    echo'<script type="text/javascript">
                    alert("estado Cambiado");
                    window.location.href="../cliente_lista.php";
                    </script>';                        
                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../cliente_lista.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../cliente_lista.php";
        </script>';    
        exit;
    }
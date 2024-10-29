<?php

header('Content-Type: application/json');

session_start();

require("conexionbd.php");

$conexion = regresarConexion();


switch ($_GET['accion']) {

  case 'listar':
    $datos = mysqli_query($conexion, "select id,
                titulo as title,
                motivo,
                fecha as start,
                from citas where usuario ='$_SESSION[usuario]'");
    $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
    echo json_encode($resultado);

    break;

  case 'agregar':
    $respuesta = mysqli_query($conexion, "insert into citas (titulo, motivo, fecha, nombre_cliente) values
                          ('$_POST[titulo]','$_POST[motivo]','$_POST[fecha]','$_SESSION[nombre_cliente]')");
    echo json_encode($respuesta);
    break;

  case 'modificar':
    $respuesta = mysqli_query($conexion, "update citas set titulo = '$_POST[titulo]',
                        motivo = '$_POST[motiv]',
                        fecha = '$_POST[fecha]',
                        where id = $_POST[id]");
    echo json_encode($respuesta);
    break;

  case 'borrar':
      $respuesta = mysqli_query($conexion, "delete from citas where id = $_POST[id]");
      echo json_encode($respuesta);
    break;
}

 ?>

<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST["txtNombres"];
    $apellido = $_POST["txtApellidos"];
    $puesto = $_POST["txtPuesto"];
    $contacto = $_POST["txtContacto"];

    $sentencia = $bd->prepare("UPDATE persona SET nombres = ?, apellidos = ?, puesto = ?, contacto = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $apellido, $puesto, $contacto, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
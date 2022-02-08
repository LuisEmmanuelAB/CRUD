<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtPuesto"]) || empty($_POST["txtContacto"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombres"];
    $apellido = $_POST["txtApellidos"];
    $puesto = $_POST["txtPuesto"];
    $contacto = $_POST["txtContacto"];
    $sentencia = $bd->prepare("INSERT INTO persona(nombres,apellidos,puesto,contacto) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$puesto,$contacto]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
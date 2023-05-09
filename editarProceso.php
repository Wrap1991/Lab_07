<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtnombres'];
    $Apellidos= $_POST['txtApellidos'];
    $DNI = $_POST['txtDNI'];
    $Origen = $_POST['txtOrigen'];
    $Destino = $_POST['txtDestino'];
    $celular = $_POST['txtcelular'];
    $Monto = $_POST['txtMonto'];

    $sentencia = $bd->prepare("UPDATE Airline SET nombres = ?, apellidos = ?, DNI= ?, Origen = ?, Destino = ?,celular= ? ,Monto= ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $Apellidos, $DNI,$Origen, $Destino, $celular, $Monto,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }

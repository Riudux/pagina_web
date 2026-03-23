<?php
    session_start();
    include("../../config/conexion.php");


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_registro = $_POST['editID'];
        $id_usuario = $_POST["editIdUsuario"];
        $id_dispositivos = $_POST['editIdDispositivo'];
        $ritmo_cardiaco = $_POST['editRitmoCardiaco'];
        $oxigeno = $_POST['editOxigeno'];
        $temperatura = $_POST['editTemperatura'];
        $presion_sistolica = $_POST['editPresionSistolica'];
        $presion_diastolica = $_POST['editPresionDiastolica'];

        $sql = "UPDATE `registros_biometricos` SET 
        `id_usuario`='$id_usuario',
        `id_dispositivos`='$id_dispositivos',
        `ritmo_cardiaco`='$ritmo_cardiaco',
        `oxigeno`='$oxigeno',
        `temperatura`='$temperatura',
        `presion_sistolica`='$presion_sistolica',
        `presion_diastolica`='$presion_diastolica'
        WHERE `id_registro` = '$id_registro'";
        $result = $conn->query($sql);
    }

    $conn->close();

?>
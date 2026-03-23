<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_usuario = $_POST["id_usuario"];
        $id_dispositivo = $_POST["id_dispositivo"];
        $ritmo_cardiaco = $_POST["ritmo_cardiaco"];
        $oxigeno = $_POST["oxigeno"];
        $temperatura = $_POST["temperatura"];
        $presion_sistolica = $_POST["presion_sistolica"];
        $presion_diastolica = $_POST["presion_diastolica"];

        $sqlinsert = "INSERT INTO `registros_biometricos`(`id_usuario`, `id_dispositivos`, 
        `ritmo_cardiaco`, `oxigeno`, `temperatura`, `presion_sistolica`, `presion_diastolica`) 
        VALUES 
        ('$id_usuario','$id_dispositivo','$ritmo_cardiaco','$oxigeno','$temperatura',
        '$presion_sistolica','$presion_diastolica')";

        $result = $conn->query($sqlinsert);

        if ($result == TRUE) {
            header("Refresh: 0; url=../../models/crud_biometricos.php"); 
        } else {
            echo "Error al registrar los datos biometricos: ";
        }
    } 
    $conn->close();
?>
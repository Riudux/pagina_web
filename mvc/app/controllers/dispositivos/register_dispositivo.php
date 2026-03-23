<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["nombre"];
        $modelo = $_POST["modelo"];
        $numero_serie = $_POST["numero_serie"];
        $id_usuario = $_POST["id_usuario"];


        $sqlinsert = "INSERT INTO dispositivos (nombre, modelo, numero_serie, id_usuario) 
        VALUES ('$nombre', '$modelo', '$numero_serie', $id_usuario)";

        $result = $conn->query($sqlinsert);

        // Recarga la página tras 5 segundos
        if ($result == TRUE) {
            header("Refresh: 0; url=../../models/crud_dispositivos.php"); 
        } else {
            echo "Error al registrar el dispositivo: ";
        }
    } 
    $conn->close();
?>
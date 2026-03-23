<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_dispositivo = $_POST['id'];

        $sql = "DELETE FROM dispositivos WHERE id_dispositivo = '$id_dispositivo'";
        if ($conn->query($sql)) {
            header("Refresh: 0; url=../../models/crud_dispositivos.php"); 
        } else {
            echo "Error al eliminar el usuario: ";
        }

    }

    $conn->close();

    
?>
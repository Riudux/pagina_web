<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_dispositivo = $_POST['id'];

        $sql = "DELETE FROM dispositivos WHERE id_dispositivo = '$id_dispositivo'";
        $result = $conn->query($sql);

    }

    $conn->close();

    
?>
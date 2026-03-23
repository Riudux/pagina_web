<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_usuario = $_POST['id'];

        $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
        $result = $conn->query($sql);
    }

    $conn->close();

    
?>
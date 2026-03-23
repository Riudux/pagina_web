<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_registro = $_POST['id'];

        $sql = "DELETE FROM registros_biometricos WHERE id_registro = '$id_registro'";
                
        $result = $conn->query($sql);

    }

    $conn->close();

    
?>
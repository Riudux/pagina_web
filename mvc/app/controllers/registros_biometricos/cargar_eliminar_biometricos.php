<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_registro = $_POST['id'];

        $sql = "DELETE FROM registros_biometricos WHERE id_registro = '$id_registro'";
        if ($conn->query($sql)) {
            header("Refresh: 0; url=../../models/crud_biometricos.php"); 
        } else {
            echo "Error al eliminar el registro biometrico: ";
        }

    }

    $conn->close();

    
?>
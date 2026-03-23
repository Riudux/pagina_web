<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_usuario = $_POST['id'];

        $sql = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
        if ($conn->query($sql)) {
            echo "Usuario eliminado correctamente";
        } else {
            echo "Error al eliminar el usuario: ";
        }
    }

    $conn->close();

    
?>
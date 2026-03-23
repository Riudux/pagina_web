<?php
    session_start();
    include("../../config/conexion.php");


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_usuario = $_POST['editID'];
        $username = $_POST['editUsername'];
        $email = $_POST['editEmail'];
        $fecha_registro = $_POST['editFecha'];
        $id_rol = $_POST['editIdRol'];

        $sql = "UPDATE usuarios SET id_usuario = '$id_usuario', username = '$username', email = '$email', fecha_registro = '$fecha_registro', id_rol = $id_rol WHERE id_usuario = $id_usuario";
        if ($conn->query($sql)) {
            echo "Usuario actualizado correctamente";
        } else {
            echo "Error al actualizar el usuario: ";
        }
    }
    
    $conn->close();

?>
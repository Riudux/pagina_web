<?php
    session_start();
    include("../../config/conexion.php");


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_dispositivos = $_POST['editID'];
        $nombre = $_POST["editNombre"];
        $modelo = $_POST["editModelo"];
        $numero_serie = $_POST["editNumeroSerie"];
        $id_usuario = $_POST["editIdUsuario"];
        $fecha_registro = $_POST['editFechaRegistro'];
        $estado = $_POST['editEstado'];

        $sql = "UPDATE `dispositivos` 
        SET `id_dispositivo`='$id_dispositivos',`nombre`='$nombre',
        `modelo`='$modelo',`numero_serie`='$numero_serie',
        `id_usuario`='$id_usuario',`fecha_registro`='$fecha_registro',
        `estado`='$estado' WHERE $id_dispositivos";

        $result = $conn->query($sql);
    }

    $conn->close();

?>
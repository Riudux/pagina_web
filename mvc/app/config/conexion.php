<?php
    //Declaracion de variables para conexion
    $name = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'vitalconnection';

    //Ingreso a la base de datos
    $conn = new mysqli($name,$user,$pass,$db);
    if ($conn -> connect_error) {
        die('Error de conexión' . $conn ->connect_error);
    }
?>
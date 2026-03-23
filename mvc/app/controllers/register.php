<?php
    session_start();
    include("../../config/conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sqlinsert = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";

        $result = $conn->query($sqlinsert);

        if ($result === TRUE) {
            echo "Usuario registrado correctamente <a href='index.html'>Inicia sesion</a>."; 
        } else {
            echo "Error al registrar";
        }
    } 
    $conn->close();
?>
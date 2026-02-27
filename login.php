<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios 
            WHERE email = '$email' 
            AND password = '$password'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        $_SESSION["usuario"] = $usuario["nombre"];

        header("Location: dashboard.html");
        exit();

    } else {
        header("Location: login.html#");
    }
}
?>  
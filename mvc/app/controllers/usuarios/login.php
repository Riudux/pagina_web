<?php
session_start();
include("../../config/conexion.php");

//consultar sql para verificar el usuario y la contraseña
$gmail = $_POST['email'];
$password = $_POST['password'];

//Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

$sql = "SELECT * FROM usuarios WHERE email = '$gmail' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //Inicio de sesion exitoso
    $row = $result->fetch_assoc();
    $_SESSION['id_usuario'] = $row['id_usuario'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $gmail;
    $_SESSION['password'] = $row['password'];
    $_SESSION['id_rol'] = $row['id_rol'];

    header('Location: ../../views/dashboard.php');
} else {
    echo "inicio de sesion fallida. <a href='../../views/login.html'> Intentar De nuevo</a>";
}
$conn->close();

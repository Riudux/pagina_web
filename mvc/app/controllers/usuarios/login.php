<?php
    session_start();
    include("../../config/conexion.php");

    //consultar sql para verificar el usuario y la contraseña
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($sql);  

    if ($result->num_rows > 0) {
        //Inicio de sesion exitoso
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        header('Location: welcome.php');
    }else{
        echo "nicio de sesion fallida. <a href='index.html'> Intentar De nuevo</a>";
    }
    $conn->close();

?>
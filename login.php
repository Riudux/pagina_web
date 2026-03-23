<?php
    session_start();
    include("conexion.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //consultar sql para verificar el email y la contraseña
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);  

        if ($result->num_rows > 0) {
            //Inicio de sesion exitoso
            $row = $result->fetch_assoc();
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header("Location: dashboard.html"); 
        }else{
            echo "inicio de sesion fallida. <a href='index.html'> Intentar De nuevo</a>";
        }
        $conn->close();
    }
?>  
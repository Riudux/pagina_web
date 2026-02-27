<?php

// Dirección del servidor donde está la base de datos.
$host = "localhost";

// Usuario de la base de datos.
$user = "root";

// Contraseña del usuario de la base de datos, segun yo en xampp no tiene contraseña.
$pass = "";

// Nombre de la base de datos que vamos a usar.
$db   = "vitalconnection";

// Creamos la conexión usando la clase mysqli.
// Aquí intentamos conectarnos al servidor MySQL
// pasando host, usuario, contraseña y base de datos.
$conn = new mysqli($host, $user, $pass, $db);

// Verificamos si ocurrió un error al intentar conectarnos.
// Si la conexión falla, se detiene el programa con die()
// y muestra el mensaje de error.
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>
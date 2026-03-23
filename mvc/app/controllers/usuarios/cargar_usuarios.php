
<?php
    session_start();
    include("../../config/conexion.php");


    //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

    $sql = "SELECT * FROM usuarios";


    $result = $conn->query($sql);  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo    "<tr>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['fecha_registro']}</td>
                        <td>{$row['id_rol']}</td>
                        <td>
                            <button onclick=\"mostrarEditarUsuario(
                            {$row['id_usuario']}, 
                            '{$row['username']}', 
                            '{$row['email']}', 
                            '{$row['fecha_registro']}', 
                            {$row['id_rol']}
                            )\">Editar</button>

                            <button onclick=\"mostrarEliminarUsuario(
                            {$row['id_usuario']}
                            )\">Eliminar</button>

                        
                        </td><br><br>
                    </tr>";
        }
    } else{
        echo "<tr><td colspan='7'>No hay usuarios</td></tr>" ;
    }
    $conn->close();

?>
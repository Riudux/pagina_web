
<?php
    session_start();
    include("../../config/conexion.php");


    //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

    $sql = "SELECT * FROM dispositivos";


    $result = $conn->query($sql);  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo    "<tr>
                        <td>{$row['id_dispositivo']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['modelo']}</td>
                        <td>{$row['numero_serie']}</td>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['fecha_registro']}</td>
                        <td>{$row['estado']}</td>
                        <td>
                            <button onclick=\"mostrarEditarDispositivo(
                            {$row['id_dispositivo']}, 
                            '{$row['nombre']}', 
                            '{$row['modelo']}', 
                            '{$row['numero_serie']}', 
                            {$row['id_usuario']}, 
                            '{$row['fecha_registro']}', 
                            '{$row['estado']}'
                            )\">Editar</button>

                            <button onclick=\"mostrarEliminarDispositivo(
                            {$row['id_dispositivo']}
                            )\">Eliminar</button>

                        
                        </td><br><br>
                    </tr>";
        }
    } else{
        echo "<tr><td colspan='7'>No hay dispositivos</td></tr>" ;
    }
    $conn->close();

?>
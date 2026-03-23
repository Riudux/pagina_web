<?php
    session_start();
    include("../../config/conexion.php");

    //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña
    $sql = "SELECT * FROM registros_biometricos";


    $result = $conn->query($sql);  
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo    "<tr>
                        <td>{$row['id_registro']}</td>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['id_dispositivos']}</td>
                        <td>{$row['ritmo_cardiaco']}</td>
                        <td>{$row['oxigeno']}</td>
                        <td>{$row['temperatura']}</td>
                        <td>{$row['presion_sistolica']}</td>
                        <td>{$row['presion_diastolica']}</td>
                        <td>{$row['fecha_registro']}</td>
                        <td>
                            <button onclick=\"mostrarEditarBiometricos(
                            {$row['id_registro']}, 
                            {$row['id_usuario']}, 
                            {$row['id_dispositivos']}, 
                            {$row['ritmo_cardiaco']}, 
                            {$row['oxigeno']}, 
                            {$row['temperatura']}, 
                            {$row['presion_sistolica']}, 
                            {$row['presion_diastolica']},
                            )\">Editar</button>

                            <button onclick=\"mostrarEliminarBiometricos(
                            {$row['id_registro']}
                            )\">Eliminar</button>

                        
                        </td><br><br>
                    </tr>";
        }
    } else{
        echo "<tr><td colspan='7'>No hay registros biometricos</td></tr>" ;
    }
    $conn->close();
?>
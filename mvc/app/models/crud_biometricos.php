
<?php
    session_start();
    include("../config/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crud</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    </head>
    <body>
        <h1 class="text-center">Crud es el acronimo para create, read, update, delete</h1>
        <button onclick="mostrarAgregarBiometricos('modalAgregarBiometricos')">Agregar Registro Biometrico</button>
        
        
        <table id="biometricosTable" border="1">
            <thead>
                <tr>
                    <th>ID RB</th>
                    <th>ID Usuario</th>
                    <th>ID Dispositivo</th>
                    <th>Ritmo Cardiaco</th>
                    <th>Oxigeno</th>
                    <th>Temperatura</th>
                    <th>Presion Sistolica</th>
                    <th>Presion Diastolica</th>
                    <th>Fecha Registro</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div id="modalEditar" style="display:none";>
            <h3>Editar Registro Biometrico</h3>
            <form id="mostrarEditarBiometricos">
                ID Registro Biometrico : <span id="editID"></span><br>
                ID Usuario : <input type="text" id="editIdUsuario"><br>
                ID Dispositivo : <input type="text" id="editIdDispositivo"><br>
                Ritmo Cardiaco : <input type="text" id="editRitmoCardiaco"><br>
                Oxigeno : <input type="text" id="editOxigeno"><br>
                Temperatura : <input type="text" id="editTemperatura"><br>
                Presion Sistolica : <input type="text" id="editPresionSistolica"><br>
                Presion Diastolica : <input type="text" id="editPresionDiastolica"><br>
                Fecha Registro : <span type="text" id="editFechaRegistro"></span><br>      

                <button type="button" onclick="guardarEdicion()"> Guardar</button>
            </form>
        </div>

        <div id="modalEliminar" style="display:none";>
            <h3>Confirmar Eliminacion</h3>
                ID: <span id="id"></span><br>
            <p>¿Estas seguro de que quieres eliminar estos Registros Biometricos?</p>
            <form id="mostrarEliminarBiometricos">
                <button type="button" onclick="eliminarBiometricos()">Eliminar</button>
            </form>
        </div>

        <div id="modalAgregarBiometricos" style="display:none";>
            <h3>Agregar Registro Biometrico</h3>
            <form action="../controllers/registros_biometricos/register_biometricos.php" id="nuevoDispositivo" method="post">
                <label for="idUsuario">ID Usuario:</label>
                <input type="text" id="idUsuario" name="id_usuario" required> <br><br>

                <label for="idDispositivo">ID Dispositivo:</label>
                <input type="text" id="idDispositivo" name="id_dispositivo" required> <br><br>

                <label for="ritmoCardiaco">Ritmo Cardiaco:</label>
                <input type="text" id="ritmoCardiaco" name="ritmo_cardiaco" required> <br><br>

                <label for="oxigeno">Oxigeno:</label>
                <input type="text" id="oxigeno" name="oxigeno" required> <br><br>

                <label for="temperatura">Temperatura:</label>
                <input type="text" id="temperatura" name="temperatura" required> <br><br>

                <label for="presionSistolica">Presion Sistolica:</label>
                <input type="text" id="presionSistolica" name="presion_sistolica" required> <br><br>

                <label for="presionDiastolica">Presion Diastolica:</label>
                <input type="text" id="presionDiastolica" name="presion_diastolica" required> <br><br>

                <button type="submit" name="accion" value="agregar">Añadir</button>

            </form>
        </div>

        <script>
            // aqui manda a llamar un document, lo pone listo y despues llama la funcion con function
            $(document).ready(function () {
                // el ajax es para elegir que documento se va a agregar
                $.ajax({
                    // este es el documento a cargar
                    url: '../controllers/registros_biometricos/cargar_biometricos.php',
                    // este es el metodo que va a tener, en este caso get es para agarrar los datos
                    type: 'GET',
                    success:function(response){
                        // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #dispositivostable y especificamente en la etiqueta tbody
                        $('#biometricosTable tbody').html(response);
                    }
                });
            });

            function mostrarAgregarBiometricos(elementId){
                var element = document.getElementById(elementId);

                if(element) {
                    element.style.display = 'block';
                }
            }

            function mostrarEditarBiometricos(id, idUsuario, idDispositivo, ritmoCardiaco, oxigeno, temperatura, presionSistolica, presionDiastolica, fechaRegistro){
                document.getElementById('editID').innerText = id;
                document.getElementById('editIdUsuario').value = idUsuario;
                document.getElementById('editIdDispositivo').value = idDispositivo;
                document.getElementById('editRitmoCardiaco').value = ritmoCardiaco;
                document.getElementById('editOxigeno').value = oxigeno;
                document.getElementById('editTemperatura').value = temperatura;
                document.getElementById('editPresionSistolica').value = presionSistolica;
                document.getElementById('editPresionDiastolica').value = presionDiastolica;
                document.getElementById('editFechaRegistro').innerText = fechaRegistro;

                var modal = document.getElementById('modalEditar').style.display = 'block';
            }

            function guardarEdicion(){
                var id = document.getElementById('editID').innerText
                var idUsuario = document.getElementById('editIdUsuario').value
                var idDispositivo = document.getElementById('editIdDispositivo').value
                var ritmoCardiaco = document.getElementById('editRitmoCardiaco').value
                var oxigeno = document.getElementById('editOxigeno').value
                var temperatura = document.getElementById('editTemperatura').value
                var presionSistolica = document.getElementById('editPresionSistolica').value
                var presionDiastolica = document.getElementById('editPresionDiastolica').value
                $.ajax({
                    url: '../controllers/registros_biometricos/cargar_editar_biometricos.php',
                    type: 'POST',
                    data: {
                        editID: id,
                        editIdUsuario: idUsuario,
                        editIdDispositivo: idDispositivo,
                        editRitmoCardiaco: ritmoCardiaco,
                        editOxigeno: oxigeno,
                        editTemperatura: temperatura,
                        editPresionSistolica: presionSistolica,
                        editPresionDiastolica: presionDiastolica,
                    },
                    success:function(response){
                        alert('Registro biometrico actualizado correctamente');;
                        $.ajax({
                            // este es el documento a cargar
                            url: '../controllers/registros_biometricos/cargar_biometricos.php',
                            // este es el metodo que va a tener, en este caso get es para agarrar los datos
                            type: 'GET',
                            success:function(response){
                                // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #dispositivostable y especificamente en la etiqueta tbody
                                $('#biometricosTable tbody').html(response);
                            }
                        });
                        document.getElementById('modalEditar').style.display = 'none';
                    }
                });
            }


            function mostrarEliminarBiometricos(id){
                document.getElementById('id').innerText = id;
                var modal = document.getElementById('modalEliminar').style.display = 'block';
            }

            function eliminarBiometricos(id){
                var id = document.getElementById('id').innerText;

                $.ajax({
                    url: '../controllers/registros_biometricos/cargar_eliminar_biometricos.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success:function(response){
                        alert('Registro biometrico eliminado correctamente');
                        $.ajax({
                            // este es el documento a cargar
                            url: '../controllers/registros_biometricos/cargar_biometricos.php',
                            // este es el metodo que va a tener, en este caso get es para agarrar los datos
                            type: 'GET',
                            success:function(response){
                                // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #dispositivostable y especificamente en la etiqueta tbody
                                $('#biometricosTable tbody').html(response);
                            }
                        });
                        document.getElementById('modalEliminar').style.display = 'none';
                    }
                    
                });
            }

        </script>
        
        

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>


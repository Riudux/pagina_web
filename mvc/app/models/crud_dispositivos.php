

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
        <button onclick="mostrarAgregarDispositivo('modalAgregarDispositivo')">Agregar dispositivo</button>
        
        
        <table id="dispositivosTable" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Numero de serie</th>
                    <th>ID Usuario</th>
                    <th>Fecha Registro</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div id="modalEditar" style="display:none";>
            <h3>Editar Dispositivo</h3>
            <form id="mostrarEditarDispositivo">
                ID : <span id="editID"></span><br>
                Nombre : <input type="text" id="editNombre"><br>
                Modelo : <input type="text" id="editModelo"><br>
                Numero de serie : <input type="text" id="editNumeroSerie"><br>
                ID Usuario : <input type="text" id="editIdUsuario"><br>
                Fecha Registro : <input type="text" id="editFechaRegistro"><br>
                Estado : <input type="text" id="editEstado"><br>
                
                <button type="button" onclick="guardarEdicion()"> Guardar</button>
            </form>
        </div>

        <div id="modalEliminar" style="display:none";>
            <h3>Confirmar Eliminacion</h3>
                ID: <span id="id"></span><br>
            <p>¿Estas seguro de que quieres eliminar este dispositivo?</p>
            <form id="mostrarEliminarDispositivo">
                <button type="button" onclick="eliminarDispositivo()">Eliminar</button>
            </form>
        </div>

        <div id="modalAgregarDispositivo" style="display:none";>
            <h3>Agregar Dispositivo</h3>
            <form action="../controllers/dispositivos/register_dispositivo.php" id="nuevoDispositivo" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required> <br><br>

                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required> <br><br>

                <label for="numeroSerie">Numero de serie:</label>
                <input type="text" id="numeroSerie" name="numero_serie" required> <br><br>

                <label for="idUsuario">ID Usuario:</label>
                <input type="text" id="idUsuario" name="id_usuario" required> <br><br>

                <button type="submit" name="accion" value="agregar">Añadir</button>

            </form>
        </div>

        <script>
            // aqui manda a llamar un document, lo pone listo y despues llama la funcion con function
            $(document).ready(function () {
                // el ajax es para elegir que documento se va a agregar
                $.ajax({
                    // este es el documento a cargar
                    url: '../controllers/dispositivos/cargar_dispositivos.php',
                    // este es el metodo que va a tener, en este caso get es para agarrar los datos
                    type: 'GET',
                    success:function(response){
                        // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #dispositivostable y especificamente en la etiqueta tbody
                        $('#dispositivosTable tbody').html(response);
                    }
                });
            });

            function mostrarAgregarDispositivo(elementId){
                var element = document.getElementById(elementId);

                if(element) {
                    element.style.display = 'block';
                }
            }

            function mostrarEditarDispositivo(id, nombre, modelo, numeroSerie, idUsuario, fechaRegistro, estado){
                document.getElementById('editID').innerText = id;
                document.getElementById('editNombre').value = nombre;
                document.getElementById('editModelo').value = modelo;
                document.getElementById('editNumeroSerie').value = numeroSerie;
                document.getElementById('editIdUsuario').value = idUsuario;
                document.getElementById('editFechaRegistro').value = fechaRegistro;
                document.getElementById('editEstado').value = estado;

                var modal = document.getElementById('modalEditar').style.display = 'block';
            }

            function guardarEdicion(){
                var id = document.getElementById('editID').innerText
                var nombre = document.getElementById('editNombre').value
                var modelo = document.getElementById('editModelo').value
                var numeroSerie = document.getElementById('editNumeroSerie').value
                var idUsuario = document.getElementById('editIdUsuario').value
                var fechaRegistro = document.getElementById('editFechaRegistro').value
                var estado = document.getElementById('editEstado').value
                $.ajax({
                    url: '../controllers/dispositivos/cargar_editar_dispositivos.php',
                    type: 'POST',
                    data: {
                        editID: id,
                        editNombre: nombre,
                        editModelo: modelo,
                        editNumeroSerie: numeroSerie,
                        editIdUsuario: idUsuario,
                        editFechaRegistro: fechaRegistro,
                        editEstado: estado
                    },
                    success:function(response){
                        alert('Dispositivo actualizado correctamente');
                    }
                });
            }


            function mostrarEliminarDispositivo(id_dispositivo){
                document.getElementById('id').innerText = id_dispositivo;
                var modal = document.getElementById('modalEliminar').style.display = 'block';
            }

            function eliminarDispositivo(id_dispositivo){
                var id_dispositivo = document.getElementById('id').innerText;

                $.ajax({
                    url: '../controllers/dispositivos/cargar_eliminar_dispositivos.php',
                    type: 'POST',
                    data: {
                        id: id_dispositivo
                    },
                    success:function(response){
                        alert('Dispositivo eliminado correctamente');                    
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


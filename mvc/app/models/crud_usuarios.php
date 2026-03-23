
<?php
    session_start();
    include("../config/conexion.php");

    //Se va  hacer una consulta a mysql para verificar que exista el usuario y contraseña

    $sql = "SELECT * FROM usuarios";

    $result = $conn->query($sql);  

    $conn->close();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crud Usuarios</title>

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
        <button onclick="mostrarAgregarUsuario('modalAgregarUsuario')">Agregar usuario</button>
        
        
        <table id="usuariosTable" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fecha_Registro</th>
                    <th>ID Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div id="modalEditar" style="display:none";>
            <h3>Editar Usuario</h3>
            <form id="mostrarEditarUsuario">
                ID : <span id="editID"></span><br>
                Username : <input type="text" id="editUsername"><br>
                Email : <input type="text" id="editEmail"><br>
                Fecha_Registro : <input type="text" id="editFecha"><br>
                Rol : <input type="text" id="editIdRol"><br>
                <button type="button" onclick="guardarEdicion()"> Guardar</button>
            </form>
        </div>

        <div id="modalEliminar" style="display:none";>
            <h3>Confirmar Eliminacion</h3>
                ID: <span id="id"></span><br>
            <p>¿Estas seguro de que quieres eliminar este usuario?</p>
            <form id="mostrarEliminarUsuario">
                <button type="button" onclick="eliminarUsuario()">Eliminar</button>
            </form>
        </div>

        <div id="modalAgregarUsuario" style="display:none";>
            <h3>Agregar Usuario</h3>
            <form action="../controllers/usuarios/register.php" id="nuevoUsuario" method="post">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required> <br><br>

                <label for="email">Correo:</label>
                <input type="text" id="email" name="email" required> <br><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required> <br><br>

                <button type="submit" name="accion" value="agregar">Añadir</button>

            </form>
        </div>

        <script>
            // aqui manda a llamar un document, lo pone listo y despues llama la funcion con function
            $(document).ready(function () {
                // el ajax es para elegir que documento se va a agregar
                $.ajax({
                    // este es el documento a cargar
                    url: '../controllers/usuarios/cargar_usuarios.php',
                    // este es el metodo que va a tener, en este caso get es para agarrar los datos
                    type: 'GET',
                    success:function(response){
                        // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #usuariostable y especificamente en la etiqueta tbody
                        $('#usuariosTable tbody').html(response);
                    }
                });
            });

            function mostrarAgregarUsuario(elementId){
                var element = document.getElementById(elementId);

                if(element) {
                    element.style.display = 'block';
                }
            }

            function mostrarEditarUsuario(id_usuario, username, email, fechaRegistro, idRol){
                document.getElementById('editID').innerText = id_usuario;
                document.getElementById('editUsername').value = username;
                document.getElementById('editEmail').value = email;
                document.getElementById('editFecha').value = fechaRegistro;
                document.getElementById('editIdRol').value = idRol;

                var modal = document.getElementById('modalEditar').style.display = 'block';
            }

            function guardarEdicion(){
                var id = document.getElementById('editID').innerText
                var username = document.getElementById('editUsername').value
                var email = document.getElementById('editEmail').value
                var fechaRegistro = document.getElementById('editFecha').value
                var idRol = document.getElementById('editIdRol').value
                $.ajax({
                    url: '../controllers/usuarios/cargar_editar_usuario.php',
                    type: 'POST',
                    data: {
                        editID: id,
                        editUsername: username,
                        editEmail: email,
                        editFecha: fechaRegistro,
                        editIdRol: idRol
                    },
                    success:function(response){
                        alert('Usuario actualizado correctamente');
                        $.ajax({
                            // este es el documento a cargar
                            url: '../controllers/usuarios/cargar_usuarios.php',
                            // este es el metodo que va a tener, en este caso get es para agarrar los datos
                            type: 'GET',
                            success:function(response){
                                // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #usuariostable y especificamente en la etiqueta tbody
                                $('#usuariosTable tbody').html(response);
                            }
                        });
                        document.getElementById('modalEditar').style.display = 'none';                  
                    }
                });
            }


            function mostrarEliminarUsuario(id_usuario){
                document.getElementById('id').innerText = id_usuario;
                var modal = document.getElementById('modalEliminar').style.display = 'block';
            }

            function eliminarUsuario(id_usuario){
                var id_usuario = document.getElementById('id').innerText;

                $.ajax({
                    url: '../controllers/usuarios/cargar_eliminar_usuario.php',
                    type: 'POST',
                    data: {
                        id: id_usuario
                    },
                    success:function(response){
                        alert('Usuario eliminado correctamente'); 
                        $.ajax({
                            // este es el documento a cargar
                            url: '../controllers/usuarios/cargar_usuarios.php',
                            // este es el metodo que va a tener, en este caso get es para agarrar los datos
                            type: 'GET',
                            success:function(response){
                                // aqui se pone a quien se lo va agregar en este caso a quien tiene la id #usuariostable y especificamente en la etiqueta tbody
                                $('#usuariosTable tbody').html(response);
                            }
                        });
                        document.getElementById('modalEliminar').style.display = 'none'                   
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


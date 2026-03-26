<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $elide = $_SESSION['id_usuario'];
    $lacontra = $_SESSION['password'];
    $idrol = $_SESSION['id_rol'];
} else {
    header("Location : login.html");
    exit();
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/body.css">
    <link rel="stylesheet" href="../assets/styles/navbar.css">
    <link rel="stylesheet" href="../assets/styles/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

<body>
    <nav class="navbar">
        <a href="dashboard.php"><img class="logo" src="../assets/imagenes/logo_nav.png" alt="Logo nav" height="50px"></a>
        <input type="checkbox" id="menu-toggle">

        <label for="menu-toggle" class="hamburguesa">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <div class="botones">
            <a href="perfil.php" class="botones_nav"><span class="glyphicon glyphicon-user"></span> Mi Perfil</a>
            <a href="../controllers/usuarios/logout.php" class="boton_register"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
        </div>
    </nav>


    <div class="container dashboard-container">

        <div class="dashboard-header text-center">
            <h1>Hola, <strong><?php echo $username; ?></strong></h1>
            <p>Bienvenido al dashboard de VitalConnection.</p>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="dash-card">
                    <div class="dash-icon-wrapper">
                        <span class="glyphicon glyphicon-heart dash-icon"></span>
                    </div>
                    <h3>Ritmo Cardiaco</h3>
                    <p>Pulsaciones por minuto actuales y promedio diario.</p>
                    <a href="historial_cardiaco.html" class="btn btn-custom">Ver Reporte</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="dash-card">
                    <div class="dash-icon-wrapper">
                        <span class="glyphicon glyphicon-tint dash-icon"></span>
                    </div>
                    <h3>Oxígeno en Sangre</h3>
                    <p>Niveles de saturación y variaciones detectadas.</p>
                    <a href="historial_oxigeno.html" class="btn btn-custom">Ver Niveles</a>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="dash-card">
                    <div class="dash-icon-wrapper">
                        <span class="glyphicon glyphicon-eye-open dash-icon"></span>
                    </div>
                    <h3>Calidad de Sueño</h3>
                    <p>Análisis de horas de descanso profundo y ligero.</p>
                    <a href="analisis_sueno.html" class="btn btn-custom">Ver Análisis</a>
                </div>
            </div>
        </div>

        <?php if ($idrol == 1): ?>
            <div class="row admin-section">
                <div class="col-md-12">
                    <div class="dash-card admin-card text-center">
                        <div class="dash-icon-wrapper admin-icon">
                            <span class="glyphicon glyphicon-cog dash-icon"></span>
                        </div>
                        <h3>Panel de Administración General</h3>
                        <p>Acceso de Admin para poder controlar los cruds de las tablas de base de datos.</p>
                        <div class="admin-buttons">
                            <a href="../models/crud_usuarios.php" class="btn btn-admin"><span class="glyphicon glyphicon-user"></span> Gestionar Usuarios</a>
                            <a href="../models/crud_dispositivos.php" class="btn btn-admin"><span class="glyphicon glyphicon-phone"></span> Gestionar Dispositivos</a>
                            <a href="../models/crud_biometricos.php" class="btn btn-admin"><span class="glyphicon glyphicon-heart"></span> Gestionar Biometricos</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <footer>
        <div class="foot_col_izq" izquierda>
            <img id="foot_col_izq_img" src="../assets/imagenes/logo_nav.png" alt="Logo nav">
            <p>
                Tu salud conectada con <br>
                monitoreo inteligente
            </p>

            <div class="foot_col_izq_iconos">
                <a href="www.instagram.com"><img src="../assets/imagenes/ig-icon.png" alt="instagram" width="20px"></a>
                <a href="www.facebook.com"><img src="../assets/imagenes/fb-icon.png" alt="facebook" width="20px"></a>
                <a href="www.linkedin.com"><img src="../assets/imagenes/Linkedin.png" alt="LinkedIn" width="20px"></a>
                <a href="www.x.com"><img src="../assets/imagenes/x.png" alt="x" width="20px"></a>

            </div>
        </div>

        <div class="foot_col_centro_der">
            <h1 id="foot_col_centro_der_h1">Legal</h1>
            <ul>
                <li><a href="#" class="foot_col_centro_der_enlaces">Términos y condiciones</a></li>
                <li><a href="#" class="foot_col_centro_der_enlaces">Política de privacidad</a></li>
                <li><a href="#" class="foot_col_centro_der_enlaces">Aviso legal</a></li>
            </ul>
        </div>
        <div class="foot_col_der" derecha>
            <h1 id="foot_col_der_h1">Contacto</h1>
            <ul>
                <li>
                    <p class="foot_col_der_contacto">Email: vitalconnection@vital.com</p>
                </li>
                <li>
                    <p class="foot_col_der_contacto">telefono: +52 618 234 2619</p>
                </li>
                <li>
                    <p class="foot_col_der_contacto">Direccion: UNIPOLI Durango, dgo</p>
                </li>
            </ul>
        </div>

    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
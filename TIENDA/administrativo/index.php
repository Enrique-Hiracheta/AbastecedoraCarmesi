<!DOCTYPE html>
<html>

<head>
    <title>TIENDA - ADMINISTRATIVO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../vendor/custom/style.css">
    <link rel="stylesheet" href="../vendor/custom/style-responsive.css">
    <link rel="stylesheet" href="../vendor/jquery-notific8/responsive/jquery.notific8.css">
    <link rel="stylesheet" href="../vendor/bootstrapValidator.css">

    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!--<script src="../vendor/jquery-1.10.0.js"></script>-->
    <script src="../vendor/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/bootstrapValidator.min.js"></script>
    <script src="../vendor/jquery-notific8/responsive/jquery.notific8.js"></script>
    <script src="../vendor/custom/utileria.js"></script>
    <script src="../vendor/validarForms.js"></script>


</head>

<body>

    <?php

    //Definimos la codificación de la cabecera.
    header( 'Content-Type: text/html; charset=utf-8' );
    //Importamos el archivo con las validaciones.
    require_once 'funciones/validaciones.php';
    //Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
    $usuarioVar = isset( $_POST[ 'usuario' ] ) ? $_POST[ 'usuario' ] : null;
    $contraseniaVar = isset( $_POST[ 'contrasenia' ] ) ? $_POST[ 'contrasenia' ] : null;
    //Este array guardará los errores de validación que surjan.
    $errores = false;
    //Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

        $errores = ( !validaRequerido( $contraseniaVar ) && !validaRequerido( $usuarioVar ) );

        //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
        if ( !$errores ) {
            require_once( 'funciones/acceso.php' );
        }
    } else {
        session_start();
        if ( @$_SESSION[ 'usuario' ] ) {
            header( "Location:administrador.php" );
        }
    }
    ?>

    <div class="col-md-6 col-lg-5 mx-md-auto">
        <div class="box">
            <br>
            <div class="account-wall">
                <form name="inicioSesion" class="form-signin" method="post" action="index.php">
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Usuario" type="text" name="usuario" value="<?php echo $usuarioVar ?>" required>
                    </div>
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="Contrase&#xF1;a" type="password" name="contrasenia" value="<?php echo $contraseniaVar ?>" required>
                    </div>
                    <button class="btn btn-lg btn-info btn-block" type="submit">ACCEDER</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
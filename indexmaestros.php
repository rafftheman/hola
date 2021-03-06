<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/ValidarIDMaestros.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/Redireccion.inc.php';


if (isset($_POST['b1'])) {
    Conexion :: abrir_conexion();
    $validador = new ValidarID($_POST['ID'], $_POST['Pass'],  Conexion :: obtener_conexion());
    if ($validador->id_valido()) {
        $usuario = new usuario($validador->obtener_id(), '', '', '', '');
        Redireccion :: redirigir(INFORMACIONm . "?" . urlsegura('ID', $validador->obtener_id()));
    }
    Conexion :: cerrar_conexion();
}
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos_1.css" rel="stylesheet">
        <link  rel="icon" href="images/icon.png" type="image/png" /> 
    </head>
    <body>
        <?php
include_once 'plantillas/barranav.inc.php';
?>
<div class="text-center" id="yu">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">
        <h1 id="a" class="headline">Bienvenido</h1>
        <h4 id="b">Ingresa la información que aparece en la tarjeta</h4>
        <form id="c" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">                 
            <?php
            if (isset($_POST['b1'])) {
                include_once 'plantillas/IDConError.inc.php';
            } else {
                include_once 'plantillas/IDSinError.inc.php';
            }
            ?>
        </form>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/ValidarID.inc.php';
include_once 'app/usuario.inc.php';
include_once 'app/Redireccion.inc.php';


if (filter_input_array(INPUT_GET)) {
    if (!empty(filter_input(INPUT_GET, ("ID")))) {
        $ID = filter_input(INPUT_GET, "ID");
        Conexion :: abrir_conexion();
        if ($ID === '') {
            echo 'no hay';
        } else {
            $resultados = mysqli_query($conexion, "select * from alumnospr where md5(concat('" . CLAVE . "', ID))='" . $ID . "';");
            if ($consulta = mysqli_fetch_array($resultados)) {
                $nombre = $consulta['nombre_bd'];
                $edad = $consulta['edad_bd'];
                $sangre = $consulta['tiposangre_bd'];
                $alergias = $consulta['alergias_bd'];
                $historial = $consulta['historial_bd'];
                $numero = $consulta['numero_bd'];
            } else {
                Redireccion :: redirigir(SERVIDOR);
            }
        }
        Conexion :: cerrar_conexion();
    } else {
        Redireccion :: redirigir(SERVIDOR);
    }
}
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Información</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos_info.css" rel="stylesheet">
        <link  rel="icon" href="images/icon.png" type="image/png" /> 
    </head>
    <?php
    include_once 'plantillas/barranav.inc.php';
    ?>
    <body>

        <div class="text-center" id="henflis">

            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <br>
                <h1 class="text-border headline">Información médica</h1>
            </div>
        </div>
        <div class="jumbotron text-justify">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6" id="no">
                            <h2 class="headline"><b>Datos generales</b></h2>
                            <h3>-Nombre: <?php echo $nombre ?></h3>
                            <h3>-Edad y sexo: <?php echo $edad ?></h3>
                            <h3>-Tipo de sangre: <?php echo $sangre ?></h3>
                            <h3>-Número de emergencia: <?php echo $numero ?> </h3>
                            <br>
                        </div>
                        <div class="col-md-6" id="no">
                            <h2 class="headline"><b>Alergias</b></h2>
                            <h3>-<?php echo $alergias ?> </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <br>
                                <br>
                                <div class="col-md-8" id="no">
                                    <h2 class="headline"><b>Historial clínico</b></h2>
                                    <h3>-<?php echo $historial ?> </h3>
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php

class RepositorioUsuario {

    public static function obtener_datos($conexion) {
        $usuarios = array();

        if (isset($conexion)) {
            try {
                include_once 'usuario.inc.php';

                $sql = "select * from alumnospr";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new usuario(
                                $fila['ID'], $fila['nombre'], $fila['password'], $fila['fecha_registro'], $fila['activo']);
                    }
                } else {
                    print 'No se puede mostrar, intente de nuevo';
                }
            } catch (PDOException $exc) {
                print "Error: " . $exc->getMessage();
            }
        }
        return $usuarios;
    }

    public function id_existe($conexion, $ID) {
        $id_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "select * from alumnospr where ID = :ID";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':ID', $ID, PDO::PARAM_STR);
                
                $sentencia -> execute();

                $resultado = $sentencia->fetchAll();
                

                if (count($resultado)) {
                    $id_existe = true;
                } else {
                    $id_existe = false;
                }
            } catch (PDOException $exc) {
                print 'Error id_existe ' . $exc->getMessage();
            }
        }
        return $id_existe;
    }
    
    public function ValidarIngreso($ID, $pass, $conexion) {
        $id_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "select * from alumnospr where BINARY ID = '" . $ID
                        . "' and BINARY pass = '" . $pass . "'";

                $sentencia = $conexion->prepare($sql);
                
                $sentencia -> execute();

                $resultado = $sentencia->fetchAll();
                

                if (count($resultado)) {
                    $id_existe = true;
                    
                } else {
                    $id_existe = false;
                }
            } catch (PDOException $exc) {
                print 'Error aquiiiiii ' . $exc->getMessage();
            }
        }
        return $id_existe;
    }

}

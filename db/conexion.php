<?php

//DATOS DE CONEXION A MYSQLI_CONNECT
$db_host = "146.83.194.142";
$db_user = "E7software";
$db_pass = "E7software1128";
$db_name = "E7software_bd";

//DATOS DE CONEXION A PDO::
$contrasena = 'E7software1128';
$usuario = "E7software";
$nombrebd= "E7software_bd";


// CONEXIÓN CON PDO ($bd)
try {
    $bd = new PDO(
        'mysql:host=146.83.194.142:3306;
        dbname='.$nombrebd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (Exception $e) {
    echo "Error de conexión ".$e->getMessage();
}


//CONEXIÓN CON  MYSQLI_CONNECT ($con)
$con  = mysqli_connect($db_host,$db_user,$db_pass,$db_name);


    if(!$con){

    echo 'no se pudo conectar a la base de datos:' .mysqli_connect_errno()();

    }else{

   
    }

?>
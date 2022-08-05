<?php

require_once("../../db/conexion.php");

date_default_timezone_set('Chile/Continental'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$tipo_anuncio = $_POST["tipo_anuncio"];
$fecha = date('Y-m-d');
$descripcion = $_POST["descripcion"];
$hora = date('H:i:s');
$titulo = $_POST['titulo'];
if(!empty($tipo_anuncio && $fecha  && $titulo && $descripcion) ){
    
    if (isset($_POST['destacar'])){
 
        $destacar = '1';
        
    }else{
        $destacar = '0';
    }

    $publicar_diariomuralSql = "INSERT INTO `formulario`(`usuario_clave`, `tipo_form_clave`, `form_titulo`, `form_descripcion`, `form_fecha`, `form_hora`, `form_importancia`)
    VALUES ('2','$tipo_anuncio','$titulo','$descripcion','$fecha','$hora','$destacar');";
    
    $publicar_diariomural = mysqli_query($con,$publicar_diariomuralSql);
    header("Location: http://localhost/definitivo/plantillaAyudantia/vistas/hu1_diariomural.php");
}else{

    echo "error se ingreso campo vacio";

}

}

?>
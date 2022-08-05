<?php 

require_once("../../db/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
   $form_clave =  $_POST["form_clave"];
   $tipo_anuncio = $_POST["tipo_anuncio_actualizar"];
   $fecha = $_POST["fecha_actualizar"];
   $titulo = $_POST["titulo_actualizar"];
   $descripcion = $_POST["descripcion_actualizar"];

   
    if(!empty( $form_clave && $tipo_anuncio && $fecha  && $titulo && $descripcion) ){
   
    if (isset($_POST['destacar_actualizar'])){
        $destacar = '1';
    
    }else{
        $destacar = '0';
    }

   $modificarPublicacion_diariomuralSql = "UPDATE `formulario` 
   SET tipo_form_clave = '$tipo_anuncio', form_titulo = '$titulo',  form_fecha = '$fecha', form_descripcion = '$descripcion', form_importancia  = $destacar
   WHERE form_clave = '$form_clave' ";
   
   $modificarPublicacion_diariomural = mysqli_query($con,$modificarPublicacion_diariomuralSql);
   
    }else{
    echo "error se ingreso campo vacio";

   }
}
   header("Location: http://localhost/definitivo/plantillaAyudantia/vistas/hu1_diariomural.php");
?>
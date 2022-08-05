<?php 

   require_once("../../db/conexion.php");

   if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
  $eliminar = $_GET["id"]; 
  $eliminarPublicacion_diariomuralSql = "DELETE FROM `formulario` WHERE form_clave = $eliminar";
  
  $eliminarPublicacion_diariomural = mysqli_query($con,$eliminarPublicacion_diariomuralSql);
   
   }
  
  header("Location: http://localhost/definitivo/plantillaAyudantia/vistas/hu1_diariomural.php");

  
?>
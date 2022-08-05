<?php 
require_once("../db/conexion.php");


$consultaFormularioSql = "SELECT date_format(form_fecha, '%d-%m-%Y') AS fecha_formateada ,formulario.form_clave,usuario.usuario_nombre,usuario.usuario_correo,usuario.usuario_clave,
                          formulario.form_titulo,tipo_formulario.tipo_form_clave,tipo_formulario.tipo_form_nombre,formulario.form_fecha,
                          formulario.form_descripcion,departamento.dep_numero
                          FROM formulario 
                          INNER JOIN usuario 
                          ON usuario.usuario_clave = formulario.usuario_clave
                          INNER JOIN tipo_formulario 
                          ON tipo_formulario.tipo_form_clave = formulario.tipo_form_clave
                          INNER JOIN usuario_vive 
                          ON usuario.usuario_clave = usuario_vive.usuario_clave 
                          INNER JOIN departamento 
                          ON usuario_vive.dep_clave  = departamento.dep_clave
                          ORDER BY formulario.form_importancia DESC,formulario.form_fecha DESC";
                          

$consultaFormulario = mysqli_query($con,$consultaFormularioSql);


$consultaFormularioSql_2 = "SELECT date_format(form_fecha, '%d-%m-%Y') AS fecha_formateada ,formulario.form_clave,usuario.usuario_nombre,usuario.usuario_correo,
formulario.form_titulo,tipo_formulario.tipo_form_clave,tipo_formulario.tipo_form_nombre,formulario.form_fecha,
formulario.form_descripcion,departamento.dep_numero
FROM formulario 
INNER JOIN usuario 
ON usuario.usuario_clave = formulario.usuario_clave
INNER JOIN tipo_formulario 
ON tipo_formulario.tipo_form_clave = formulario.tipo_form_clave
INNER JOIN usuario_vive 
ON usuario.usuario_clave = usuario_vive.usuario_clave 
INNER JOIN departamento 
ON usuario_vive.dep_clave  = departamento.dep_clave
ORDER BY formulario.form_importancia DESC,formulario.form_fecha DESC";
                       

                
                          

$consultaFormulario_2 = mysqli_query($con,$consultaFormularioSql_2);

?>
<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../partes/hu3_reclamos_vecinos/login.php');
	}elseif(isset($_SESSION['nombre'])){
		include '../bds/conexion.php';
		
		$sentencia = $bd->query("SELECT * FROM usuario;");
      
		$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}

?>

<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->

<!-- mostrar diario mural -->
<?php include("../controlador/hu1_controlador_diariomural/hu1_mostrar_diariomural.php") ?>
<!-- fin diario mural -->

<body>

    <div class="d-flex" id="content-wrapper">

        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>

        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
			
				
    			<!-- Button trigger modal -->
                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <h1 class="font-weight-bold mb-0">Bienvenido: <?php echo $_SESSION['nombre'], " ♾️ ",$_SESSION['tipo'] ?></h1>
                                <p class="lead text-muted">Revisa la última información del diario mural</p>
                            </div>
                        </div>
                    </div>
                </section>
                <hr>
                
                <section class="py-3 bg-light">
                    <div class=" container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h2 class="font-weight-bold mb-0">Reclamos</h2>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <button class="btn btn-primary" style="width: 100%;" data-toggle="modal"
                                    data-target="#reclamo"><b>Ingresar Reclamo</b></button>
                            </div>
                        </div>
                    </div>
                </section>


       				 <!-- Modal -->
        			<div class="modal fade bd-example-modal-lg" id="reclamo" >
        				<div class="modal-dialog modal-lg">
            				<div class="modal-content">
								<div class="modal-header">
                                <h2 class="font-weight-bold mb-0">Formulario de Reclamos</h2>
                <button type="button" class="btn btn-primary" id="cerrarFormulario" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
					</div>
												<div class="modal-body">
													<form method="POST" action="../partes/hu3_reclamos_vecinos/insertar.php">
                                                    <div class="row">
															<?php $fecha = date("Y-m-d");?>
															<?php $mDate=new DateTime();?>
															<?php $hoy= $mDate->format("H:i");?>

                                                            <div class="form-group col-lg-5 col-md-5">
                                                            <label>Titulo</label>
                                                            <input type="text" class="form-control" name="titulo">
                                                            </div>

                                                            <div class="form-group col-lg-5 col-md-5">
                                                            <label>Dirigido a:</label>
                                                            <select name="usuario" class="form form-control">
                                                                    <?php $getUsuarios= $con->query("SELECT * FROM usuario");
                                                                        while($row = mysqli_fetch_array($getUsuarios))
                                                                        {
                                                                         $usuario_nombre = $row['usuario_nombre'];
                                                                         $usuario_clave = $row['usuario_clave'];                                                              
                                                                   ?> 
                                                                         <option value="<?php echo $usuario_clave; ?>"> <?php echo $usuario_nombre?> </option>
                                                                        <?php 
                                                                        }?>
                                                                </select>
                                                            </div>
                                                                    </div>
														
														
                                                    <div class="form-group">
                                                        <label>Descripción</label>
                                                        <textarea rows="10" wrap="hard" class="form-control" name="descripcion" required></textarea>
                                                    </div>
															</tr>
															<tr>
																
																<td><input type="hidden" name="fecha" value="<?php echo $fecha;?>" ></td>
															</tr>
															<tr>
																
																<td><input type="hidden" name="hora" value="<?php echo $hoy;?>" ></td>
															</tr>
															<tr>
										<!--						<td>Usuario clave: </td>   -->
																<td><input type="hidden" name="usuario_clave" value="<?php echo $_SESSION['clave'];?>"> </td>
															</tr>
															<tr>
										<!--						<td>Tipo form: </td>        -->
																<td><input type="hidden" name="tipo_form" value=5> </td>
															</tr>

															<tr>
										<!--							<td>Importancia: </td>    -->
																<td><input type="hidden" name="importancia" value=1> </td>
															</tr>
															<tr>
										<!--						<td>Destacar: </td>     -->
																<td><input type="hidden" name="destacar" value=1> </td>
															</tr>
															
															<!-- Siempre los reclamos tienen tipo_form 5 -->
                                                            

                                                            <div class="row mx-5">
                                                            <button type="submit" class="btn btn-primary col-lg-9 col-md-9"><b>Agregar publicación</b></button> 
                                                            
                                                            </div>
														
													</form>
												</div>
									<div class="modal-footer">
            					</div>
            				</div>
        				</div>
       				    </div>
                        <section class="py-0 my-0">





                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover" id="table_reclamos">
                                    <thead class="bg-primary" style="color:white">
                                        <tr>
                                            <th class="col-lg-3 col-md-2" scope="col">Nombre</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Tipo</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Fecha</th>
                                            <th class="col-lg-4 col-md-6" scope="col">Descripción</th>
                                            
                                        </tr>
                                    </thead>

                                    <?php if($consultaFormulario): foreach($consultaFormulario as $row): ?>
                                    <tr>
                                        <td><?php echo "<b>".$row['usuario_nombre']."</b><br>"?>
                                            <?php echo "<small>"."N° departamento: ".$row['dep_numero']."</small>"?>
                                            <?php echo "<small>".$row['usuario_correo']."</small>"?></td>
                                        <td>
                                            <?php
                                        
                                            if($row['tipo_form_clave'] =='1'){
                                    
                                                echo '<span class="badge bg-primary text-white">Información</span>';

                                                }else if($row['tipo_form_clave']  == '2'){
                                            
                                                    echo '<span class="badge bg-danger text-white">Publicidad</span>';

                                                    }else if($row['tipo_form_clave']  =='3'){

                                                    echo '<span class="badge bg-warning text-white">Recomendaciones</span>';
                                                    
                                                    }else if($row['tipo_form_clave']  =='4'){

                                                    echo '<span class="badge bg-success text-white">Otro</span>';

                                                    }else if($row['tipo_form_clave']  =='5'){

                                                    echo '<span class="badge bg-danger text-white">Reclamos</span>';

                                                }
                                           
                                            ?>

                                        </td>

                                        <td><?php echo $row['fecha_formateada']?> </td>

                                        <td><?php echo "<b>".strtoupper($row['form_titulo'])."</b><br>"?>
                                            <?php echo $row['form_descripcion']?></td>

                                        <td class="d-flex justify-content-end px-1">



                                        </td>
                                    </tr>

                                    <!-- Modal actulizar publicacion -->

                                    <?php include("../partes/hu1_modales_diariomural/modal_modificar_publicacion.php") ;?>



                                    <?php endforeach; endif ?>

                                </table>

                            </div>

                        </div>
                    </div>
                </section>                                                       

			
                
        </div>
    </div>
    <!-- Modal publicar -->

    <?php include("../partes/hu1_modales_diariomural/modal_publicar.php") ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Data table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
     <!-- Data table cambio de idioma -->
    <script type="text/javascript" src="../js/hu4_reclamos.js"></script>


</body>

</html>
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
            <div id="content" class="bg-light w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <h1 class="font-weight-bold mb-0">Bienvenido</h1>
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
                                <h2 class="font-weight-bold mb-0">Diario mural</h2>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <button class="btn btn-primary" style="width: 100%;" data-toggle="modal"
                                    data-target="#publicar"><b>Publicar</b></button>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-0 my-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <table class="table table-hover" id="table_id">
                                    <thead class="bg-primary" style="color:white">
                                        <tr>
                                            <th class="col-lg-3 col-md-2" scope="col">Nombre</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Tipo</th>
                                            <th class="col-lg-2 col-md-1" scope="col">Fecha</th>
                                            <th class="col-lg-4 col-md-6" scope="col">Descripción</th>
                                            <th class="col-lg-1 col-md-2" scope="col">Opciónes</th>
                                        </tr>
                                    </thead>

                                    <?php if($consultaFormulario): foreach($consultaFormulario as $row): ?>
                                        
                                        <!-- Se usa replace para mostrar un salto de linea en PHP y html. -->
                                        <?php $order = array("\n");
                                            $replace = '<br/>';
                                            $newdescripcion = str_replace($order,$replace,$row['form_descripcion']);
                                        ?>
                                        <?php if($row['usuario_clave'] == 2){ ?>
                                    <tr>
                                        <td><?php echo "<b>".$row['usuario_nombre']."</b><br>"?>
                                            <?php echo "<small>"."N° departamento: ".$row['dep_numero']."</small>"?>
                                            <?php echo "<small>".$row['usuario_correo']."</small>"?></td>
                                        <td>
                                            <?php
                                        
                                            if($row['tipo_form_clave'] =='4'){
                                    
                                                echo '<span class="badge bg-primary text-white">Información</span>';

                                                }else if($row['tipo_form_clave']  == '5'){
                                            
                                                    echo '<span class="badge bg-danger text-white">Publicidad</span>';

                                                    }else if($row['tipo_form_clave']  =='6'){

                                                    echo '<span class="badge bg-warning text-white">Recomendaciones</span>';
                                                    
                                                    }else if($row['tipo_form_clave']  =='3'){

                                                    echo '<span class="badge bg-success text-white">Otro</span>';

                                                }
                                           
                                            ?>

                                        </td>

                                        <td><?php echo $row['fecha_formateada']?> </td>

                                        <td><?php echo "<b>".strtoupper($row['form_titulo'])."</b><br>"?>
                                            <?php echo $newdescripcion?></td>

                                        <td class="">

                                            <button type="button" class="btn btn-primary mx-1" data-toggle="modal"
                                                data-target="#modificar_publicacion<?php echo $row['form_clave'];?>">
                                                <i class="fa-solid fa-book"></i></button>

                                            <a class="btn btn-primary"
                                                href="../controlador/hu1_controlador_diariomural/hu1_eliminar_diariomural.php?id=<?php echo $row['form_clave'];?>"><i
                                                    class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>

                                    <!-- Modal actulizar publicacion -->

                                    <?php include("../partes/hu1_modales_diariomural/modal_modificar_publicacion.php") ;?>


                                    <?php }?>
                                    <?php endforeach; endif ?>

                                </table>

                            </div>

                        </div>
                    </div>
                </section>

            </div>

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
    <script type="text/javascript" src="../js/hu1_diariomural.js"></script>


</body>

</html>
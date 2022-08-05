<!-- Modal publicar -->
<div class="modal fade bd-example-modal-lg" id="publicar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-weight-bold mb-0">Formulario de creación de anuncio</h2>
                <button type="button" class="btn btn-primary" id="cerrarFormulario" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controlador/hu1_controlador_diariomural/hu1_publicar_diariomural.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-5 col-md-5">

                            <label>Tipo de anuncio</label>
                            <select class="form form-control" name="tipo_anuncio" required>
                                <option value="4">Información</option>
                                <option value="5">Publicidad</option>
                                <option value="6">Recomendaciones</option>
                                <option value="3">Otro</option>
                            </select>
                        </div>


                        <div class="form-group col-lg-2 col-md-2">
                            <label>Destacar</label>
                            <div class="custom-control custom-switch custom-switch-md">
                                <input type="checkbox" class="custom-control-input" name="destacar" id="destacar" checked>
                                <label class="custom-control-label" for="destacar"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea rows="10" wrap="hard" class="form-control" name="descripcion" required></textarea>

                    </div>

                    <div class="row mx-5">

                        <div class="form-group col-lg-12 col-md-12 mt-2">

                            <button type="submit" class="btn btn-primary col-lg-9 col-md-9"><b>Agregar publicación</b></button>
                            <button type="reset" class="btn btn-primary col-lg-2  col-md-2"><i class="fa-solid fa-trash"></i>&nbsp</button>

                        </div>


                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
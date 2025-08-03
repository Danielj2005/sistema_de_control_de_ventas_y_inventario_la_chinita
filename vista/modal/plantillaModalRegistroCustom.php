<!-- // crear componente de modal reutilizable y acondicionable php -->

<?php 
    function renderModal($modulo, $idModal,  $widthModal, $iconTitleModal, $titleModal, $buttonSaveText, $buttonCancelText) {
        $modulos = ["registrarProveedor",'registrar','registrar'];
        
        ?>
            <div class="modal fade" id="<?= $idModal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div id="modal_tamano" class="modal-dialog modal-dialog-scrollable <?= $widthModal ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?=  $modulos[$modulo]; ?><i class="<?= $iconTitleModal ?>"></i>&nbsp; <?= $titleModal ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row" id="body_modal">
                            <!-- Aquí se cargará el contenido del modal dinámicamente -->
                            
                            <?php 
                                if ($modulos[0] == $modulo) { ?>
                                    <form id="formularioRegistrar" action="../controlador/proveedor_controller.php" method="post" class="SendFormAjax row" autocomplete="off" data-type-form="save">
                                        <input type="hidden" name="modulo" value="Guardar">
                                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                                            <label class="form-label">Cédula / RIF <span style="color:#f00;">*</span></label>
                                            <div class="col-md-4 input-group">
                                                <select class="input-group-text" id="nacionalidad" name="nacionalidad" required>
                                                    <option value="V-">V</option>
                                                    <option value="R-">RIF</option>
                                                    <option value="E-">E</option>
                                                    <option value="J-">J</option>
                                                </select>
                                                <input type="text" class="form-control" pattern="[0-9]{7,8}" minlength="6" maxlength="8" placeholder="ingresa la cédula / RIF" name="cedula" id="cedula" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                                            <label for="validationDefault02" class="form-label">Nombre <span style="color:#f00;">*</span></label>
                                            <input type="text" class="form-control"  placeholder="ingresa el nombre" id="nombre_proveedor" name="nombre_proveedor" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                                            <label for="validationDefault02" class="form-label">Correo <span style="color:#f00;">*</span></label>
                                            <input type="text" class="form-control" placeholder="ingresa el correo" id="correo" name="correo" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                                            <label for="validationDefault05" class="form-label">Teléfono <span style="color:#f00;">*</span></label>
                                            <input type="text" class="form-control" maxlength="11" name="telefono" placeholder="ingresa el teléfono" id="telefono" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 mb-3">
                                            <label for="validationDefault03" class="form-label">Dirección <span style="color:#f00;">*</span></label>
                                            <input type="text" class="form-control" name="direccion" placeholder="ingresa la dirección" id="direccion" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 mb-3 text-center">
                                            <div class="text-start"> <p>Los campos con <span style="color:#f00;">*</span> son obligatorios</p> </div>
                                        </div>
                                    </form>
                                <?php }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="formularioRegistrar" class="btn btn-success"><?= $buttonSaveText ?></button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= $buttonCancelText ?></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }




?>



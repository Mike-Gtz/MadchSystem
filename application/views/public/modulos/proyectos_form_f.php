 
            <!--/.col-->
            <div class="col-lg-12">
                <form id="form-registro"> 
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="idProyecto" value="<?php echo (isset($idProyecto)) ? $idProyecto : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del proyecto</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="250" class="form-control" id="nombreProyecto" value="<?php echo (isset($nombreProyecto)) ? $nombreProyecto : ''; ?>">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                        <input type="text" maxlength="250" class="form-control" id="descripcion" value="<?php echo (isset($descripcion)) ? $descripcion : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Estatus</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" aria-label="Default select example">
                            <option value="1">Activo</option>
                            <option value="0">Inhabilitado</option>
                        </select>
                    </div>
                  </div>


                  <div class="float-right mt-2">
                    <?php
                        echo(!$editable ? "<input type='submit' id='btn-save' class='btn btn-info btn-save' value='Guardar registro'>" : "<input type='submit' id='btn-edit' class='btn btn-info btn-edit' value='Editar registro'>"); 

                    ?>
                      
                  </div>
                </form>   
            </div>
            <!--/.col-->
 
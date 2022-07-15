 
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
                            <option value="1" <?php echo (isset($status) && $status == 1) ? 'selected' : ''; ?>>Activo</option>
                            <option value="0" <?php echo (isset($status) && $status == 0) ? 'selected' : ''; ?>>Inhabilitado</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Servicios</label>
                    <div class="col-sm-10">
                        <?php if(isset($servicios_disponibles)){ ?>
                            <select class="form-control" multiple="multiple" id="servicios" aria-label="Default select example">
                                <?php foreach ($servicios_disponibles as $serv) { ?>
                                <option value="<?php echo($serv->idServ) ?>"><?php echo($serv->nombreServ) ?></option> 
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                  </div>

                <?php if(isset($servicios_proyecto)){ ?>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Servicios acuales</label>
                    <div class="col-sm-10">
                        <?php foreach ($servicios_proyecto as $serv_actual) { ?>
                            <span class="badge badge-pill badge-secondary"><?php echo($serv_actual->nombreServ) ?> <i class="fa fa-times btn-delete-serv" data-id=<?php echo($serv_actual->idPs) ?>> </i></span> 
                        <?php } ?>
                    </div>
                  </div>
                <?php } ?>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Equipo</label>
                    <div class="col-sm-10">
                        <?php if(isset($usuarios_disponibles)){ ?>
                            <select class="form-control" multiple="multiple" id="usuarios" aria-label="Default select example">
                                <?php foreach ($usuarios_disponibles as $usr) { ?>
                                <option value="<?php echo($usr->idUsuario) ?>"><?php echo($usr->nombre." ".$usr->apellidos) ?></option> 
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                  </div>

                <?php if(isset($usuarios_proyecto)){ ?>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Servicios acuales</label>
                    <div class="col-sm-10">
                        <?php foreach ($usuarios_proyecto as $usr_actual) { ?>
                            <span class="badge badge-pill badge-secondary"><?php echo($usr_actual->nombre." ".$usr_actual->apellidos) ?> <i class="fa fa-times btn-delete-usr" data-id=<?php echo($usr_actual->idEquipo) ?>> </i></span> 
                        <?php } ?>
                    </div>
                  </div>
                <?php } ?>
                  <div class="float-right mt-2">
                    <?php
                        echo(!$editable ? "<input type='submit' id='btn-save' class='btn btn-info btn-save' value='Guardar registro'>" : "<input type='submit' id='btn-edit' class='btn btn-info btn-edit' value='Editar registro'>"); 

                    ?>
                      
                  </div>
                </form>   
            </div>
            <!--/.col-->
 
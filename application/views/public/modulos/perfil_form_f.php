 
            <!--/.col-->
            <div class="col-lg-12">
                <form id="form-registro"> 
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control-plaintext" id="idUsuario" value="<?php echo (isset($idUsuario)) ? $idUsuario : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" value="<?php echo (isset($nombre)) ? $nombre : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidos" value="<?php echo (isset($apellidos)) ? $apellidos : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" value="<?php echo (isset($email)) ? $email : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="contra" value="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telefono" value="<?php echo (isset($telefono)) ? $telefono : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tipo</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="tipo" aria-label="" readonly>
                            <option value="Admin">Admin</option>
                            <option value="Colaborador">Colaborador</option>
                        </select>
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Vencimiento de contraseña</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="vencimiento" value="<?php echo (isset($vencimiento)) ? $vencimiento : ''; ?>" readonly style="font-weight: bold;">
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
 
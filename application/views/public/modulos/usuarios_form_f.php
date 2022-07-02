 
            <!--/.col-->
            <div class="col-lg-12">
                <form id="form-registro"> 
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="idUsuario" value="<?php echo (isset($idUsuario)) ? $idUsuario : ''; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" value="<?php echo (isset($nombre)) ? $nombre : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellidos" value="<?php echo (isset($apellidos)) ? $apellidos : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" value="<?php echo (isset($email)) ? $email : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Contrasena</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="contra" value="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="telefono" value="<?php echo (isset($telefono)) ? $telefono : ''; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Tipo</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="tipo" aria-label="">
                            <option value="Admin">Admin</option>
                            <option value="Colaborador">Colaborador</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Estatus</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="status" aria-label="Default select example">
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
 
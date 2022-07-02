 
            <!--/.col-->
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Usuarios</strong>
                            </div>
                            <div class="card-body">
                            <?php if (isset($registros) && $registros != null) { ?>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre(s)</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Teléfono</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($registros as $row) { ?>
                                        <tr>
                                            <th scope="row"><?php echo($row->idUsuario) ?></th>
                                            <td><?php echo($row->nombre) ?></td>
                                            <td><?php echo($row->apellidos) ?></td>
                                            <td><?php echo($row->email) ?></td>
                                            <td><?php echo($row->telefono) ?></td>
                                            <td><?php echo($row->tipo) ?></td>
                                            <td><?php  echo ($row->status ? 'Activo' : 'Inhabilitado') ?></td>
                                            <td>
                                                <button class="btn btn-success btn-update" data-id='<?php echo($row->idUsuario) ?>'>Editar</button>
                                                <button class="btn btn-danger btn-delete" data-id='<?php echo($row->idUsuario) ?>'>Eliminar</button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>                                
                            <?php
                                    }else{ ?>
                                <div class="card bg-light text-center">
                                  <div class="card-header">
                                    No hay registros de <?=$_APP['page_title']?>
                                  </div>
                                  <div class="card-body">
                                     <p class="card-text">Sin resultados </p>
                                   </div> 
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            <!--/.col-->

            <!--/.col-->

            <!--/.col-->

            <!--/.col-->

            <!--/.col-->

            <!--/.col-->


            <!--/.col-->

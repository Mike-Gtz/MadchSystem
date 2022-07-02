 
            <!--/.col-->
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Servicios</strong>
                            </div>
                            <div class="card-body">
                            <?php if (isset($registros) && $registros != null) { ?>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($registros as $row) { ?>
                                        <tr>
                                            <th scope="row"><?php echo($row->idServ) ?></th>
                                            <td><?php echo($row->nombreServ) ?></td>
                                            <td><?php  echo ($row->status ? 'Activo' : 'Inhabilitado') ?></td>
                                            <td>
                                                <button class="btn btn-success btn-update" data-id='<?php echo($row->idServ) ?>'>Editar</button>
                                                <button class="btn btn-danger btn-delete" data-id='<?php echo($row->idServ) ?>'>Eliminar</button>
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
 

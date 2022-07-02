
    <!-- Page Content -->
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/banner2.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Iniciar Sesión</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message text-center">
      <div class="container text-center">
        <div class="row text-center">
          <div class="col-md-12 text-center">
            <div class="section-heading">
              <h2 class="text-center">Kalia Code</h2>
            </div>
          </div>
          <div class="col-md-8 mx-auto">
            <div class="contact-form mx-auto">
              <form id="contact" action="admin/usuarios.php" method="post">
                <div class="row text-center">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="Correo Electrónico" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="password" class="form-control" id="contra" placeholder="Contraseña" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button btn-login">Iniciar Sesión</button>
                      <button href="<?=base_url('admin/usuarios')?>" class="filled-button">Solo navegacion</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

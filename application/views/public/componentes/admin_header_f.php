    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Kalia &nbsp;<span class="text-primary">Code</span></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Administración </a>
                    </li>
                    <h3 class="menu-title">Admin. Usuarios</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="<?=base_url('usuarios')?>">Usuarios</a>
                    </li>

                    <h3 class="menu-title">Admin. Proyectos</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="<?=base_url('proyectos')?>">Proyectos</a>
                    </li>

                    <h3 class="menu-title">Admin. Servicios</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="<?=base_url('servicios')?>">Servicios</a>
                    </li>

                    <h3 class="menu-title">Salir</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="<?=base_url('logout')?>">Cerrar Sesión</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?=$_APP['breadcrumb']?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <?php if($_APP['button_text']){
                                echo ("<a href='#' id='btn-breadcrumb' class='btn btn-info'>{$_APP['breadcrumb']}</a>");
                            } ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3" id="div_contenido">
 
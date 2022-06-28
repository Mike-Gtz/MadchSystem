<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Madch System | Editar Usuarios</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


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
                        <a href="usuarios.php">Usuarios</a>
                    </li>

                    <h3 class="menu-title">Admin. Proyectos</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="proyectos.php">Proyectos</a>
                    </li>

                    <h3 class="menu-title">Admin. Servicios</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="servicios.php">Servicios</a>
                    </li>

                    <h3 class="menu-title">Salir</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="../inicio.php">Cerrar Sesión</a>
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
                        <h1>Editar Usuarios</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="#" class="btn btn-info">Agregar Usuario</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            
            <!--/.col-->
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Lista de Usuarios</strong>
                            </div>
                            <div class="card-body">
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
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Miguel</td>
                                            <td>Gutiérrez Medina</td>
                                            <td>miguel@kaliacode.com</td>
                                            <td>442-431-65-78</td>
                                            <td>Administrador</td>
                                            <td>Activo</td>
                                            <td><button class="btn btn-success">Editar</button><button class="btn btn-danger">Eliminar</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Miguel</td>
                                            <td>Gutiérrez Medina</td>
                                            <td>miguel@kaliacode.com</td>
                                            <td>442-431-65-78</td>
                                            <td>Administrador</td>
                                            <td>Activo</td>
                                            <td><button class="btn btn-success">Editar</button><button class="btn btn-danger">Eliminar</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Miguel</td>
                                            <td>Gutiérrez Medina</td>
                                            <td>miguel@kaliacode.com</td>
                                            <td>442-431-65-78</td>
                                            <td>Administrador</td>
                                            <td>Activo</td>
                                            <td><button class="btn btn-success">Editar</button><button class="btn btn-danger">Eliminar</button></td>
                                        </tr>
                                    </tbody>
                                </table>

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


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

</body>

</html>
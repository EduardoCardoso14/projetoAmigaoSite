<?php
session_start();
require_once 'banco.php';
require_once 'class.php';
$db = new banco;
$login = $_SESSION['username'];
$usuarinho = new usuario;
$result = $usuarinho->pegar_user($login);
while ($linha = $result->fetch_array()) {
    $_SESSION['id'] = $linha['id'];
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supermercado Amigão</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./copiahtml/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="./copiahtml/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="./copiahtml/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="./copiahtml/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./copiahtml/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="./copiahtml/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="./copiahtml/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="./copiahtml/plugins/summernote/summernote-bs4.min.css">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader 
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./copiahtml/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
-->
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./home.php" class="nav-link">Início</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="users.php" class="nav-link">Usuários</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="products.php" class="nav-link">Produtos</a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="./home.php" class="brand-link">
                    <img src="./copiahtml/dist/img/logo1.jpg" alt="ADM Amigao" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">ADM Amigão</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="./copiahtml/dist/img/usericon.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="profile.php" class="d-block"><?= $login ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-header">MENU</li>
                            <li class="nav-item">
                                <a href="./users.php" class="nav-link">
                                    <i class="nav-icon far fa-user"></i>
                                    <p>
                                        Usuários
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./products.php" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Produtos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./sair.php" class="nav-link">
                                    <i class="fas fa-angle-left right"></i>
                                    <p>
                                        Sair
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <?php
                                $edshir = new usuario;
                                $result = $edshir->contar();
                                while ($linha = $result->fetch_array()) {
                                ?>
                                    <h1 class="m-0">Usuários - <?= $linha['contador'] ?></h1>
                                <?php
                                }
                                ?>
                                <h1 class="m-0">
                                    <?php
                                    if (isset($_SESSION['message2'])) {
                                        echo " - " . $_SESSION['message2'];
                                        unset($_SESSION['message2']);
                                    } else {
                                        echo '';
                                    }
                                    if (isset($_SESSION['message3'])) {
                                        echo " - " . $_SESSION['message3'];
                                        unset($_SESSION['message3']);
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <form class="form-inline" method="GET" action="./users.php">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </ol>
                            </div><!-- /.col -->
                            <div class="col-sm-3">
                                <hr>
                                <form action="./cad_user.php">
                                    <button type="submit" class="btn btn-block btn-default btn-lg">Cadastrar Novo Usuário</button>
                                </form>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>

                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- USERS LIST -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Todos os usuários</h3>

                                        <div class="card-tools">
                                            <span class="badge badge-danger">Todos</span>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <ul class="users-list clearfix">
                                            <?php
                                            $user = new usuario;
                                            $result = $user->listar();
                                            while ($linha = $result->fetch_array()) {

                                            ?>
                                                <li>
                                                    <img src="./copiahtml/dist/img/usericon.png" alt="User Image">
                                                    <a class="users-list-name" href="#"><?= $linha['login'] ?></a>
                                                    <span class="users-list-date"><?= $linha['data_cad'] ?></span>
                                                    <a href="./deletar_user.php?id=<?= $linha['id'] ?>">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/5028/5028066.png" alt="User Image" style="width: 40px">
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <!-- /.users-list -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer text-center">
                                        <a href="javascript:">Ver todos os usuários</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </div>
                            <?php
                            if (isset($_GET['search'])) {
                            ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Todos os usuários</h3>

                                            <div class="card-tools">
                                                <span class="badge badge-danger">Todos</span>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <ul class="users-list clearfix">
                                                <?php
                                                $search = $_GET['search'];
                                                $usuarinho = new usuario;
                                                $result = $usuarinho->buscar_um_usuario($search);
                                                while ($linha = $result->fetch_array()) {
                                                ?>
                                                    <li>
                                                        <img src="./copiahtml/dist/img/usericon.png" alt="User Image">
                                                        <a class="users-list-name" href="#"><?= $linha['login'] ?></a>
                                                        <span class="users-list-date"><?= $linha['data_cad'] ?></span>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                            <!-- /.users-list -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-center">
                                            <a href="javascript:">Ver todos os usuários</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!--/.card -->
                        </div>
                    </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="#">Supermercado Amigão
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
    </body>

    </html>
<?php
}
echo "SAI DAQUI CACHORRO";
?>
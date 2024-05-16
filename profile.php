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
    $teste = $linha['data_cad'];
    $data = strftime('%d/%m/%Y', strtotime($teste));
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
                        <a href="./users.php" class="nav-link">Usuários</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="./products.php" class="nav-link">Produtos</a>
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
                            <img src="./copiahtml/dist/img/usericon.png"" class=" img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="./profile.php" class="d-block"><?= $login ?></a>
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
                                <h1 class="m-0">Seu perfil
                                    <?php
                                     if (isset($_SESSION['message10'])) {
                                        echo " - " . $_SESSION['message10'];
                                        unset($_SESSION['message10']);
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="./copiahtml/dist/img/usericon.png" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?= $login ?></h3>

                                        <p class="text-muted text-center">Administrador Amigão</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>ID Usuário</b> <a class="float-right"><?= $linha['id'] ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Data do cadastro</b> <a class="float-right"><?= $data ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Data da última atualização</b> <a class="float-right">
                                                    <?php
                                                    if (isset($linha['data_edicao'])) {
                                                        $teste = $linha['data_edicao'];
                                                        $data = strftime('%d/%m/%Y', strtotime($teste));
                                                        echo $data;
                                                    } else {
                                                        echo "Ainda não tem";
                                                    }

                                                    ?>
                                                </a>
                                            </li>
                                        </ul>

                                        <a href="users.php" class="btn btn-primary btn-block"><b>Ver todos os usuários</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" method="post" action="edit_cad_user.php">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="nome" class="form-control" id="inputName" placeholder="Nome" value="<?=$linha['nome']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Login</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="login"  class="form-control" id="inputEmail" placeholder="Login" value="<?=$linha['login']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Senha</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="senha"  class="form-control" id="inputName2" placeholder="Senha" value="<?=$linha['senha']?>">
                                                    </div>
                                                    <input type="hidden" name="id"  class="form-control" id="inputName" placeholder="id" value="<?=$linha['id']?>">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" name="save" class="btn btn-danger">Atualizar cadastro</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
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
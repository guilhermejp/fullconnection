<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FullConnection | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini fixed">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a class="logo" style="background-color: #fff;">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><img src="<?= base_url('assets/images/fullmini.png'); ?>" width="100%;"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="<?= base_url('assets/images/fulllogo2.png'); ?>" width="100%;"></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="#" data-toggle="control-sidebar" title="Configurações"><i class="fa fa-gears"></i></a>
                            </li>
                            <li>
                                <a href="<?= base_url('login'); ?>" title="Sair"><i class="fa fa-sign-out"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt=""><br>
                        </div>
                        <div class="pull-left info">
                            <p>Administrador</p>
                        </div>
                    </div>
                    <!-- search form
                    <form action="#" method="get" class="sidebar-form">
                      <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                      </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <!--<li class="header">NAVEGAÇÃO PRINCIPAL</li>-->
                        <li>
                            <a href="<?= base_url('checklists'); ?>">
                                <i class="fa fa-files-o"></i> <span>Checklists</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('clientes'); ?>">
                                <i class="fa fa-users"></i> <span>Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('log'); ?>">
                                <i class="fa fa-file-text"></i> <span>Log</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>


            <div class="modal fade" id="modal-confirm-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Default Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal modal-primary fade" id="modal-confirm-primary">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Primary Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal modal-info fade" id="modal-confirm-info">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Info Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal modal-warning fade" id="modal-confirm-warning">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Warning Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal modal-success fade" id="modal-confirm-success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Success Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class="modal modal-danger fade" id="modal-confirm-danger">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Danger Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer" align="center">
                            <button type="button" class="btn btn-outline yes" data-dismiss="modal">SIM</button>
                            <button type="button" class="btn btn-outline no" data-dismiss="modal">NÃO</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <div class="alert alert-info message-info message">
                <h4><i class="icon fa fa-info"></i> <span class="title"> Informação!</span></h4>
                <p class="body">
                    texto
                </p>
            </div>
            <div class="alert alert-warning message-warning message">
                <h4><i class="icon fa fa-warning"></i> <span class="title"> Atenção!</span></h4>
                <p class="body">
                    texto
                </p>
            </div>
            <div class="alert alert-success message-success message">
                <h4><i class="icon fa fa-check"></i> <span class="title"> Sucesso!</span></h4>
                <p class="body">
                    texto
                </p>
            </div>

            <div class="alert alert-danger message-error message">
                <h4><i class="icon fa fa-ban"></i><span class="title"> Erro!</span></h4>
                <p class="body">
                    texto
                </p>
            </div>

            <style>
                .message{
                    position: fixed;
                    width: 30%;
                    right: 0px;
                    top: 10%;
                    opacity: 0.8;
                    z-index: 9999;
                    filter: alpha(opacity=50); /* For IE8 and earlier */
                    display: none;
                }
            </style>

            <script>
                function mensagem(type = '', message = '', delay = '3000', title = '') {

                    $(".message-" + type + " .body").text(message);
                    if (title != "") {
                        $(".message-" + type + " .title").text(title);
                    }
                    $(".message-" + type).toggle("slide");
                    if (delay !== 0) {
                        setTimeout(function () {
                            $(".message-" + type).slideToggle("fast");
                        }, delay);
                }

                }

            </script>
            <script src="<?= base_url('assets/js/ajax.js') ?>"></script>
<?php
require ('../../server/funcoes.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brisanet Telecomunicações</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
     <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/main.css">
    <!-- AdminLTE min-->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- AdminLTE Skins min -->
    <link rel="shortcut icon" href="http://brisanet.com.br/images/favicon.ico" type="image/x-icon">
    <!-- Google Map -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans+Condensed:700,300,300italic|Open+Sans:400,300italic,400italic,600,600italic,700,700italic,800,800italic|PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'/>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.20&sensor=false"></script>
    <script type="text/javascript" src="../../dist/js/jquery.js"></script>

    <style type="text/css">
    #legend {
    background: white;
    padding: 10px;
    top: 5px !important;
    right: 5px !important;
    font-size: 14px;
    }
  .display-flex {
    display: flex;
  }
  .legend-box {
    width: 15px;
    height: 15px;
    border: 1px solid;
    margin-top: 2px;
    margin-right: 5px;

  }
</style>

  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="#" class="navbar-brand"><img src="/mapabrisa/dist/img/logo.png" height="50px" width="200px">
              <b><a href="#" class="navbar-brand" style="margin-left: 800px ;bold 20p; font-family:ubuntu"></a></b>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

          </div><!-- /.container-fluid -->
        </nav>
      </header>

      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
   <div class="col-md-13">
   <br>
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title" style="font-family: ubuntu;">Conheça nossos escritórios !</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool"><div class="col-md-6 col-sm-12"><i class="fa fa-fw fa-map-marker"></i></div></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
              <div id="legend">
                  Legenda:
                  <div class="display-flex"><div class="legend-box" style="background: #337ab7;"></div> Ponto de Pagamento</div>
                  <div class="display-flex"><div class="legend-box" style="background: #f39c12;"></div> Escritórios</div>
                </div>
              <div id="map-canvas" style="width:100%;height:700px;"/>


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          <!-- Main content -->
          <section class="content">
            <?php listarEscritoriosCadastrados(); ?>          

          </section><!-- /.content -->
        </div><!-- /.container -->
         </div>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong><div class="text-center">
                    <a href="https://www.facebook.com" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://plus.google.com/" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                    <a href="https://www.instagram.com/" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                    <a href="https://twitter.com/?lang=pt-br" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                  </div>
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Carregamos o Mapa -->
    <script src="../../dist/js/functionMapa.js"></script>
  </body>
</html>

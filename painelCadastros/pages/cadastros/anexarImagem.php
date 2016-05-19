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
    <!-- AdminLTE Skins. Choose a skin from the css/skins -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <link rel="shortcut icon" href="http://brisanet.com.br/images/favicon.ico" type="image/x-icon">

    <link href="../../dist/css/jquery.gritter.css" rel="stylesheet">

  </head>

  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

           <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php" class="navbar-brand"><img src="/Java/painelCadastros/dist/img/logoBrisanet.png" height="30px" width="140px">
              <b><a href="#" class="navbar-brand" style="margin-left: 800px ;bold 20p; font-family:ubuntu"></a></b>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <?php if ($_GET['go'] == 'anexos') {
      $id_passado = $_GET['id'];

      echo '     
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="col-md-13">
            <form method="POST"  id="uploadPicture">
               <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Anexar Imagens  - Tamanho Ideal em Pixels 900 por 720</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
               <div class="box-body">
               <div class="row">
                  <div class="btn btn-default btn-file" style="margin-left:10px;">
                  <i class="fa fa-camera"></i> Selectione a foto
                  <input type="file" id="foto" name="foto">
                  <input type="hidden" id="id_escritorio" value="'.$id_passado.'" name="id_escritorio">
                </div>
                  </div>
                  <div class="box-footer">
                <div class="btn-group pull-right">
                     <button type="submit" class="btn btn-primary">
                       <i class="fa fa-edit"></i> Salvar
                     </button>
                    </div>
                 </div><!-- /.box-footer -->
              </div>
            </div>
            </form>
            </section>';

          }

          else {

        echo' <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="col-md-13">
            <form method="POST"  id="cadastrar_mapa_brisanet">
               <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Erro !</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
               <div class="box-body">
               <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Atenção</h4>
                    É necessario iniciar o metodo para realizar essa operação no sistema, dúvidas entrar em contato com mateusaires@brisanet.com.br, ou um de nossos desenvolvedores.
                  </div>
              </div>
            </div>
            </form>
            </section>';

          }
      ?>

        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Brisanet Telecomunicações</strong>, Desenvolvido por Brisanet Team.
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
     <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <script src="../../dist/js/jquery.gritter.min.js"></script>


    <script type="text/javascript">
//Scripts de validação JQUERY
jQuery(document).ready(function () {
  jQuery('#growl-primary').click(function(){
    jQuery.gritter.add({
      title: 'This is a regular notice!',
      text: 'This will fade out after a certain amount of time.',
      class_name: 'growl-primary',
      image: 'images/screen.png',
      sticky: false,
      time: ''
    });
    return false;
  });
  $('#uploadPicture').submit(function() {
    // Configurações para a requisição Ajax
    var dados = new FormData(this);
    $('#foto').change(function (event) {
      dados.append('foto', event.target.files[0]); // para apenas 1 arquivo
    })
    $.ajax({
      type: "POST",
      url: "../../server/salvarAnexo.php",
      processData: false,
      contentType: false,
      data: dados,
      success: function( data ) {
        if (data == true) {
          console.log(dados);
          jQuery.gritter.add({
            title: 'Anexo cadastrado com sucesso!',
            text: 'Atualizada com Sucesso !',
            class_name: 'growl-success',
            image: '../../dist/img/shield-ok-icon.png',
            sticky: false,
            time: '2000',
          });
          window.setTimeout("location.href=''",3000);
        }else if(data == false) {
          console.log(data);
          jQuery.gritter.add({
            title: 'Erro ao enviar imagem',
            text: 'Selecione a imagem',
            class_name: 'growl-warning',
            image: '../../dist/img/shield-warning-icon.png',
            sticky: false,
            time: '1000',
          });
          window.setTimeout("location.href=''",3000);
        }
      }
    });
    return false;
  });
});
    </script>
  </body>
</html>

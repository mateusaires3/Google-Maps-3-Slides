<?php 

session_start();
if ($_SESSION[ 'logado'] === true) {
$usuarioLogado = $_SESSION['nome_usuario']; 
$setorUsuario = $_SESSION['setor']; 
$nomeUsuario = $_SESSION['usuario']; 
include ('_validarSession.php'); 
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

                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <div class="col-md-13">
                        <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Usuário Logado:  <?php echo $usuarioLogado; ?> <a href="../../server/_deslogarUser.php"><i class="fa fa-fw fa-power-off"></i></a> </h3>

                            </div>
                        </div>
                        <br>

                        <div class="col-md-13">
                            <div class="box box-primary box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cadastrar Mapa</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <form method="POST" id="cadastrar_mapa_brisanet">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <label>Latitude</label>
                                                <input type="text" class="form-control" name="latitude" id="latitude" required="" placeholder="Latitude Ex: -7.000132">
                                            </div>
                                            <div class="col-xs-3">
                                                <label>Longitude</label>
                                                <input type="text" class="form-control" name="longitude" id="longitude" required="" placeholder="Longitutde Ex: - 31.2001221">
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Nome do Escritório</label>
                                                <input type="text" class="form-control" name="nome_escritorio" id="nome_escritorio" required="" placeholder="Nome do Escritório">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Informações sobre o Mapa</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Endereço:</label>
                                            <input type="text" class="form-control" name="rua_do_escritorio" id="rua_do_escritorio" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-2">
                                            <label>Nº Número</label>
                                            <input type="text" class="form-control" name="numero_do_escritorio" id="numero_do_escritorio" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Cidade/UF</label>
                                            <input type="text" class="form-control" name="cidade_do_escritorio" id="cidade_do_escritorio" required="" placeholder="">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Bairro:</label>
                                            <input type="email " class="form-control" name="bairro" id="bairro" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-4">
                                            <label>CEP:</label>
                                            <input type="text" class="form-control" name="cep" id="cep" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-4">
                                            <br>
                                            <label>Ponto de Referência:</label>
                                            <input type="text" class="form-control" name="referencia" id="referencia" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-4">
                                            <br>
                                            <label>Nº 0800</label>
                                            <input type="text" class="form-control" name="fixo" id="fixo" required="" placeholder="">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>Supervisor</label>
                                            <input type="text " class="form-control" name="supervisor" id="supervisor" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-group">
                                                <label>Status do Escritório</label>
                                                <select class="form-control select2" required="" name="status" id="status">
                                                    <option value="" disabled selected>Status</option>
                                                    <option value="Ativo">Ativo</option>
                                                    <option value="Em Construção">Em Construção</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>
                                    <br>


                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label>E-mail</label>
                                            <input type="email " class="form-control" name="email_do_escritorio" id="email_do_escritorio" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-4">
                                            <label>Telefone(Fixo)</label>
                                            <input type="text" class="form-control" name="numero1_do_escritorio" id="numero1_do_escritorio" required="" placeholder="">
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select class="form-control select2" name="tipo_do_cadastro" id="tipo_do_cadastro">
                                                    <option value="" disabled selected>Tipo</option>
                                                    <option value="Escritório">Escritório</option>
                                                    <option value="Pagamento">Ponto de Pagamento</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Cadastrar Mapa
                                        </button>
                                    </div>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </div>
                        </form>

                        <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Mapas Cadastrados</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="listarCadastrados" class="table table-bordered table-hover">
                                    <!-- Cabeçalho da tabela -->
                                    <thead>
                                        <tr>
                                            <th>Mapa</th>
                                            <th>Anexar Imagem</th>
                                            <th>Deletar</th>
                                            <th>Ver Imagens</th>
                                        </tr>
                                    </thead>
                                    <!-- Itens da tabela -->
                                    <tbody>
                                        <?php tabelaMapasCadastros(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->

                </section>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.3.0
                    </div>
                    <strong>Brisanet Telecomunicações</strong>, Desenvolvido por Brisanet Team.
                </div>
                <!-- /.container -->
            </footer>
        </div>
        <!-- ./wrapper -->





        <!-- jQuery 2.1.4 -->
        <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../../bootstrap/js/bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
        <!-- InputMask -->
        <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <!-- InputMask -->
        <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- Gritter -->
        <script src="../../dist/js/jquery.gritter.min.js"></script>
        <!-- Table -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <!-- Table -->
        <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script>
            $(function() {

                $("#numero1_do_escritorio").inputmask("(###) ####-####");
                $("#fixo").inputmask("####-###-####");
                $("#cep").inputmask("#####-###");
                $("#listarCadastrados").DataTable();
            });
        </script>


        <script type="text/javascript">
            $('#cadastrar_mapa_brisanet').submit(function() {
                // Convertemos os dados do formulário para Objeto
                var dados = {};
                $('#cadastrar_mapa_brisanet').serializeArray().map(function(x) {
                    dados[x.name] = x.value;
                });
                console.log(dados);
                // Configurações para a requisição Ajax
                $.ajax({
                    type: "POST",
                    url: "/Java/painelCadastros/server/cadastrarMapa.php",
                    data: dados,
                    success: function(data) {
                        if (data == false) {
                            jQuery.gritter.add({
                                title: 'Mapa Cadastrado com Sucesso!',
                                text: 'Você será redirecionado',
                                class_name: 'growl-success',
                                image: '/sasInstalacoes/resources/images/shield-ok-icon.png',
                                sticky: false,
                                time: '2000',
                            });
                            window.setTimeout("location.href=''", 3000);
                        } else if (data == true) {
                            jQuery.gritter.add({
                                title: 'Mapa já Cadastrado !',
                                text: 'Você será redirecionado',
                                class_name: 'growl-warning',
                                image: '/sasInstalacoes/resources/images/shield-warning-icon.png',
                                sticky: false,
                                time: '1000',
                            });
                            window.setTimeout("location.href=''", 3000);
                        }
                    }
                });
                return false;
            })
        </script>
</body>

</html>


<?php 
} 
else { 
header( 'location: /Java/painelCadastros/');
} 
?>
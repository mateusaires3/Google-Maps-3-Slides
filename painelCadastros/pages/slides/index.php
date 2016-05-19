<?php
require ('../../server/funcoes.php');
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Brisanet Telecomunicações</title>
	<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='dist/simplelightbox.min.css' rel='stylesheet' type='text/css'>
	<link href='demo.css' rel='stylesheet' type='text/css'>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <link rel="shortcut icon" href="http://brisanet.com.br/images/favicon.ico" type="image/x-icon">

    <link href="../../dist/css/jquery.gritter.css" rel="stylesheet">
</head>



<body>

              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Galeria de Fotos - Escritórios Brisanet</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool"><div class="col-md-6 col-sm-12"></i></div></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">

			   		<div class="container">

					<h1 class="align-center"><img src="../../dist/img/logo1.png" height="80" width="350"></h1>
					<div class="gallery">	
					 <div class="box box-primary box-solid">
                	<div class="box-header with-border">
                  <h3 class="box-title"></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool"><div class="col-md-6 col-sm-12"></i></div></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
					<?php listarFotos(); ?>		
					  </div>
                </div>
                <a href="../../pages/cadastros/index.php" class="btn btn-app">
                    <i class="fa fa-repeat"></i> Voltar ao Mapa
                  </a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
					<div class="clear"></div>	
					</div>
					<br><br>
					</div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<div class="text-center">
                    <a href="https://www.facebook.com" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://plus.google.com/" class="btn btn-social-icon btn-google"><i class="fa fa-google-plus"></i></a>
                    <a href="https://www.instagram.com/" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                    <a href="https://twitter.com/?lang=pt-br" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                  </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="dist/simple-lightbox.js"></script>
		<script>
			$(function(){
				var $gallery = $('.gallery a').simpleLightbox();
				
				$gallery.on('show.simplelightbox', function(){
					console.log('Requested for showing');
				})
				.on('shown.simplelightbox', function(){
					console.log('Shown');
				})
				.on('close.simplelightbox', function(){
					console.log('Requested for closing');
				})
				.on('closed.simplelightbox', function(){
					console.log('Closed');
				})
				.on('change.simplelightbox', function(){
					console.log('Requested for change');
				})
				.on('next.simplelightbox', function(){
					console.log('Requested for next');
				})
				.on('prev.simplelightbox', function(){
					console.log('Requested for prev');
				})
				.on('nextImageLoaded.simplelightbox', function(){
					console.log('Next image loaded');
				})
				.on('prevImageLoaded.simplelightbox', function(){
					console.log('Prev image loaded');
				})
				.on('changed.simplelightbox', function(){
					console.log('Image changed');
				})
				.on('nextDone.simplelightbox', function(){
					console.log('Image changed to next');
				})
				.on('prevDone.simplelightbox', function(){
					console.log('Image changed to prev');
				})
				.on('error.simplelightbox', function(e){
					console.log('No image found, go to the next/prev');
					console.log(e);
				});
			});
		</script>
</body>
</html>	
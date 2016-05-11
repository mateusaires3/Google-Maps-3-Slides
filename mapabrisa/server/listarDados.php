<?php

if ($_GET['ajax'] == 'listarDados') {
 $id = $_GET['valor'];
 header('Access-Control-Allow-Origin: *');  
 require ('conectar.php');
 $stmt = $conexao_pdo->prepare("SELECT * FROM t_mapa_brisanet_coordenadas WHERE id = '$id'");
  $stmt->execute();
	$rows = array();
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;

	}
	
	echo json_encode($rows);


}


if ($_GET['ajax'] == 'listarSlides') {
 $ids = $_GET['valor'];
 header('Access-Control-Allow-Origin: *');  
 require ('conectar.php');
 $stmt = $conexao_pdo->prepare("SELECT id, id_escritorio, anexo FROM t_mapa_brisanet_coordenadas, t_mapa_fotos_escritorios WHERE t_mapa_brisanet_coordenadas.id = t_mapa_fotos_escritorios.id_escritorio AND id = '$ids'");
  $stmt->execute();
	$rows = array();
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = '<li><img src="http://192.168.67.130/mapabrisa/server/Fotos/'.$r['anexo'].'"></li>';

	}
	
	echo json_encode($rows);


}



if ($_GET['ajax'] == 'listarSlideModal') {
 $id = $_GET['valor'];
 header('Access-Control-Allow-Origin: *');  
 require ('conectar.php');
 $stmt = $conexao_pdo->prepare("SELECT id, id_escritorio, anexo FROM t_mapa_brisanet_coordenadas, t_mapa_fotos_escritorios WHERE t_mapa_brisanet_coordenadas.id = t_mapa_fotos_escritorios.id_escritorio AND id = '$id'");
  $stmt->execute();
	$rows = array();
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
		    $rows[] = '<li><img src="http://192.168.67.130/mapabrisa/server/Fotos/'.$r['anexo'].'"></li>';


		}
	echo json_encode($rows);

}



?>

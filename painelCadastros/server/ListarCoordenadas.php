<?php
  header('Access-Control-Allow-Origin: *');  
  require ('conectar.php');
  $stmt = $conexao_pdo->prepare("SELECT * FROM t_mapa_brisanet_coordenadas");
  $stmt->execute();
	$rows = array();
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
	}
	echo json_encode($rows);


?>
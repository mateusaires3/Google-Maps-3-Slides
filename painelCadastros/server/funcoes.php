<?php
  function listarEscritoriosCadastrados() {
  require ('conectar.php');
  $criptografia = 'renavegeserogita123';
  $md5 = md5($criptografia);
  $stmt = $conexao_pdo->prepare("SELECT * FROM t_mapa_brisanet_coordenadas,t_mapa_fotos_escritorios WHERE t_mapa_brisanet_coordenadas.id = t_mapa_fotos_escritorios.id_escritorio  LIMIT 1");
    $stmt->execute();
    $result = array();
     while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $result[] = $r;
  

  echo'       <div class="col-md-4">
              <div class="box box-success box-solid">
              <div class="row">
                <div class="col-sm-10 col-md-12">
                  <div class="thumbnail">
                    <img src="../../server/Fotos/'.$r['anexo'].'">
                    <div class="caption">
                      <h3>Escritório '.$r['nome_escritorio'].'</h3>
                      <p>Endereço: '.$r['rua_do_escritorio'].' Nº: '.$r['numero_do_escritorio'].'</p>
                      <p>Bairro: '.$r['bairro'].' CEP: '.$r['cep'].'</p>
                      <p>Telefone: '.$r['numero1_do_escritorio'].'</p>
                      <p><a href="../slides/index.php?metodo='.$md5.'&id='.$r['id'].'" class="btn btn-primary" role="button">+ Fotos</a></p>
                    </div>
                  </div>
                </div>
              </div>
              </div><!-- /.box -->
            </div>   ';
           
      
       } 

}


function tabelaMapasCadastros() {
        require ('conectar.php');
        $criptografia = 'renavegeserogita123';
        $md5 = md5($criptografia);
        $stmt = $conexao_pdo->prepare("SELECT * FROM t_mapa_brisanet_coordenadas ");
        $stmt->execute();
              $result = array();
                 while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;
                          echo "<td >" .$r['nome_escritorio'] . "</td>";
                          echo "<td>".'<a href="./anexarImagem.php?go=anexos&id='.$r['id'].'"><i class="fa fa-fw fa-plus">'.'</i>'.'</a>'."</td>";
                          echo "<td>".'<a href="../../server/funcoes.php?metodo=Deletar&id='.$r['id'].'"><i class="fa fa-fw fa-remove">'.'</i>'.'</a>'."</td>";
                            echo "<td>".'<a href="../slides/index.php?metodo='.$md5.'&id='.$r['id'].'"><i class="fa fa-fw fa-folder-open-o">'.'</i>'.'</a>'."</td>";
                          echo "</tr>";
              }
}



  // Deletar User
    if($_GET['metodo'] == 'Deletar')
    {
      try
      {
    require ('conectar.php');
    $stmt = $conexao_pdo->prepare("DELETE FROM t_mapa_brisanet_coordenadas WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    echo "<script>alert('Registro Deletado')</script>";
    echo "<script>location.href = '/Java/painelCadastros/pages/cadastros/index.php'</script>";
      }
      catch(PDOException $e)
      {
    echo $e->getMessage();
      }
    }







function listarFotos() {
$criptografia = 'renavegeserogita123';
$md5 = md5($criptografia);
if ($_GET['metodo'] == $md5) {
    $id_pegado = $_GET['id'];
    require ('conectar.php');
        $stmt = $conexao_pdo->prepare("SELECT id, id_escritorio,anexo, nome_escritorio FROM t_mapa_brisanet_coordenadas,t_mapa_fotos_escritorios WHERE t_mapa_brisanet_coordenadas.id = t_mapa_fotos_escritorios.id_escritorio AND id = $id_pegado");
        $stmt->execute();
        $result = array();
        $total = $stmt->rowCount();
                 while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $result[] = $r;

                  echo '
                  <a href="../../server/Fotos/'.$r['anexo'].'"class="big"><img src="../../server/Fotos/'.$r['anexo'].'"/></a>             
                   ';

                      }

        }
} 




?>
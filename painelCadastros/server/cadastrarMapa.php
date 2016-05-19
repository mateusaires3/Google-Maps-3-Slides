<?php
        require('conectar.php');
        $erro = false;
        // Verifica se algo foi postado para publicar ou editar
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
                // Cria as variáveis
                foreach ( $_POST as $chave => $valor ) {
                        $$chave = $valor;
                        // Verifica se existe algum campo em branco
                        if ( empty ( $valor ) ) {
                                // Preenche o erro
                                $erro = 'Existem campos em branco.';
                        }
                }

                        $stmt = $conexao_pdo->prepare("SELECT id, nome_escritorio FROM t_mapa_brisanet_coordenadas order by id desc LIMIT 1");
                        $stmt->execute();
                        $result = array();
                        while($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $result = $r['nome_escritorio'];
                        }

                        if ($result == $_POST['nome_escritorio']) {
                                $return2 = true;
                                echo $return2;
                        }
            else {
                                $pdo_insere = $conexao_pdo->prepare('INSERT INTO t_mapa_brisanet_coordenadas (nome_escritorio,latitude,longitude,rua_do_escritorio,numero_do_escritorio,cidade_do_escritorio,numero1_do_escritorio,email_do_escritorio,tipo_do_cadastro,bairro,cep,referencia,fixo,supervisor,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
                                $pdo_insere->execute( array($nome_escritorio,$latitude,$longitude,$rua_do_escritorio,$numero_do_escritorio,
                                	$cidade_do_escritorio,$numero1_do_escritorio,$email_do_escritorio,$tipo_do_cadastro,$bairro,$cep,$referencia,$fixo,$supervisor,$status) );
                                $return = false;
                                echo $return;
                        }
                }

?>
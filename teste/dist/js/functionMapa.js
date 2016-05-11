/*
 * 5 formas de personalizar a infowindow Google Maps
 * 2015 - www.marnoto.com
*/

// Variável que indica as coordenadas do centro do mapa
var latlng = new google.maps.LatLng(-6.168476, -39.288829);

var localizacao = [];
var l = 0;
// Função de inicialização do mapa
function initialize() {


var mapOptions = {
    zoom: 8,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,

  };

  var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

  var dados = new Array();

  $.ajax({
    dataType: "json",
    url : '/mapabrisa/server/ListarCoordenadas.php',
    data: dados,
    success : function(data){
      for (i in data){
        MostrarCPDs(data[i]);
      }
    },
    error:function (xhr, ajaxOptions, thrownError) {
      alert("Erro no Processamento dos Dados. Entre em contato com o setor de Tecnologia e informe a mensagem abaixo:\n"+xhr.responseText);
    }
  });

function MostrarCPDs(value) {
  
  var foto = value['anexo'];
  // Variável que define o conteúdo da Info Window
  var conteudo = '<div id="iw-container">' +
                    '<div class="iw-title">' + value['nome_escritorio'] + '</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">Info</div>' +
                      '<img src="/mapabrisa/server/Fotos/'+foto+'" height="190" width="190">' +
                      '<p>A Brisanet possui profissionais com 17 anos de experiência na área de Tecnologia da Informação (TI).</p>' +
                      '<div class="iw-subTitle">Dados do Escritório</div>' +
                      '<p> Rua: '+ value['rua_do_escritorio']+'<br>'+'Nº: '+value['numero_do_escritorio']+' Telefone: '+ value['numero1_do_escritorio']+
                      '<br>E-mail: contato@brisanet.com.br<br>Site: www.brisanet.com.br</p><br><br>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

  // Cria a nova Info Window com referência à variável infowindow e atribui o conteúdo
  var infowindow = new google.maps.InfoWindow({
    content: conteudo,

    // Atribuir um valor máximo para a largura da infowindow permite
    // maior controlo sobre os vários elementos do conteúdo
    maxWidth: 600
  });


  localizacao.push({
    nome: value['nome_escritorio'],
    latlng: new google.maps.LatLng(value['latitude'],value['longitude']),
  });

  var icon = "";

  if (value['tipo_do_cadastro'] == 'Escritório') {
    icon = '../../dist/img/marker.png';
  }
  else if (value['tipo_do_cadastro'] == 'Pagamento') {
    icon = '../../dist/img/icone_azul.png';
  }



map.controls[google.maps.ControlPosition.RIGHT_TOP].push(
    document.getElementById('legend'));




  // Variável que define as opções do marcador
  var marker = new google.maps.Marker({
    icon: icon,
    position: localizacao[l].latlng,
    map: map,
    title: value['nome_escritorio'],
    animation: google.maps.Animation.DROP
  });

  // Procedimento que mostra a Info Window através de um click no marcador
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker); // map e marker são as variáveis definidas anteriormente
  });

  // Evento que fecha a infoWindow com click no mapa
  google.maps.event.addListener(map, 'click', function() {
    infowindow.close();
  });

  // *
  // INICIO DA PERSONALIZAÇÃO DA INFOWINDOW.
  // O evento google.maps.event.addListener() espera pela
  // criação da estrutura HTML da infowindow 'domready'
  // e antes da abertura da infowindow serão aplicados
  // os estilos definidos
  // *
  google.maps.event.addListener(infowindow, 'domready', function() {
  
    // Referência ao DIV que agrupa o fundo da infowindow
    var iwOuter = $('.gm-style-iw');

    /* Uma vez que o div pretendido está numa posição anterior ao div .gm-style-iw.
    * Recorremos ao jQuery e criamos uma variável iwBackground,
    * e aproveitamos a referência já existente do .gm-style-iw para obter o div anterior com .prev().
    */
    var iwBackground = iwOuter.prev();

    // Remover o div da sombra do fundo
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Remover o div de fundo branco
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Desloca a infowindow 115px para a direita
    iwOuter.parent().parent().css({left: '115px'});

    // Desloca a sombra da seta a 76px da margem esquerda 
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Desloca a seta a 76px da margem esquerda 
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Altera a cor desejada para a sombra da cauda
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

    // Referência ao DIV que agrupa os elementos do botão fechar
    var iwCloseBtn = iwOuter.next();

    // Aplica o efeito desejado ao botão fechar
    iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '14px', 'box-shadow': '0 0 5px #3990B9'});

    // Se o conteúdo da infowindow não ultrapassar a altura máxima definida, então o gradiente é removido.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // A API aplica automaticamente 0.7 de opacidade ao botão após o evento mouseout. Esta função reverte esse evento para o valor desejado.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });
  });
  l++
  }

  function Legend(controlDiv, map) {
  // Set CSS styles for the DIV containing the control
  // Setting padding to 5 px will offset the control
  // from the edge of the map
  controlDiv.style.padding = '5px';

  // Set CSS for the control border
  var controlUI = document.createElement('DIV');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '1px';
  controlUI.title = 'Legend';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control text
  var controlText = document.createElement('DIV');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '12px';
  controlText.style.paddingLeft = '4px';
  controlText.style.paddingRight = '4px';
  
  // Add the text
  controlText.innerHTML = '<b>Butterflies*</b><br />' +
    '<img src="http://maps.google.com/mapfiles/ms/micons/red-dot.png" /> Battus<br />' +
    '<img src="http://maps.google.com/mapfiles/ms/micons/yellow-dot.png" /> Speyeria<br />' +
    '<img src="http://maps.google.com/mapfiles/ms/micons/green-dot.png" /> Papilio<br />' +
    '<img src="http://maps.google.com/mapfiles/ms/micons/blue-dot.png" /> Limenitis<br />' +
    '<img src="http://maps.google.com/mapfiles/ms/micons/purple-dot.png" /> Myscelia<br />' + 
    '<small>*Data is fictional</small>';
  controlUI.appendChild(controlText);
}
    
}
google.maps.event.addDomListener(window, 'load', initialize);
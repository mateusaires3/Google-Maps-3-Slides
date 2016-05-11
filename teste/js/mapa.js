var map;
var infoBox = [];
var markers = [];
var icone = "";

function initialize() {	
	var latlng = new google.maps.LatLng(-6.168476, -38.490204);
	
    var options = {
      zoom: 10,
      center: latlng,
      draggable: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);

}

initialize();

function carregarPontos() {
	
	$.getJSON('http://localhost/mapabrisa/server/ListarCoordenadas.php', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			
			if (ponto.tipo_do_cadastro == 'Escritório') {
				icone = 'img/icone_laranja.png';
			}
			else if (ponto.tipo_do_cadastro == 'Pagamento') {
				icone = 'img/icone_azul.png';
			}
			else {
				icone = 'img/marcador.png';
			}

			map.controls[google.maps.ControlPosition.RIGHT_TOP].push(
    		document.getElementById('legend'));

      	    var contentString = '<div id="mostrarSlides"></div>'+
      	     '<div class="col-md-13">'+
              '<div class="box box-primary box-solid">'+
               ' <div class="box-header with-border">'+
                 '<h3 class="box-title">' + ponto.nome_escritorio + '</h3>'+
                '</div>'+
          		 '<div id="pagina" class="box-body">'+
          		 '<p style="text-align:center;font-size:13px;font-weight:bold;">Informações do Escritório</p>'+
               	'<p>Rua: ' + ponto.rua_do_escritorio + 
               	'<p>Bairro: ' + ponto.bairro + 
               	'<p>Fixo: ' + ponto.numero1_do_escritorio + '</p>' +
               	'<p>Tel :  ' + ponto.fixo +  '</p>' +  
               	'<p><img src="img/form_photo.png" style="display: inline; margin-right: 2px;" class="btn btn-info btn-lg" data-toggle="modal" onclick="abrirModalSlide(' + ponto.id + ')" data-target="#abrirSlide">' +
               	'<img src="img/phone_handset.png" class="btn btn-info btn-lg" data-toggle="modal" onclick="carregarmodal(' + ponto.id + ')" data-target="#abrirInfo"></p>' +
                    
                   '</div>'+
              '</div>'+
             '</div>'+
             '</div>';



      	    var infowindow = new google.maps.InfoWindow({
			content: contentString,

			});

    		var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
				title: ponto.nome_escritorio,
				icon: icone,
				valor: ponto.id

			});

			google.maps.event.addDomListener(window, "resize", function() {
		    var center = map.getCenter();
		        google.maps.event.trigger(map, "resize");
		        map.setCenter(center); 
		    });


		    google.maps.event.addListener(marker, 'click', function() {
		    mostrarSlide(marker.valor);
			infowindow.open(map,marker);
			

		    });

		
			markers.push(marker);
			
			latlngbounds.extend(marker.position);
			
		});
		
		var markerCluster = new MarkerClusterer(map, markers);
		
		map.fitBounds(latlngbounds);
		
	});

		  function Legend(controlDiv, map) {

		  controlDiv.style.padding = '5px';

		  var controlUI = document.createElement('DIV');
		  controlUI.style.backgroundColor = 'white';
		  controlUI.style.borderStyle = 'solid';
		  controlUI.style.borderWidth = '1px';
		  controlUI.title = 'Legend';
		  controlDiv.appendChild(controlUI);

		  var controlText = document.createElement('DIV');
		  controlText.style.fontFamily = 'Arial,sans-serif';
		  controlText.style.fontSize = '12px';
		  controlText.style.paddingLeft = '4px';
		  controlText.style.paddingRight = '4px';
		  
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

				

function carregarmodal(id){

				$.getJSON('http://localhost/mapabrisa/server/listarDados.php?search=',{
						valor: id, 
						ajax: 'listarDados'}, 
				function(j){
						var nome = j[0].nome_escritorio;	
						var rua = j[0].rua_do_escritorio;
						var numero = j[0].numero_do_escritorio;
						var bairro = j[0].bairro;
						var cep = j[0].cep;
						var referencia = j[0].referencia;
						var fixo = j[0].fixo;
						var zero8000 = j[0].numero1_do_escritorio;
						var email = j[0].email_do_escritorio;
						var supervisor = j[0].supervisor;
						var status = j[0].status;
							

						conteudo =  '<div class="col-md-13">'+
						              '<div class="box box-primary box-solid">'+
						               ' <div class="box-header with-border">'+
						                 '<h3 class="box-title">Brisanet Telecomunicações ( ' + nome + ' )</h3>'+
						                '</div>'+
								            '<div class="box-body">' +
								               '<div class="row">' + 
								               '<div class="col-xs-9">'+ 
								               '<label>Endereço</label>'+ 
								               '<input type="text" value="'+ rua + '" class="form-control" disabled="">'+ 
								               '</div> '+ 
								              '<div class="col-xs-3">'+ 
								              '<label>Nº Número</label>'+ 
								               '<input type="text" value="'+ numero + '" disabled="" class="form-control"'+ 
								               '</div>'+ 
								                '</div>'+ 
								                //mais info
											'<div class="col-xs-9">'+ 
								               '<label>Bairro</label>'+ 
								               '<input type="text" value="'+ bairro + '" class="form-control" disabled="">'+ 
								               '</div> '+ 
								              '<div class="col-xs-3">'+ 
								              '<label>Cep</label>'+ 
								               '<input type="text" value="'+ cep + '" disabled="" class="form-control"'+ 
								               '</div>'+ 
								                '</div>'+ 

											'<div class="col-xs-12">'+ 
								               '<label>Ponto de Referência</label>'+ 
								               '<input type="text" value="'+ referencia + '" class="form-control" disabled="">'+ 
								               '</div> '+ 

								             '<div class="col-xs-6">'+ 
								               '<label>Telefone (Fixo)</label>'+ 
								               '<input type="text" value="'+ fixo + '" class="form-control" disabled="">'+ 
								               '</div> '+ 
								              '<div class="col-xs-6">'+ 
								              '<label>Telefone 0800</label>'+ 
								               '<input type="text" value="'+ zero8000 + '" disabled="" class="form-control"'+ 
								               '</div>'+ 
							                 '</div>'+ 
								                '<div class="col-xs-12">'+ 
								               '<label>E-mail</label>'+ 
								               '<input type="text" value="'+ email + '" class="form-control" disabled="">'+ 
								               '</div> '+ 
  								              '</div>'+ 
							              '</div>'+
							             '</div>'+
							             '</div>'; 
						$('#divConteudo').html(conteudo);

					});
						
				}

				function mostrarSlide(id){
					//console.log(id);
				$.getJSON('http://localhost/mapabrisa/server/listarDados.php?search=',{
						valor: id, 
						ajax: 'listarSlides'}, 
				function(j){
					//console.log(j);
					console.log(id);
						var nome_foto = j;	
						//console.log(nome_foto);
						conteudoDiv =  '<div id="slideshow">'+
									'<div class="flexslider">'+
									    '<ul class="slides">'+
									     	nome_foto +
									      //'<li><img src="http://localhost/mapabrisa/server/Fotos/'+ j[1] + '"></li>'+
									    '</ul>'+
									'</div>'+
									'</div>';
						//console.log(conteudoDiv);

						    $('#mostrarSlides').html(conteudoDiv);

							$('.flexslider').flexslider({
				            animation: "fade",
				            slideshow: true,
				            slideshowSpeed: 2000,
				            animationSpeed: 600,
				            controlNav: false,
				            directionNav: false
				          });


					});
				          
					
				}



			function abrirModalSlide(id){
					//console.log(id);
				$.getJSON('http://localhost/mapabrisa/server/listarDados.php?search=',{
						valor: id, 
						ajax: 'listarSlideModal'}, 
				function(j){
						var nome_foto2 = j;	
						//console.log(nome_foto);
						show =  '<div id="slideshow" style="width:auto;">'+
									'<div class="flexslider2">'+
									    '<ul class="slides">'+
									     	nome_foto2 +
									      //'<li><img src="http://localhost/mapabrisa/server/Fotos/'+ j[1] + '"></li>'+
									    '</ul>'+
									'</div>'+
									'</div>';
						//console.log(conteudoDiv);

						    $('#galeria').html(show);

						    $('.flexslider2').flexslider({
				            animation: "fade",
				            slideshow: true,
				            slideshowSpeed: 4000,
				            animationSpeed: 1000,
				            controlNav: false,
				            directionNav: false
				          });

					});
				          
					
				}


carregarPontos();
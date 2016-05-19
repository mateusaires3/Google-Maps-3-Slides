//Scripts de validação JQUERY
jQuery(document).ready(function () {
	//Script para logar via ajax
	$('#confirmarUsuarioLogado').validate({
		submitHandler: function( form ){
			var dados = $( form ).serialize();
			$.ajax({
				type: "POST",
				url: "/Java/painelCadastros/server/confirmarUsuarioLogado.php",
				data: dados,
				success: function( data ) {
					if (data == true) {
						jQuery.gritter.add({
							title: 'Conexão Estabelecida !',
							text: 'Redirecionando pagina..',
							class_name: 'growl-success',
							image: 'dist/img/shield-ok-icon.png',
							sticky: false,
							time: '2000',
						});
						window.setTimeout("location.href='/Java/painelCadastros/pages/cadastros'",1000);
					}else if(data == false) {
						jQuery.gritter.add({
							title: 'Usuário ou Senha Incorretos',
							text: 'Acesso Negado !',
							class_name: 'growl-danger',
							image: 'dist/img/shield-error-icon.png',
							sticky: false,
							time: '2000',
						});
						window.setTimeout("location.href='/Java/painelCadastros/'",1000);
					}
				}
			});
			return false;
		}
	});
});
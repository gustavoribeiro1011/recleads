<script>
	$( "button[type='submit']" ).click(function(evt) {

		evt.preventDefault();
		$("#gif_carregando").remove();

		var gif_carregando = `<img src="img/loading.gif" width="30px" id="gif_carregando">`;

		//mostrar gif carregando
		$("#messagesLogin").before(gif_carregando);

//regatar os valores
var user = $("#inputEmail").val();
var password = $("#inputPassword").val();

//verificar se os dados foram digitados
if (user.length >0 && password.length >0){

	$("#messagesLogin").html("");

//verificar se o e-mail e senha estão corretos

$.ajax({
	type: "POST",
	url: 'api/login/ifLoginExists.php',
	data: {user:user,password:password},
	success: function(data) {

		if (data['banco_de_dados']=='falha'){

			$("#gif_carregando").remove();

			var message = `<div class="alert alert-danger" role="alert">
			Falha ao conectar Banco de Dados
			</div>`;

			$("#messagesLogin").html(message);

		}

		if (data['login']=='falha'){

			$("#gif_carregando").remove();

			var message = '<div class="alert alert-danger" role="alert">' + data['message'] + '</div>';

			$("#messagesLogin").html(message);

		}

		if (data['login']=='sucesso'){

			
		// var message = '<div class="alert alert-success" role="alert">Login efetuado com sucesso</div>';

			  setTimeout(function() {
			  	$("#gif_carregando").remove();
			  	window.location.href = data['BASEURL'];
			  }, 1000);

			$("#messagesLogin").html(message);

		}


		// 	// $("#gif_loading").html("");

		// 	alert("ok o login existe!");

		// }else{

		// 	alert("login incorreto!!");
		// }
		


	},
	dataType:"json"

});//fim ajax


} else {

	$("#gif_carregando").remove();

	var message = `<div class="alert alert-danger" role="alert">
	Por favor preencha todos os campos!
	</div>`;
	
	$("#messagesLogin").html(message);

}


});

</script>
app.directive('customOnChange', function() {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
      var onChangeFunc = scope.$eval(attrs.customOnChange);
      element.bind('change', onChangeFunc);
    }
  };
});

try{
	var canvas = document.getElementById('imageCanvas');
	var ctx = canvas.getContext('2d');
}catch(e){}

app.controller('AdminController', function($scope,$http,$timeout,$filter,$interval,$timeout,$location) {
	$scope.estatistica = {};
	$scope.anuncio = {};
	$scope.novoanuncio = {};
	$scope.mensagem = {};
	$scope.comentario = {};
	$scope.configuracao = {};
	$scope.usuario = {};
	
	/**
	** CONFIGS DO SITE
	**/
	$scope.configSite = {};
	$scope.configSite.dados = {};
	$scope.configSite.showMessageSucess = false;
	$scope.configSite.salvar = function (){
		if($scope.isNullOrBlanck($scope.configSite.dados.nomesite,"Você deve digitar o nome do site.")) return;
		if($scope.configSite.dados.exibircreci === 'true'){
			if($scope.isNullOrBlanck($scope.configSite.dados.creci,"Você deve digitar o CRECI.")) return;
		}
		$http.post(baseUrlAction+'salvarConfig',$scope.configSite.dados).success(
			function(data, status, headers, config) {
			    $scope.configSite.carregar();
			    $scope.configSite.showMessageSucess = true;
			    $timeout(function(){$scope.configSite.showMessageSucess = false;},5000);
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao salvar suas configurações.');
			}
		);
	};
	$scope.configSite.carregar = function (){
		$http.post(baseUrlAction+'carregarConfig').success(
			function(data, status, headers, config) {
				$scope.configSite.dados = angular.fromJson(data);
				$scope.configSite.disableCreci();
				$scope.configSite.setSiglaCreci();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao carregar as configurações do site.');
			}
		);
	};
	$scope.configSite.disableCreci = function (){
		var creci = $scope.configSite.dados.exibircreci;
		if(!angular.isDefined(creci) || creci === ''){
			creci = 'false';
		}
		$scope.configSite.dados.disabledcreci = creci === 'false'?true:false;
	};
	$scope.configSite.setSiglaCreci = function (){
		var pf = $scope.configSite.dados.crecipessoafisica;
		$scope.configSite.dados.crecisigla = angular.isDefined(pf) && pf === 'true'?'F':'J';
	};
	
	
	/**
	** CIDADE CADASTRO AND UPDATE E DELETE 
	**/
	$scope.novacidade = {};
	$scope.deletecidade = {};
	$scope.listacidade = {};
	$scope.editarCidade = function(index){
		$scope.novacidade.dados = $scope.listacidade.dados[index];
		$scope.novacidade.show = true;
		$scope.listacidade.show = false;
	};
	$scope.novaCidade = function(){
		$scope.novacidade.dados = {};
		$scope.novacidade.dados.cidade = "";
		$scope.novacidade.dados.id = "";
		$scope.novacidade.show = true;
		$scope.listacidade.show = false;
	};
	$scope.salvarCidade = function(){
		if($scope.isNullOrBlanck($scope.novacidade.dados.cidade,"Você deve digitar o nome da cidade.")) return;
		$http.post(baseUrlAction+'salvarCidade',$scope.novacidade.dados).success(
			function(data, status, headers, config) {
					alert('cidade salva');
			    $scope.carregarCidades();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao salvar sua cidade.');
			}
		);
	};
	$scope.deleteCidade = function(index){
		console.log(index);
		console.log($scope.listacidade.dados[index]);
		$http.post(baseUrlAction+'deletarCidade',$scope.listacidade.dados[index]).success(
			function(data, status, headers, config) {
					alert('cidade excluída');
			    $scope.carregarCidades();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao excluir sua cidade.');
			}
		);
	};
	$scope.carregarCidades = function(){
		$http.post(baseUrlAction+'cidades').success(
			function(data, status, headers, config) {
					$scope.listacidade.dados = angular.fromJson(data);
					$scope.novacidade.show = false;
					$scope.listacidade.show = true;
					$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao carregar as cidades.');
			}
		);
	};
	
	/**
	** TPIMÓVEL CADASTRO AND UPDATE E DELETE 
	**/
	$scope.novotpimovel = {};
	$scope.deletetpimovel = {};
	$scope.listatpimovel = {};
	$scope.editarTpimovel = function(index){
		$scope.novotpimovel.dados = $scope.listatpimovel.dados[index];
		$scope.novotpimovel.show = true;
		$scope.listatpimovel.show = false;
	};
	$scope.novoTpimovel = function(){
		$scope.novotpimovel.dados = {};
		$scope.novotpimovel.dados.tpimovel = "";
		$scope.novotpimovel.dados.id = "";
		$scope.novotpimovel.show = true;
		$scope.listatpimovel.show = false;
	};
	$scope.salvarTpimovel = function(){
		if($scope.isNullOrBlanck($scope.novotpimovel.dados.tpimovel,"Você deve digitar o nome do Tipo de imóvel.")) return;
		$http.post(baseUrlAction+'salvarTpimovel',$scope.novotpimovel.dados).success(
			function(data, status, headers, config) {
					alert('tipo de imóvel salvo');
			    $scope.carregarTpimoveis();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao salvar seu tipo de imóvel.');
			}
		);
	};
	$scope.deleteTpimovel = function(index){
		console.log(index);
		console.log($scope.listatpimovel.dados[index]);
		$http.post(baseUrlAction+'deletarTpimovel',$scope.listatpimovel.dados[index]).success(
			function(data, status, headers, config) {
					alert('tipo de imóvel excluído');
			    $scope.carregarTpimoveis();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao excluir seu tipo de imóvel.');
			}
		);
	};
	$scope.carregarTpimoveis = function(){
		$http.post(baseUrlAction+'tpimoveis').success(
			function(data, status, headers, config) {
					$scope.listatpimovel.dados = angular.fromJson(data);
					$scope.novotpimovel.show = false;
					$scope.listatpimovel.show = true;
					$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao carregar os tipos de imóveis.');
			}
		);
	};
	
	
	/**
	** TPNEGÓCIO CADASTRO AND UPDATE E DELETE 
	**/
	$scope.novotpnegocio = {};
	$scope.deletetpnegocio = {};
	$scope.listatpnegocio = {};
	$scope.editarTpnegocio = function(index){
		$scope.novotpnegocio.dados = $scope.listatpnegocio.dados[index];
		$scope.novotpnegocio.show = true;
		$scope.listatpnegocio.show = false;
	};
	$scope.novoTpnegocio = function(){
		$scope.novotpnegocio.dados = {};
		$scope.novotpnegocio.dados.tpnegocio = "";
		$scope.novotpnegocio.dados.id = "";
		$scope.novotpnegocio.show = true;
		$scope.listatpnegocio.show = false;
	};
	$scope.salvarTpnegocio = function(){
		if($scope.isNullOrBlanck($scope.novotpnegocio.dados.tpnegocio,"Você deve digitar o nome do Tipo de negócio.")) return;
		$http.post(baseUrlAction+'salvarTpnegocio',$scope.novotpnegocio.dados).success(
			function(data, status, headers, config) {
					alert('tipo de negócio salvo');
			    $scope.carregarTpnegocios();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao salvar seu tipo de negócio.');
			}
		);
	};
	$scope.deleteTpnegocio = function(index){
		$http.post(baseUrlAction+'deletarTpnegocio',$scope.listatpnegocio.dados[index]).success(
			function(data, status, headers, config) {
					alert('tipo de negócio excluído');
			    $scope.carregarTpnegocios();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao excluir seu tipo de negócio.');
			}
		);
	};
	$scope.carregarTpnegocios = function(){
		$http.post(baseUrlAction+'tpnegocios').success(
			function(data, status, headers, config) {
					$scope.listatpnegocio.dados = angular.fromJson(data);
					$scope.novotpnegocio.show = false;
					$scope.listatpnegocio.show = true;
					$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao carregar os tipos de negócio.');
			}
		);
	};
	
	/**
	** TEMPO CADASTRO AND UPDATE E DELETE 
	**/
	$scope.novotempo = {};
	$scope.deletetempo = {};
	$scope.listatempo = {};
	$scope.editarTempo = function(index){
		$scope.novotempo.dados = $scope.listatempo.dados[index];
		$scope.novotempo.show = true;
		$scope.listatempo.show = false;
	};
	$scope.novoTempo = function(){
		$scope.novotempo.dados = {};
		$scope.novotempo.dados.tempo = "";
		$scope.novotempo.dados.id = "";
		$scope.novotempo.show = true;
		$scope.listatempo.show = false;
	};
	$scope.salvarTempo = function(){
		if($scope.isNullOrBlanck($scope.novotempo.dados.tempo,"Você deve digitar o nome do tempo.")) return;
		$http.post(baseUrlAction+'salvarTempo',$scope.novotempo.dados).success(
			function(data, status, headers, config) {
					alert('tempo salvo');
			    $scope.carregarTempos();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao salvar seu tempo.');
			}
		);
	};
	$scope.deleteTempo = function(index){
		$http.post(baseUrlAction+'deletarTempo',$scope.listatempo.dados[index]).success(
			function(data, status, headers, config) {
					alert('tempo excluído');
			    $scope.carregarTempos();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao excluir seu tempo.');
			}
		);
	};
	$scope.carregarTempos = function(){
		$http.post(baseUrlAction+'tempos').success(
			function(data, status, headers, config) {
					$scope.listatempo.dados = angular.fromJson(data);
					$scope.novotempo.show = false;
					$scope.listatempo.show = true;
					$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
			    alert('Erro ao carregar os tempos.');
			}
		);
	};
	
	/**
	** USUÁRIO 
	**/
	$scope.submitUsuario = function (){};
	$scope.submitSenha = function (){};
	$scope.salvarUsuario = function(){
		if($scope.isNullOrBlanck($scope.usuario.nome,"Você deve digitar o nome.")) return;
		if($scope.isNullOrBlanck($scope.usuario.sobrenome,"Você deve digitar o sobrenome.")) return;
		if($scope.isNullOrBlanck($scope.usuario.nascimento,"Você deve digitar a data de nascimento.")) return;
		if($scope.isNullOrBlanck($scope.usuario.sexo,"Você deve selecionar o sexo.")) return;
		if($scope.isNullOrBlanck($scope.usuario.celular,"Você deve digitar o celular.")) return;
		if($scope.isNullOrBlanck($scope.usuario.email,"Você deve digitar o e-mail.")) return;
		$('#formCadastrarUsuario').submit();
	};
	$scope.salvarSenha = function(){
		if($scope.isNullOrBlanck($scope.usuario.senha,"Você deve digitar a senha.")) return;
		if($scope.isNullOrBlanck($scope.usuario.novasenha,"Você deve digitar a nova senha.")) return;
		if($scope.usuario.senha != $scope.usuario.senhaantiga){
			alert("Você deve digitar a sua senha antiga.");
			return;	
		}
		if($scope.usuario.novasenha == $scope.usuario.senhaantiga){
			alert("Você deve digitar uma nova senha diferente da antiga.");
			return;
		}
		$('#formNovaSenha').submit();
	};
	$scope.resetUsuario = function(){
		$('#formResetUsuario').submit();
	};
	
	
	/**
	 * Comentario 
	 */
	
	$scope.paginaMais = function(){
		$scope.comentarioPagina += 1;
		if($scope.comentarioPagina > $scope.comentarioQtdPagina){
			$scope.comentarioPagina = $scope.comentarioQtdPagina;
		}
		$scope.comentarioCarregar();
	};
	
	$scope.paginaMenos = function(){
		$scope.comentarioPagina -= 1;
		if($scope.comentarioPagina < 0){
			$scope.comentarioPagina = 0;
		}
		$scope.comentarioCarregar();
	};
	
	$scope.comentarioLido = function (index){
		var comentar = $scope.listacomentario[index];
		var comentarioObj = {};
		comentarioObj.comentario = comentar.id;
		comentarioObj.usuario = comentar.usuario;
		comentarioObj.data = comentar.hoje;
		if(comentar.lido == false){
			$http.post(baseUrlAction+"comentarioLido", comentarioObj).success(
				function(data, status, headers, config) {
					comentar.classe = 'panel-success';
					comentar.lido = true;
					$scope.carregarQtdComentarios();
				}
			);
		}
	};
	
	$scope.comentarioExcluido = function (index){
		var comentar = $scope.listacomentario[index];
		var comentarioObj = {};
		comentarioObj.id = comentar.id;
		$http.post(baseUrlAction+"comentarioExcluido", comentarioObj).success(
			function(data, status, headers, config) {
				comentar.show = false;
				$scope.carregarComentarios();
				$scope.carregarQtdComentarios();
			}
		).error(
			function(data, status, headers, config) {
				alert(data);
			}
		);
	};
	
	$scope.carregarQtdComentarios = function (){
		var parametros = {};
		parametros.seuproprio = $scope.comentarioSeuproprio;
		$http.post(baseUrlAction+"qtdComentarios", parametros).success(
			function(data, status, headers, config) {
				$scope.qtdComentarios = angular.fromJson(data);
				if(parseInt($scope.qtdComentarios) != 0){
					$scope.qtdComentariosShow = true;
				}else{
					$scope.qtdComentariosShow = false;
				}
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao carregar a quantidade de comentários.');
			}
		);
	};
	
	$scope.limparComentarios = function(){
		$scope.listacomentario = [];
		$scope.comentarioQtd = 0;
		$scope.comentarioInicio = 0;
		$scope.comentarioFim = 0;
		$scope.comentarioPagina = 0;
		$scope.comentarioQtdPagina = 0;
		$scope.comentarioVazio = true;
	};
	
	$scope.exibirProprioComentario = function(){
		$scope.comentarioSeuproprio = !$scope.comentarioSeuproprio;
		$scope.carregarComentarios();
		$scope.carregarQtdComentarios();
	};
	$scope.comentarioCarregar = function (){
		var parametros = {};
		parametros.seuproprio = $scope.comentarioSeuproprio;
		parametros.pagina = $scope.comentarioPagina;
		parametros.limite = $scope.comentarioLimite;
		$http.post(baseUrlAction+"comentarioCarregar", parametros).success(
			function(data, status, headers, config) {
				$scope.listacomentario = angular.fromJson(data);
				$scope.comentarioInicio = ($scope.listacomentario.length > 0)?parseInt(($scope.comentarioPagina * $scope.comentarioLimite) + 1):0;
				$scope.comentarioFim = parseInt(($scope.comentarioPagina * $scope.comentarioLimite) + $scope.listacomentario.length);
				$scope.comentarioVazio = $scope.listacomentario.length == 0;
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar os comentários.');
			}
		);
	};
	
	$scope.comentarioResponder = function (index){
		var comentar = $scope.listacomentario[index];
		var comentarioObj = {};
		comentarioObj.comentario = comentar.resposta;
		comentarioObj.usuario = comentar.usuario;
		comentarioObj.anuncio = comentar.anuncioid;
		$http.post(baseUrlAction+"comentarioResponder", comentarioObj).success(
			function(data, status, headers, config) {
				comentar.classealert = 'alert-success';
				comentar.messagealert = 'Sua resposta foi enviada com sucesso!';
				comentar.showalert = true;
				$scope.carregarComentarios();
				$scope.carregarQtdComentarios();
			}
		).error(
			function(data, status, headers, config) {
				comentar.classealert = 'alert-danger';
				comentar.messagealert = 'Sua resposta não foi enviada! verifique sua conexão.';
				comentar.showalert = true;
			}
		);
	};
	
	$scope.comentarioPaginacao = function (){
		var parametros = {};
		parametros.seuproprio = $scope.comentarioSeuproprio;
		parametros.limite = $scope.comentarioLimite;
		$http.post(baseUrlAction+"comentarioPaginacao", parametros).success(
			function(data, status, headers, config) {
				$scope.comentarioQtd = angular.fromJson(data);
				$scope.comentarioQtdPagina = parseInt($scope.comentarioQtd / $scope.comentarioLimite);
				$scope.carregarQtdComentarios();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar os comentários.');
			}
		);
	};
	
	
	$scope.comentarioTodosLidos = function(){
		var parametros = {};
		parametros.seuproprio = $scope.comentarioSeuproprio;
		$http.post(baseUrlAction+"comentarioTodosLidos", parametros).success(
			function(data, status, headers, config) {
				$scope.carregarComentarios();
				$scope.carregarQtdComentarios();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao marcar como lidos os comentários.');
			}
		);
	};
	
	$scope.carregarComentarios = function(){
		$scope.comentarioVazio = true;
		$scope.comentarioPagina = 0;
		$scope.comentarioLimite = 10;
		$scope.comentarioPaginacao();
		$scope.comentarioCarregar();
	};
	
	
	
	/**
	 * Mensagem 
	 */
	
	$scope.paginaMaisMensagem = function(){
		$scope.mensagemPagina += 1;
		if($scope.mensagemPagina > $scope.mensagemQtdPagina){
			$scope.mensagemPagina = $scope.mensagemQtdPagina;
		}
		$scope.mensagemCarregar();
	};
	$scope.paginaMenosMensagem = function(){
		$scope.mensagemPagina -= 1;
		if($scope.mensagemPagina < 0){
			$scope.mensagemPagina = 0;
		}
		$scope.mensagemCarregar();
	};
	
	$scope.mensagemLido = function (index){
		var msg = $scope.listamensagem[index];
		var parametros = {};
		parametros.mensagem = msg.id;
		parametros.usuario = msg.usuario;
		parametros.data = msg.hoje;
		if(msg.lido == false){
			$http.post(baseUrlAction+"mensagemLido", parametros).success(
				function(data, status, headers, config) {
					msg.classe = 'panel-success';
					msg.lido = true;
					$scope.carregarQtdMensagens();
				}
			);
		}
	};
	
	$scope.mensagemExcluido = function (index){
		var msg = $scope.listamensagem[index];
		var parametros = {};
		parametros.id = msg.id;
		$http.post(baseUrlAction+"mensagemExcluido", parametros).success(
			function(data, status, headers, config) {
				msg.show = false;
				$scope.carregarMensagens();
				$scope.carregarQtdMensagens();
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao excluir mensagem.');
			}
		);
	};
	
	$scope.carregarQtdMensagens = function (){
		$http.post(baseUrlAction+"qtdMensagens").success(
			function(data, status, headers, config) {
				$scope.qtdMensagens = angular.fromJson(data);
				if(parseInt($scope.qtdMensagens) != 0){
					$scope.qtdMensagensShow = true;
				}else{
					$scope.qtdMensagensShow = false;
				}
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao carregar a quantidade de mensagens.');
			}
		);
	};
	
	$scope.limparMensagens = function(){
		$scope.listamensagem = [];
		$scope.mensagemQtd = 0;
		$scope.mensagemInicio = 0;
		$scope.mensagemFim = 0;
		$scope.mensagemPagina = 0;
		$scope.mensagemQtdPagina = 0;
		$scope.mensagemVazio = true;
	};
	
	$scope.mensagemPaginacao = function (){
		var parametros = {};
		parametros.limite = $scope.comentarioLimite;
		$http.post(baseUrlAction+"mensagemPaginacao", parametros).success(
			function(data, status, headers, config) {
				$scope.mensagemQtd = angular.fromJson(data);
				$scope.mensagemQtdPagina = parseInt($scope.mensagemQtd / $scope.mensagemLimite);
				$scope.carregarQtdMensagens();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar as mensagens.');
			}
		);
	};
	
	$scope.mensagemTodosLidos = function(){
		$http.post(baseUrlAction+"mensagemTodosLidos").success(
			function(data, status, headers, config) {
				$scope.carregarMensagens();
				$scope.carregarQtdMensagens();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao marcar como lidos as mensagens.');
			}
		);
	};
	
	$scope.mensagemCarregar = function (){
		var parametros = {};
		parametros.pagina = $scope.mensagemPagina;
		parametros.limite = $scope.mensagemLimite;
		$http.post(baseUrlAction+"mensagemCarregar", parametros).success(
			function(data, status, headers, config) {
				$scope.listamensagem = angular.fromJson(data);
				$scope.mensagemInicio = ($scope.listamensagem.length > 0)? parseInt(($scope.mensagemPagina * $scope.mensagemLimite) + 1):0;
				$scope.mensagemFim = parseInt(($scope.mensagemPagina * $scope.mensagemLimite) + $scope.listamensagem.length);
				$scope.mensagemVazio = $scope.listamensagem.length == 0;
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar as mensagens.');
			}
		);
	};
	
	$scope.carregarMensagens = function(){
		$scope.mensagemVazio = true;
		$scope.mensagemPagina = 0;
		$scope.mensagemLimite = 10;
		$scope.mensagemPaginacao();
		$scope.mensagemCarregar();
	};
	
	/**
	 * Anúncio 
	 */
	
	$scope.paginaMaisAnuncio = function(){
		$scope.anuncioPagina += 1;
		if($scope.anuncioPagina > $scope.anuncioQtdPagina){
			$scope.anuncioPagina = $scope.anuncioQtdPagina;
		}
		$scope.anuncioCarregar();
	};
	$scope.paginaMenosAnuncio = function(){
		$scope.anuncioPagina -= 1;
		if($scope.anuncioPagina < 0){
			$scope.anuncioPagina = 0;
		}
		$scope.anuncioCarregar();
	};
	
	$scope.anuncioExcluido = function (index){
		var anc = $scope.listaanuncio[index];
		var parametros = {};
		parametros.id = anc.id;
		$http.post(baseUrlAction+"anuncioExcluido", parametros).success(
			function(data, status, headers, config) {
				anc.show = false;
				$scope.carregarAnuncios();
				$scope.carregarQtdAnuncios();
				$scope.carregarMensagens();
				$scope.carregarQtdComentarios();
				$scope.carregarComentarios();
				$scope.carregarQtdComentarios();
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao excluir anúncio.');
			}
		);
	};
	
	$scope.carregarQtdAnuncios = function (){
		$http.post(baseUrlAction+"qtdAnuncios").success(
			function(data, status, headers, config) {
				$scope.qtdAnuncios = angular.fromJson(data);
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao carregar a quantidade de anúncios.');
			}
		);
	};
	
	$scope.anuncioPaginacao = function (){
		var parametros = {};
		parametros.limite = $scope.anuncioLimite;
		$http.post(baseUrlAction+"anuncioPaginacao", parametros).success(
			function(data, status, headers, config) {
				$scope.anuncioQtd = angular.fromJson(data);
				$scope.anuncioQtdPagina = parseInt($scope.anuncioQtd / $scope.anuncioLimite);
				$scope.carregarQtdAnuncios();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar os anuncios.');
			}
		);
	};
	
	$scope.anuncioCarregar = function (){
		var parametros = {};
		parametros.pagina = $scope.anuncioPagina;
		parametros.limite = $scope.anuncioLimite;
		$http.post(baseUrlAction+"anuncioCarregar", parametros).success(
			function(data, status, headers, config) {
				$scope.listaanuncio = angular.fromJson(data);
				$scope.anuncioInicio = ($scope.listaanuncio.length > 0)?parseInt(($scope.anuncioPagina * $scope.anuncioLimite) + 1):0;
				$scope.anuncioFim = parseInt(($scope.anuncioPagina * $scope.anuncioLimite) + $scope.listaanuncio.length);
				$scope.anuncioVazio = $scope.listaanuncio.length == 0;
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao recarregar os anuncios.');
			}
		);
	};
	
	$scope.carregarAnuncios = function(){
		$scope.anuncioVazio = true;
		$scope.anuncioPagina = 0;
		$scope.anuncioLimite = 10;
		$scope.anuncioPaginacao();
		$scope.anuncioCarregar();
	};
	
	
	/**
	 * Novo anúncio
	 */
	$scope.novoanuncioIniciar = function (){
		
		$scope.novoanuncio.id = undefined;
		$scope.novoanuncio.tpnegocio = undefined;
		$scope.novoanuncio.tpimovel = undefined;
		$scope.novoanuncio.endereco = undefined;
		$scope.novoanuncio.cidade = undefined;
		$scope.novoanuncio.valor = 0;
		$scope.novoanuncio.tempo = undefined;
		$scope.novoanuncio.titulo = undefined;
		$scope.novoanuncio.descricao = undefined;
		$scope.novoanuncio.qtdcomodo = 0;
		$scope.novoanuncio.qtdquarto = 0;
		$scope.novoanuncio.qtdbanheiro = 0;
		$scope.novoanuncio.qtdgaragem = 0;
		$scope.novoanuncio.areaterreno = 0;
		$scope.novoanuncio.areaconstruida = 0;
		$scope.novoanuncio.areapiscina = 0;
		$scope.novoanuncio.andarmaximo = 1;
		$scope.novoanuncio.quintal = undefined;
		$scope.novoanuncio.areaservico = undefined;
		$scope.novoanuncio.piscina = undefined;
		
		$scope.novoanuncio.imagem1 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem2 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem3 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem4 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem5 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem6 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem7 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		$scope.novoanuncio.imagem8 = baseUrl+"/images/simbolo/thumbnail-default.jpg";
		
		$scope.abrir(7);
		$scope.tabShow('home');
		
	};
	
	$scope.editaranuncio = function (index){
		var aux = $scope.listaanuncio[index];
		$scope.novoanuncio.id = aux['id'];
		$scope.novoanuncio.tpnegocio = aux['tpnegociocodigo'];
		$scope.novoanuncio.tpimovel = aux['tpimovelcodigo'];
		$scope.novoanuncio.endereco = aux['endereco'];
		$scope.novoanuncio.cidade = aux['cidadecodigo'];
		$scope.novoanuncio.valor = aux['valor'];
		$scope.novoanuncio.tempo = aux['tempocodigo'];
		$scope.novoanuncio.titulo = aux['titulo'];
		$scope.novoanuncio.descricao = aux['descricao'];
		$scope.novoanuncio.qtdcomodo = aux['qtdcomodo'];
		$scope.novoanuncio.qtdquarto = aux['qtdquarto'];
		$scope.novoanuncio.qtdbanheiro = aux['qtdbanheiro'];
		$scope.novoanuncio.qtdgaragem = aux['qtdgaragem'];
		$scope.novoanuncio.areaterreno = parseFloat(aux['areaterreno']);
		$scope.novoanuncio.areaconstruida = parseFloat(aux['areaconstruida']);
		$scope.novoanuncio.areapiscina = parseFloat(aux['areapiscina']);
		$scope.novoanuncio.andarmaximo = aux['andarmaximo'];
		$scope.novoanuncio.quintal = aux['quintal'];
		$scope.novoanuncio.areaservico = aux['areaservico'];
		$scope.novoanuncio.piscina = aux['piscina'];
		
		$scope.novoanuncio.imagem1 = aux['imagem1'];
		$scope.novoanuncio.imagem2 = aux['imagem2'];
		$scope.novoanuncio.imagem3 = aux['imagem3'];
		$scope.novoanuncio.imagem4 = aux['imagem4'];
		$scope.novoanuncio.imagem5 = aux['imagem5'];
		$scope.novoanuncio.imagem6 = aux['imagem6'];
		$scope.novoanuncio.imagem7 = aux['imagem7'];
		$scope.novoanuncio.imagem8 = aux['imagem8'];
		
		$scope.abrir(7);
		$scope.tabShow('home');
	};
	
	$scope.ordemImagem = [];
	$scope.openFile = function(numero){
		$scope.ordemImagem.push(numero);
		$('#imageFile').click();
	};
	
	$scope.upImage = function(){
		var img;
		try {
			img = canvas.toDataURL('image/', 1).split(',')[1];
			console.log(img);
		} catch(e) {
			img = canvas.toDataURL().split(',')[1];
		}
		$scope.novoanuncio['imagem'+$scope.ordemImagem[$scope.ordemImagem.length-1]] = baseUrl+'/images/simbolo/loader.gif';
		var parametros = {};
		parametros.type = 'base64';
		parametros.image = img;
		$http.post(
			'https://api.imgur.com/3/image',
			parametros,
			{
				headers: {'Authorization': 'Client-ID e7279b18509b697'}
			}
		).success(function(data){
			data.data.link = data.data.link.replace(/http/g, 'https');
			var numero = $scope.ordemImagem.pop();
			$scope.novoanuncio['imagem'+numero] = data.data.link;
		}).error(function(){
			alert('Erro ao enviar essa imagem.');
		});
	};
	
	$scope.uploadImagem = function (e){
		$scope.freeFile = true;
		var reader = new FileReader();
		reader.onload = function(event){
			var img = new Image();
			img.onload = function(){
				canvas.width = img.width;
				canvas.height = img.height;
				ctx.drawImage(img,0,0);
				$scope.upImage();
			};
			img.src = event.target.result;
		};
		reader.readAsDataURL(e.target.files[0]);
	};
	
	$scope.tabShow = function(tab){
		$('#tabAnuncio a[href="#'+tab+'"]').tab('show');
	};
	
	$scope.salvarNovoAnuncio = function (){
		if($scope.isNullOrBlanck($scope.novoanuncio.tpnegocio,'Deve selecionar o tipo de negócio.'))
			return;
		if($scope.isNullOrBlanck($scope.novoanuncio.tpimovel,'Deve selecionar o tipo de imóvel.'))
			return;
		if($scope.isNullOrBlanck($scope.novoanuncio.cidade,'Deve selecionar a cidade.'))
			return;
		if($scope.isNullOrBlanck($scope.novoanuncio.valor,'Deve digitar o valor.'))
			return;
		if($scope.isNullOrBlanck($scope.novoanuncio.titulo,'Deve escrever o título do anúncio.'))
			return;
		if($scope.isNullOrBlanck($scope.novoanuncio.descricao,'Deve escrever a descrição do anúncio.'))
			return;
		if(parseFloat($scope.novoanuncio.valor) <= 0.0){
			alert('Digite o valor do imóvel.');
			return;
		}
		for(i = 1; i <= 8 ; i++){
			var aux = $scope.novoanuncio['imagem'+i];
			if(aux.indexOf("/assets/images/simbolo/thumbnail-default.jpg") != -1){
				$scope.novoanuncio['imagem'+i] = "";
			}
		}
		$http.post(baseUrlAction+"salvarNovoAnuncio", $scope.novoanuncio).success(
			function(data, status, headers, config) {
				$scope.novoanuncioIniciar();
				$scope.tabShow('home');
				$scope.anunciosalvocorreto = true;
				$timeout(function(){$scope.anunciosalvocorreto = false;},5000);
				$timeout(function(){$scope.anuncioadicionarmais = true;},3000);
				$timeout(function(){$scope.anuncioadicionarmais = false;},15000);
				$scope.carregarAnuncios();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao salvar um novo anúncio.');
			}
		);
	};
	
	
	/**
	 * Estatística
	 */
	$scope.colors = ['rgb(70,132,238)','rgb(255,153,0)','rgb(220,57,18)',
					 'rgb(0,128,0)','rgb(0,255,255)','rgb(255,215,0)',
					  'rgb(107,142,35)','rgb(128,0,0)','rgb(73,66,204)'];
	
	//PIE
	$scope.configPie = {
		labels: false,
		title: "Visitas por Tipo de Imóvel",
		legend: {
			display: true,
			position: "right"
		},
		innerRadius: 0,
		lineLegend: "lineEnd",
		colors: $scope.colors,
		lineCurveType: 'bundle'
	};
	
	$scope.dadosPie = {};
	
	$scope.getEstatisticaTpimovel = function (){
		$http.post(baseUrlAction+"getEstatisticaTpimovel").success(
			function(data, status, headers, config) {
				$scope.dadosPie.data = angular.fromJson(data);
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao carregar as estatísticas.');
			}
		);
	};
	
	//LINE
	$scope.tempoLinha = 365;
	
	$scope.configLine = {
		labels: false,
		title: "Visitas por Tempo (últimos "+$scope.tempoLinha+" dias)",
		legend: {
			display: true,
			position: "right"
		},
		innerRadius: 0,
		lineLegend: "lineEnd",
		colors: $scope.colors,
		lineCurveType: 'monotone'
	};
	
	$scope.dadosSerieVisitas = {
		series : ['Visitas'],
		data : [{x:'0',y:[0]}]
	};
	
	$scope.trocaTempo = function (tempo){
		$scope.tempoLinha = tempo;
		$scope.configLine.title = "Visitas por Tempo (últimos "+$scope.tempoLinha+" dias)";
		$scope.getGetVisitasTempo();
	};
	
	$scope.getGetVisitasTempo = function (){
		var parametros = {};
		parametros.tempo = $scope.tempoLinha;
		$http.post(baseUrlAction+"getVisitasTempo",parametros).success(
			function(data, status, headers, config) {
				$scope.dadosSerieVisitas.data = angular.fromJson(data);
				$scope.carregandomais();
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao carregar as visualizações por tempo.');
			}
		);
	};
	
	$scope.ultimasVisualizacoes = {};
	
	$scope.getGetUltimaVisualizacao = function (){
		var parametros = {};
		parametros.limite = 3;
		$http.post(baseUrlAction+"getUltimaVisualizacao",parametros).success(
			function(data, status, headers, config) {
				$scope.ultimasVisualizacoes.data = angular.fromJson(data);
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao carregar as visualizações.');
			}
		);
	};
	
	$scope.qtdVisualizacoes = {};
	
	$scope.getGetQtdVisualizacao = function (){
		$http.post(baseUrlAction+"getQtdVisualizacao").success(
			function(data, status, headers, config) {
				$scope.qtdVisualizacoes.data = angular.fromJson(data);
			}
		).error(
			function(data, status, headers, config) {
				alert('Erro ao carregar a quantidade de visualizações.');
			}
		);
	};
	
	$scope.carregarEstatistica = function (){
		$scope.getEstatisticaTpimovel();
		$scope.getGetUltimaVisualizacao();
		$scope.getGetQtdVisualizacao();
		$scope.getGetVisitasTempo();
	};
  	
  	
  	/**
  	 * Methodos diversos
  	 */
  	
  	$scope.limpar = function (link){
		$scope.linkar(link);
	};
	
	$scope.fecharTodos = function(){
		$scope.estatistica.show = false;
		$scope.anuncio.show = false;
		$scope.mensagem.show = false;
		$scope.comentario.show = false;
		$scope.configuracao.show = false;
		$scope.usuario.show = false;
		$scope.novoanuncio.show = false;
	};
	
	$scope.abrir = function(menu){
		$scope.fecharTodos();
		switch(menu){
			case 1:
				$scope.estatistica.show = true;break;
			case 2:
				$scope.anuncio.show = true;break;
			case 3:
				$scope.mensagem.show = true;break;
			case 4:
				$scope.comentario.show = true;break;
			case 5:
				$scope.configuracao.show = true;break;
			case 6:
				$scope.usuario.show = true;break;
			case 7:
				$scope.novoanuncio.show = true;break;
		}
	};
	
	$scope.isNullOrBlanck = function(valor,mensagem){
		if(valor == undefined || valor == ""){
			alert(mensagem);
			return true;
		}
		return false;
	};
	
	$scope.enviar = function (){
		$('#formBuscaInicial').submit();
	};
	
	$scope.linkar = function (link){
		window.location.href = link;
	};
	
	Object.toparams = function ObjecttoParams(obj) {
		var p = [];
		for (var key in obj) {
			p.push(key + '=' + encodeURIComponent(obj[key]));
		}
		return p.join('&');
	};
	
	/**
	 * FACEBOOK 
	 */
	$scope.buscarImagemAnuncio = function (index){
		for(i = 1; i <= 8 ; i++){
			if($scope.listaanuncio[index]['imagem'+i] != '/yii-imobil/demos/imobil/assets/images/simbolo/thumbnail-default.jpg'){
				return $scope.listaanuncio[index]['imagem'+i];
			}
		}
		return '';
	};
	$scope.compartilhar = function (index){
		var urlPrincipal = $location.protocol() + '://' + $location.host();
		var obj = {
				method: 'feed',
				name: $scope.listaanuncio[index].tpimovel + " para " + $scope.listaanuncio[index].tpnegocio + " por " + $scope.listaanuncio[index].valor,
				caption: 'Esse imóvel foi compartilhado dia '+($filter('date')(new Date(),'longDate')),//'dd de MMMM, yyyy')),
				description: $scope.listaanuncio[index].descricao,
				link: urlPrincipal + baseUrlAction + "verAnuncio/" + $scope.listaanuncio[index].id,
				picture: $scope.buscarImagemAnuncio(index)
			};
			console.log(obj);
		FB.ui(obj
			,
			function(response) {
				console.log(response);
			}
		);
	};
  	
  	/**
  	 * Methodo que inicia todos os outros
  	 */
  	 
  $scope.carregando = {};
  $scope.carregar = function() {
    if ( angular.isDefined($scope.carregando.timer) ) return;
  	$scope.carregando.timer = $interval(function() {
    	if ($scope.carregando.porcentagem >= 100) {
        $scope.stopCarregar();
      }
    }, 100);
  };

  $scope.stopCarregar = function() {
    if (angular.isDefined($scope.carregando.timer)) {
      $interval.cancel($scope.carregando.timer);
      $scope.carregando.timer = undefined;
      $scope.carregando.show = false;
    }
  };
  
  $scope.carregandomais = function (){
  	$timeout(function(){
  		$scope.carregando.porcentagem += 9;
  	}, 200);
  };
  
	$scope.iniciar = function(){
		$('#adminconteudo').css('display','inline');
		$scope.carregando.show = true;
		$scope.carregando.porcentagem = 0;
		$scope.carregar();
		
		$scope.admin = admin;
		$scope.novoanuncioIniciar();
		$scope.comentarioSeuproprio = false;
		
		$scope.carregarComentarios();
		$scope.carregarMensagens();
		$scope.carregarAnuncios();
		$scope.carregarEstatistica();
		$scope.carregarCidades();
		$scope.carregarTpimoveis();
		$scope.carregarTpnegocios();
		$scope.carregarTempos();
		$scope.fecharTodos();
		$scope.abrir((paginaAdminInicial != undefined?paginaAdminInicial:1));
		$scope.carregarQtdComentarios();
		$scope.carregarQtdMensagens();
		$scope.carregarQtdAnuncios();
		$scope.configSite.carregar();
	};
	$scope.iniciar();
	
});
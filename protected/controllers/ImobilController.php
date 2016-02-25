<?php

/**
 * ImobilController class file.
 * @author Jonas Kreling <jonasfrancokreling@gmail.com>
 * 
**/
class ImobilController extends CController {
	
	// @var string seta a action default
	public $defaultAction='abrir';
	public $acao = '';
	public $anuncio = 0;
	
	// @parametros de busca do site
	public $tpnegocio = '';
	public $tpimovel = '';
	public $cidade = '';
	public $valor = '';
	public $qtdquarto = '';
	public $qtdbanheiro = '';
	public $qtdgaragem = '';
	public $quintal = '';
	
	// @parametros da página de admin
	public $paginaAdminInicial = 1;
	
	public function isAdmin(){
		return Yii::app()->user->tipoUsuario != 0;
	}
	
	public function actionAdmin() {
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['ferramenta']) && $_POST['ferramenta'] != ''){
				$this->paginaAdminInicial = $_POST['ferramenta'];
			}else if(isset($_GET['ferramenta']) && $_GET['ferramenta'] != ''){
				$this->paginaAdminInicial = $_GET['ferramenta'];
			}
			if(!$this->isAdmin() && ($this->paginaAdminInicial == 1 || $this->paginaAdminInicial == 5)){
				$this->paginaAdminInicial = 2;
			}
			$this->render("admin");
		}else{
			$this->actionAbrirLogin();
		}
	}
	
	public function actionAbrirLogin() {
		if(!Yii::app()->user->isGuest){
			$this->render("index");
		}else{
			$this->setPageTitle("Login - Vilmar Kreling");
			$this->layout = "nulo";
			$this->render("login");
		}
	}
	
	public function reLogarUsuario($email, $senha, $action) {
		$identity = new UserIdentity($email,$senha);
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			if(isset($action) && $action != ""){
				$this->redirect($action);
			}else{
				$this->redirect('admin/1');
			}
		} else {
			$this->render('erro');
		}
			
	}
	
	public function actionLogarUsuario() {
		$identity = new UserIdentity($_POST['email'],$_POST['senha']);
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			if(isset($_POST['action']) && $_POST['action'] != ""){
				$this->redirect($_POST['action']);
			}else{
				$this->redirect('admin/1');
			}
		} else {
			$this->render('erro');
		}
    		
	}
	
	public function actionDeslogarUsuario() {
		Yii::app()->user->logout();
		$this->actionAbrir();
	}
	
	public function actionAbrir() {
		
		$this->setPageTitle("Imobiliária - Vilmar Kreling");
		
		if (isset($_GET['page']) && $_GET['page'] != "") {
			$this->render($_GET['page']);
		} else {
			$this->render("index");
		}
		
	}
	
	public function actionBuscainicial(){
			
		$this->setPageTitle("Imobiliária - Vilmar Kreling");
		
		$buscainicial = isset($_POST['buscainicial']) ? $_POST['buscainicial']:"";
		$busca = explode(".", $buscainicial);
		$tpimovel = Tpimovel::model()->find(array('condition'=>'tpimovel=:tpimovel','params'=>array(':tpimovel'=>$busca[1])));
		switch ($busca[0]) {
			case 'alugar':
				$this->tpnegocio = 3;
				$this->tpimovel = $tpimovel->id;		
				break;
			case 'comprar':
				$this->tpnegocio = 2;
				$this->tpimovel = $tpimovel->id;
				break;
			default:
				$this->tpimovel = $tpimovel->id;
				break;
		}
		$this->render('busca');
		
	}
	
	public function actionBusca() {
		
		$this->setPageTitle("Imobiliária - Vilmar Kreling");
		
		if(isset($_GET['tpnegocio']) && $_GET['tpnegocio'] != ""){
			$this->tpnegocio = isset($_GET['tpnegocio']) ? $_GET['tpnegocio']:"";
			$this->tpimovel = isset($_GET['tpimovel']) ? $_GET['tpimovel']:"";
		}else if(Yii::app()->request->isPostRequest){
			$this->tpnegocio = isset($_POST['tpnegocio']) ? $_POST['tpnegocio']:"";
			$this->tpimovel = isset($_POST['tpimovel']) ? $_POST['tpimovel']:"";
			$this->cidade = isset($_POST['cidade']) ? $_POST['cidade']:"";
			$this->valor = isset($_POST['valor']) ? $_POST['valor']:"";
			$this->qtdquarto = isset($_POST['qtdquarto']) ? $_POST['qtdquarto']:"";
			$this->qtdbanheiro = isset($_POST['qtdbanheiro']) ? $_POST['qtdbanheiro']:"";
			$this->qtdgaragem = isset($_POST['qtdgaragem']) ? $_POST['qtdgaragem']:"";
			$this->quintal = isset($_POST['quintal']) ? $_POST['quintal']:"";
		}
		
		$this->render("busca");
		
	}
	
	public function actionCadastroUsuario() {
		
		if(isset($_POST['usuarioid']) && $_POST['usuarioid'] != ""){
			$usuario = Usuario::model()->findByPk($_POST['usuarioid']);
			$usuario->nome       = trim(isset($_POST['nome'])? $_POST['nome'] : $usuario->nome);
			$usuario->sobrenome  = trim(isset($_POST['sobrenome'])? $_POST['sobrenome'] : $usuario->sobrenome);
			$usuario->nascimento = isset($_POST['data'])? $_POST['data'] : $usuario->nascimento;
			$usuario->sexo       = isset($_POST['sexo'])? $_POST['sexo'] : $usuario->sexo;
			$usuario->celular    = trim(isset($_POST['celular'])? $_POST['celular'] : $usuario->celular);
			$usuario->email      = trim(isset($_POST['email'])? $_POST['email'] : $usuario->email);
			$usuario->ultimaMudanca		 = $this->getDate();
			$usuario->save();
			$this->reLogarUsuario($usuario->email, $usuario->senha, "admin/6");
		}else{
			$usuario = new Usuario;
			$usuario->nome       = trim(isset($_POST['nome'])? $_POST['nome'] : "");
			$usuario->sobrenome  = trim(isset($_POST['sobrenome'])? $_POST['sobrenome'] : "");
			$usuario->nascimento = isset($_POST['data'])? $_POST['data'] : "";
			$usuario->sexo       = isset($_POST['sexo'])? $_POST['sexo'] : "";
			$usuario->celular    = trim(isset($_POST['celular'])? $_POST['celular'] : "");
			$usuario->email      = trim(isset($_POST['email'])? $_POST['email'] : "");
			$usuario->senha      = trim(isset($_POST['senha'])? $_POST['senha'] : "");
			$usuario->ultimaMudanca	 = $this->getDate();
			$usuario->save();
			$this->redirect('abrirLogin');
		}
		
	}

	private function getDate(){
		return date('Y-m-d H:i:s');
	}

	public function actionCadastroNovaSenha() {
		if(isset($_POST['usuarioid']) && $_POST['usuarioid'] != ""){
			$usuario = Usuario::model()->findByPk($_POST['usuarioid']);
			$usuario->senha       = trim($_POST['novasenha']);
			$usuario->ultimaMudanca		 = $this->getDate();
			$usuario->save();
			$this->reLogarUsuario($usuario->email, $usuario->senha, "admin/6");
		}
	}

	
	public function actionCadastroCidade() {
		
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$cidade = Cidade::model()->findByPk($_POST['id']);
		}else{
			$cidade = new Cidade;
		}
		$cidade->cidade = trim(isset($_POST['cidade'])? $_POST['cidade'] : "");
		$cidade->save();
		
		$this->paginaAdminInicial = 5;
		$this->render('admin');
		
	}
	
	public function actionDeleteCidade() {
		$cidade = Cidade::model()->findByPk($_POST['id']);
		$cidade->delete();
		$this->paginaAdminInicial = 5;
		$this->render('admin');
	}
	
	public function actionCadastroTipoimovel() {
		
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$tpimovel = Tpimovel::model()->findByPk($_POST['id']);
		}else{
			$tpimovel = new Tpimovel;
		}
		$tpimovel->tpimovel = trim(isset($_POST['tipoimovel'])? $_POST['tipoimovel'] : "");
		$tpimovel->save();
		
		$this->paginaAdminInicial = 5;
		$this->render('admin');
		
	}
	
	public function actionDeleteTipoimovel() {
		$tpimovel = Tpimovel::model()->findByPk($_POST['id']);
		$tpimovel->delete();
		$this->paginaAdminInicial = 5;
		$this->render('admin');
	}
	
	public function actionCadastroTiponegocio() {
		
		if(isset($_POST['id']) && $_POST['id'] != ''){
			$tpnegocio = Tpnegocio::model()->findByPk($_POST['id']);
		}else{
			$tpnegocio = new Tpnegocio;
		}
		$tpnegocio->tpnegocio = trim(isset($_POST['tiponegocio'])? $_POST['tiponegocio'] : "");
		$tpnegocio->save();
		
		$this->paginaAdminInicial = 5;
		$this->render('admin');
		
	}
	
	public function actionDeleteTiponegocio() {
		$tpnegocio = Tpnegocio::model()->findByPk($_POST['id']);
		$tpnegocio->delete();
		$this->paginaAdminInicial = 5;
		$this->render('admin');
	}
	
	
	
	public function actionAbrirAnuncio() {
		if(Yii::app()->user->isGuest){
			$this->acao = 'abrirAnuncio';
			$this->layout = 'nulo';
			$this->render('login');
		}else{
			$this->render('anuncie');
		}
	}

	public function actionVerAnuncio() {
		$this->anuncio = $_GET['anuncio'];
		$this->render('anuncio');
	}
	
	public function actionSalvarMensagem(){
		$mensagem = new Mensagem;
		$mensagem->mensagem = $_POST['mensagem'];
		$mensagem->nome = $_POST['nome'];
		$mensagem->celular = $_POST['celular'];
		$mensagem->email = $_POST['email'];
		$mensagem->usuario = $_POST['usuario'];
		$mensagem->data = $this->getDate();
		$mensagem->anuncio = $_POST['anuncio'];
		
		$message = new YiiMailMessage;
		$message->setBody('Teste para enviar e-mail', 'text/html');
		$message->subject = 'E-mail teste';
		$message->addTo('jonasfrancokreling@gmail.com');
		$message->from = 'jonasfrancokreling@hotmail.com';//Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($message);
		
		$mensagem->save();
		$this->redirect('verAnuncio/'.$_POST['anuncio']);
	}
	
	public function actionSalvarComentario(){
		$comentario = new Comentario;
		$comentario->comentario = $_POST['comentario'];
		$comentario->usuario = $_POST['usuario'];
		$comentario->data = $this->getDate();
		$comentario->anuncio = $_POST['anuncio'];
		
		$comentario->save();
		$this->redirect('verAnuncio/'.$_POST['anuncio']);
	}


	/**
	 * ACTIONS AJAX
	 */
	 
	public function actionComentarioLido(){
		$comentariolido = new Comentariolido;
		$post = Yii::app()->request->rawBody;
		$dados = CJSON::decode($post, true);
		$comentariolido->comentario = $dados['comentario'];
		$comentariolido->usuario = $dados['usuario'];
		$comentariolido->data = $dados['data'];
		$response = array();
		if ($comentariolido->save() === false) {
			$response['success'] = false;
			$response['errors'] = $comentariolido->errors;
		} else {
			$response['success'] = true;
		    $response['contacts'] = $comentariolido; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}

	public function actionMensagemLido(){
		$mensagemlida = new Mensagemlida;
		$post = Yii::app()->request->rawBody;
		$dados = CJSON::decode($post, true);
		$mensagemlida->mensagem = $dados['mensagem'];
		$mensagemlida->usuario = $dados['usuario'];
		$mensagemlida->data = $dados['data'];
		$response = array();
		if ($mensagemlida->save() === false) {
			$response['success'] = false;
			$response['errors'] = $mensagemlida->errors;
		} else {
			$response['success'] = true;
		    $response['contacts'] = $mensagemlida; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	 
	public function actionComentarioExcluido(){
		$post = Yii::app()->request->rawBody;
		$dados = CJSON::decode($post, true);
		$comentario = Comentario::model()->findByPk($dados['id']);
		$response = array();
		if ($comentario->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $comentario->errors;
		} else {
			$response['success'] = true;
			$response['comentario'] = $comentario; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	public function actionMensagemExcluido(){
		$post = Yii::app()->request->rawBody;
		$dados = CJSON::decode($post, true);
		$mensagem = Mensagem::model()->findByPk($dados['id']);
		$response = array();
		if ($mensagem->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $mensagem->errors;
		} else {
			$response['success'] = true;
			$response['mensagem'] = $mensagem; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	public function actionAnuncioExcluido(){
		$post = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($post, true);
		
		Mensagem::model()->deleteAllByAttributes(array('anuncio'=>$parametros['id'],));
		Comentario::model()->deleteAllByAttributes(array('anuncio'=>$parametros['id'],));
		$anuncio = Anuncio::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($anuncio->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $anuncio->errors;
		} else {
			$response['success'] = true;
			$response['anuncio'] = $anuncio; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	 
	public function actionComentarioResponder(){
		$post = Yii::app()->request->rawBody;
		$dados = CJSON::decode($post, true);
		
		$comentario = new Comentario;
		$comentario->comentario = $dados['comentario'];
		$comentario->usuario = $dados['usuario'];
		$comentario->data = $this->getDate();
		$comentario->anuncio = $dados['anuncio'];
		
		
		$response = array();
		if ($comentario->save() === false) {
			$response['success'] = false;
			$response['errors'] = $comentario->errors;
		} else {
			$response['success'] = true;
			$response['contacts'] = $comentario; 
		}
		header('Content-type:application/json');
		echo CJSON::encode($response);
		exit();
	}
	
	public function actionCarregarConfig(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$config;
		try{
			$config = Config::model()->findByPk(1);
		}catch(Exception $e){
			$config = 'Erro ao carregar as configurações.';
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($config);
		Yii::app()->end();
		
	}
	
	public function actionComentarioCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		if($parametros['seuproprio'] == false){
			$condition .= " AND usuario!=:usuario ";
			$params[':usuario'] = Yii::app()->user->id;
		}
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		if(!$this->isAdmin()){
			$criteria->addInCondition('anuncio',$ids);
		}
		$criteria->together = true;		
		$criteria->offset = $parametros['pagina']*$parametros['limite'];
		$criteria->limit = $parametros['limite'];
		$criteria->order = 'data desc';
		
		$comentarios = Comentario::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($comentarios as $key => $comentario) {
			$dados = array();
			$dados['id'] = $comentario->id;
			$dados['resumo'] = strlen($comentario->comentario) > 50 ? substr($comentario->comentario, 0, 50).'...':$comentario->comentario;
			$dados['data'] = strftime('%d de %b, %Y %H:%M', strtotime($comentario->data));
			$dados['hoje'] = $this->getDate();
			$dados['usuario'] = Yii::app()->user->id;
			$dados['comentario'] = $comentario->comentario;
			$dados['anuncioid'] = $comentario->Anuncio->id;
			$dados['anunciodescricao'] = $comentario->Anuncio->descricao;
			$dados['anunciotiponegocio'] = $comentario->Anuncio->Tpnegocio->tpnegocio;
			$dados['anunciotipoimovel'] = $comentario->Anuncio->Tpimovel->tpimovel;
			$dados['anunciovalor'] = $comentario->Anuncio->valor;
			$dados['veranuncio'] = $this->createUrl('verAnuncio/'.$comentario->Anuncio->id);
			$dados['show'] = true;
			
			if(count($comentario->Anuncio->Imagemanuncio) > 0){
				$dados['anuncioimagem'] = $comentario->Anuncio->Imagemanuncio[0]->url;
			}else{
				$dados['anuncioimagem'] = Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg";
			}
			
			
			$comentariolido = Comentariolido::model()->find('usuario=:usuario AND comentario=:comentario', array(':usuario'=>Yii::app()->user->id,':comentario'=>$comentario->id));
			if($comentariolido !== null){
				$dados['lido'] = true;
				$dados['classe'] = 'panel-success';
			}else{
				$dados['lido'] = false;
				$dados['classe'] = '';
			}
			 
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}

	public function actionMensagemCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		if(!$this->isAdmin()){
			$criteria->addInCondition('anuncio',$ids);
		}
		$criteria->together = true;		
		$criteria->offset = $parametros['pagina']*$parametros['limite'];
		$criteria->limit = $parametros['limite'];
		$criteria->order = 'data desc';
		
		$mensagens = Mensagem::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($mensagens as $key => $mensagem) {
			$dados = array();
			$dados['id'] = $mensagem->id;
			$dados['resumo'] = strlen($mensagem->mensagem) > 50 ? substr($mensagem->mensagem, 0, 50).'...':$mensagem->mensagem;
			$dados['data'] = strftime('%d de %b, %Y %H:%M', strtotime($mensagem->data));
			$dados['hoje'] = $this->getDate();
			$dados['usuario'] = Yii::app()->user->id;
			$dados['mensagem'] = $mensagem->mensagem;
			$dados['celular'] = $mensagem->celular;
			$dados['nome'] = $mensagem->nome;
			$dados['email'] = $mensagem->email;
			$dados['anuncioid'] = $mensagem->Anuncio->id;
			$dados['anunciodescricao'] = $mensagem->Anuncio->descricao;
			$dados['anunciotiponegocio'] = $mensagem->Anuncio->Tpnegocio->tpnegocio;
			$dados['anunciotipoimovel'] = $mensagem->Anuncio->Tpimovel->tpimovel;
			$dados['anunciovalor'] = $mensagem->Anuncio->valor;
			$dados['veranuncio'] = $this->createUrl('verAnuncio/'.$mensagem->Anuncio->id);
			$dados['show'] = true;
			
			if(count($mensagem->Anuncio->Imagemanuncio) > 0){
				$dados['anuncioimagem'] = $mensagem->Anuncio->Imagemanuncio[0]->url;
			}else{
				$dados['anuncioimagem'] = Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg";
			}
			
			$mensagemlida = Mensagemlida::model()->find('usuario=:usuario AND mensagem=:mensagem', array(':usuario'=>Yii::app()->user->id,':mensagem'=>$mensagem->id));
			if($mensagemlida !== null){
				$dados['lido'] = true;
				$dados['classe'] = 'panel-success';
			}else{
				$dados['lido'] = false;
				$dados['classe'] = '';
			}
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}

	public function actionComentarioPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		if($parametros['seuproprio'] === false){
			$condition .= " AND usuario!=:usuario ";
			$params[':usuario'] = Yii::app()->user->id;
		}
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		if(!$this->isAdmin()){
			$criteria->addInCondition('anuncio',$ids);
		}
		
		$comentarios = Comentario::model()->findAll($criteria);
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(count($comentarios));
		Yii::app()->end();
		
	 }

	public function actionMensagemPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		if(!$this->isAdmin()){
			$criteria->addInCondition('anuncio',$ids);
		}
		
		$mensagens = Mensagem::model()->findAll($criteria);
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode(count($mensagens));
		Yii::app()->end();
		
	}
	
	public function actionAnuncioPaginacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(!$this->isAdmin()){
			$condition .= " AND usuario=:usuario ";
			$params[':usuario'] = Yii::app()->user->id;
		}
		
		$anuncios = Anuncio::model()->count(array('condition'=>$condition, 'params'=>$params));
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($anuncios);
		Yii::app()->end();
		
	}
	
	
	public function actionComentarioTodosLidos(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		if($parametros['seuproprio'] === false){
			$condition .= " AND usuario!=:usuario ";
			$params[':usuario'] = Yii::app()->user->id;
		}
		
		$comentarios = Comentario::model()->findAll(array('condition'=>$condition, 'params'=>$params));
		foreach ($comentarios as $key => $comentario) {
			$condition = "";
			$params = array();
			$condition .= "usuario=:usuario AND comentario=:comentario";
			$params[':usuario'] = Yii::app()->user->id;
			$params[':comentario'] = $comentario->id;
			if(!Comentariolido::model()->exists(array('condition'=>$condition, 'params'=>$params))){
				$comentariolido = new Comentariolido;
				$comentariolido->usuario = Yii::app()->user->id;
				$comentariolido->comentario = $comentario->id;
				$comentariolido->data = $this->getDate();
				$comentariolido->save();
			}
		}
	}
	
	public function actionMensagemTodosLidos(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		$mensagens = Mensagem::model()->findAll(array('condition'=>$condition, 'params'=>$params));
		foreach ($mensagens as $key => $mensagem) {
			$condition = "";
			$params = array();
			$condition .= "usuario=:usuario AND mensagem=:mensagem";
			$params[':usuario'] = Yii::app()->user->id;
			$params[':mensagem'] = $mensagem->id;
			if(!Mensagemlida::model()->exists(array('condition'=>$condition, 'params'=>$params))){
				$mensagemlida = new Mensagemlida;
				$mensagemlida->usuario = Yii::app()->user->id;
				$mensagemlida->mensagem = $mensagem->id;
				$mensagemlida->data = $this->getDate();
				$mensagemlida->save();
			}
		}
	}
	
	public function actionQtdComentarios(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Comentario c WHERE c.id NOT IN (SELECT cl.comentario FROM Comentariolido cl INNER JOIN Comentario cm ON cl.comentario = cm.id WHERE cl.usuario =".Yii::app()->user->id.")";
		if($parametros['seuproprio'] === false){
			$sql .= " AND c.usuario !=".(Yii::app()->user->id);
		}
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
			if(count($ids) > 0){
				$sql .= " AND c.anuncio IN (".implode(', ',$ids).") ";
			}else{
				$sql .= " AND c.anuncio IN (null) ";
			}
		}
		
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
		
	}
	
	public function actionQtdMensagens(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Mensagem c WHERE c.id NOT IN (SELECT msl.mensagem FROM Mensagemlida msl INNER JOIN Mensagem msg ON msl.mensagem = msg.id WHERE msl.usuario =".Yii::app()->user->id.")";
		
		if(!$this->isAdmin()){
			$anuncios = Anuncio::model()->findAll(array('condition'=>'usuario=:usuario','params'=>array(':usuario'=>Yii::app()->user->id)));
			$ids = array();
			foreach ($anuncios as $key => $anuncio) {
				$ids[] = $anuncio->id;
			}
			if(count($ids) > 0){
				$sql .= " AND c.anuncio IN (".implode(', ',$ids).") ";
			}else{
				$sql .= " AND c.anuncio IN (null) ";
			}
		}
		
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
		
	}
	
	public function actionQtdAnuncios(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT count(*) FROM Anuncio WHERE 1 = 1";
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
		
	}

	public function actionSalvarNovoAnuncio() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$anuncio = Anuncio::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$anuncio = new Anuncio;
		}
		$anuncio->usuario = Yii::app()->user->getId();
		$anuncio->tpnegocio = $parametros['tpnegocio'];
		$anuncio->tpimovel = $parametros['tpimovel'];
		$anuncio->endereco = isset($parametros['endereco'])? $parametros['endereco'] : "";
		$anuncio->cidade = $parametros['cidade'];
		$anuncio->valor = $parametros['valor'];
		$anuncio->tempo = isset($parametros['tempo'])?$parametros['tempo']:1;
		$anuncio->titulo = $parametros['titulo'];
		$anuncio->descricao = $parametros['descricao'];
		$anuncio->qtdcomodo = isset($parametros['qtdcomodo'])? $parametros['qtdcomodo'] : 0;
		$anuncio->qtdquarto = isset($parametros['qtdquarto'])? $parametros['qtdquarto'] : 0;
		$anuncio->qtdbanheiro = isset($parametros['qtdbanheiro'])? $parametros['qtdbanheiro'] : 0;
		$anuncio->qtdgaragem = isset($parametros['qtdgaragem'])? $parametros['qtdgaragem'] : 0;
		$anuncio->areaterreno = isset($parametros['areaterreno'])? $parametros['areaterreno'] : 0;
		$anuncio->areaconstruida = isset($parametros['areaconstruida'])? $parametros['areaconstruida'] : 0;
		$anuncio->areapiscina = isset($parametros['areapiscina'])? $parametros['areapiscina'] : 0;
		$anuncio->andarmaximo = isset($parametros['andarmaximo'])? $parametros['andarmaximo'] : 0;
		$anuncio->quintal = isset($parametros['quintal'])? $parametros['quintal'] : "N";
		$anuncio->areaservico = isset($parametros['areaservico'])? $parametros['areaservico'] : "N";
		$anuncio->piscina = isset($parametros['piscina'])? $parametros['piscina'] : "N";
		
		$anuncio->vizualizacoes = 0;
		$anuncio->finalizado = 'N';
		$anuncio->data = $this->getDate();
		
		$response = array();
		if ($anuncio->save() === false) {
			$response['success'] = false;
			$response['errors'] = $anuncio->errors;
		} else {
			
			$count = 1;
			while($count <= 8){
				if(isset($parametros['imagem'.$count]) && $parametros['imagem'.$count] != ""){
					$imagemAnuncio = Imagemanuncio::model()->find(array('condition'=>' anuncio=:anuncio AND descricao=:descricao', 'params'=>array(':anuncio'=>$anuncio->id,':descricao'=>'imagem'.$count)));
					if($imagemAnuncio == null){
						$imagemAnuncio = new Imagemanuncio;
					}
					$imagemAnuncio->url = $parametros['imagem'.$count];
					$imagemAnuncio->anuncio = $anuncio->id;
					$imagemAnuncio->status = 'S';
					$imagemAnuncio->descricao = 'imagem'.$count;
					$imagemAnuncio->save();
				}
				$count++;
			}
			
			$response['success'] = true;
			$response['contacts'] = $anuncio; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionSalvarConfig() {
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$config = Config::model()->find(array('condition'=>' id=:id', 'params'=>array(':id'=>$parametros['id'])));
		}else{
			$config = new Config;
		}
		$config->nomesite = $parametros['nomesite'];
		$config->qtdanuncio = $parametros['qtdanuncio'];
		$config->exibircreci = $parametros['exibircreci'];
		$config->crecipessoafisica = $parametros['crecipessoafisica'];
		$config->creci = $parametros['creci'];
		$config->endereco = $parametros['endereco'];
		$config->email = $parametros['email'];
		$config->celular1 = $parametros['celular1'];
		$config->celular2 = $parametros['celular2'];
		$config->celular3 = $parametros['celular3'];
		$config->celular4 = $parametros['celular4'];
		
		$response = array();
		if ($config->save() === false) {
			$response['success'] = false;
			$response['errors'] = $config->errors;
		} else {
			$response['success'] = true;
			$response['config'] = $config; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}

	public function actionAnuncioCarregar(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$condition = " 1=1 ";
		$params = array();
		
		if(!$this->isAdmin()){
			$condition .= ' AND usuario=:usuario ';
			$params[':usuario'] = Yii::app()->user->id;
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = $condition;
		$criteria->params = $params;
		$criteria->together = true;		
		$criteria->offset = $parametros['pagina']*$parametros['limite'];
		$criteria->limit = $parametros['limite'];
		$criteria->order = 'data desc';
		
		$anuncios = Anuncio::model()->findAll($criteria);
		
		$jsons = array(); 				
		foreach ($anuncios as $key => $anuncio) {
			$dados = array();
			$dados['id'] = $anuncio->id;
			$dados['tpnegocio'] = $anuncio->Tpnegocio->tpnegocio;
			$dados['tpnegociocodigo'] = $anuncio->tpnegocio;
			$dados['tpimovel'] = $anuncio->Tpimovel->tpimovel;
			$dados['tpimovelcodigo'] = $anuncio->tpimovel;
			$dados['endereco'] = $anuncio->endereco;
			$dados['cidade'] = $anuncio->Cidade->cidade;
			$dados['cidadecodigo'] = $anuncio->cidade;
			$dados['valor'] = $anuncio->valor;
			$dados['tempo'] = (isset($anuncio->Tempo))?$anuncio->Tempo->tempo:'1';
			$dados['tempocodigo'] = $anuncio->tempo;
			$dados['titulo'] = $anuncio->titulo;
			$dados['descricao'] = $anuncio->descricao;
			$dados['qtdcomodo'] = $anuncio->qtdcomodo;
			$dados['qtdquarto'] = $anuncio->qtdquarto;
			$dados['qtdbanheiro'] = $anuncio->qtdbanheiro;
			$dados['qtdgaragem'] = $anuncio->qtdgaragem;
			$dados['areaterreno'] = $anuncio->areaterreno;
			$dados['areaconstruida'] = $anuncio->areaconstruida;
			$dados['areapiscina'] = $anuncio->areapiscina;
			$dados['andarmaximo'] = $anuncio->andarmaximo;
			$dados['quintal'] = $anuncio->quintal;
			$dados['areaservico'] = $anuncio->areaservico;
			$dados['piscina'] = $anuncio->piscina;
			
			$dados['finalizado'] = $anuncio->finalizado;
			$dados['usuario'] = $anuncio->Usuario->id;
			$dados['seuproprio'] = ($anuncio->Usuario->id == Yii::app()->user->id);
			$dados['veranuncio'] = $this->createUrl('verAnuncio/'.$anuncio->id);
			$dados['show'] = true;
			$dados['data'] = strftime('%d de %b, %Y %H:%M', strtotime($anuncio->data));
			$dados['hoje'] = $this->getDate();
			
			$dados['qtdimagem'] = count($anuncio->Imagemanuncio);
			if(count($anuncio->Imagemanuncio) > 0){
				foreach ($anuncio->Imagemanuncio as $key => $imagem) {
					$dados[$imagem->descricao] = $imagem->url;
				}
			}
			$count = 1;
			while($count <= 8) {
				if(!isset($dados['imagem'.$count]) || $dados['imagem'.$count] == ""){
					$dados['imagem'.$count] = Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg";
				}
				$count++;
			}
			
			$jsons[] = $dados;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($jsons);
		Yii::app()->end();
		
	}

	public function actionGetEstatisticaTpimovel(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql = "SELECT distinct "; 
		$sql .= " ti.tpimovel as x, ";
		$sql .= " count(ae.id) as y, ";
		$sql .= " CONCAT(ti.tpimovel,\" \",count(ae.id),\" ocorrências\") as tooltip ";
		$sql .= " FROM "; 
		$sql .= " Anuncioestatistica ae ";
		$sql .= " join Anuncio a on ae.anuncio = a.id ";
		$sql .= " join Tpimovel ti on a.tpimovel = ti.id "; 
		$sql .= " WHERE 1 ";
		$sql .= " group by ti.tpimovel";
		$estatisticaTpimoveis = Yii::app()->db->createCommand($sql)->queryAll();
		
		$retorno = array();
		foreach ($estatisticaTpimoveis as $key => $value) {
			$estatisticaTpimovel = new EstatisticaTpimovel;
			$estatisticaTpimovel->x = $value['x'];
			$estatisticaTpimovel->y = array($value['y']);
			$estatisticaTpimovel->tooltip = $value['tooltip'];
			
			 $retorno[] = $estatisticaTpimovel;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($retorno);
		Yii::app()->end();
	}

	public function actionGetVisitasTempo(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql  = "";
		$data = new DateTime(date('Y-m-d'));
		switch($parametros['tempo']){
			case 7:
				$data = $data->modify('-8 day');
				
				$estatisticaTpimoveis = array();
				while($data->format('Y-m-d') <= date('Y-m-d')){
					$sql  = " SELECT "; 
					$sql .= " count(ae.id) as QTD "; 
					$sql .= " FROM ";
					$sql .= " Anuncioestatistica ae ";
					$sql .= " where DATE_FORMAT(ae.data,'%y-%m-%d') = DATE('".$data->format('Y-m-d')."') ";
					
					$estatisticaTpimovel = new EstatisticaTpimovel;
					$estatisticaTpimovel->x = strftime('%d/%b', strtotime($data->format('Y-m-d')));
					$estatisticaTpimovel->y = array(Yii::app()->db->createCommand($sql)->queryScalar());
					$estatisticaTpimoveis[] = $estatisticaTpimovel;
					$data->modify('+1 day');
				}		
				break;
			case 30:
				$data = $data->modify('-35 day');
				
				$estatisticaTpimoveis = array();
				while($data->format('Y-m-d') < date('Y-m-d')){
					$dataAux = new DateTime($data->format('Y-m-d'));
					$dataAux = $dataAux->modify('+7 day');
					$sql  = " SELECT "; 
					$sql .= " count(ae.id) as QTD "; 
					$sql .= " FROM ";
					$sql .= " Anuncioestatistica ae ";
					$sql .= " where DATE_FORMAT(ae.data,'%y-%m-%d') > DATE('".$data->format('Y-m-d')."') ";
					$sql .= " AND 	DATE_FORMAT(ae.data,'%y-%m-%d') <= DATE('".$dataAux->format('Y-m-d')."') ";
					
					$estatisticaTpimovel = new EstatisticaTpimovel;
					$estatisticaTpimovel->x = strftime('%d/%b', strtotime($data->format('Y-m-d')))." - ".strftime('%d/%b', strtotime($dataAux->format('Y-m-d')));
					$estatisticaTpimovel->y = array(Yii::app()->db->createCommand($sql)->queryScalar());
					$estatisticaTpimoveis[] = $estatisticaTpimovel;
					$data = $data->modify('+7 day');
				}
				break;
			case 365:
				$data = $data->modify('-12 month');
				
				$estatisticaTpimoveis = array();
				while($data->format('Y-m-d') < date('Y-m-d')){
					$dataAux = new DateTime($data->format('Y-m-d'));
					$dataAux = $dataAux->modify('+1 month');
					$sql  = " SELECT "; 
					$sql .= " count(ae.id) as QTD "; 
					$sql .= " FROM ";
					$sql .= " Anuncioestatistica ae ";
					$sql .= " where DATE_FORMAT(ae.data,'%y-%m-%d') > DATE('".$data->format('Y-m-d')."') ";
					$sql .= " AND 	DATE_FORMAT(ae.data,'%y-%m-%d') <= DATE('".$dataAux->format('Y-m-d')."') ";
					
					$estatisticaTpimovel = new EstatisticaTpimovel;
					if($dataAux->format('Y-m-d') == date('Y-m-d')){
						$estatisticaTpimovel->x = 'hoje';
					}else{
						$estatisticaTpimovel->x = strftime('%d/%b', strtotime($dataAux->format('Y-m-d')));
					}
					$estatisticaTpimovel->y = array(Yii::app()->db->createCommand($sql)->queryScalar());
					
					$estatisticaTpimoveis[] = $estatisticaTpimovel;
					$data = $data->modify('+1 month');
				}
				
				break;
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($estatisticaTpimoveis);
		Yii::app()->end();
	}

	public function actionGetQtdVisualizacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$sql  = "SELECT "; 
		$sql .= " count(ae.id) as QTD ";
		$sql .= " FROM "; 
		$sql .= " Anuncioestatistica ae ";
		$qtd = Yii::app()->db->createCommand($sql)->queryScalar();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($qtd);
		Yii::app()->end();
	}

	public function actionGetUltimaVisualizacao(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		$limite = isset($parametros['limite'])?$parametros['limite']:1;
		$anuncioestatisticas = Anuncioestatistica::model()->findAll(array('limit'=>$limite,'order'=>'data desc'));
		
		foreach ($anuncioestatisticas as $key => $anuncioestatistica) {
			$anuncioestatisticas[$key]->data = strftime('%d de %b %H:%M', strtotime($anuncioestatistica->data));
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($anuncioestatisticas);
		Yii::app()->end();
	}
	
	public function actionSetEstatisticaAnuncio(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$anuncioestatistica = new Anuncioestatistica;
		$anuncioestatistica->data = $this->getDate();
		$anuncioestatistica->anuncio = $parametros['anuncio'];
		
		$response = array();
		if ($anuncioestatistica->save() === false) {
			$response['success'] = false;
			$response['errors'] = $anuncioestatistica->errors;
		} else {
			$response['success'] = true;
			$response['anuncioestatistica'] = $anuncioestatistica; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionCidades(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$cidades = Cidade::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($cidades);
		Yii::app()->end();
	}
	
	public function actionSalvarCidade(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$cidade = Cidade::model()->findByPk($parametros['id']);
		}else{
			$cidade = new Cidade;
		}
		$cidade->cidade = $parametros['cidade'];
		
		$response = array();
		if ($cidade->save() === false) {
			$response['success'] = false;
			$response['errors'] = $cidade->errors;
		} else {
			$response['success'] = true;
			$response['cidade'] = $cidade; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionDeletarCidade(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$cidade = Cidade::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($cidade->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $cidade->errors;
		} else {
			$response['success'] = true;
			$response['cidade'] = $cidade; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionTpimoveis(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tpimoveis = Tpimovel::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($tpimoveis);
		Yii::app()->end();
	}
	
	public function actionSalvarTpimovel(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$tpimovel = Tpimovel::model()->findByPk($parametros['id']);
		}else{
			$tpimovel = new Tpimovel;
		}
		$tpimovel->tpimovel = $parametros['tpimovel'];
		
		$response = array();
		if ($tpimovel->save() === false) {
			$response['success'] = false;
			$response['errors'] = $tpimovel->errors;
		} else {
			$response['success'] = true;
			$response['tpimovel'] = $tpimovel; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionDeletarTpimovel(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tpimovel = Tpimovel::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($tpimovel->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $tpimovel->errors;
		} else {
			$response['success'] = true;
			$response['tpimovel'] = $tpimovel; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionTpnegocios(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tpnegocios = Tpnegocio::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($tpnegocios);
		Yii::app()->end();
	}
	
	public function actionSalvarTpnegocio(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$tpnegocio = Tpnegocio::model()->findByPk($parametros['id']);
		}else{
			$tpnegocio = new Tpnegocio;
		}
		$tpnegocio->tpnegocio = $parametros['tpnegocio'];
		
		$response = array();
		if ($tpnegocio->save() === false) {
			$response['success'] = false;
			$response['errors'] = $tpnegocio->errors;
		} else {
			$response['success'] = true;
			$response['tpnegocio'] = $tpnegocio; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionDeletarTpnegocio(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tpnegocio = Tpnegocio::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($tpnegocio->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $tpnegocio->errors;
		} else {
			$response['success'] = true;
			$response['tpnegocio'] = $tpnegocio; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionTempos(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tempos = Tempo::model()->findAll();
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($tempos);
		Yii::app()->end();
	}
	
	public function actionSalvarTempo(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		if(isset($parametros['id']) && $parametros['id'] != ''){
			$tempo = Tempo::model()->findByPk($parametros['id']);
		}else{
			$tempo = new Tempo;
		}
		$tempo->tempo = $parametros['tempo'];
		
		$response = array();
		if ($tempo->save() === false) {
			$response['success'] = false;
			$response['errors'] = $tempo->errors;
		} else {
			$response['success'] = true;
			$response['tempo'] = $tempo; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	public function actionDeletarTempo(){
		$dadosPost = Yii::app()->request->rawBody;
		$parametros = CJSON::decode($dadosPost, true);
		
		$tempo = Tempo::model()->findByPk($parametros['id']);
		
		$response = array();
		if ($tempo->delete() === false) {
			$response['success'] = false;
			$response['errors'] = $tempo->errors;
		} else {
			$response['success'] = true;
			$response['tempo'] = $tempo; 
		}
		
		header('Content-type: application/json; charset=utf-8');
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
}
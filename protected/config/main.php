<?php

return array(
	'name'=>'Imobil',
	'defaultController'=>'imobil',
	'import'=>array(
        'application.models.*',
        'ext.yii-mail.YiiMailMessage',
    ),
	'components'=>array(
		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail', 
 			'logging' => true,
 			'dryRun' => false
 		),
		'db' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'mysql:host=127.0.0.1;dbname=imobil',
            'username'=>'root',
            'password'=>'coraldavilma',
            'charset'=>'utf8',
        ),
		'urlManager' => array(
			'urlFormat'=>'path',
			'rules'=>array(
				 //abrir home			
				'inicio'=>'imobil/abrir',
				
				 //abrir admin			
				'admin'=>'imobil/admin',
				'admin/<ferramenta:\d+>'=>'imobil/admin',
				
				 //Página de login			
				'abrirLogin'=>'imobil/abrirLogin',
				'logarUsuario'=>'imobil/logarUsuario',
				'deslogarUsuario'=>'imobil/deslogarUsuario',
				
				//Página de anuncio 
				'abrirAnuncio'=>'imobil/abrirAnuncio',
				'salvarAnuncio'=>'imobil/salvarAnuncio',
				'verAnuncio/<anuncio:\d+>'=>'imobil/verAnuncio',
			
				 //cadastro de usuario
				'cadastroUsuario'=>'imobil/cadastroUsuario',
				'cadastroNovaSenha'=>'imobil/cadastroNovaSenha',
				
				//cadastro de cidade
				'cadastroCidade'=>'imobil/cadastroCidade',
				'deleteCidade'=>'imobil/deleteCidade',
				
				//cadastro de tipoimovel
				'cadastroTipoimovel'=>'imobil/cadastroTipoimovel',
				'deleteTipoimovel'=>'imobil/deleteTipoimovel',
				
				//cadastro de tiponegocio
				'cadastroTiponegocio'=>'imobil/cadastroTiponegocio',
				'deleteTiponegocio'=>'imobil/deleteTiponegocio',
			
				 //abrir páginas
				'page/<page:\w+>'=>'imobil/abrir',
				
				'buscainicial'=>'imobil/buscainicial',
				
				 //página de busca com e sem parametros
				'busca'=>'imobil/busca',
				'busca/<tpnegocio:\w+>'=>'imobil/busca',
				'busca/<tpnegocio:\w+>/<tpimovel:\w+>'=>'imobil/busca',
				
				'salvarMensagem'=>'imobil/salvarMensagem',
				'salvarComentario'=>'imobil/salvarComentario',
				
				// ACTIONS AJAX
				'comentarioLido'=>'imobil/comentarioLido',
				'comentarioExcluido'=>'imobil/comentarioExcluido',
				'comentarioResponder'=>'imobil/comentarioResponder',
				'comentarioCarregar'=>'imobil/comentarioCarregar',
				'comentarioPaginacao'=>'imobil/comentarioPaginacao',
				'comentarioTodosLidos'=>'imobil/comentarioTodosLidos',
				'qtdComentarios'=>'imobil/qtdComentarios',
				
				'mensagemLido'=>'imobil/mensagemLido',
				'mensagemExcluido'=>'imobil/mensagemExcluido',
				'mensagemResponder'=>'imobil/mensagemResponder',
				'mensagemCarregar'=>'imobil/mensagemCarregar',
				'mensagemPaginacao'=>'imobil/mensagemPaginacao',
				'mensagemTodosLidos'=>'imobil/mensagemTodosLidos',
				'qtdMensagens'=>'imobil/qtdMensagens',
				
				'anuncioExcluido'=>'imobil/anuncioExcluido',
				'anuncioCarregar'=>'imobil/anuncioCarregar',
				'anuncioPaginacao'=>'imobil/anuncioPaginacao',
				'qtdAnuncios'=>'imobil/qtdAnuncios',
				
				'salvarNovoAnuncio'=>'imobil/salvarNovoAnuncio',
				
				'getEstatisticaTpimovel'=>'imobil/getEstatisticaTpimovel',
				'setEstatisticaAnuncio'=>'imobil/setEstatisticaAnuncio',
				'getUltimaVisualizacao'=>'imobil/getUltimaVisualizacao',
				'getQtdVisualizacao'=>'imobil/getQtdVisualizacao',
				'getVisitasTempo'=>'imobil/getVisitasTempo',
				
				'cidades'=>'imobil/cidades',
				'salvarCidade'=>'imobil/salvarCidade',
				'deletarCidade'=>'imobil/deletarCidade',
				
				'tpimoveis'=>'imobil/tpimoveis',
				'salvarTpimovel'=>'imobil/salvarTpimovel',
				'deletarTpimovel'=>'imobil/deletarTpimovel',
				
				'tpnegocios'=>'imobil/tpnegocios',
				'salvarTpnegocio'=>'imobil/salvarTpnegocio',
				'deletarTpnegocio'=>'imobil/deletarTpnegocio',
				
				'tempos'=>'imobil/tempos',
				'salvarTempo'=>'imobil/salvarTempo',
				'deletarTempo'=>'imobil/deletarTempo',
				
				'carregarConfig'=>'imobil/carregarConfig',
				'salvarConfig'=>'imobil/salvarConfig',
				
			),
		),
	),
);
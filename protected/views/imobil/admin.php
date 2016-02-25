<script>
	var paginaAdminInicial = <?php echo isset($this->paginaAdminInicial)?$this->paginaAdminInicial:'undefined'; ?> 	
</script>

<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller='AdminController'>
	
	<div class='row'>
		<br />
		<br />
		<br />
	</div>
	
	<div class='row' ng-show='carregando.show'>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<div class='col-sm-12 text-center'>
			<div class="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="{{carregando.porcentagem}}" aria-valuemin="0" aria-valuemax="100" style="width: {{carregando.porcentagem}}%;">
			    	{{carregando.porcentagem}}%
				</div>
			</div>
			Carregando...
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
	</div>
	
	<div class='row' ng-hide='carregando.show' style='display:none;' id='adminconteudo'>
		<div class='col-md-3'>
			<h3>
				<i class="glyphicon glyphicon-briefcase"></i>
				Ferramentas
			</h3>
			<hr />
			<ul class="nav nav-stacked">
				<li><a href="javascript:;" ng-click='abrir(1)' ng-show="admin"><i class="glyphicon glyphicon-signal"></i>&nbsp;&nbsp;Estatísticas</a></li>
				<li><a href="javascript:;" ng-click='abrir(2)'><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;Anúncios</a></li>
				<li><a href="javascript:;" ng-click='abrir(3)'><i class="glyphicon glyphicon-comment"></i><span class="count" ng-show='qtdMensagensShow'>{{qtdMensagens}}</span>&nbsp;&nbsp;Mensagens</a></li>
				<li><a href="javascript:;" ng-click='abrir(4)'><i class="glyphicon glyphicon-pushpin"></i><span class="count" ng-show='qtdComentariosShow'>{{qtdComentarios}}</span>&nbsp;&nbsp;Comentários</a></li>
				<li><a href="javascript:;" ng-click='abrir(5)' ng-show="admin"><i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;Configurações</a></li>
				<li><a href="javascript:;" ng-click='abrir(6)'><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Usuário</a></li>
			</ul>
			<hr />
		</div>
	
		<div class='col-md-9'>
			<h3 ng-show='estatistica.show'>
				<i class="glyphicon glyphicon-signal"></i>
				&nbsp;&nbsp;Estatísticas
			</h3>
			<h3 ng-show='anuncio.show'>
				<i class="glyphicon glyphicon-list-alt"></i>
				&nbsp;&nbsp;Anúncios
			</h3>
			<h3 ng-show='novoanuncio.show'>
				<i class="glyphicon glyphicon-list-alt"></i>
				&nbsp;&nbsp;Novo anúncio
			</h3>
			<h3 ng-show='mensagem.show'>
				<i class="glyphicon glyphicon-comment"></i>
				&nbsp;&nbsp;Mensagens
			</h3>
			<h3 ng-show='comentario.show'>
				<i class="glyphicon glyphicon-pushpin"></i>
				&nbsp;&nbsp;Comentários
			</h3>
			<h3 ng-show='configuracao.show'>
				<i class="glyphicon glyphicon-cog"></i>
				&nbsp;&nbsp;Configurações
			</h3>
			<h3 ng-show='usuario.show'>
				<i class="glyphicon glyphicon-user"></i>
				&nbsp;&nbsp;Usuário
			</h3>
			<hr />
			
			<!----------------------------------------------->
			<!---------          Estatística         -------->
			<!----------------------------------------------->
			<div class='row' ng-show='estatistica.show'>
				<div class='col-md-9'>
					<div class="btn-toolbar" role="toolbar">
						
						<div class="btn-group">
							<button type='button' ng-click='carregarEstatistica()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Recarregar</button>
						</div>
					
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								Mais opções <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#" ng-click='relatorioAnuncios()'>Relatório</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<hr ng-show='estatistica.show' />
			<div class='row' ng-show='estatistica.show'>
				<div class='col-sm-12'>
					Quantidade total de visualizações de imóveis: {{qtdVisualizacoes.data}}
				</div>
				<div class='col-sm-12'>
					Últimos imóvel vistos:
					<span class="label label-default left" ng-repeat='visualizacao in ultimasVisualizacoes.data'>
						{{visualizacao.anuncio}} foi visto em {{visualizacao.data}}
					</span>
					<br />
				</div>
			</div>
			<br ng-show='estatistica.show' />
			<div class='row' ng-show='estatistica.show'>
				<div class='col-sm-8'>
					<div ac-chart="'line'" ac-data="dadosSerieVisitas" ac-config="configLine" id='chartLine' class='chart' style='width: 800px;height:300px;'></div>
				</div>
				<div class='col-sm-4'>
					<div class="btn-toolbar" role="toolbar">
						<div class="btn-group">
							<button type='button' ng-click='trocaTempo(7)' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar">Semana</button>
							<button type='button' ng-click='trocaTempo(30)' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar">Mês</button>
							<button type='button' ng-click='trocaTempo(365)' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar">Ano</button>
						</div>
					</div>
				</div>
			</div>
			<br ng-show='estatistica.show' />
			<br ng-show='estatistica.show' />
			<div class='row' ng-show='estatistica.show'>
				<div class='col-sm-12'>
					<div ac-chart="'pie'" ac-data="dadosPie" ac-config="configPie" id='chart' class='chart' style='width: 400px;height:300px;'></div>
				</div>
			</div>
			
			
		
		<!----------------------------------------------->
		<!---------          Novo anúncio        -------->
		<!----------------------------------------------->
		<div class='row' ng-show='novoanuncio.show'>
			
			<div role="tabpanel">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id='tabAnuncio'>
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
							&nbsp;&nbsp;Básico
						</a>
					</li>
					<li role="presentation">
						<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
							<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
							&nbsp;&nbsp;Detalhes
						</a>
					</li>
					<li role="presentation">
						<a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
							<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
							&nbsp;&nbsp;Imagens
						</a>
					</li>
				</ul>
				
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						
						<br />
						
						<div class='row'>
							<div class='col-md-8'>
								
								<div class="form-class col-md-6">
									<label for="descricao" required>Tipo de negócio*</label>
									<?php
										echo CHtml::dropDownList('tpnegocio', '', 
																CHtml::listData(Tpnegocio::model()->findAll(),'id', 'tpnegocio'),
																	array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'novoanuncio.tpnegocio'));  
									?>
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Tipo de imóvel*</label>
									<?php
										echo CHtml::dropDownList('tpimovel', '', 
																	CHtml::listData(Tpimovel::model()->findAll(),'id', 'tpimovel'),
																	array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'novoanuncio.tpimovel'));  
									?>
								</div>
								
								<div class="form-group col-md-6">
									<label for="endereco">Endereço do anúncio</label>
									<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço/Localização" maxlength="100" require='' ng-model='novoanuncio.endereco' />
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Cidade*</label>
									<?php
										echo CHtml::dropDownList('cidade', '', 
																CHtml::listData(Cidade::model()->findAll(),'id', 'cidade'),
																array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'novoanuncio.cidade'));  
									?>
								</div>
								
								<div class="form-group col-md-6">
									<label for="valor">Valor* <small>(R$)</small></label>
									<input type="text" class="form-control text-right bold-font" id="valor" require='' ng-model='novoanuncio.valor' ui-money-mask maxlength='17' />
									<input type="hidden" value='{{anuncio.valor}}' name='valor' />
								</div>
								
								<div class="form-group col-md-6">
									<label for="valor">Tempo</label>
									<?php
										echo CHtml::dropDownList('tempo', '', 
																CHtml::listData(Tempo::model()->findAll(),'id', 'tempo'),
																array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'novoanuncio.tempo'));  
									?>
								</div>
								
								<div class="form-group col-md-12">
									<label for="descricao">Título* <small>(120 caracteres)</small></label>
									<input type='text' class="form-control" id="titulo" placeholder="Título do anúncio" maxlength='120' ng-model='novoanuncio.titulo' />
								</div>
								
								<div class="form-group col-md-12">
									<label for="descricao">Descrição* <small>(5000 caracteres)</small></label>
									<textarea class="form-control" rows='5' name='descricao' id="descricao" placeholder="Descrição do anúncio" maxlength='5000' require='' ng-model='novoanuncio.descricao' ></textarea>
								</div>
											
							</div>
							<div class='col-sm-4'>
								<div class="alert alert-success" role="alert" ng-show='anunciosalvocorreto'>Seu anúncio foi salvo corretamente!</div>
								<div class="alert alert-info" role="alert" ng-show='anuncioadicionarmais'>Adicione mais anúncios aqui!</div>
							</div>
						</div>
						
						<div class='row'>
							<div class="col-xs-12 col-md-8 text-right">
								<button type='button' class='btn btn-primary icones' ng-click='tabShow("profile")'>Próxima&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="tab-pane" id="profile">
						<br />
						<div class='row'>
							<div class='col-md-8'>
								
								<div class="form-group col-md-6">
									<label for="descricao">Qt. de comodos</label>
									<select class='form-control' name='qtdcomodo' ng-model='novoanuncio.qtdcomodo'>
										<option value='0'>Não tem comodos</option>
										<?php  
											for($i=0;$i<20;$i++)
												echo "<option value='".$i."'>".$i."</option>";
										?>
									</select>
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Qt. de quartos</label>
									<select class='form-control' name='qtdquarto' ng-model='novoanuncio.qtdquarto'>
										<option value='0'>Não tem quarto</option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
										<option value='4'>4</option>
										<option value='5'>5</option>
										<option value='6'>6</option>
										<option value='7'>7</option>
										<option value='8'>8</option>
										<option value='9'>9</option>
										<option value='10'>10</option>
									</select>
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Qt. de banheiros</label>
									<select class='form-control' name='qtdbanheiro' ng-model='novoanuncio.qtdbanheiro'>
										<option value='0'>Não tem banheiro</option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
										<option value='4'>4</option>
										<option value='5'>5</option>
									</select>
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Qt. de garagens</label>
									<select class='form-control' name='qtdgaragem' ng-model='novoanuncio.qtdgaragem'>
										<option value='0'>Não tem garagem</option>
										<option value='1'>1</option>
										<option value='2'>2</option>
										<option value='3'>3</option>
										<option value='4'>4</option>
										<option value='5'>5</option>
									</select>
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Área do terreno</label>
									<input type="text" class="form-control text-right bold-font" id="areaterreno" require='' ng-model='novoanuncio.areaterreno' ui-number-mask maxlength='17' />
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Área construída</label>
									<input type="text" class="form-control text-right bold-font" id="areaconstrucao" require='' ng-model='novoanuncio.areaconstruida' ui-number-mask maxlength='17' />
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Área da piscina</label>
									<input type="text" class="form-control text-right bold-font" id="areapiscina" require='' ng-model='novoanuncio.areapiscina' ui-number-mask maxlength='17' />
								</div>
								
								<div class="form-group col-md-6">
									<label for="descricao">Qt. andares</label>
									<select class='form-control' name='andar' ng-model='novoanuncio.andarmaximo'>
										<?php  
											for($i=1;$i<=40;$i++)
												echo "<option value='".$i."'>".$i."</option>";
										?>
									</select>
								</div>
								
								<div class="form-group col-sm-6">
									<div class="col-sm-12">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="quintal" id="quintal1" ng-model="novoanuncio.quintal" ng-true-value="S" ng-false-value="N"> Quintal/Área de lazer
											</label>
										</div>
									</div>
								</div>
								
								<div class="form-group col-sm-6">
									<div class="col-sm-12">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="areaservico" id="areaservico1"  ng-model="novoanuncio.areaservico" ng-true-value="S" ng-false-value="N"> Área de Serviço
											</label>
										</div>
									</div>
								</div>
								
								<div class="form-group col-sm-6">
									<div class="col-sm-12">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="piscina" id="piscina1" ng-model="novoanuncio.piscina" ng-true-value="S" ng-false-value="N"> Piscina
											</label>
										</div>
									</div>
								</div>
								
							</div>
						</div>	
						
						<div class='row'>
							<div class="col-xs-12 col-md-8 text-right">
								<button type='button' class='btn btn-primary icones' ng-click='tabShow("home")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Anterior</button>
								<button type='button' class='btn btn-primary icones' ng-click='tabShow("messages")'>Próxima&nbsp;&nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
							</div>
						</div>
						
					</div>
					<div role="tabpanel" class="tab-pane" id="messages">
						<br />
						<div class="row" ng-show='novoanuncio.show'>
							
							<div class="form-group col-sm-12">
								<label for="imageFile">Imagem <small>(Você pode adicionar até 8 imagens do seu imóvel)</small></label>
								<input type="file" multiple id="imageFile" custom-on-change="uploadImagem" style='display:none;' />
								<canvas id="imageCanvas" style="display:none;"></canvas>
							</div>
							
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem1}}" ng-click='openFile(1)' />
								</a>
								<h5 class="centered">Imagem 1</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem2}}" ng-click='openFile(2)' />
								</a>
								<h5 class="centered">Imagem 2</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem3}}" ng-click='openFile(3)' />
								</a>
								<h5 class="centered">Imagem 3</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem4}}" ng-click='openFile(4)' />
								</a>
								<h5 class="centered">Imagem 4</h5>
							</div>
						</div>
		
						<div class="row" ng-show='novoanuncio.show'>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem5}}" ng-click='openFile(5)' />
								</a>
								<h5 class="centered">Imagem 5</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem6}}" ng-click='openFile(6)' />
								</a>
								<h5 class="centered">Imagem 6</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem7}}" ng-click='openFile(7)' />
								</a>
								<h5 class="centered">Imagem 7</h5>
							</div>
							<div class="col-xs-12 col-md-2">
								<a href="#" class="thumbnail">
									<img ng-src="{{novoanuncio.imagem8}}" ng-click='openFile(8)' />
								</a>
								<h5 class="centered">Imagem 8</h5>
							</div>
						</div>
						
						<div class='row'>
							<div class="col-xs-12 col-md-8 text-right">
								<hr />
								<button type='button' class='btn btn-primary icones' ng-click='novoanuncioIniciar()'><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Limpar</button>
								<button type='button' class='btn btn-primary icones' ng-click='tabShow("profile")'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp;Voltar</button>
								<button type='button' class='btn btn-success icones' ng-click='salvarNovoAnuncio()'><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;&nbsp;Salvar anúncio</button>
							</div>
						</div>
										
					</div>
				</div>
			
			</div>
		</div>
		
		<!----------------------------------------------->
		<!---------          Anúncios            -------->
		<!----------------------------------------------->
		<div class='row' ng-show='anuncio.show'>
			<div class='col-md-3'>
				<table>
					<tr>
						<td>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group">
									<button type='button' class='btn btn-default icones' ng-click='paginaMenosAnuncio()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
									<button type='button' class='btn btn-default icones' ng-click='paginaMaisAnuncio()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</td>
						<td class='td-contagem font-80 text-nowrap'>{{anuncioInicio}} - {{anuncioFim}} de {{anuncioQtd}}</td>
					</tr>
				</table>
			</div>	
			<div class='col-md-9'>
				<div class="btn-toolbar" role="toolbar">
					
					<div class="btn-group">
						<button type='button' ng-click='anuncioCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Recarregar</button>
						<button type='button' ng-click='novoanuncioIniciar()' class='btn btn-success icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Novo anúncio</button>
					</div>
				
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Mais opções <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" ng-click='relatorioAnuncios()'>Relatório anúncios</a></li>
							<li><a href="#" ng-click='relatorioAnunciosVendidos()'>Relatório anúncios vendidos</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr ng-show='anuncio.show' />
		
		<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true' ng-show='anuncio.show'  ng-init='listaanuncio = []'>
			<div class='panel panel-primary' ng-show='anuncioVazio'>
				<div class='panel-heading hand' role='tab'>
					<h4 ng-click='carregarAnuncios()'>Carregue sua lista de anúncios.</h4>
				</div>	
			</div>
			<div class='panel panel-default' ng-class='anc.classe' ng-repeat='anc in listaanuncio' ng-show='anc.show'>
				<div class='panel-heading' role='tab' id='headingidd'>
					<div class='row'>
						<div class='col-sm-1 text-center title-anuncio'>
							<h4 class='panel-title text-capitalize title-anuncio'>
								<a class='a-anuncio' data-toggle='collapse' data-parent='#accordion' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
									{{anc.id}} 
								</a>
							</h4>
						</div>
						<div class='col-sm-2 title-anuncio'>
							<h4 class='panel-title text-capitalize title-anuncio'>
								<a class='a-anuncio' data-toggle='collapse' data-parent='#accordion' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
									{{anc.tpimovel}} 
								</a>
							</h4>
						</div>
						<div class='col-sm-6 title-anuncio'>
							<h4 class='panel-title text-capitalize title-anuncio'>
								<a class='a-anuncio' data-toggle='collapse' data-parent='#accordion' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
									{{anc.tpnegocio}}&nbsp;-&nbsp;{{anc.descricao}} 
								</a>
							</h4>
						</div>
						<div class='col-sm-3 text-right'>
							<h4 class='panel-title'>
								<a class='a-anuncio' data-toggle='collapse' data-parent='#accordion' href='#anc{{anc.id}}' aria-expanded='false' aria-controls='anc{{anc.id}}'>
									{{anc.data}}
								</a>
							</h4>
						</div>
					</div>
				</div>
				<div id='anc{{anc.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='anch{{anc.id}}'>
					<div class='panel-body'>
						
						<ul class="nav nav-tabs" role="tablist" id='tabAnuncio{{anc.id}}'>
							<li role="presentation" class="active">
								<a href="#home{{anc.id}}" aria-controls="home{{anc.id}}" role="tab" data-toggle="tab">
									<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
									&nbsp;&nbsp;Básico
								</a>
							</li>
							<li role="presentation">
								<a href="#profile{{anc.id}}" aria-controls="profile{{anc.id}}" role="tab" data-toggle="tab">
									<span class="glyphicon glyphicon-th" aria-hidden="true"></span>
									&nbsp;&nbsp;Detalhes
								</a>
							</li>
							<li role="presentation">
								<a href="#messages{{anc.id}}" aria-controls="messages{{anc.id}}" role="tab" data-toggle="tab">
									<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
									&nbsp;&nbsp;Imagens
								</a>
							</li>
						</ul>
						
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home{{anc.id}}">
								<div class='row'>
									<div class='col-sm-12'>
										<form class="form-horizontal">
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Código:</label>
												<div class="col-sm-9">
													<p class="form-control-static font-80">{{anc.id}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Tipo de negócio:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.tpnegocio}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Tipo de imóvel:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.tpimovel}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Endereço:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.endereco}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Cidade:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.cidade}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Valor:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.valor | currency}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Tempo:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.tempo}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Título:</label>
												<div class="col-sm-9">
													<p class="form-control-static font-80">{{anc.titulo}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Descrição:</label>
												<div class="col-sm-9">
													<p class="form-control-static font-80">{{anc.descricao}}</p>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile{{anc.id}}">
								<div class='row'>
									<div class='col-sm-12'>
										<form class="form-horizontal">
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Qtd. de comodos:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.qtdcomodo}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Qtd. de quartos:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.qtdquarto}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Qtd. de banheiros:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.qtdbanheiro}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Qtd. de garagens:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.qtdgaragem}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Área do terreno:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.areaterreno | number}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Área do construída:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.areaconstruida | number}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Área da piscina:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.areapiscina | number}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Qtd. de andares:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.andarmaximo}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Quintal ou Área de lazer:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.quintal}}</p>
												</div>
												<label class="col-sm-3 control-label font-80">Área de serviço:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.areaservico}}</p>
												</div>
											</div>
											<div class="form-group bottom">
												<label class="col-sm-3 control-label font-80">Piscina:</label>
												<div class="col-sm-3">
													<p class="form-control-static font-80">{{anc.piscina}}</p>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="messages{{anc.id}}">
								<br />
								<div class="row">
									
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem1}}" />
										</a>
										<h5 class="centered">Imagem 1</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem2}}" />
										</a>
										<h5 class="centered">Imagem 2</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem3}}" />
										</a>
										<h5 class="centered">Imagem 3</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem4}}" />
										</a>
										<h5 class="centered">Imagem 4</h5>
									</div>
								</div>
				
								<div class="row">
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem5}}" />
										</a>
										<h5 class="centered">Imagem 5</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem6}}" />
										</a>
										<h5 class="centered">Imagem 6</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem7}}" />
										</a>
										<h5 class="centered">Imagem 7</h5>
									</div>
									<div class="col-xs-12 col-md-3">
										<a href="#" class="thumbnail">
											<img ng-src="{{anc.imagem8}}" />
										</a>
										<h5 class="centered">Imagem 8</h5>
									</div>
								</div>
								
							</div>
						</div>
						
						
						
						
						
						<div class='row text-right'>
							<div class='col-sm-12'>
								<a class="btn btn-sm btn-social btn-facebook" ng-click="compartilhar($index)">
									<i class="fa fa-facebook"></i> Compartilhar esse anúncio no Facebook
								</a>
								<button type='button' class='btn btn-default btn-sm' ng-click='linkar(anc.veranuncio)'>
									<i class='glyphicon glyphicon-eye-open'></i>
									&nbsp;&nbsp;Visualizar anúncio completo
								</button>&nbsp;
								<button type='button' class='btn btn-default btn-sm' ng-click='anuncioExcluido($index)' ng-show='anc.seuproprio'>
									<i class='glyphicon glyphicon-trash'></i>
									&nbsp;&nbsp;Excluir
								</button>&nbsp;
								<button type='button' class='btn btn-default btn-sm' ng-click='editaranuncio($index)' ng-show='anc.seuproprio'>
									<i class='glyphicon glyphicon-edit'></i>
									&nbsp;&nbsp;Editar
								</button>&nbsp;
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
		
		<!----------------------------------------------->
		<!---------          Mensagens           -------->
		<!----------------------------------------------->
		<div class='row' ng-show='mensagem.show'>
			<div class='col-md-3'>
				<table>
					<tr>
						<td>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group">
									<button type='button' class='btn btn-default icones' ng-click='paginaMenosMensagem()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
									<button type='button' class='btn btn-default icones' ng-click='paginaMaisMensagem()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</td>
						<td class='td-contagem font-80 text-nowrap'>{{mensagemInicio}} - {{mensagemFim}} de {{mensagemQtd}}</td>
					</tr>
				</table>
			</div>	
			<div class='col-md-9'>
				<div class="btn-toolbar" role="toolbar">
					
					<div class="btn-group">
						<button type='button' ng-click='mensagemCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Recarregar</button>
						<button type='button' ng-click='mensagemTodosLidos()' class='btn btn-default '><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Marcar todas como lidas</button>
					</div>
				
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Mais opções <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" ng-click='limparMensagens()'>Limpar lista de exibição</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr ng-show='mensagem.show' />
		
		<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true' ng-show='mensagem.show'  ng-init='listamensagem = []'>
			<div class='panel panel-primary' ng-show='mensagemVazio'>
				<div class='panel-heading hand' role='tab'>
					<h4 ng-click='carregarMensagens()'>Carregue sua lista de mensagens.</h4>
				</div>	
			</div>
			<div class='panel panel-default' ng-class='msg.classe' ng-repeat='msg in listamensagem' ng-show='msg.show'>
				<div class='panel-heading' role='tab' id='headingidd' ng-click='mensagemLido($index)'>
					<div class='row'>
						<div class='col-sm-9'>
							<h4 class='panel-title text-capitalize'>
								<a data-toggle='collapse' data-parent='#accordion' href='#msg{{msg.id}}' aria-expanded='false' aria-controls='msg{{msg.id}}'>
									{{msg.resumo}}
								</a>
							</h4>
						</div>
						<div class='col-sm-3 text-right'>
							<h4 class='panel-title'>
								<a data-toggle='collapse' data-parent='#accordion' href='#msg{{msg.id}}' aria-expanded='false' aria-controls='msg{{msg.id}}'>
									{{msg.data}}
								</a>
							</h4>
						</div>
					</div>
				</div>
				<div id='msg{{msg.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='msgh{{msg.id}}'>
					<div class='panel-body'>
						<div class='row'>
							<div class='col-sm-3'>
								<img ng-src='{{msg.anuncioimagem}}' alt='...' class='img-thumbnail indexImage'>
							</div>
							<div class='col-sm-9'>
								
								<form class="form-horizontal">
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Anúncio:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{msg.anuncioid}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Tipo de negócio:</label>
										<div class="col-sm-3">
											<p class="form-control-static font-80">{{msg.anunciotiponegocio}}</p>
										</div>
										<label class="col-sm-3 control-label font-80">Tipo de imóvel:</label>
										<div class="col-sm-3">
											<p class="form-control-static font-80">{{msg.anunciotipoimovel}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Descrição:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{msg.anunciodescricao}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Valor:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{msg.anunciovalor | currency}}</p>
										</div>
									</div>
								</form>
								<br />
								<br />
								<div class="well well-lg font-80 text-capitalize">{{msg.mensagem}}<hr />{{msg.nome}}<br />{{msg.email}}<br />{{msg.celular}}</div>
								
							</div>
						</div>
						<br />
						<div class='row text-right'>
							<div class='col-sm-12'>
								<button type='button' class='btn btn-default btn-sm' ng-click='linkar(msg.veranuncio)'>
									<i class='glyphicon glyphicon-eye-open'></i>
									&nbsp;&nbsp;Visualizar anúncio completo
								</button>&nbsp;
								<button type='button' class='btn btn-default btn-sm' ng-click='mensagemExcluido($index)'>
									<i class='glyphicon glyphicon-trash'></i>
									&nbsp;&nbsp;Excluir
								</button>&nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!----------------------------------------------->
		<!---------          Comentários         -------->
		<!----------------------------------------------->
		<div class='row' ng-show='comentario.show'>
			<div class='col-md-3'>
				<table>
					<tr>
						<td>
							<div class="btn-toolbar" role="toolbar">
								<div class="btn-group">
									<button type='button' class='btn btn-default icones' ng-click='paginaMenos()'><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
									<button type='button' class='btn btn-default icones' ng-click='paginaMais()'><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
								</div>
							</div>
						</td>
						<td class='td-contagem font-80 text-nowrap'>{{comentarioInicio}} - {{comentarioFim}} de {{comentarioQtd}}</td>
					</tr>
				</table>
			</div>	
			<div class='col-md-9'>
				<div class="btn-toolbar" role="toolbar">
					
					<div class="btn-group">
						<button type='button' ng-click='comentarioCarregar()' class='btn btn-default icones' data-toggle="tooltip" data-placement="bottom" title="Recarregar"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;&nbsp;Recarregar</button>
						<button type='button' ng-click='comentarioTodosLidos()' class='btn btn-default '><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Marcar todas como lidas</button>
					</div>
				
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Mais opções <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#" ng-click='exibirProprioComentario()'>Exibir próprios comentários</a></li>
							<li><a href="#" ng-click='limparComentarios()'>Limpar lista de exibição</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr ng-show='comentario.show' />
		
		
		<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true' ng-show='comentario.show'  ng-init='listacomentario = []'>
			<div class='panel panel-primary' ng-show='comentarioVazio'>
				<div class='panel-heading hand' role='tab'>
					<h4 ng-click='carregarComentarios()'>Carregue sua lista de comentarios.</h4>
				</div>	
			</div>
			<div class='panel panel-default' ng-class='comentar.classe' ng-repeat='comentar in listacomentario' ng-show='comentar.show'>
				<div class='panel-heading' role='tab' id='headingidd' ng-click='comentarioLido($index)'>
					<div class='row'>
						<div class='col-sm-9'>
							<h4 class='panel-title text-capitalize'>
								<a data-toggle='collapse' data-parent='#accordion' href='#collapse{{comentar.id}}' aria-expanded='false' aria-controls='collapse{{comentar.id}}'>
									{{comentar.resumo}}
								</a>
							</h4>
						</div>
						<div class='col-sm-3 text-right'>
							<h4 class='panel-title'>
								<a data-toggle='collapse' data-parent='#accordion' href='#collapse{{comentar.id}}' aria-expanded='false' aria-controls='collapse{{comentar.id}}'>
									{{comentar.data}}
								</a>
							</h4>
						</div>
					</div>
				</div>
				<div id='collapse{{comentar.id}}' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading{{comentar.id}}'>
					<div class='panel-body'>
						<div class='row'>
							<div class='col-sm-3'>
								<img ng-src='{{comentar.anuncioimagem}}' alt='...' class='img-thumbnail indexImage'>
							</div>
							<div class='col-sm-9'>
								
								<form class="form-horizontal">
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Anúncio:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{comentar.anuncioid}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Tipo de negócio:</label>
										<div class="col-sm-3">
											<p class="form-control-static font-80">{{comentar.anunciotiponegocio}}</p>
										</div>
										<label class="col-sm-3 control-label font-80">Tipo de imóvel:</label>
										<div class="col-sm-3">
											<p class="form-control-static font-80">{{comentar.anunciotipoimovel}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Descrição:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{comentar.anunciodescricao}}</p>
										</div>
									</div>
									<div class="form-group bottom">
										<label class="col-sm-3 control-label font-80">Valor:</label>
										<div class="col-sm-9">
											<p class="form-control-static font-80">{{comentar.anunciovalor | currency}}</p>
										</div>
									</div>
								</form>
								<div class="well well-lg font-80">Comentário:&nbsp;{{comentar.comentario}}</div>
								<div class="alert font-80" ng-class='comentar.classealert' ng-show='comentar.showalert' role="alert">{{comentar.messagealert}}</div>
								<textarea class="form-control font-80" rows="3" placeholder='Escreva sua resposta...' ng-model='comentar.resposta'></textarea>
								
							</div>
						</div>
						<br />
						<div class='row text-right'>
							<div class='col-sm-12'>
								<button type='button' class='btn btn-default btn-sm' ng-click='linkar(comentar.veranuncio)'>
									<i class='glyphicon glyphicon-eye-open'></i>
									&nbsp;&nbsp;Visualizar anúncio completo
								</button>&nbsp;
								<button type='button' class='btn btn-default btn-sm' ng-click='comentarioExcluido($index)'>
									<i class='glyphicon glyphicon-trash'></i>
									&nbsp;&nbsp;Excluir
								</button>&nbsp;
								<button type='button' class='btn btn-primary btn-sm' ng-click='comentarioResponder($index)'>
									<i class='glyphicon glyphicon-comment'></i>
									&nbsp;&nbsp;Responder
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		  
		  
		<?php 
			include_once 'admin/configuracao.php';
		?> 
		  
		  
		  
		  
		  <!----------------------->
		  <!------- USUÁRIO   ----->
		  <!----------------------->
		  <?php
			   $usuario = Usuario::model()->findByPk(Yii::app()->user->id); 
		  ?>
		  <div class="panel panel-default" ng-show='usuario.show'>
				<div class="panel-heading">
					<div class='row'>
					<div class='col-md-6'>
						<h4>Dados do usuário</h4>
						<h5><small>Última edição em <?php echo Date('d/m/Y',strtotime($usuario->ultimaMudanca)).' às '.Date('H:i',strtotime($usuario->ultimaMudanca)); ?></small></h5>
					</div>
					<div class='col-md-6 text-right'>
						<button type='button' class='btn btn-default' ng-click='resetUsuario()'><i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;Cancelar</button>
						<button type='button' class='btn btn-primary' ng-click='salvarUsuario()'><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
					</div>
					</div>
				</div>
				<div class="panel-body">
					<div class='col-md-12'>
						<?php  
							echo CHtml::statefulForm( $this->createUrl('admin') , "post" , array('id' => 'formResetUsuario','class'=>'form-horizontal','ng-submit'=>'submitUsuario()'));
							 
						?>
							<input type='text' name='ferramenta' value='6' ng-hide='true' />
						<?php
							echo CHtml::endForm();
						?>
						
						<?php  
							echo CHtml::statefulForm( $this->createUrl('cadastroUsuario') , "post" , array('id' => 'formCadastrarUsuario','class'=>'form-horizontal','ng-submit'=>'submitUsuario()'));
							 
						?>
	  		
	  					<div class="form-group">
							<label for="nome" class='col-sm-3 control-label'>Nome</label>
							<div class="col-sm-6">
								<input type="text" ng-init="usuario.nome = '<?php echo $usuario->nome; ?>'" class="form-control" id="nome" name="nome" placeholder="Nome" ng-model="usuario.nome" maxlength="15" />
							</div>
						</div>
						<div class="form-group">
							<label for="sobrenome" class='col-sm-3 control-label'>Sobrenome</label>
							<div class="col-sm-6">
								<input type="text" ng-init="usuario.sobrenome = '<?php echo $usuario->sobrenome; ?>'" class="form-control" id="sobrenome" name="sobrenome" placeholder="sobrenome" ng-model="usuario.sobrenome" maxlength="20" />
							</div>
						</div>
						<div class="form-group">
							<label for="data" class='col-sm-3 control-label'>Data de nascimento</label>
							<div class="col-sm-6">
								<input type="text" ng-init="usuario.nascimento = '<?php echo $usuario->nascimento; ?>'" class="form-control" id="data" name="data" ui-mask="99/99/9999" ng-model="usuario.nascimento" />
							</div>
						</div>
						<div class="form-group" ng-init="usuario.sexo = '<?php echo $usuario->sexo; ?>'">
							<label for="data" class='col-sm-3 control-label'>Sexo</label>
							<div class="col-sm-8">
								<div class="radio">
									<label>
										<input type="radio" name="sexo" id="masculino" value="masculino" ng-model="usuario.sexo"> Masculino
									</label>
									<label>
										<input type="radio" name="sexo" id="feminino" value="feminino" ng-model="usuario.sexo"> Feminino
									</label>
								</div>
							</div>
						</div>		
						<div class="form-group">
							<label for="celular" class='col-sm-3 control-label'>Celular</label>
							<div class="col-sm-6">
								<input type="text" ng-init="usuario.celular = '<?php echo $usuario->celular; ?>'" class="form-control" id="celular" name="celular" ui-mask="(99) 9999-9999?9" ng-model="usuario.celular">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class='col-sm-3 control-label'>E-mail</label>
							<div class="col-sm-6">
								<input type="email" ng-init="usuario.email = '<?php echo $usuario->email; ?>'" class="form-control" id="email" name="email" placeholder="E-mail" ng-model="usuario.email" maxlength="30">
							</div>
						</div>
						<input type='text' value='' ng-init='usuario.id = <?php echo Yii::app()->user->id; ?>' id='usuarioid' name='usuarioid' ng-model='usuario.id' ng-hide='true' />
					<?php
						echo CHtml::endForm();
					?>
					</div>
					
				</div>
		  </div>
		  
		  <div class="panel panel-default" ng-show='usuario.show'>
				<div class="panel-heading">
					<div class='row'>
					<div class='col-md-6'>
						<h4>Senha do usuário</h4>
					</div>
					<div class='col-md-6 text-right'>
						<button type='button' class='btn btn-default' ng-click='resetUsuario()'><i class="glyphicon glyphicon-share-alt"></i>&nbsp;&nbsp;Cancelar</button>
						<button type='button' class='btn btn-primary' ng-click='salvarSenha()'><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
					</div>
					</div>
				</div>
				<div class="panel-body">
					<div class='col-md-12'>
						<?php  
							echo CHtml::statefulForm( $this->createUrl('cadastroNovaSenha') , "post" , array('id' => 'formNovaSenha','class'=>'form-horizontal','ng-submit'=>'submitSenha()')); 
						?>
							<div class="form-group">
								<label for="senha" class='col-sm-3 control-label'>Senha</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" ng-model="usuario.senha" maxlength="20">
								</div>
							</div>
						
							<div class="form-group">
								<label for="senha" class='col-sm-3 control-label'>Nova senha</label>
								<div class="col-sm-6">
									<input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="Nova senha" ng-model="usuario.novasenha" maxlength="20">
								</div>
							</div>
							<input type='text' ng-init='usuario.senhaantiga = "<?php echo $usuario->senha;  ?>"' value='' id='usuarioid' name='usuarioid' ng-model='usuario.id' ng-hide='true' />
						<?php
							echo CHtml::endForm();
						?>
					</div>
					
				</div>
		  </div>
		  
		  
		</div>
	</div>
	
</div>
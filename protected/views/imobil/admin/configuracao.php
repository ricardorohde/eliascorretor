<!-------------------------->
<!------- CONFIGURAÇÃO ----->
<!-------------------------->
		  
<div class='row' ng-show='configuracao.show'>
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist" id='tabGeral'>
			<li role="presentation" class="active">
				<a href="#tabgeral" aria-controls="tabgeral" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
					&nbsp;&nbsp;Geral
				</a>
			</li>
			<li role="presentation">
				<a href="#tabcidade" aria-controls="tabcidade" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					&nbsp;&nbsp;Cidades
				</a>
			</li>
			<li role="presentation">
				<a href="#tabtpimovel" aria-controls="tabtpimovel" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
					&nbsp;&nbsp;Tipo de imovel
				</a>
			</li>
			<li role="presentation">
				<a href="#tabtpnegocio" aria-controls="tabtpnegocio" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-record" aria-hidden="true"></span>
					&nbsp;&nbsp;Tipo de negócio
				</a>
			</li>
			<li role="presentation">
				<a href="#tabtempo" aria-controls="tabtempo" role="tab" data-toggle="tab">
					<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
					&nbsp;&nbsp;Tempo
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tabgeral">
				<br />
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" ng-show='configSite.showMessageSucess'>
						Salvo com sucesso!
					</div>
					<div class="form-group">
						<label for="nomesite" class="col-sm-4 control-label">Nome do site</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" placeholder="Nome do site" id='nomesite' ng-model='configSite.dados.nomesite' maxlength='20' />
						</div>
					</div>
					<div class="form-group">
						<label for="qtdanunciodestaque" class="col-sm-4 control-label">Qtd. anúncio destaque</label>
						<div class="col-sm-6">
							<input type="text" class="form-control text-right" id='qtdanunciodestaque' ng-model='configSite.dados.qtdanuncio' ui-number-mask='0' maxlength='10' />
						</div>
					</div>
					<div class="checkbox">
                        <label for='exibircreci' class='col-sm-4 control-label'></label>
                        <label>
                            <input 
                                type="checkbox" 
                                id='exibircreci' 
                                ng-model='configSite.dados.exibircreci'
                                ng-change='configSite.disableCreci()'
                                ng-true-value='true'
                                ng-false-value='false'
                            /> 
                            Exibir o CRECI no site
                        </label>
                        <br />
                        <label for='crecipessoafisica' class='col-sm-4 control-label'></label>
                        <label>
                            <input 
                                type="checkbox" 
                                id='crecipessoafisica' 
                                ng-model='configSite.dados.crecipessoafisica' 
                                ng-disabled='configSite.dados.disabledcreci' 
                                ng-change='configSite.setSiglaCreci()'
                                ng-true-value='true'
                                ng-false-value='false'
                            /> 
                            CRECI Pessoa Física
                        </label>
                    </div>
					<div class="form-group">
						<label for="creci" class="col-sm-4 control-label">Creci-{{configSite.dados.crecisigla}}</label>
						<div class="col-sm-6">
                            <input 
							    type='text' 
							    class='form-control text-right' 
							    id='creci' 
							    ng-model='configSite.dados.creci' 
							    ui-number-mask='0' 
							    maxlength='10' 
							    ng-disabled='configSite.dados.disabledcreci' 
						    />
						</div>
					</div>
					<div class="form-group">
						<label for="endereco" class="col-sm-4 control-label">Endereço</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='endereco' ng-model='configSite.dados.endereco' maxlength='200' placeholder='Endereço da sua empresa' />
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">E-mail</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='email' ng-model='configSite.dados.email' maxlength='200' placeholder='E-mail' />
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-sm-4 control-label">Celular 1</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='celular' ng-model='configSite.dados.celular1' maxlength='200' ui-mask="(99) 9999-9999?9" />
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-sm-4 control-label">Celular 2</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='celular' ng-model='configSite.dados.celular2' maxlength='200' ui-mask="(99) 9999-9999?9" />
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-sm-4 control-label">Celular 3</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='celular' ng-model='configSite.dados.celular3' maxlength='200' ui-mask="(99) 9999-9999?9" />
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-sm-4 control-label">Celular 4</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id='celular' ng-model='configSite.dados.celular4' maxlength='200' ui-mask="(99) 9999-9999?9" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 text-right">
							<button type="submit" class="btn btn-primary" ng-click='configSite.salvar()'>
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
								&nbsp;&nbsp;Salvar
							</button>
						</div>
					</div>
				</form>
				<br />
			</div>
			<div role="tabpanel" class="tab-pane" id="tabcidade">
				<br />
				<div class='row' ng-show='novacidade.show'>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="text" class="form-control" ng-model="novacidade.dados.cidade" placeholder="Cidade" maxlength="30" />
						</div>
						<div class='col-sm-4'>
							<button type='button' class='btn btn-primary' ng-click="salvarCidade()"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
						</div>
						<input type='text' value='' ng-model='cidade.id' id='id' name='id' ng-hide='true' />
					</div>
				</div>
				<div class='row' ng-show='listacidade.show'>
					<div class='col-md-6'>
						<h4>Cidades</h4>
					</div>
					<div class='col-md-3 col-sm-offset-3'>
						<button type='button' class='btn btn-primary btn-block' ng-click='novaCidade()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Cidade</button>
					</div>
				</div>
				<div class='row' ng-show='listacidade.show'>
					<div class='col-sm-12'>
						<div class="table-responsive table-config">
							<table class="table table-hover table-striped bottom">
								<thead>
									<tr>
										<th class='text-center' width="10%">Código</th>
										<th class='text-left' >Cidade</th>
										<th class='text-center' width="10%">Editar</th>
										<th class='text-center' width="10%">Deletar</th>
									</tr>
								</thead>
							</table>
							<table class="table table-hover table-striped">
								<tbody>
									<tr class='hand' ng-repeat='cidade in listacidade.dados'>
										<th class='text-center' scope='row' width='10%'>{{cidade.id}}</th>
										<td class='text-left text-capitalize' >{{cidade.cidade}}</td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarCidade($index)'></i></td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteCidade($index)'></i></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br />
			</div>
			<div role="tabpanel" class="tab-pane" id="tabtpimovel">
				<br />
				<div class='row' ng-show='novotpimovel.show'>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="text" class="form-control" ng-model="novotpimovel.dados.tpimovel" placeholder="Tipo de imóvel" maxlength="30" />
						</div>
						<div class='col-sm-4'>
							<button type='button' class='btn btn-primary' ng-click="salvarTpimovel()"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
						</div>
					</div>
				</div>
				<div class='row' ng-show='listatpimovel.show'>
					<div class='col-md-6'>
						<h4>Tipo de imóveis</h4>
					</div>
					<div class='col-md-3 col-sm-offset-3'>
						<button type='button' class='btn btn-primary btn-block' ng-click='novoTpimovel()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Tipo de imóvel</button>
					</div>
				</div>
				<div class='row' ng-show='listatpimovel.show'>
					<div class='col-sm-12'>
						<div class="table-responsive table-config">
							<table class="table table-hover table-striped bottom">
								<thead>
									<tr>
										<th class='text-center' width="10%">Código</th>
										<th class='text-left' >Tipo de imóvel</th>
										<th class='text-center' width="10%">Editar</th>
										<th class='text-center' width="10%">Deletar</th>
									</tr>
								</thead>
							</table>
							<table class="table table-hover table-striped">
								<tbody>
									<tr class='hand' ng-repeat='tpimovel in listatpimovel.dados'>
										<th class='text-center' scope='row' width='10%'>{{tpimovel.id}}</th>
										<td class='text-left text-capitalize' >{{tpimovel.tpimovel}}</td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarTpimovel($index)'></i></td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteTpimovel($index)'></i></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br />
			</div>
			<div role="tabpanel" class="tab-pane" id="tabtpnegocio">
				<br />
				<div class='row' ng-show='novotpnegocio.show'>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="text" class="form-control" ng-model="novotpnegocio.dados.tpnegocio" placeholder="Tipo de negócio" maxlength="30" />
						</div>
						<div class='col-sm-4'>
							<button type='button' class='btn btn-primary' ng-click="salvarTpnegocio()"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
						</div>
					</div>
				</div>
				<div class='row' ng-show='listatpnegocio.show'>
					<div class='col-md-6'>
						<h4>Tipo de negócio</h4>
					</div>
					<div class='col-md-3 col-sm-offset-3'>
						<button type='button' class='btn btn-primary btn-block' ng-click='novoTpnegocio()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Tipo de negócio</button>
					</div>
				</div>
				<div class='row' ng-show='listatpnegocio.show'>
					<div class='col-sm-12'>
						<div class="table-responsive table-config">
							<table class="table table-hover table-striped bottom">
								<thead>
									<tr>
										<th class='text-center' width="10%">Código</th>
										<th class='text-left' >Tipo de negócio</th>
										<th class='text-center' width="10%">Editar</th>
										<th class='text-center' width="10%">Deletar</th>
									</tr>
								</thead>
							</table>
							<table class="table table-hover table-striped">
								<tbody>
									<tr class='hand' ng-repeat='tpnegocio in listatpnegocio.dados'>
										<th class='text-center' scope='row' width='10%'>{{tpnegocio.id}}</th>
										<td class='text-left text-capitalize' >{{tpnegocio.tpnegocio}}</td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarTpnegocio($index)'></i></td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteTpnegocio($index)'></i></td>
										</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br />
			</div>
			<div role="tabpanel" class="tab-pane" id="tabtempo">
				<br />
				<div class='row' ng-show='novotempo.show'>
					<div class="form-group">
						<div class="col-sm-6 col-sm-offset-2">
							<input type="text" class="form-control" ng-model="novotempo.dados.tempo" placeholder="Tempo" maxlength="30" />
						</div>
						<div class='col-sm-4'>
							<button type='button' class='btn btn-primary' ng-click="salvarTempo()"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;Salvar</button>
						</div>
					</div>
				</div>
				<div class='row' ng-show='listatempo.show'>
					<div class='col-md-6'>
						<h4>Tempo</h4>
					</div>
					<div class='col-md-3 col-sm-offset-3'>
						<button type='button' class='btn btn-primary btn-block' ng-click='novoTempo()'><i class='glyphicon glyphicon-plus'></i>&nbsp;&nbsp;Tempo</button>
					</div>
				</div>
				<div class='row' ng-show='listatempo.show'>
					<div class='col-sm-12'>
						<div class="table-responsive table-config">
							<table class="table table-hover table-striped bottom">
								<thead>
									<tr>
										<th class='text-center' width="10%">Código</th>
										<th class='text-left' >Tempo</th>
										<th class='text-center' width="10%">Editar</th>
										<th class='text-center' width="10%">Deletar</th>
									</tr>
								</thead>
							</table>
							<table class="table table-hover table-striped">
								<tbody>
									<tr class='hand' ng-repeat='tempo in listatempo.dados'>
										<th class='text-center' scope='row' width='10%'>{{tempo.id}}</th>
										<td class='text-left text-capitalize' >{{tempo.tempo}}</td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-edit' ng-click='editarTempo($index)'></i></td>
										<td class='text-center text-danger' width='10%'><i class='glyphicon glyphicon-trash' ng-click='deleteTempo($index)'></i></td>
										</tr>			
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br />
			</div>
		</div>
	</div>
</div>
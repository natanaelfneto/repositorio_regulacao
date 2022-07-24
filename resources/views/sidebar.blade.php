<aside id="side-overlay" class="font-size-sm">
	<div class="content-header bg-white-5 pl-2">
		<a class="font-w600 text-dual" href="{{ route('index') }}">
			<div class="row">
				<div class="my-auto display-5 fw-bold text-info">BRTS</div>
			</div>
		</a>
		<a 
			class="d-lg-none btn btn-sm btn-dual ml-2" 
			data-toggle="layout" 
			data-action="sidebar_close"
			href="javascript:void(0)">
			<i class="fa fa-fw fa-times"></i>
		</a>
	</div>	
	<div class="content-side content-side-full pt-lg-0">
		<ul class="nav-main">
			@auth
			<li class="nav-main-heading">ACESSO</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-users"></i>
						<span class="nav-main-link-name">Usuários</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="##submenu.href##">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Usuário</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('users') }}">
								<i class="nav-main-link-icon icon-list"></i>
								<span class="nav-main-link-name">Listar Usuários</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="d-none nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon fa fa-address-card"></i>
						<span class="nav-main-link-name">Permissões</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="##submenu.href##">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Perfil</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="##submenu.href##">
								<i class="nav-main-link-icon icon-list"></i>
								<span class="nav-main-link-name">Listar Perfis</span>
							</a>
						</li>
					</ul>
				</li>
			</li>
			@endauth
			<li class="nav-main-heading">RELATÓRIOS</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-education-116"></i>
						<span class="nav-main-link-name">Quantitativos</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('reports', ['graph' => 'professions']) }}">
								<i class="nav-main-link-icon icon-bar-chart"></i>
								<span class="nav-main-link-name">Quantidade por Profissão</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('reports', ['graph' => 'types']) }}">
								<i class="nav-main-link-icon icon-bar-chart"></i>
								<span class="nav-main-link-name">Quantidade por Tipo de Regulação</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('reports', ['graph' => 'issuers']) }}">
								<i class="nav-main-link-icon icon-bar-chart"></i>
								<span class="nav-main-link-name">Quantidade por Órgão Emissor</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('reports', ['graph' => 'timestamps']) }}">
								<i class="nav-main-link-icon icon-bar-chart"></i>
								<span class="nav-main-link-name">Quantidade por Tempo</span>
							</a>
						</li>
					</ul>
				</li>
			</li>
			@auth
			<li class="nav-main-heading">NORMAS</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-education-116"></i>
						<span class="nav-main-link-name">Regulações</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('regulations') }}">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Regulação</span>
							</a>
						</li>
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('search') }}">
								<i class="nav-main-link-icon icon-magnifier"></i>
								<span class="nav-main-link-name">Pesquisar Regulações</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-education-050"></i>
						<span class="nav-main-link-name">Órgãos Emissores</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('issuers') }}">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Órgão Emissor</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-education-157"></i>
						<span class="nav-main-link-name">Tipos de Normativas</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('types') }}">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Tipo de Norma</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-main-item">
					<a 
						class="nav-main-link nav-main-link-submenu" 
						data-toggle="submenu" 
						aria-haspopup="true"
						aria-expanded="false" href="#">
						<i class="nav-main-link-icon icon-education-034"></i>
						<span class="nav-main-link-name">Profissões</span>
					</a>
					<ul class="nav-main-submenu">
						<li class="nav-main-item">
							<a class="nav-main-link" href="{{ route('professions') }}">
								<i class="nav-main-link-icon icon-plus"></i>
								<span class="nav-main-link-name">Cadastrar Profissão</span>
							</a>
						</li>
					</ul>
				</li>
			</li>
			@endauth
		</ul>
	</div>
	<div class="row border-top border-info fixed-bottom">
		<ul class="list-group list-group-horizontal mx-3">
			<li class="list-group-item border-0">link1</li>
			<li class="list-group-item border-0">link2</li>
		</ul>			
	</div>
</aside>
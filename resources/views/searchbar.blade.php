	<form action="{{ route('search') }}" method="GET">
		<div class="content">
			<div class="input-group my-3">
				<input 
					type="text" 
					name="filter_keyword" 
					class="form-control border-0" 
					placeholder="Buscar Normativa..." 
					style="border-bottom: 2px solid #dee2e6 !important; height: 60px;">
				<span
					class="input-group-text bg-white border-0"
					style="border-bottom: 2px solid #dee2e6 !important;">
					<i class="icon-magnifier text-primary"></i>
				</span>
			</div>
			<div class="mx-auto text-center mb-3">
				<a 
					class="mb-3" 
					data-toggle="collapse" 
					href="#advancedSearch" 
					role="button" 
					aria-expanded="false" 
					aria-controls="advancedSearch">
					Pesquisa avançada
				</a>
			</div>
			<div class="collapse block block-rounded py-3 mb-0" id="advancedSearch">
				<div class="row px-4">
					<div class="col-3">
						<div class="form-group mb-2">
							<label for="regulation_issuer">Órgão Emissor</label>
							<select name="regulation_issuer" class="form-control select2">
								@if ($request->query('regulation_issuer') == 'Todos os emissores')
									<option selected="selected">Todos os emissores</option>
								@else
									<option>Todos os emissores</option>
								@endif
								@foreach ($regulation_issuers as $issuer)
									@if ($issuer->issuer_name == 'null')
									@else
										@if (request()->query('regulation_issuer') == $issuer->issuer_name)
											<option selected="selected">{{ $issuer->issuer_name }}</option>
										@else
											<option>{{ $issuer->issuer_name }}</option>
										@endif
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group mb-2">
							<label for="professions_name">Profissão</label>
							<select name="professions_name" class="form-control select2">
								@foreach ($professions as $profession)
									@if ($profession->name == 'null')
										@if (request()->query('professions_name') == $profession->name)
											<option selected="selected">Todas as profissões</option>
										@else
											<option>Todas as profissões</option>
										@endif
									@else
										@if (request()->query('professions_name') == $profession->name)
											<option selected="selected">{{ $profession->name }}</option>
										@else
											<option>{{ $profession->name }}</option>
										@endif
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group mb-2">
							<label for="regulation_type">Tipo de Regulação</label>
							<select name="regulation_type" class="form-control select2">
								<option>Todos os tipos</option>
								@foreach ($regulation_types as $regulation_type)
									@if ($regulation_type->type_name == 'null')
									@else
										@if (request()->query('regulation_type') == $regulation_type->type_name)
										<option selected="selected">{{ $regulation_type->type_name }}</option>
										@else
										<option>{{ $regulation_type->type_name }}</option>
										@endif
									@endif
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group mb-2">
							<label for="regulation_interval">Período</label>
							<input 
								type="text" 
								class="js-flatpickr form-control js-flatpickr-enabled flatpickr-input"
								name="regulation_interval" 
								data-mode="range" 
								readonly="readonly">
						</div>
					</div>
				</div>
				<div class="row px-4 mt-1">
					<div class="text-center">
						<button type="submit" class="btn btn-info me-1 mb-3">
							<i class="icon-magnifier me-1"></i> Pesquisar
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
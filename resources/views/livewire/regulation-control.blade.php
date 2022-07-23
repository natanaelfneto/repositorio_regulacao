
	@include('searchbar', array('request' => request()))
	<style>
		.modal-backdrop {
			z-index: 100 !important;
		}
		.modal {
			top: 4rem;
		}
	</style>
	<div class="content">
		<div class="block block-rounded overflow-hidden">
			<ul class="nav nav-tabs nav-tabs-block" role="tablist">
				<li class="nav-item">
					<button 
						type="button" 
						class="nav-link active" 
						id="search-projects-tab" 
						data-bs-toggle="tab"
						data-bs-target="#search-projects" 
						role="tab" 
						aria-controls="search-projects"
						aria-selected="true">
						Resultado
					</button>
				</li>
				<li class="d-none nav-item">
					<button 
						type="button" 
						class="nav-link" 
						id="search-users-tab" 
						data-bs-toggle="tab"
						data-bs-target="#search-users" 
						role="tab" 
						aria-controls="search-users"
						aria-selected="false">
						Profissões
					</button>
				</li>
				<li class="d-none nav-item">
					<button
						type="button" 
						class="nav-link" 
						id="search-classic-tab" 
						data-bs-toggle="tab"
						data-bs-target="#search-classic" 
						role="tab" 
						aria-controls="search-classic"
						aria-selected="false">
						Órgãos Emissores
					</button>
				</li>
			</ul>
			<div class="block-content tab-content overflow-hidden">
				<div 
					class="tab-pane fade fade-up active show" 
					id="search-projects" 
					role="tabpanel"
					aria-labelledby="search-projects-tab">
					<div class="fs-4 fw-semibold p-2 mb-4 border-start border-4 border-primary bg-body-light">
						<span>
							{{ number_format($object_list_count, 0, ',', '.') }} resultados foram encontrados, carregados a
							{{ $object_list->count() }} itens por página em um total de {{ number_format($object_list->lastPage(), 0, ',', '.') }} páginas.
						</span>
					</div>
					<span class="">
						<b>Palavras-chaves:</b> {{ request()->query('filter_keyword') }}<br/>
						<b>Órgão Emissor:</b> {{ request()->query('regulation_issuer') }}<br/>
						<b>Profissão:</b> {{ request()->query('professions_name') }}<br/>
						<b>Tipo de Regulação:</b> {{ request()->query('regulation_type') }}<br/>
						<b>Intervalo de Pesquisa:</b> {{ request()->query('regulation_interval') }}<br/><br/>
					</span>
					<table class="table table-striped table-vcenter">
						<thead>
							<tr>
								<th>Regulação</th>
								<th class="d-none d-lg-table-cell text-center" style="width: 15%;">Profissões
								</th>
								<th class="d-none d-lg-table-cell text-center" style="width: 15%;">Órgão Emissor
								</th>
								<th class="d-none d-lg-table-cell text-center"></th>
								<th class="d-none d-lg-table-cell text-center"></th>
								@auth
									<th class="d-none d-lg-table-cell text-center"></th>
								@endauth
							</tr>
						</thead>
						<tbody>
							@if ($object_list->count())
								@foreach ($object_list as $object)
									<tr>
										<td>
											<h4 class="h5 mt-3 mb-2">
												<a href="{{ $object->regulation_link }}" target="_blank">
													{{ $object->regulation_type }} nº {{ $object->regulation_number }} de {{ $object->regulation_timestamp }}
												</a>
											</h4>
												<p class="d-none d-sm-block text-muted">
													{{ $object->regulation_synopsis }}
												</p>
										</td>
										<td class="d-none d-lg-table-cell text-center text-sm">
											<livewire:get-profession :regulation_id="$object->id">
										</td>
										<td class="d-none d-lg-table-cell font-size-xl text-center fw-semibold">
											{{ $object->regulation_issuer }} </td>
										<td class="ml-auto">
											<a 
												class="btn btn-info push" 
												href="{{ $object->regulation_link }}" 
												target="_blank">
												<i class="icon-link"></i>
											</a>
										</td>
										<td class="mr-auto">
											<button 
												type="button" 
												class="btn btn-dark push"
												data-bs-toggle="modal" 
												data-bs-target="#regulation_{{ $object->id }}">
												<i class="icon-info"></i>
											</button>
										</td>
										@auth
											<td class="mr-auto">
												<button 
													type="button" 
													class="btn btn-light push"
													data-bs-toggle="modal" 
													data-bs-target="#regulation_{{ $object->id }}">
													<i class="icon-note"></i>
												</button>
										</td>
										@endauth
									</tr>
								@endforeach
							@else
								<tr>No data was found</tr>
							@endif
						</tbody>
					</table>
					{{ $object_list->appends(Request::all())->links('pagination::bootstrap-4') }}
				</div>		
			</div>
		</div>
	</div>
<div class="fixed-bottom">
	@if ($object_list->count())
		@foreach ($object_list as $object)
			<div 
				class="modal fade"
				style="height: unset;"
				id="regulation_{{ $object->id }}" 
				tabindex="-1" 
				aria-labelledby="regulation_{{ $object->id }}" 
				style="display: block;" 
				aria-modal="true" 
				role="dialog">
				<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="block block-rounded block-transparent mb-0" style="overflow-y: scroll; max-height: 45rem;"">
							<div class="block-header block-header-default">
								<h3 class="block-title">{{ $object->regulation_type }} nº {{ $object->regulation_number }} de {{ $object->regulation_timestamp }}</h3>
								<div class="block-options">
									<button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
										<i class="fa fa-fw fa-times"></i>
									</button>
								</div>
							</div>
							<div class="block-content fs-sm">
								<p>{{!! nl2br(e($object->regulation_full_content)) !!}}</p>
							</div>
							<div class="block-content block-content-full text-end bg-body">
								<button 
									type="button" 
									class="btn btn-sm btn-alt-info me-1" 
									data-bs-dismiss="modal">
									Fechar
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif
</div>

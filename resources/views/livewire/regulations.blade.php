
<div class="content">
	<div class="row push  mx-auto">
		<div class="container block-rounded bg-white">
			<div class="block-header block-header-default text-left">
				<h3 class="block-title">Cadastrar Regulação</h3>
			</div>
			<div class="block-content block-content-full">
				<form action="{{ route('professions') }}" method="POST">
					<div class="row push">
						<div class="col-lg-4">
							<p class="fs-sm text-muted">
								Realizar cadastro de novo item
							</p>
						</div>
						<div class="col-lg-8 col-xl-5">
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Número</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Tipo de regulação</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Data de assinatura</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Órgão Emissor</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">URL da publicação</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Ementa</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Profissões relacionadas</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-text-input">Conteúdo</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div>
							<button type="submit" class="btn btn-info">
								Submeter
							</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="content">
	<div class="row push">
		<div class="container block block-rounded">
			<div class="block-header block-header-default">
				<h3 class="block-title">Regulações</h3>
			</div>
			<div class="block-content">
				<table class="grid-sm-table table table-striped table-vcenter font-size-sm mb-0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Regulação</th>
							<th class="d-none d-lg-table-cell">Órgão Emissor</th>
							<th class="d-none d-lg-table-cell text-center" style="width: 15%;">Órgão Emissor</th>
							<th class="d-none d-lg-table-cell text-center">Profissões</th>
							<th class="d-none d-lg-table-cell text-center"></th>
						</tr>
					</thead>
					<tbody>
						@if ($object_list->count())
							@foreach ($object_list as $object)
								@if ($object->id > 0)
								<tr>
									<td class="text-center">
										<span>{{ $object->id }}</span>
									</td>
									<td class="text-left">
										{{ $object->regulation_type }} nº {{ $object->regulation_number }} de {{ $object->regulation_timestamp }}
									</td>
									<td class="d-none d-md-table-cell fs-sm">{{ $object->regulation_issuer }}</td>
									<td class="d-none d-md-table-cell fs-sm"><livewire:get-profession :regulation_id="$object->id"></td>
									<td class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm text-dark js-bs-tooltip-enabled mx-1"
												data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
												<i class="fa fa-fw fa-pencil-alt"></i>
											</button>
											<button type="button" class="btn btn-sm text-info js-bs-tooltip-enabled mx-1"
												data-bs-toggle="tooltip" title="" data-bs-original-title="Informação">
												<i class="fa fa-fw fa-info"></i>
											</button>
											<button type="button" class="btn btn-sm border-0 text-danger js-bs-tooltip-enabled mx-1"
												data-bs-toggle="tooltip" title="" data-bs-original-title="Remover">
												<i class="fa fa-fw fa-times"></i>
											</button>
										</div>
									</td>
								</tr>
								@endif
							@endforeach
						@else
							<tr>
								No data was found
							</tr>
						@endif
					</tbody>
				</table>
				{{ $object_list->appends(Request::all())->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>
</div>
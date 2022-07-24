
<div class="content">
	<div class="row push  mx-auto">
		<div class="container block-rounded bg-white">
			<div class="block-header block-header-default text-left">
				<h3 class="block-title">Cadastrar Profissão</h3>
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
								<label class="form-label" for="example-text-input">Profissão</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Profissão">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-email-input">Classificação Brasileira de Ocupações (CBO)</label>
								<input type="text" class="form-control" id="cbo" name="cbo" placeholder="0000">
							</div>
							<div class="mb-4">
								<label class="form-label" for="example-password-input">Símbolo da Profissão</label>
								<input type="text" class="form-control" id="logo" name="logo" placeholder="...">
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
				<h3 class="block-title">Profissões</h3>
			</div>
			<div class="block-content">
				<table class="grid-sm-table table table-striped table-vcenter font-size-sm mb-0">
					<thead>
						<tr>
							<th class="text-center" >ID</th>
							<th class="text-center" ></th>
							<th class="text-left">Profissão</th>
							<th class="text-left">CBO</th>
							<th class="text-left"></th>
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
									<td class="text-center">
										<img class="img-avatar img-avatar48" src="{{ asset('') }}img/uploads/000000.png" alt="">
									</td>
									<td class="d-none d-md-table-cell fs-sm">{{ $object->name }}</td>
									<td class="d-none d-md-table-cell fs-sm">{{ $object->cbo_number }}</td>
									<td class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-sm text-dark js-bs-tooltip-enabled mx-1"
												data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
												<i class="fa fa-fw fa-pencil-alt"></i>
											</button>
											<!-- -->
											<button type="button" class="btn btn-sm text-info js-bs-tooltip-enabled mx-1"
												data-bs-toggle="tooltip" title="" data-bs-original-title="Informação">
												<i class="fa fa-fw fa-info"></i>
											</button>
											<!-- -->
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
			</div>
		</div>
	</div>
</div>

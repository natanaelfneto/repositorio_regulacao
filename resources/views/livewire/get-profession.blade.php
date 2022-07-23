<div>
	@if ($professions->count() > 0)
		@foreach ($professions as $profession)
			<span
				class="fw-semibold d-inline-block btn btn-small btn-outline-secondary py-1 px-3 fs-sm m-1">
					@if($profession->name == 'null' )
						Todas as profissões
					@else
						{{ $profession->name }}
					@endif
			</span>
		@endforeach
	@else
		Não especificado
	@endif
</div>
<div class="block block-rounded">
	<div class="block-header block-header-default">
		<h3 class="block-title">Quantitativo de Normas por Tipo de Regulação</h3>
		<div class="block-options">
			<button 
				type="button" 
				class="btn-block-option" 
				data-toggle="block-option" 
				data-action="state_toggle" 
				data-action-mode="demo">
				<i class="si si-refresh"></i>
			</button>
		</div>
	</div>
	<div class="block-content block-content-full text-center">
		<div class="py-3">
			<figure class="highcharts-figure">
				<div id="regulation_types_count"></div>
			</figure>
			<script>
				var regulation_types_categories = '@if ($object_list_regulations_types) @foreach ($object_list_regulations_types as $object) {{ $object->type_name }}, @endforeach @endif';
				regulation_types_categories = regulation_types_categories.replace('null', 'Todas as profissões').split(",");
				regulation_types_categories = regulation_types_categories.filter(function (el) { return el.trim() != null && el.trim().length > 1; });
				var regulation_types_new_data = new Object();
				regulation_types_categories.forEach(item => {
					regulation_types_new_data[item] = -1;	
				});
				var regulation_types_count = render_chart(
					'regulation_types_count', 
					'Normas por Tipo de Regulação',
					Object.keys(regulation_types_new_data), 
					Object.keys(regulation_types_new_data).map(function(key){ return regulation_types_new_data[key]; })
				);
				start_loop(
					regulation_types_count,
					regulation_types_categories,
					regulation_types_new_data,
					"{{ route('api_types_regulations_count') }}"
				);			
				</script>
		</div>
	</div>
</div>
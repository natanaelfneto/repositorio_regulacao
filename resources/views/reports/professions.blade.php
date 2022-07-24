<div class="block block-rounded">
	<div class="block-header block-header-default">
		<h3 class="block-title">Quantitativo de Normas por Profissão</h3>
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
				<div id="professions_count"></div>
			</figure>
			<script>
				var professions_categories = '@if ($object_list_professions) @foreach ($object_list_professions as $object) {{ $object->name }}, @endforeach @endif';
				professions_categories = professions_categories.replace('null', 'Todas as profissões').split(",");
				professions_categories = professions_categories.filter(function (el) { return el.trim() != null && el.trim().length > 1; });
				var professions_new_data = new Object();
				professions_categories.forEach(item => {
					professions_new_data[item] = -1;	
				});
				var professions_count =	render_chart(
					'professions_count', 
					'Normas por Profissão',
					Object.keys(professions_new_data), 
					Object.keys(professions_new_data).map(function(key){ return professions_new_data[key]; })
				);
				start_loop(
					professions_count,
					professions_categories,
					professions_new_data,
					"{{ route('api_profession_regulations_count') }}"
				);			
				</script>
		</div>
	</div>
</div>
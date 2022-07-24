<div class="block block-rounded">
	<div class="block-header block-header-default">
		<h3 class="block-title">Quantitativo de Normas por Órgão Emissor</h3>
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
				<div id="regulation_issuers_count"></div>
			</figure>
			<script>
				var regulation_issuer_categories = '@if ($object_list_regulations_issuers) @foreach ($object_list_regulations_issuers as $object) {{ $object->issuer_name }}, @endforeach @endif';
				regulation_issuer_categories = regulation_issuer_categories.replace('null', 'Todas os emissores').split(",");
				regulation_issuer_categories = regulation_issuer_categories.filter(function (el) { return el.trim() != null && el.trim().length > 1; });
				var regulation_issuer_new_data = new Object();
				regulation_issuer_categories.forEach(item => {
					regulation_issuer_new_data[item] = -1;	
				});
				var regulation_types_count = render_chart(
					'regulation_issuers_count', 
					'Normas por Órgão Emissor',
					Object.keys(regulation_issuer_new_data), 
					Object.keys(regulation_issuer_new_data).map(function(key){ return regulation_issuer_new_data[key]; })
				);
				start_loop(
					regulation_types_count,
					regulation_issuer_categories,
					regulation_issuer_new_data,
					"{{ route('api_issuers_regulations_count') }}"
				);			
				</script>
		</div>
	</div>
</div>
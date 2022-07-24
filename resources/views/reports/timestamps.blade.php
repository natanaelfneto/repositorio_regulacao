<div class="block block-rounded">
	<div class="block-header block-header-default">
		<h3 class="block-title">Quantitativo de Normas no Tempo</h3>
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
				<div id="regulation_timestamp_count"></div>
			</figure>
			<script>
				var regulation_timestamp_categories = '@if ($object_list_regulations_timestamps) @foreach ($object_list_regulations_timestamps as $object) {{ $object }}, @endforeach @endif';
				regulation_timestamp_categories = regulation_timestamp_categories.replace('null', 'Sem data').split(",");
				regulation_timestamp_categories = regulation_timestamp_categories.filter(function (el) { return el.trim() != null && el.trim().length > 1; });
				var regulation_timestamp_new_data = new Object();
				regulation_timestamp_categories.forEach(item => {
					regulation_timestamp_new_data[item] = -1;	
				});
				var regulation_timestamp_count = render_chart(
					'regulation_timestamp_count', 
					'Normas no Tempo',
					Object.keys(regulation_timestamp_new_data), 
					Object.keys(regulation_timestamp_new_data).map(function(key){ return regulation_timestamp_new_data[key]; })
				);
				start_loop(
					regulation_timestamp_count,
					regulation_timestamp_categories,
					regulation_timestamp_new_data,
					"{{ route('api_timestamp_regulations_count') }}"
				);
				</script>
		</div>
	</div>
</div>

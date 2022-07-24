<div>
	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous">
	</script>
	<script>
		Highcharts.setOptions({
			lang: {
				months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				shortMonths: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				loading: ['Atualizando o gráfico... Por favor, aguarde'],
				contextButtonTitle: 'Exportar gráfico',
				decimalPoint: ',',
				thousandsSep: '.',
				downloadJPEG: 'Baixar gráfico em formato JPEG',
				downloadPDF: 'Baixar gráfico em formato PDF',
				downloadPNG: 'Baixar gráfico em formato PNG',
				downloadSVG: 'Baixar gráfico em formato SVG',
				downloadCSV: 'Baixar gráfico em arquivo CSV',
				downloadXLS: 'Baixar gráfico em arquivo XLS',
				printChart: 'Imprimir gráfico',
				rangeSelectorFrom: 'De',
				rangeSelectorTo: 'Para',
				rangeSelectorZoom: 'Zoom',
				resetZoom: 'Limpar Zoom',
				resetZoomTitle: 'Voltar Zoom para nível 1:1',
				drillUpText: 'Voltar',
				exitFullscreen: 'Sair da visualização de tela cheia',
				viewFullscreen: 'Visualizar em tela cheia',
				viewData: 'Expandir tabela auxiliar',
				noData: 'Sem dados para visualizar',
				hideData: 'Esconder tabela auxiliar'
			}
		});
	</script>
	<main id="main-container">
		<script>
			let get_updated_data = function(route, categories, new_data) {
				let _token = '{{ csrf_token() }}';
				$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': _token }, });
				categories.forEach(item => {
					if(item.length > 3) { 
						$.ajax({
							url: route,
							type: "GET",
							data: { '_token': _token, 'name': item, },
							dataType: 'JSON',
							success: function(result){
								new_data[item] = result;
							},
						});
					}
				});
				return Object.keys(new_data).map(function(key){ return new_data[key]; });
			};
			function start_loop(my_series, categories, new_data, route) {
				var my_series_ = my_series;
				var categories_ = categories;
				var new_data_ = new_data;
				var route_ = route;
				var interval = setInterval(function(my_series_, categories_, new_data_, route_) {
					if (Object.values(new_data).indexOf(-1) > -1) {
						my_series.series[0].setData(get_updated_data(
							route,
							categories,
							new_data,
						));							
					}
					else {
						my_series.series[0].setData(get_updated_data(
							route,
							categories,
							new_data,
						));		
						clearInterval(interval);	
					}
				}, 2000);
			};
			function render_chart(chart_name, chart_title, my_keys, my_data) {
				var chart = Highcharts.chart(chart_name, {
					credits: { enabled: false },
					chart: { type: 'column' },
					title: { text: chart_title },
					xAxis: {
						categories: my_keys,
						labels: { style: { textOverflow: 'none' } },
					},
					plotOptions: {
						series: {
							minPointLength: 3,
							style: {
								textOutline: 'white',
								strokeWidth: 0,
							},
						}
					},
					yAxis: {
						title: { text: 'Quantidade' },
						labels: {
							formatter: function () {
								return this.value;
							}
						}
					},
					legend: { enabled: false, style: { strokeWidth: 0 } },
					accessibility: { enabled: false },
					tooltip: { enabled: false, },
					series: [
						{
							name: chart_title,
							showInLegend: false,  
							marker: { symbol: null },
							data: my_data,
							dataLabels: {
								enabled: true,
								rotation: 0,
								color: 'ccc',
								align: 'top',
								y: -15,
								style: {
										fontSize: '10px',
										fontFamily: 'helvetica, arial, sans-serif',
										textShadow: false,
										fontWeight: 'normal'
								}
							}
						},
					]
				});
				return chart;
			};
		</script>
		<style>
			.highcharts-text-outline {
				stroke-width: 0 !important;
			}
		</style>
		<!-- Page Content -->
		<div class="content">
			<div class="row">
				<div class="col-xl-12">
					<!-- Bars Chart -->
					@if ($graph == 'professions') 
						@include('reports.professions', array('request' => request())) 
					@elseif ($graph == 'types')
						@include('reports.types', array('request' => request())) 
					@elseif ($graph == 'issuers')
						@include('reports.issuers', array('request' => request())) 
					@elseif ($graph == 'timestamps')
						@include('reports.timestamps', array('request' => request()))
					@endif
				</div>
			</div>
		</div>
		<!-- END Page Content -->
	</main>
</div>

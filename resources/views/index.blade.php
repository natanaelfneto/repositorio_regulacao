@extends('base_private')
@push('styles')
	<link rel="stylesheet" href="{{ asset('theme/css/vendor/bootstrap-stars.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/vendor/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/vendor/baguetteBox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/vendor/component-custom-switch.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/vendor/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('css/stylish-portfolio.css') }}">
	<style>
		.card-shadow {
			-webkit-box-shadow: 6px 6px 19px -7px rgba(0,0,0,0.76);
			-moz-box-shadow: 6px 6px 19px -7px rgba(0,0,0,0.76);
			box-shadow: 6px 6px 19px -7px rgba(0,0,0,0.76);
		}
	</style>
@endpush
@push('scripts')
	<script src="{{ asset('theme/js/vendor/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('theme/js/vendor/jquery.barrating.min.js') }}"></script>
	<script src="{{ asset('theme/js/vendor/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('theme/js/vendor/mousetrap.min.js') }}"></script>
	<script src="{{ asset('theme/js/vendor/baguetteBox.min.js') }}"></script>
	<script src="{{ asset('js/stylish-portfolio.min.js') }}"></script>
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
@endpush
@section('content')
<!-- Main Container -->
<main id="main-container" style="overflow-y: hidden;">
	<div
		class="d-none bg-image overflow-hidden">
		<div class="bg-primary-dark-op h-100">
			<div class="content content-narrow content-full">
				<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
					<div class="flex-sm-fill">
						<h1
							class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn"
							data-toggle="appear">
							Repositório Nacional de Regulações
						</h1>
						<h2
							class="h4 font-w400 text-white-75 mb-0 js-appear-enabled animated fadeIn"
							data-toggle="appear"
							data-timeout="250">
							Regulalação do Trabalho em Saúde
						</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="content">
			<div class="row push">
				<main id="main-container">
					<div class="mx-5">
						@include('searchbar', array('request' => request())) 
					</div>
				</main>
			</div>
			<div class="row push mx-5 px-3">
				<div class="col-xl-3 order-xl-1">
					<div class="card card-shadow" style="background-color: #1F84A1; min-height: 20rem;">
						<div class="card-body text-center">
							<h5 class="card-title my-5 py-3 text-center text-white">Órgãos Emissores</h5>
							<p class="card-text text-white">
								Ver agrupamento de normativas por Órgão Emissor
							</p>
						</div>
						<div class="card-footer mx-auto border-0" style="background-color: transparent !important;">
							<a href="#" class="btn btn-info">Entrar</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 order-xl-1">
					<div class="card card-shadow" style="background-color: #0D5987; min-height: 20rem;">
						<div class="card-body text-center">
							<h5 class="card-title my-5 py-3 text-center text-white">Profissões</h5>
							<p class="card-text text-white">
								Ver agrupamento de normativas por Profissões
							</p>
							</div>
						<div class="card-footer mx-auto border-0" style="background-color: transparent !important;">
							<a href="#" class="btn btn-info">Entrar</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 order-xl-1">
					<div class="card card-shadow" style="background-color: #09CDC3; min-height: 20rem;">
						<div class="card-body text-center">
							<h5 class="card-title my-5 py-3 text-center text-white">Tipo de Norma</h5>
							<p class="card-text text-white">	
								Ver agrupamento de normativas por Tipo de Norma
							</p>
							</div>
						<div class="card-footer mx-auto border-0" style="background-color: transparent !important;">
							<a href="#" class="btn btn-info">Entrar</a>
						</div>
					</div>
				</div>
				<div class="col-xl-3 order-xl-1">
					<div class="card card-shadow" style="background-color: #2CBD92; min-height: 20rem;">
						<div class="card-body text-center">
							<h5 class="card-title my-5 py-3 text-center text-white">Projeto de Lei</h5>
							<p class="card-text text-white">	
								Ver agrupamento de normativas por Projeto de Lei
							</p>
							</div>
						<div class="card-footer mx-auto border-0" style="background-color: transparent !important;">
							<a href="#" class="btn btn-info">Entrar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
</main>
<!-- END Main Container -->
@endsection
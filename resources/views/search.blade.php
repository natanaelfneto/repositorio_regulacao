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
	<main id="main-container" style="overflow-y: hidden;">
		<div class="mx-5">
			@livewire('regulation-control')
		</div>
	</main>
@endsection

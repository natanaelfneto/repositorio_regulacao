<!doctype html>
<html id="html" lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="
		width=device-width,
		initial-scale=1.0,
		shrink-to-fit=no,
		maximum-scale=1.0,
		minimum-scale=1.0,
		user-scalable=no" />
	<title>Biblioteca de Regulação do Trabalho em Saúde - BRTS</title>
	<link rel="shortcut icon" href="" />
	<meta name="description" content="">
	<meta name="author" content="natanaelfneto">
	<meta name="robots" content="noindex, nofollow">
	<meta property="og:title" content="">
	<meta property="og:site_name" content="">
	<meta property="og:description" content="">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
		crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('fonts/fontawesome4/css\font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/fontawesome5/css/fontawesome.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/line-icons/line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/line-icons-pro/styles.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" id="css-main" href="{{ asset('css/oneui5.css') }}">
	<link rel="stylesheet" id="css-main" href="{{ asset('nstyle/css/nstyle.css') }}">
	<link
		rel="stylesheet"
		id="css-main"
		href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" />
	<link 
		rel="stylesheet" 
		href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	@livewireStyles
	@stack ('styles')
	<style>
		#main-container {
			background-color: #F5F5F5 !important;
		}
		body {
			font-family: "Open Sans",
			-apple-system, 
			BlinkMacSystemFont, 
			"Segoe UI", 
			Roboto, 
			"Helvetica Neue", 
			Arial, 
			"Noto Sans", 
			sans-serif, 
			"Apple Color Emoji", 
			"Segoe UI Emoji", 
			"Segoe UI Symbol";
		}
</style>
</head>
<body id="html_body">
	<div id="page-container"
		class="sidebar-mini enable-page-overlay side-scroll page-header-fixed">
		@include('sidebar')
		<header id="page-header" style="min-height: 4rem;">
			<div class="content-header">
				<div class="d-flex align-items-center">
					<button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout"
						data-action="side_overlay_toggle">
						<i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
					</button>
						<div data-toggle="tooltip" data-placement="bottom" title="menu lateral">
							<button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block"
								data-toggle="layout" data-action="side_overlay_toggle">
								<i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
							</button>
						</div>
						<div class="mx-2">Biblioteca de Regulação do Trabalho em Saúde - BRTS</div>
				</div>
				<div class="d-flex align-items-center">
					@guest
					<div class="mx-2 small mr-4">Usuário Anônimo</div>
					<div data-toggle="tooltip" data-placement="bottom" title="menu lateral">
						<a 
							{{-- href="{{ route('login') }}" --}}
							class="btn btn-sm btn-info mr-2 d-none d-lg-inline-block">
							Entrar <i class="icon icon-login"></i>
						</a>
					</div>
					@endguest
					@auth
					<div class="mx-2">{{ auth()->user()->name }}</div>
					<form method="POST" action="{{ route('logout') }}">
						@csrf
						<div data-toggle="tooltip" data-placement="bottom" title="menu lateral">
							<a 
								href="{{ route('logout') }}"
								onclick="event.preventDefault();this.closest('form').submit();"
								role="button"
								class="btn btn-sm btn-alt-danger mr-2 d-none d-lg-inline-block">
								Sair <i class="icon icon-logout"></i>
							</a>
						</div>
					</form>
					@endauth
				</div>
			</div>
			<div id="page-header-loader" class="overlay-header bg-white">
				<div class="content-header">
					<div class="w-100 text-center">
						<i class="fa fa-fw fa-circle-notch fa-spin"></i>
					</div>
				</div>
			</div>
		</header>
		@yield ('content')
		<footer id="page-footer" class="text-white d-flex" style="min-height: 15rem; background-color: #0D5987;">
			<div class="content py-3 my-auto">
				<div class="d-none row font-size-sm">
					<div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
						<ul class="list-inline d-inline-flex m-0">
							<small>
								<li class="list-inline-item my-2">
									<a class="text-white mr-3" href="" target="_blank">
										Cepedisa/USP
									</a>
								</li>
								<li class="list-inline-item my-2">
									<a class="text-white mr-3" href="http://observatoriorh.ufrn.br/" target="_blank">
										ObservaRH/UFRN
									</a>
								</li>
								<li class="d-none list-inline-item my-2">
									<a class="text-white mr-3" href="https://ufrn.br/" target="_blank">
										UFRN
									</a>
								</li>
								<li class="list-inline-item my-2">
									<a class="text-white mr-3" href="https://www.gov.br/saude/pt-br" target="_blank">
										Ministério da Saúde
									</a>
								</li>
								<li class="list-inline-item my-2">
									<a class="text-white mr-3" href="https://www.gov.br/saude/pt-br" target="_blank">
										Governo Federal do Brasil
									</a>
								</li>
							</small>
						</ul>
					</div>
					<div class="col-sm-6 order-sm-1 py-1 text-left text-sm-left text-white">
						<a class="font-w600" href="http://observatoriorh.ufrn.br/" target="_blank">
							<span class="text-capitalize  text-white"><small>ObservaRH/UFRN | Cepedisa/USP</small></span>
							<span><small class="text-white">0.0</small></span>
						</a> &copy; <span data-toggle="year-copy"></span>
					</div>	
				</div>
				<div class="container">
					<ul class="list-inline mb-5 row mx-auto">
						<div class="row px-3 mx-auto">
							<li class="d-flex col-4 m-auto">
								<a class="text-white mx-auto" href="" target="_blank">
									<img height="70" src="{{ asset('img/logocepedisa.png') }}">
								</a>
							</li>
							<li class="d-flex col-4 m-auto">
								<a class="text-white mx-auto" href="http://observatoriorh.ufrn.br/" target="_blank">
									<img height="40" src="{{ asset('img/obervarh_logomarca.png') }}">
								</a>
							</li>
							<li class="d-flex col-4 m-auto">
								<a class="text-white mx-auto mb-4" href="https://www.gov.br/saude/pt-br" target="_blank">
									<img height="95" src="{{ asset('img/ms_logomarca.png') }}" style="position: relative; top: -10px">
								</a>
							</li>
						</div>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	<scripts-group>
		<script
			src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			crossorigin="anonymous">
		</script>
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
			integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
			crossorigin="anonymous">
		</script>
		<script 
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
			integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
			crossorigin="anonymous">
		</script>
		<script src="{{ asset('nstyle/js/oneui.core.min.js') }}"></script>
		<script src="{{ asset('nstyle/js/oneui.app.min.js') }}"></script>
		<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
		<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
		@livewireScripts
		<script>
			$(".flatpickr-input").flatpickr({
				locale: "pt",
				altFormat: "d-m-Y",
			});
		</script>
		@stack ('scripts')
		
	</scripts-group>
</body>
</html>

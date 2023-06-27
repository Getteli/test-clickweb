<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	@vite([
		'resources/js/app.js',
		'resources/css/app.css',
	])
</head>
<body>
	<div class="container-xxl">
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ route('home') }}">{{__('view.home_page') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="{{ route('filmes.home') }}">{{__('view.filmes') }}</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		{{-- conteudo --}}
		<main class="container-xl">
			@yield('content')
		</main>
	</div>
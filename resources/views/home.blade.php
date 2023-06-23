{{-- layout onde esse conteudo sera apresentado --}}
@extends('container')

{{-- conteudo --}}
@section('content')
	<div class="container mt-5">
		<div class="row">
			@foreach($allnews as $news)
				<div class="col-12 col-md-6">
					<div class="card my-3">
						<div class="card-body">
							<h5 class="card-title">{{ $news->getTitle() }}</h5>
							<p class="card-text">{{ $news->getSubTitle() }}</p>
							<a href="{{ route('open.post',['slug' => $news->getSlug()]) }}" class="btn btn-primary">{{ __('view.read_more') }}</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="position-relative mt-5">
			<div class="d-flex justify-content-center">
				{!! $allnews->links() !!}
			</div>
		</div>
	</div>
@endsection

@section('title')
	Teste Click Web - home
@endsection
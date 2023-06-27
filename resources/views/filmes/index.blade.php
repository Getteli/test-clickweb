{{-- layout onde esse conteudo sera apresentado --}}
@extends('container')

{{-- conteudo --}}
@section('content')
	<div class="container mt-5">
		<div class="row">
            @foreach ($filmes->results as $filme)
                <div class="col-12 col-sm-3">
                    <div class="card my-3">
                        @if (!is_null($filme->primaryImage))
                            <img src="{{ $filme->primaryImage->url ?? '' }}" alt="capa filme">
                        @endif
                        <div class="card-body">
                            @if (!is_null($filme->originalTitleText))
                                <h5 class="card-title">{{ $filme->originalTitleText->text ?? 'Sem titulo' }}</h5>
                            @endif
                            @if (!is_null($filme->releaseYear))
                                <p class="card-text">lançamento: {{ $filme->releaseYear->year ?? '0000' }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
		</div>

		<div class="position-relative mt-5">
			<div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{ route('filmes.another.page',['page' => $bpage]) }}" aria-label="Previus">
                                <span aria-hidden="true">&laquo; Voltar</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ route('filmes.another.page',['page' => $npage]) }}" aria-label="Next">
                                <span aria-hidden="true">Próxima &raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
			</div>
		</div>
	</div>
@endsection

@section('title')
	Teste Click Web - Filmes
@endsection
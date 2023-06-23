{{-- layout onde esse conteudo sera apresentado --}}
@extends('container')

{{-- conteudo --}}
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Página não encontrada 🫥</h2>
                    <p>tente outra noticia, voltando a <a href="{{ route('home') }}">página principal</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Noticia não encontrada =/
@endsection
{{-- layout onde esse conteudo sera apresentado --}}
@extends('container')

{{-- conteudo --}}
@section('content')
    <div class="container mt-5">
        <div class="justify-content-center">
            <div class="row">
                <h1 class="text-center fs-1">{{ $news->getTitle() }}</h1>
                <h2 class="fs-5 fw-light">{{ $news->getSubtitle() }}</h2>
                <span class="text-muted fw-bold">{{ __('view.news_created')}}: {{ $news->created_at }}</span>
            </div>
            <hr>
            <div class="container row mt-5 mb-2 mx-0 mx-sm-3">
                {!! $news->getContent() !!}
            </div>
            <hr>
            <div class="row mt-4">
                <div class="m-1">
                    <label for="author">{{ __('view.author') }}:</label><br>
                    <span id="author">{{ $news->getNameAuthor() }}</span>
                </div>
                <div class="m-1">
                    <label for="about">{{ __('view.about') }}:</label><br>
                    <span id="about">{{ $news->getAboutAuthor() }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    {{ $news->getTitle() }}
@endsection
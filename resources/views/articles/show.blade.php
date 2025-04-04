@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $article->title }}</h1>
            <p class="text-muted">
                Опубликовано: {{ $article->created_at_formatted }}
                <br>
                {{ $article->created_at_human }}
            </p>
            <div class="card-text">
                {{ $article->content }}
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-primary mt-3">Назад к списку</a>
        </div>
    </div>
@endsection 